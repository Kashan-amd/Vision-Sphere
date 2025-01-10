@extends('admin.components.master')
@section('content')

<div class="p-3">
    <h5 class="mb-0">All Orders</h5>
    <p class="text-muted">View all customer orders</p>
    <div class="card" style="z-index:10">
        <div class="card-body">
            <!-- Table for displaying orders -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Products</th>
                        <th>Total Amount (PKR)</th>
                        <th>Status</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td> <!-- Assuming 'customer' relationship -->
                            <td>
                                <ul>
                                    @foreach($order->products as $product)
                                        <li>
                                            <img src="{{ asset($product->product_thambnail) }}" alt="Product Image" class="img-fluid m-3 shadow" style="width: auto; height: 50px;">
                                            {{ $product->product_name }} ({{ $product->pivot->quantity }} x {{ number_format($product->pivot->price, 2) }})
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ number_format($order->total_amount, 2) }}</td>
                            <td>{{ ucfirst($order->status) }}</td> <!-- Assuming 'status' is a column in orders table -->
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
