<x-utils.website-layout>


    <section class="py-5" style="background:#F9FAFB">
        <div class="container">

            <!-- PAGE TITLE -->
            <div class="mb-4">
                <h2 class="fw-bold">My Account</h2>
                <p class="text-muted">Manage your profile and track your bike orders</p>
            </div>

            <div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

            <div class="row g-4">

                <!-- LEFT SIDEBAR -->
                <div class="col-lg-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Account Menu</h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item fw-bold">Dashboard</li>
                                <li class="list-group-item">My Orders</li>
                                <li class="list-group-item">Profile Information</li>
                                <li class="list-group-item">Address Book</li>
                                <li class="list-group-item text-danger">Logout</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- RIGHT CONTENT -->
                <div class="col-lg-9">

                    {{-- <!-- USER INFORMATION -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">User Information</h5>

                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <strong>Name:</strong> {{ auth()->user()->name }}
                                </div>
                                <div class="col-md-6 mb-2">
                                    <strong>Email:</strong> {{ auth()->user()   ->email }}
                                </div>
                                <div class="col-md-6 mb-2">
                                    <strong>Phone:</strong> {{ $order->phone }}
                                </div>
                                <div class="col-md-6 mb-2">
                                    <strong>City:</strong> {{ $order->city}}
                                </div>
                                <div class="col-12">
                                    <strong>Shipping Address:</strong><br>
                                    {{ $order->address }}
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- ORDER TRACKING -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <h5 class="fw-bold mb-4">Order Tracking</h5>

                            <div class="row text-center">
                                <div class="col-md-3">
                                    <div class="p-3 border rounded bg-white">
                                        <h6 class="fw-bold text-success">Order Placed</h6>
                                        <small class="text-muted">12 Jan 2026</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 border rounded bg-white">
                                        <h6 class="fw-bold text-success">Processing</h6>
                                        <small class="text-muted">13 Jan 2026</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 border rounded bg-white">
                                        <h6 class="fw-bold text-warning">Shipped</h6>
                                        <small class="text-muted">14 Jan 2026</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 border rounded bg-light">
                                        <h6 class="fw-bold text-muted">Delivered</h6>
                                        <small class="text-muted">Pending</small>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- ORDER HISTORY -->
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">My Orders</h5>

                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Bike</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>

                                        @if($order)
                                        <tr>
                                            <td>{{ $order->oderid }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <img src="{{ optional($order->product->images->first())->image_url ?? 'https://via.placeholder.com/60' }}"
                                                        width="60" class="rounded">
                                                    <span>{{ $order->product->name}}</span>
                                                </div>
                                            </td>
                                            <td>${{ number_format($order->total_price, 2) }}</td>
                                            <td>
                                                <span class="badge {{ $order->order_status === 'delivered' ? 'bg-success' : ($order->order_status === 'shipped' ? 'bg-warning text-dark' : 'bg-secondary text-light') }}">{{ ucfirst($order->order_status ?? 'pending') }}</span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-outline-dark btn-sm">View</a>
                                            </td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">No orders found.</td>
                                        </tr>
                                        @endif

                                    </tbody> --}}
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



</x-utils.website-layout>
