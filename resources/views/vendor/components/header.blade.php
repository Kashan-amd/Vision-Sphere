<!--start header -->
<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu">
                <i class='bx bx-menu'></i>
            </div>

            <div class="flex-grow-1">
                <div class="position-relative">
                    <div>
                        <img src="{{ asset('adminbackend/assets/images/logo-alt-1.png') }}" height="30rem" class="logo" alt="logo icon">
                    </div>
                </div>
            </div>

            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">

                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="#">	<i class='bx bx-search'></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="alert-count">7</span>
                            <i class='bx bx-bell'></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">

                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    <p class="msg-header-clear ms-auto">Marks all as read</p>
                                </div>
                            </a>

                            <div class="header-notifications-list">

                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-primary text-primary">
                                            <i class="bx bx-group"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">New Customers
                                                <span class="msg-time float-end">14 Sec ago</span>
                                            </h6>
                                            <p class="msg-info">5 new user registered</p>
                                        </div>
                                    </div>
                                </a>

                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-danger text-danger">
                                            <i class="bx bx-cart-alt"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">New Orders
                                                <span class="msg-time float-end">2 min ago</span>
                                            </h6>
                                            <p class="msg-info">You have recived new orders</p>
                                        </div>
                                    </div>
                                </a>

                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-success text-success">
                                            <i class="bx bx-file"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">24 PDF File
                                                <span class="msg-time float-end">19 min ago</span>
                                            </h6>
                                            <p class="msg-info">The pdf files generated</p>
                                        </div>
                                    </div>
                                </a>

                            </div>

                            <a href="javascript:;">
                                <div class="text-center msg-footer">View All Notifications</div>
                            </a>

                        </div>
                    </li>

                    <!-- don't touch this!!! -->
                    <li class="nav-item dropdown dropdown-large">
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="header-message-list">
                            </div>
                            <a href="javascript:;">
                                <div class="text-center msg-footer">View All Messages</div>
                            </a>
                        </div>
                    </li>

                </ul>
            </div>

            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset(optional(Auth::user())->photo ? 'upload/user/vendor/' . optional(Auth::user())->photo : 'adminbackend/assets/images/no_image.jpg') }}" class="user-img" alt="User Avatar">

                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                        <p class="designattion mb-0">{{ Auth::user()->role }}</p>
                    </div>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('vendor.profile') }}">
                            <i class="bx bx-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ route('vendor.change.password') }}">
                            <i class="bx bx-cog"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('vendor.logout') }}">
                            <i class='bx bx-log-out-circle'></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!--end header -->
