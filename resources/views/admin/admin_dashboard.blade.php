@extends('admin\components\master')
@section('content')
<!--start page wrapper -->

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
			<div class="col">
				<div class="card radius-10 bg-gradient-deepblue">
				 <div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">9526</h5>
						<div class="ms-auto">
                            <i class='bx bx-cart fs-3 text-white'></i>
						</div>
					</div>
					<div class="d-flex align-items-center text-white">
						<p class="mb-0">Total Orders</p>
					</div>
				</div>
			  </div>
			</div>
			<div class="col">
				<div class="card radius-10 bg-gradient-orange">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{ $productCount }}</h5>
						<div class="ms-auto">
                            <i class='bx bx-glasses fs-3 text-white'></i>
						</div>
					</div>
					<div class="d-flex align-items-center text-white">
						<p class="mb-0">Total Products</p>
					</div>
				</div>
			  </div>
			</div>
			<div class="col">
				<div class="card radius-10 bg-gradient-ohhappiness">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{ $vendorCount }}</h5>
						<div class="ms-auto">
                            <i class='bx bx-group fs-3 text-white'></i>
						</div>
					</div>
					<div class="d-flex align-items-center text-white">
						<p class="mb-0">Vendors</p>
					</div>
				</div>
			</div>
			</div>
			<div class="col">
				<div class="card radius-10 bg-gradient-ibiza">
				 <div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{ $reviews->count() }}</h5>
						<div class="ms-auto">
                            <i class='bx bx-paper-plane fs-3 text-white'></i>
						</div>
					</div>
					<div class="d-flex align-items-center text-white">
						<p class="mb-0">Reviews</p>
					</div>
				</div>
			 </div>
			</div>
</div><!--end row-->

<div class="card radius-10">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div>
				<h5 class="mb-0">Analytics & Reporting</h5>
			</div>
			<div class="font-15 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>

			</div>
		</div>
		<hr>
		some kind of analytics here (graphs, charts, etc)
	</div>
</div>
<!--end page wrapper -->
@endsection
