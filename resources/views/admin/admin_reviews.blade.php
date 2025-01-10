@extends('admin.components.master')
@section('content')

<div class="p-3">
    <h5 class="mb-0">All Reviews</h5>
    <p class="text-muted">View all customer reviews</p>
    <dov class="card" style="z-index:10">
        <div class="card-body">
             <!-- Table for displaying reviews -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Review ID</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Review Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reviews as $review)
                        <tr>
                            <td>{{ $review->id }}</td>
                            <td>{{ $review->user->name ?? 'N/A' }}</td> <!-- Assuming 'customer' relationship -->
                            <td><img src="{{ asset($review->product->product_thambnail) }}" alt="Product Image" class="img-fluid m-3 shadow" style="width: auto; height: 50px;">{{ $review->product->product_name ?? 'N/A' }}</td> <!-- Assuming 'product' relationship -->
                            <td>
                                <strong>{{ number_format($review->rating / 20, 0) }} / 5</strong> <!-- Assuming rating is out of 100 -->
                            </td>
                            <td>{{ $review->comment }}</td>
                            <td>{{ $review->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </dov>

</div>

@endsection
