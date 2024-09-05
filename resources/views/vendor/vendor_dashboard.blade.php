@extends('vendor\components\master')
@section('content')
@php
    $id = Auth::user()->id;
    $verdorId = App\Models\User::find($id);
    $status = $verdorId->status;
@endphp

<div class="page-content">
    
@if($status === 'active')
    <h4>Vendor Account is <span class="text-success">Active</span> </h4>
@else
    <h4>Vendor Account is <span class="text-danger">InActive</span> </h4>
    <p class="text-danger"><b>Please wait! Admin will check and approve your account</b></p>
@endif
<br>

<!--start page wrapper -->

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
	<div class="col">
		<div class="card radius-10 bg-gradient-deepblue">
		 <div class="card-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-white">2400</h5>
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
				<h5 class="mb-0 text-white">{{ $customerCount }}</h5>
				<div class="ms-auto">
                    <i class='bx bx-group fs-3 text-white'></i>
				</div>
			</div>
			<div class="d-flex align-items-center text-white">
				<p class="mb-0">Total Customers</p>
			</div>
		</div>
	  </div>
	</div>
	<div class="col">
		<div class="card radius-10 bg-gradient-ohhappiness">
		<div class="card-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-white">{{ $productCount }}</h5>
				<div class="ms-auto">
                    <i class='bx bx-glasses fs-3 text-white'></i>
				</div>
			</div>
			<div class="d-flex align-items-center text-white">
				<p class="mb-0">Products</p>
			</div>
		</div>
	</div>
	</div>
	<div class="col">
		<div class="card radius-10 bg-gradient-ibiza">
		 <div class="card-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-white">600</h5>
				<div class="ms-auto">
                    <i class='bx bx-envelope fs-3 text-white'></i>
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
			<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
			</div>
		</div>
		<hr>
		something here also
	</div>
</div>
<!--end page wrapper -->
@endsection
