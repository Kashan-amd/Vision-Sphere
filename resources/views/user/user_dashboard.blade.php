@extends('frontend.components.master')
@section('content')
    <style>
        .modal-content {
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>

    <div class="page-header breadcrumb-wrap">
        <div class="text-center">
            <div class="p-4">
                <h3 class="mb-0">Hello {{ Auth::user()->name }}!</h3>
            </div>
            <div class="card-body">
                <p>
                    From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>,<br />
                    manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a>
                </p>
            </div>
        </div>
    </div>
    <div class="page-content pt-50 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashboard-menu">
                                <ul class="nav flex-row d-flex justify-content-between" role="tablist">
                                    <li class="nav-item shadow">
                                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#dashboardModal" data-content="#dashboard">
                                            <img src="{{ asset('icons/loyalty-alt.png') }}" alt="">
                                            <div class="text-center">Loyalty Points</div>
                                        </a>
                                    </li>
                                    <li class="nav-item shadow">
                                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#dashboardModal" data-content="#orders">
                                            <img src="{{ asset('icons/bag-alt.png') }}" alt="">
                                            <div class="text-center">Order History</div>
                                        </a>
                                    </li>
                                    <li class="nav-item shadow">
                                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#dashboardModal" data-content="#track-orders">
                                            <img src="{{ asset('icons/track-alt.png') }}" alt="">
                                            <div class="text-center">Track Order</div>
                                        </a>
                                    </li>
                                    <li class="nav-item shadow">
                                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#dashboardModal" data-content="#account-detail">
                                            <img src="{{ asset('icons/user-alt.png') }}" alt="">
                                            <div class="text-center">Account Details</div>
                                        </a>
                                    </li>
                                    <li class="nav-item shadow">
                                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#dashboardModal" data-content="#change-password">
                                            <img src="{{ asset('icons/key-alt.png') }}" alt="">
                                            <div class="text-center">Change Password</div>
                                        </a>
                                    </li>
                                    <li class="nav-item shadow mb-10">
                                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                            <img src="{{ asset('icons/off-alt.png') }}" alt="">
                                            <div class="text-center">Logout</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Modal -->
    <div class="modal fade" id="dashboardModal" tabindex="-1" aria-labelledby="dashboardModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="tab-content account dashboard-content">
                        <div class="tab-pane fade" id="dashboard" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="mb-0">Loyalty Points!</h3>
                                </div>
                                <div class="card-body">
                                    @if (Auth::check())
                                        <div class="loyalty-points">
                                            <div class="loyalty-header mb-4">
                                                <p class="text-center" style="font-size: 1.2rem;"><img src="{{ asset('icons/coin.png') }}" alt="" 
                         style="width: 50px; height: 50px; margin-right: 10px; vertical-align: middle;"> You have <strong style="font-size: 2rem; color: #f39c12;">{{ Auth::user()->loyalty_points }}</strong> loyalty points!</p>
                                            </div>
                                
                                            <div class="loyalty-info card p-4 shadow-sm rounded">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="d-flex align-items-center mb-3">
                                                        <i class="fas fa-coins text-success" style="font-size: 1.5rem;"></i>
                                                        <span class="ml-3" style="font-size: 1rem;"><strong>Earn Points:</strong> For every <strong>100 PKR</strong> you spend, you earn <strong>1 loyalty point</strong>.</span>
                                                    </li>
                                                    <li class="d-flex align-items-center mb-3">
                                                        <i class="fas fa-gift text-danger" style="font-size: 1.5rem;"></i>
                                                        <span class="ml-3" style="font-size: 1rem;"><strong>Redeem Points:</strong> You can redeem your points to get discounts. <strong>1 point = 2 PKR discount</strong>.</span>
                                                    </li>
                                                    <li class="d-flex align-items-center mb-3">
                                                        <i class="fas fa-arrow-up text-warning" style="font-size: 1.5rem;"></i>
                                                        <span class="ml-3" style="font-size: 1rem;"><strong>Maximize Savings:</strong> The more you shop, the more points you earn and the bigger discounts you get!</span>
                                                    </li>
                                                </ul>
                                            </div>
                                
                                            <div class="mt-4 text-center">
                                                <small style="color: #7f8c8d;">Example: If you spend <strong>2000 PKR</strong>, you earn <strong>20 points</strong> which you can redeem for a <strong>40 PKR discount</strong> on your next order.</small>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="tab-pane fade" id="orders" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="mb-0">Your Orders</h3>
                                </div>
                                <div class="card-body">
                                    @if($orders->isNotEmpty())
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Points Earned</th>
                                                    {{-- <th>Actions</th> --}}
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td>#{{ $order->id }}</td>
                                                        <td>{{ $order->created_at->format('F d, Y') }}</td>
                                                        <td>{{ ucfirst($order->status) }}</td>
                                                        <td>PKR {{ number_format($order->total_amount, 2) }}</td>
                                                        <td>{{ $order->points_earned }}</td>
                                                        {{-- <td>
                                                            <a href="{{ route('order.view', $order->id) }}" class="btn-small d-block btn-primary">View</a>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <p>No orders found.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="track-orders" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="mb-0">Orders tracking</h3>
                                </div>
                                <div class="card-body contact-from-area">
                                    <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                                <div class="input-style mb-20">
                                                    <label>Order ID</label>
                                                    <input name="order-id" placeholder="Found in your order confirmation email" type="text" />
                                                </div>
                                                <div class="input-style mb-20">
                                                    <label>Billing email</label>
                                                    <input name="billing-email" placeholder="Email you used during checkout" type="email" />
                                                </div>
                                                <button class="submit submit-auto-width" type="submit">Track</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-detail" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Account Details</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Username <span class="required">*</span></label>
                                                <input required="" class="form-control" name="username" type="text" value="{{ $userdata->username }}" disabled/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Name <span class="required">*</span></label>
                                                <input required="" class="form-control" name="name" type="text" value="{{ $userdata->name }}"/>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Email<span class="required">*</span></label>
                                                <input required="" class="form-control" name="email" type="email" value="{{ $userdata->email }}"/>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Phone<span class="required">*</span></label>
                                                <input required="" class="form-control" name="phone" type="text" value="{{ $userdata->phone }}"/>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Address<span class="required">*</span></label>
                                                <input required="" class="form-control" name="address" type="text" value="{{ $userdata->address }}"/>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>User Photo <span class="required">*</span></label>
                                                <input class="form-control" name="photo" type="file"  id="image" />
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>  <span class="required">*</span></label>
                                                <img id="showImage" src="{{ (!empty($userdata->photo)) ? url('upload/user/user/'.$userdata->photo):url('adminbackend/assets/images/no_image.jpg') }}" alt="User" class="rounded-circle p-1 bg-primary" width="110">
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="change-password" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Change Password</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('user.password.update') }}">
                                        @csrf
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{session('status')}}
                                            </div>
                                        @elseif(session('error'))
                                            <div class="alert alert-danger" role="alert">
                                                {{session('error')}}
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Old Password <span class="required">*</span></label>
                                                <input class="form-control @error('old_password') is-invalid @enderror" name="old_password" type="password" id="current_password" required placeholder="Old Password" />
                                                @error('old_password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>New Password <span class="required">*</span></label>
                                                <input class="form-control @error('new_password') is-invalid @enderror" name="new_password" type="password" id="new_password" required placeholder="New Password" />
                                                @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Confirm New Password <span class="required">*</span></label>
                                                <input class="form-control" name="new_password_confirmation" type="password" id="new_password_confirmation" required placeholder="Confirm New Password" />
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Confirmation Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

            // Show the respective tab content in the modal
            $('.nav-link').on('click', function() {
                var contentId = $(this).data('content');
                $('.tab-pane').removeClass('active show');
                $(contentId).addClass('active show');
            });
        });
    </script>
@endsection

@php
    $hideFooter = true;
    $hidePreloader = true;
@endphp
