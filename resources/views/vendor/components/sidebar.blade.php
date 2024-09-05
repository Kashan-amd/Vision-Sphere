@php
	$id = Auth::user()->id;
	$verdorId = App\Models\User::find($id);
	$status = $verdorId->status;
@endphp

<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div>
			<h4 class="logo-text" style="color:black">Hi, {{ auth()->user()->name }}</h4>
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
		<li class="menu-label">Order & Product</li>
		<li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class='bx bx-cart'></i>
				</div>
				<div class="menu-title">All Order</div>
			</a>
			<ul>
				<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>All Order</a>
				</li>
				<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Add Order</a>
				</li>
			</ul>
		</li>

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

        @else
		<li class="menu-label">Your are Inactive</li>
        @endif

	</ul>
	<!--end navigation-->
</div>
<!--end sidebar wrapper -->
