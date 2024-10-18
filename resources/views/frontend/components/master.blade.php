<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>VisionSphere</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/logo.png') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=5.3') }}" />
     <!-- Toaster -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <!-- Toaster   -->
</head>

<body>
    <!-- Modal -->

    @include('frontend.components.header')

    <main class="main">

        @yield('content')

    </main>

    @if(!isset($hideFooter) || !$hideFooter)
        @include('frontend.components.footer')
    @endif

    @if(!isset($hidePreloader) || !$hidePreloader)
        @include('frontend.components.preloader')
    @endif
    
    <!-- Vendor JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('frontend/assets/js/main.js?v=5.3') }}"></script>
    <script src="{{ asset('frontend/assets/js/shop.js?v=5.3') }}"></script>

    <!-- Toaster -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script type="text/javascript">
        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');

                fetch('{{ route("cart.remove") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ product_id: productId }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload(); // Refresh the cart page to show updated items
                    }
                });
            });
        });
        
        $(document).ready(function() {
            $('#product-search').on('keyup', function() {
                let query = $(this).val();

                // Only fetch results if the query is at least 1 character long
                if (query.length > 0) { 
                    $.ajax({
                        url: "{{ route('product.search') }}",
                        type: "GET",
                        data: { search: query },
                        success: function(data) {
                            $('#search-results').html(""); // Clear previous results
                            
                            if (data.length > 0) {
                                $.each(data, function(index, product) {
                                    $('#search-results').append(`
                                        <a href="/product-details/${product.id}/${product.product_slug}" class="list-group-item list-group-item-action search-result-item">
                                            <img src="/${product.product_thambnail}" alt="${product.product_name}" class="search-result-image"/>
                                            <div class="search-result-info">
                                                <span class="search-result-name">${product.product_name}</span>
                                            </div>
                                        </a>
                                    `);
                                });
                            } else {
                                $('#search-results').append(`<div class="list-group-item">No products found</div>`);
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                } else {
                    $('#search-results').html(""); 
                }
            });
        });

        // Close the search overlay when the close button is clicked
        document.querySelector('.close-search-btn').addEventListener('click', function closeSearchOverlay() {
            document.querySelector('.mobile-search-overlay').classList.remove('active');
            document.getElementById('mobile-product-search').value = '';
            document.getElementById('mobile-search-results').innerHTML = '';
        });

        // Open the search overlay when the main search input is clicked
        document.getElementById('main-product-search').addEventListener('click', function () {
            document.querySelector('.mobile-search-overlay').classList.add('active');
            document.getElementById('mobile-product-search').focus();
        });


        // Fetch and display search results dynamically when typing in mobile search
        document.getElementById('mobile-product-search').addEventListener('input', function () {
            let query = this.value;
            let resultsDiv = document.getElementById('mobile-search-results');
            
            if (query.length === 0) {
                resultsDiv.innerHTML = '';
                return;
            }

            fetch(`/product/search?search=${query}`)
                .then(response => response.json())
                .then(data => {
                    let resultsHTML = '';

                    data.forEach(product => {
                        resultsHTML += `
                            <div class="mobile-search-result-item">
                                <a href="/product-details/${product.id}/${product.product_slug}">
                                    <div class="mobile-search-result-image">
                                        <img src="/${product.product_thambnail}" alt="${product.product_name}" class="search-result-image"/>
                                    </div>
                                    <div class="mobile-search-result-info">
                                        <span class="mobile-search-result-name">${product.product_name}</span>
                                    </div>
                                </a>
                            </div>
                        `;
                    });

                    resultsDiv.innerHTML = resultsHTML;
                })
                .catch(error => {
                    console.error('Error fetching search results:', error);
                });
            });

    </script>


    <script>
     @if(Session::has('message'))
     var type = "{{ Session::get('alert-type','info') }}"
     switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;
        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;
        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;
        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
     }
     @endif
    </script>
    
</body>

</html>
