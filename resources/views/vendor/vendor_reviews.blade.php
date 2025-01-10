@extends('vendor.components.master')

@section('content')
<div class="page-content">
    <div class="card radius-10 mt-4">
        <div class="card-body">
            <h5 class="mb-0">Customer Reviews for Your Products</h5>
            <hr>

            <!-- Table to display reviews -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->user->name }}</td>
                        <td>
                            <img src="{{ asset($review->product->product_thambnail) }}" alt="Product Image" class="img-fluid m-3 shadow" style="width: auto; height: 50px;">
                            <strong>{{ $review->product->product_name }}</strong>
                        </td>
                        <td>{{ number_format($review->rating/20, 1) }}
                        <td>{{ $review->comment }}</td>
                        <td>{{ $review->created_at->format('d M, Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
