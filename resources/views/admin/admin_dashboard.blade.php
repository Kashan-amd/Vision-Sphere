@extends('admin.components.master')

@section('content')
<!-- Start Page Wrapper -->
<div class="row g-3">
    <div class="col-md-3">
        <div class="glass-card text-center">
            <i class='bx bx-cart fs-3'></i>
            <h3>{{ $orderCount }}</h3>
            <p>Total Orders</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="glass-card text-center">
            <i class='bx bx-glasses fs-3'></i>
            <h3>{{ $productCount }}</h3>
            <p>Total Products</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="glass-card text-center">
            <i class='bx bx-group fs-3'></i>
            <h3>{{ $vendorCount }}</h3>
            <p>Vendors</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="glass-card text-center">
            <i class='bx bx-message fs-3'></i>
            <h3>{{ $reviewCount }}</h3>
            <p>Reviews</p>
        </div>
    </div>
</div>

<!-- Analytics Section with Multiple Charts -->
<div class="card radius-15 shadow-lg mt-4">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <h5 class="mb-0">Analytics & Reporting</h5>
            <div class="font-15 ms-auto">
                <i class="bx bx-dots-horizontal-rounded"></i>
            </div>
        </div>
        <hr>
        
        <!-- Row 1: Bar Chart for Brands and Pie Chart for Categories -->
        <div class="row g-3">
            <div class="col-md-6">
                <div class="glass-card radius-15 shadow-lg custom-card">
                    <div class="card-body">
                        <h5 class="card-title">Sales Trends</h5>
                        <div class="chart-wrapper" style="height: 300px;width:100%;">
                            <canvas id="salesTrendsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="glass-card radius-15 shadow-lg custom-card">
                    <div class="card-body">
                        <h5 class="card-title">Product Performance</h5>
                        <div class="chart-wrapper" style="height: 300px;">
                            <canvas id="brandsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 2: Line Chart for Sales Trends -->
        <div class="row g-3 mt-4">
            <div class="col-md-6">
                <div class="glass-card radius-15 shadow-lg custom-card">
                    <div class="card-body">
                        <h5 class="card-title">Categories Distribution</h5>
                        <div class="chart-wrapper" style="height: 300px;">
                            <canvas id="categoriesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Reviews Over Time -->
            <div class="col-md-6">
                <div class="glass-card">

                    <div class="p-3">
                        <h5 class="mb-0">All Customers Reviews</h5>
                        <p class="text-muted">View all customer reviews and ratings across all products</p>
                        
                        <!-- Table for displaying reviews -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Product Name</th>
                                    <th>Rating</th>
                                    <th>Review</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reviews as $review)
                                    <tr>
                                        <td>{{ $review->user->name }}</td> <!-- Assuming 'customer' is the relationship in Review model -->
                                        <td>{{ $review->product->product_name }}</td> <!-- Assuming 'product' is the relationship in Review model -->
                                        <td>
                                            <!-- Display the rating for each review -->
                                            <strong>{{ number_format($review->rating / 20, 1) }}</strong>
                                        </td>
                                        <td>
                                            <!-- Display the review text -->
                                            {{ $review->comment }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    
                </div>
            </div>

        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    var salesData = @json($salesData);
	// Mapping over salesData and formatting month and year
	var months = salesData.map(item => {
		var date = new Date(item.year, item.month - 1);
		return date.toLocaleString('default', { month: 'long', year: 'numeric' }); // Format as "Month Year"
	});

    // Product Performance Chart
    new Chart(document.getElementById('brandsChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: @json($productPerformance->pluck('product_name')), // Product names
            datasets: [{
                label: 'Units Sold',
                data: @json($productPerformance->pluck('orders_count')), // Units sold
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: false,
                    text: 'Top Product Performance'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


    // Category Distribution Chart
    new Chart(document.getElementById('categoriesChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: @json($categoryDistribution->pluck('category_name')),
            datasets: [{
                data: @json($categoryDistribution->pluck('product_count')),
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
            }]
        }
    });

    // Sales Trends Chart
    new Chart(document.getElementById('salesTrendsChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: months,

            datasets: [{
                label: 'Sales',
                data: @json($salesData->pluck('total_sales')),
                borderColor: '#4BC0C0',
                fill: false
            }]
        }
    });
</script>
@endsection
