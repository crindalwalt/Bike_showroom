<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirm as MailOrderConfirm;
use App\Models\OrderConfirm;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('web-pages.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function allProducts()
    {
        $products = Product::all();

        return view('web-pages.all-products', compact('products'));
    }

    public function singleProduct(Product $product)
    {
        return view('web-pages.single-product', compact('product'));
    }

    public function account()
    {
        return view('web-pages.user-account');
    }

    public function cart()
    {
        return view('web-pages.cart');
    }

    public function checkout(Product $product)
    {
        // dd($product);
        return view('web-pages.checkout', compact('product'));
    }

    public function confirm_email()
    {

        Mail::to('anasch14g@gmail.com')->send(new MailOrderConfirm);

        return 'email sent';
    }

    public function createorder(Request $request, Product $product)
    {
        // dd($request->all());

        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
            'payment' => ['required', 'string', 'in:cod,card'],
        ]);

        if ($request->payment === 'card') {
            // Store order data in session before redirecting to Stripe
            session([
                'order_data' => [
                    'productId' => $product->id,
                    'total_price' => $product->new_price + ($product->new_price * 0.1),
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'city' => $request->city,
                    'address' => $request->address,
                    'payment_method' => 'card',
                ]
            ]);

            return $this->stripeCheckout($request, $product);
        }

        // For COD, create order immediately
        $order = OrderConfirm::create([
            'oderid' => 'ORD' . time(),
            'productId' => $product->id,
            'total_price' => $product->new_price + ($product->new_price * 0.1),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
            'payment_method' => 'cod',
            'order_status' => 'pending',
            'payment_status' => 'pending',
        ]);

        return redirect()->route('account', $order);
    }


    public function stripeCheckout(Request $request, Product $product)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $domain = env('APP_URL');

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name,
                    ],
                    'unit_amount' => ($product->new_price + ($product->new_price * 0.1)) * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $domain . '/stripe/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => $domain . '/stripe/cancel/' . $product->slug,
            'metadata' => [
                'product_id' => $product->id,
                'product_slug' => $product->slug,
            ],
        ]);

        return redirect($session->url);
    }

    public function stripeSuccess(Request $request)
    {
        $sessionId = $request->query('session_id');

        if (!$sessionId) {
            return redirect()->route('home')->with('error', 'Invalid payment session.');
        }

        // Retrieve order data from session
        $orderData = session('order_data');

        if (!$orderData) {
            return redirect()->route('home')->with('error', 'Order data not found.');
        }

        // Verify payment with Stripe
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $session = Session::retrieve($sessionId);

            if ($session->payment_status === 'paid') {
                // Create the order
                $order = OrderConfirm::create([
                    'oderid' => 'ORD' . time(),
                    'productId' => $orderData['productId'],
                    'total_price' => $orderData['total_price'],
                    'name' => $orderData['name'],
                    'email' => $orderData['email'],
                    'phone' => $orderData['phone'],
                    'city' => $orderData['city'],
                    'address' => $orderData['address'],
                    'payment_method' => 'card',
                    'order_status' => 'pending',
                    'payment_status' => 'completed',
                ]);

                // Clear session data
                session()->forget('order_data');

                return redirect()->route('account')->with('success', 'Payment successful!');
            }
        } catch (\Exception $e) {
            return redirect()->route('account')->with('error', 'Payment verification failed.' . $e->getMessage());
        }

        return redirect()->route('account')->with('error', 'Payment was not completed.');
    }

    public function stripeCancel($productSlug)
    {
        // Clear session data
        session()->forget('order_data');

        $product = Product::where('slug', $productSlug)->firstOrFail();

        return redirect()->route('checkout', $product->slug)
            ->with('error', 'Payment was cancelled. Please try again.');
    }
}
