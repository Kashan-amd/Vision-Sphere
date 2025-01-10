@extends('vendor.components.master')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="page-content">
        <h4>Orders</h4>
        <p>View all the products sold and the customers who purchased them.</p>
        
        <div class="card mt-4">
            <div class="card-body">
                <!-- Loop through each order -->
                @foreach($orders as $order)
                    <div class="order-item">
                        <h5>Order ID: {{ $order->id }}</h5>
                        
                        <!-- Loop through each product in the order -->
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th>Customer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($product->product_thambnail) }}" alt="Product Image" class="img-fluid m-3 shadow" style="width: auto; height: 50px;">
                                            {{ $product->product_name }}
                                        </td>
                                        <td>{{ $product->pivot->quantity }}</td>
                                        <td>{{ $product->pivot->price }}</td>
                                        <td>{{ $order->total_amount }}</td>
                                        <td>{{ $order->user->name }} | {{$order->user->email}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        <!-- Status Update Form -->
                        <form action="{{ route('vendor.updateOrderStatus', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="status">Order Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Update Status</button>
                        </form>
                        
                        <hr>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
