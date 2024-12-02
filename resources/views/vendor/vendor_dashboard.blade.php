@extends('vendor\components\master')
@section('content')
@php
    $id = Auth::user()->id;
    $verdorId = App\Models\User::find($id);
    $status = $verdorId->status;
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
                <h5>2400</h5>
                <p>Total Orders</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="glass-card text-center">
                <i class='bx bx-group fs-3'></i>
                <h5>{{ $customerCount }}</h5>
                <p>Total Customers</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="glass-card text-center">
                <i class='bx bx-glasses fs-3'></i>
                <h5>{{ $productCount }}</h5>
                <p>Products</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="glass-card text-center">
                <i class='bx bx-message fs-3'></i>
                <h5>{{ $reviewCount }}</h5>
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
						<canvas id="customerGrowthChart"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- JavaScript to render the charts -->
<script>
var ctx1 = document.getElementById('salesChart').getContext('2d');
var salesChart = new Chart(ctx1, {
	type: 'line',
	data: {
		labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'], 
		datasets: [{
			label: 'Sales ($)',
			data: [1500, 2000, 1800, 2200, 2100, 2300, 2500],
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

var ctx2 = document.getElementById('productPerformanceChart').getContext('2d');
var productPerformanceChart = new Chart(ctx2, {
	type: 'bar',
	data: {
		labels: ['Glasses', 'Sunglasses', 'Eyewear', 'Lenses'],
		datasets: [{
			label: 'Units Sold',
			data: [500, 600, 400, 700],
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

var ctx3 = document.getElementById('categoryDistributionChart').getContext('2d');
var categoryDistributionChart = new Chart(ctx3, {
	type: 'pie',
	data: {
		labels: ['Eyewear', 'Sunglasses', 'Reading Glasses', 'Fashion Glasses'],
		datasets: [{
			label: 'Product Categories',
			data: [300, 200, 500, 400],
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

var ctx4 = document.getElementById('customerGrowthChart').getContext('2d');
var customerGrowthChart = new Chart(ctx4, {
	type: 'line',
	data: {
		labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
		datasets: [{
			label: 'New Customers',
			data: [100, 150, 120, 180, 200, 220, 250],
			borderColor: 'rgba(75, 192, 192, 1)',
			backgroundColor: 'rgba(75, 192, 192, 0.2)',
			fill: true
		}]
	},
	options: {
		responsive: true,
		plugins: {
			title: {
				display: true,
				text: 'Customer Growth Over Time'
			}
		}
	}
});
</script>

@endsection
