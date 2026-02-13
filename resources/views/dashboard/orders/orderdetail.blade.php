<x-dashboard-layout.main>

    <style>
        .content h2 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 2px;
            color: #0F172A
        }

        .content p {
            font-size: 12px;
            color: #6B7280;
            margin-bottom: 0
        }

        .card-box {
            background: #fff;
            border: 1px solid #E5E7EB;
            border-radius: 14px;
            padding: 20px
        }

        .meta-row {
            display: flex;
            gap: 18px;
            flex-wrap: wrap
        }

        .meta-item {
            min-width: 160px
        }

        .label {
            font-size: 12px;
            color: #6B7280
        }

        .value {
            font-weight: 600;
            color: #0F172A
        }
    </style>

    <div class="content">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h2>Order Details</h2>
                <p class="text-muted">Detailed view for order and customer information</p>
            </div>
            <div>
                <a href="{{ route('dashboard.orders') }}" class="btn btn-outline-secondary">Back to Orders</a>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <div class="card-box">
                    <h6 class="mb-3">Order Information</h6>
                    <div class="meta-row">
                        <div class="meta-item">
                            <div class="label">Order ID</div>
                            <div class="value">{{ $order->oderid }}</div>
                        </div>
                        <div class="meta-item">
                            <div class="label">Total Price</div>
                            <div class="value">${{ number_format($order->total_price, 2) }}</div>
                        </div>
                        <div class="meta-item">
                            <div class="label">Payment Method</div>
                            <div class="value text-capitalize">{{ $order->payment_method }}</div>
                        </div>
                        <div class="meta-item">
                            <div class="label">Payment Status</div>
                            <div class="value">{{ $order->payment_status }}</div>
                        </div>
                        <div class="meta-item">
                            <div class="label">Order Status</div>
                            <div class="value">{{ $order->order_status }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card-box">
                    <h6 class="mb-3">Customer & Shipping</h6>
                    <div class="label">Name</div>
                    <div class="value">{{ $order->name }}</div>
                    <div class="label mt-2">Contact</div>
                    <div class="value">{{ $order->email }} • {{ $order->phone }}</div>
                    <div class="label mt-2">Address</div>
                    <div class="value">{{ $order->address }}, {{ $order->city }}</div>
                </div>
            </div>

            <div class="col-12">
                <div class="card-box">
                    <h6 class="mb-3">Products</h6>
                    <p class="text-muted">Listed product identifiers (stored in `productId`). If your controller passes
                        related products, they will show here.</p>

                    <form action="{{ route("dashboard.orders.update_status" , $order->id) }}" method="POST">
                        @csrf
                        <div class="d-flex align-items-center gap-2">
                            <select name="status" class="p-2 rounded-4" id="">
                                <option value="pending" @if($order->order_status === 'pending') selected @endif>Pending</option>
                                <option value="processing" @if($order->order_status === 'processing') selected @endif>Processing</option>
                                <option value="shipped" @if($order->order_status === 'shipped') selected @endif>Shipped</option>
                                <option value="delivered" @if($order->order_status === 'delivered') selected @endif>Delivered</option>
                                <option value="cancelled" @if($order->order_status === 'cancelled') selected @endif>Cancelled</option>
                            </select>

                            <button class="btn btn-primary">Update Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</x-dashboard-layout.main>
