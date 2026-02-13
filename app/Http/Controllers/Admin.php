<?php

namespace App\Http\Controllers;

use App\Models\OrderConfirm;
use App\Models\Product;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function index()
    {
        // dd('admin dashboard');
        return view('dashboard.main');
    }

    public function products()
    {
        $products = Product::all();
        return view('dashboard.products.index' , compact('products'));
    }

    public function createProduct()
    {
        return view('dashboard.products.create');
    }

    public function editProduct()
    {
        return view('dashboard.products.edit');
    }

    public function deleteProduct()
    {
        return view('dashboard.products.delete');
    }

    public function showProduct(Product $product)
    {
        return view('dashboard.products.show', compact('product'));
    }

    public function categories()
    {
        return view('dashboard.category.index');
    }

    public function createCategory()
    {
        return view('dashboard.category.create');
    }

    public function editCategory()
    {
        return view('dashboard.category.edit');
    }

    public function deleteCategory()
    {
        return view('dashboard.category.delete');
    }

    public function showCategory()
    {
        return view('dashboard.category.show');
    }

    public function collection()
    {
        return view('dashboard.collection.index');
    }

    public function createCollection()
    {
        return view('dashboard.collection.create');
    }

    public function editCollection()
    {
        return view('dashboard.collection.edit');
    }

    public function deleteCollection()
    {
        return view('dashboard.collection.delete');
    }

    public function showCollection()
    {
        return view('dashboard.collection.show');
    }

    public function userindex()
    {
        return view('users.index');
    }

    public function adminOrderConfirm()
    {
        $orders = OrderConfirm::all();
        return view('dashboard.orders.orders' , compact('orders'));
    }

    public function adminOrderdetail(OrderConfirm $order)
    {
        return view('dashboard.orders.orderdetail' , compact('order'));
    }




    public function storeProduct (Request $request){
        // dd($request->all());

        //validation


        //image upload
        if($request->hasFile("image")){
            // image is present
            $image = $request->file("image");
        // generate the unique name for the image
            $imageName = "IMG-" . time() . "." . $image->getClientOriginalExtension();

        // move the image to the public folder
            $image->storeAs("products" , $imageName, "public");

            return "image stored";
        }else{
            $imageName = "https://via.placeholder.com/150";
            // image is not present
            return "image not stored";
        }

        // save in database

        Product::create([
            "image_url" => $imageName,
        ]);


        // return back with success message
    }


    public function updateOrderStatus(Request $request, OrderConfirm $order)
    {
        // dd($request->all(), $order);

        if($order->order_status == "shipped"){
            if($request->status == "cancelled"){
                return redirect()->back()->with('error', 'Cannot cancel an order that has already been shipped.');
            }
            
        }
        $order->update([
            'order_status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
}
