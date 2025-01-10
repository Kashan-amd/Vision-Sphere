@php
	$id = Auth::user()->id;
	$verdorId = App\Models\User::find($id);
	$status = $verdorId->status;
@endphp

<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div>
			<h6 class="logo-text fs-5" style="color:black">{{ auth()->user()->name }}</h6>
		</div>
		<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
		</div>
	</div>
	<!--navigation-->
	<ul class="metismenu" id="menu">
        <li>
			<a href="{{ route('vendor.dashboard') }}">
				<div class="parent-icon"><i class='bx bx-home-circle'></i>
				</div>
				<div class="menu-title">Dashboard</div>
			</a>
		</li>

        @if($status === 'active')

		{{-- Order --}}
		<li class="menu-label">Order & Reviews</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class='bx bx-cart'></i>
				</div>
				<div class="menu-title">Orders</div>
			</a>
			<ul>
				<li> <a href="{{ route('vendor.orders') }}"><i class="bx bx-right-arrow-alt"></i>All Orders</a>
				</li>
				{{-- <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Add Order</a> --}}
				</li>
			</ul>
		</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-message"></i>
				</div>
				<div class="menu-title">Reviews</div>
			</a>
			<ul>
				<li> <a href="{{ route('vendor.reviews') }}"><i class="bx bx-right-arrow-alt"></i>All Reviews</a>
			</ul>
		</li>
		<li class="menu-label">Products</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class="bx bx-category"></i>
				</div>
				<div class="menu-title">Product Manage</div>
			</a>
			<ul>
				<li> <a href="{{ route('vendor.all.product') }}"><i class="bx bx-right-arrow-alt"></i>All Product</a>
                <li> <a href="{{ route('vendor.add.product') }}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
			</ul>
		</li>
		<li>
			<a href="{{ route('home') }}">
				<div class="parent-icon"><i class="bx bx-star"></i>
				</div>
				<div class="menu-title">Home</div>
			</a>
		</li>

        @else
		<li class="menu-label">Your are Inactive</li>
        @endif

	</ul>
	<!--end navigation-->
</div>
<!--end sidebar wrapper -->
