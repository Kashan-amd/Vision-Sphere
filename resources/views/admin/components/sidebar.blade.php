		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<h4 class="logo-text"> <a style="color:black" href="{{ route('admin.dashboard') }}">Hi, {{ auth()->user()->name }}</a></h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
                <li>
					<a href="{{ route('admin.dashboard') }}">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>

                <li>
					<a href="{{ route('all.brand') }}">
						<div class="parent-icon"><i class="bx bx-star"></i>
						</div>
						<div class="menu-title">Brand Manage</div>
					</a>
				</li>
				<li class="menu-label">Category & Product</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Category</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.category') }}"><i class="bx bx-right-arrow-alt"></i>All Category</a></li>
						<li> <a href="{{ route('add.category') }}"><i class="bx bx-right-arrow-alt"></i>Add Category</a></li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">SubCategory</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>All SubCategory</a></li>
						<li> <a href="{{ route('add.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>Add SubCategory</a></li>
					</ul>
				</li>
				
                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-box"></i>
						</div>
						<div class="menu-title">Product Manage</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.product') }}"><i class="bx bx-right-arrow-alt"></i>All Product</a>
						</li>
						<li> <a href="{{ route('add.product') }}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
						</li>

					</ul>
				</li>

				<li class="menu-label">Vendor</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-user'></i>
						</div>
						<div class="menu-title">Vendor Manage</div>
					</a>
					<ul>
						<li> <a href="{{ route('inactive.vendor') }}"><i class="bx bx-right-arrow-alt"></i>Inactive Vendor</a>
						</li>
						<li> <a href="{{ route('active.vendor') }}"><i class="bx bx-right-arrow-alt"></i>Active Vendor</a>
					</ul>
				</li>

				<li class="menu-label">UI Customization</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-slider"></i>
						</div>
						<div class="menu-title">Slider Manage</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.slider') }}"><i class="bx bx-right-arrow-alt"></i>All Slider</a></li>
						<li> <a href="{{ route('add.slider') }}"><i class="bx bx-right-arrow-alt"></i>Add Slider</a></li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-slider"></i>
						</div>
						<div class="menu-title">Banner Manage</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.banner') }}"><i class="bx bx-right-arrow-alt"></i>All Banner</a></li>
						<li> <a href="{{ route('add.banner') }}"><i class="bx bx-right-arrow-alt"></i>Add Banner</a></li>
					</ul>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
