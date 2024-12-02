@extends('admin\components\master')
@section('content')

<!-- Start Page Wrapper -->
<div class="row g-3">
    <div class="col-md-3">
        <div class="glass-card text-center">
            <i class='bx bx-cart fs-3'></i>
            <h3>9526</h3>
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
            <h3>{{ $reviews->count() }}</h3>
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
                <div class="card radius-15 shadow-lg custom-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Brands</h5>
                        <div class="chart-wrapper" style="height: 300px;">
                            <canvas id="brandsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card radius-15 shadow-lg custom-card">
                    <div class="card-body">
                        <h5 class="card-title">Categories Distribution</h5>
                        <div class="chart-wrapper" style="height: 300px;">
                            <canvas id="categoriesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 2: Line Chart for Sales Trends -->
        <div class="row g-3 mt-4">
            <div class="col-md-6">
                <div class="card radius-15 shadow-lg custom-card">
                    <div class="card-body">
                        <h5 class="card-title">Sales Trends</h5>
                        <div class="chart-wrapper" style="height: 300px;width:100%;">
                            <canvas id="salesTrendsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // this shows which brand was added by which user (vendor's and admin)
    new Chart(document.getElementById('brandsChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: ['Vendor A', 'Vendor B', 'Admin'],
            datasets: [{
                label: 'Brands',
                data: [12, 19, 3],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        }
    });

    // to show how much products are in each category
    new Chart(document.getElementById('categoriesChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: ['Cat 1', 'Cat 2', 'Cat 3'],
            datasets: [{
                data: [30, 45, 25],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
            }]
        }
    });

    // for Sales Trends or idk will think about this later
    new Chart(document.getElementById('salesTrendsChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar','Apr'],
            datasets: [{
                label: 'Sales',
                data: [3000, 4000, 3500],
                borderColor: '#4BC0C0',
                fill: false
            }]
        }
    });
</script>
@endsection
