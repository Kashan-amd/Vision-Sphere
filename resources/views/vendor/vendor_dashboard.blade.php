@extends('vendor\components\master')

@section('content')
@php
    $id = Auth::user()->id;
    $vendorId = App\Models\User::find($id);
    $status = $vendorId->status;
@endphp

<div class="page-content">
    @if($status === 'active')
        <h4>Vendor Account is <span class="text-success">Active</span></h4>
    @else
        <h4>Vendor Account is <span class="text-danger">Inactive</span></h4>
        <p class="text-danger"><b>Please wait! Admin will check and approve your account</b></p>
    @endif
    <br>

    <div class="row g-3">
		<div class="col-md-3">
			<div class="glass-card text-center">
				<i class='bx bx-cart fs-3'></i>
				<h5>{{ $orderCount }}</h5> <!-- Display order count -->
				<p>Total Orders</p>
			</div>
		</div>		
        <div class="col-md-3">
            <div class="glass-card text-center">
                <i class='bx bx-group fs-3'></i>
                <h5>{{ $customerCount }}</h5> <!-- Display customer count -->
                <p>Total Customers</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="glass-card text-center">
                <i class='bx bx-glasses fs-3'></i>
                <h5>{{ $productCount }}</h5> <!-- Display product count -->
                <p>Total Products</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="glass-card text-center">
                <i class='bx bx-message fs-3'></i>
                <h5>{{ $reviewCount }}</h5> <!-- Display review count -->
                <p>Reviews</p>
            </div>
        </div>
    </div>

	<div class="card radius-10 mt-4">
		<div class="card-body">
			<div class="d-flex align-items-center">
				<div>
					<h5 class="mb-0">Analytics & Reporting</h5>
				</div>
				<div class="font-22 ms-auto">
					<i class="bx bx-dots-horizontal-rounded"></i>
				</div>
			</div>
			<hr>
	
			<!-- Total Sales Over Time Chart -->
			<div class="row">
				<div class="col-md-6">
					<div class="glass-card">
						<canvas id="salesChart"></canvas>
					</div>
				</div>
	
				<!-- Products Performance Chart -->
				<div class="col-md-6">
					<div class="glass-card">
						<canvas id="productPerformanceChart"></canvas>
					</div>
				</div>
			</div>
	
			<div class="row mt-4">
				<!-- Product Categories Distribution -->
				<div class="col-md-6">
					<div class="glass-card">
						<canvas id="categoryDistributionChart"></canvas>
					</div>
				</div>
	
				<!-- Customer Growth Over Time -->
				<div class="col-md-6">
					<div class="glass-card">

						<div class="p-3">
							<h5 class="mb-0">Customers Reviews</h5>
							<p class="text-muted">Top 5 customers reviews/rating for your products</p>
							
							<!-- Table for displaying reviews -->
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Customer Name</th>
										<th>Rating</th>
										<th>Review</th>
									</tr>
								</thead>
								<tbody>
									@foreach($topCustomers as $customer)
										@foreach($customer->reviews as $review)
											@if(in_array($review->product_id, $vendorProducts->toArray()))
												<tr>
													<td>{{ $customer->name }}</td>
													<td>
														<!-- Display the rating for each individual review -->
														<strong>{{ number_format($review->rating / 20, 0) }}</strong>
													</td>
													<td>
														<!-- Display the review text for each review -->
														{{ $review->comment }}
													</td>
												</tr>
											@endif
										@endforeach
									@endforeach
								</tbody>
							</table>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- JavaScript to render the charts -->
<script>
	// Sales Data
	
	var salesData = @json($salesData);
	// Mapping over salesData and formatting month and year
	var months = salesData.map(item => {
		var date = new Date(item.year, item.month - 1);
		return date.toLocaleString('default', { month: 'long', year: 'numeric' }); // Format as "Month Year"
	});

	var totalSales = salesData.map(item => item.total_sales);
	
	// Product Performance Data
	var productPerformanceLabels = @json($productPerformance->pluck('product_name'));
	var productPerformanceData = @json($productPerformance->pluck('orders_count'));

	// Category Distribution Data
	var categoryDistributionLabels = @json($categoryDistribution->pluck('category'));
	var categoryDistributionData = @json($categoryDistribution->pluck('count'));

	// Sales Chart
	var ctx1 = document.getElementById('salesChart').getContext('2d');
	var salesChart = new Chart(ctx1, {
		type: 'line',
		data: {
			labels: months, 
			datasets: [{
				label: 'Sales (PKR)',
				data: totalSales,
				borderColor: 'rgba(0, 123, 255, 1)',
				backgroundColor: 'rgba(0, 123, 255, 0.2)',
				fill: true
			}]
		},
		options: {
			responsive: true,
			plugins: {
				title: {
					display: true,
					text: 'Total Sales Over Time'
				}
			}
		}
	});
	
	// Product Performance Chart
	var ctx2 = document.getElementById('productPerformanceChart').getContext('2d');
	var productPerformanceChart = new Chart(ctx2, {
	type: 'bar',
	data: {
		labels: productPerformanceLabels,
		datasets: [{
		label: 'Units Sold',
		data: productPerformanceData,
		backgroundColor: 'rgba(255, 99, 132, 0.2)',
		borderColor: 'rgba(255, 99, 132, 1)',
		borderWidth: 1
		}]
	},
	options: {
		responsive: true,
		plugins: {
		title: {
			display: true,
			text: 'Products Performance'
		}
		}
	}
	});

	
	// Category Distribution Chart
	var ctx3 = document.getElementById('categoryDistributionChart').getContext('2d');
	var categoryDistributionChart = new Chart(ctx3, {
		type: 'pie',
		data: {
			labels: categoryDistributionLabels,
			datasets: [{
				label: 'Product Categories',
				data: categoryDistributionData,
				backgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56']
			}]
		},
		options: {
			responsive: true,
			plugins: {
				title: {
					display: true,
					text: 'Product Categories Distribution'
				}
			}
		}
	});
	
</script>

@endsection
