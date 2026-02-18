<x-utils.website-layout>

    <section class="py-5" style="background:#F9FAFB">

        {{-- @dd($product); --}}
        <form action="{{ route('checkout.order', $product->slug) }}"  method="POST">
            @csrf

            <div class="container">

                <!-- Page Title -->
                <div class="mb-4">
                    <h2 class="fw-bold">Checkout</h2>
                    <p class="text-muted">Complete your order by providing details below</p>
                </div>

                <div class="row g-4">

                    <!-- LEFT: USER & PAYMENT -->
                    <div class="col-lg-8">

                        <!-- USER INFORMATION -->
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body">
                                <h5 class="fw-bold mb-3">Billing Information</h5>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Full Name</label>
                                        <input type="text" class="form-control" placeholder="John Doe"
                                            name="name">
                                        @error('name')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Email Address</label>
                                        <input type="email" class="form-control" placeholder="john@example.com"
                                            name="email">
                                        @error('email')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Phone Number</label>
                                        <input type="text" class="form-control" placeholder="+92 300 1234567"
                                            name='phone'>
                                        @error('phone')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">City</label>
                                        <input type="text" class="form-control" placeholder="Karachi" name="city">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label small fw-bold">Shipping Address</label>
                                        <textarea class="form-control" rows="3" placeholder="House no, street, area" name="address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PAYMENT METHOD -->
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="fw-bold mb-3">Payment Method</h5>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="payment" value="cod" checked>
                                    <label class="form-check-label fw-bold">
                                        Cash on Delivery
                                    </label>
                                    <p class="small text-muted mb-0">
                                        Pay when your bike is delivered to your doorstep
                                    </p>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="payment" value="card">
                                    <label class="form-check-label fw-bold">
                                        Credit / Debit Card
                                    </label>
                                    <p class="small text-muted mb-2">
                                        Visa, MasterCard accepted
                                    </p>

                                    <!-- Card Details -->
                                    {{-- <div class="row g-3">
                                        <div class="col-md-12">
                                            <input class="form-control" placeholder="Card Number">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" placeholder="MM / YY">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" placeholder="CVV">
                                        </div>
                                    </div> --}}
                                </div>

                                {{-- <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment">
                                    <label class="form-check-label fw-bold">
                                        Bank Transfer
                                    </label>
                                    <p class="small text-muted">
                                        Transfer payment directly to our bank account
                                    </p>
                                </div> --}}

                            </div>
                        </div>

                    </div>

                    <!-- RIGHT: ORDER SUMMARY -->
                    <div class="col-lg-4">

                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="fw-bold mb-3">Order Summary</h5>

                                <!-- Item -->
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <img src="{{ $product->images->first()->image_url }}" width="70"
                                        class="rounded">
                                    <div>
                                        <h6 class="fw-bold mb-0">{{ $product->name }}</h6>
                                        <small class="text-muted">Qty: 1</small>
                                    </div>
                                    <span class="ms-auto fw-bold">${{ $product->new_price }}</span>
                                </div>

                                <!-- Item -->
                                {{-- <div class="d-flex align-items-center gap-3 mb-3">
                                    <img src="https://images.unsplash.com/photo-1612197590870-2e5d9d4c0c35"
                                        width="70" class="rounded">
                                    <div>
                                        <h6 class="fw-bold mb-0">Yamaha MT 15</h6>
                                        <small class="text-muted">Qty: 1</small>
                                    </div>
                                    <span class="ms-auto fw-bold">$1,600</span>
                                </div> --}}

                                <hr>

                                @php
                                    $tax = $product->new_price * 0.10 ;
                                    $total_p= $product->new_price + $tax;
                                @endphp

                                <div class="d-flex justify-content-between mb-2">
                                    <span>Subtotal</span>
                                    <span class="fw-bold">${{ $product->new_price }}</span>
                                </div>

                                <div class="d-flex justify-content-between mb-2">
                                    <span>Tax</span>
                                    <span class="fw-bold">${{ $tax }}</span>
                                </div>

                                <div class="d-flex justify-content-between mb-3">
                                    <span class="fw-bold">Total</span>
                                    <span class="fw-bold text-warning">${{ $total_p }}</span>
                                </div>

                                <button class="btn btn-warning w-100 btn-lg">
                                    Place Order
                                </button>

                            </div>
                        </div>

                        <!-- SECURITY NOTE -->
                        <div class="text-center mt-3 small text-muted">
                            🔒 Your payment information is secure
                        </div>

                    </div>

                </div>
            </div>

        </form>
    </section>




</x-utils.website-layout>
