<header class="one" style="background-color: #f5f8fd;">
    <div class="bottom-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 p-2">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset($setting->logo) }}" alt="{{ $setting->site_name }}"
                                    style="position: relative; width:210px; transition: transform 0.3s ease;">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 p-3">
                    <nav class="navbar">
                        @foreach ($menus as $item)
                            @if ($item->header_footer == 1 || $item->header_footer == 3)
                                <ul class="navbar-links">
                                    <li class="navbar-dropdown">
                                        @if ($item->external_link)
                                            <a href="{{ url($item->external_link) }}">{{ $item->name }}</a>
                                        @else
                                            <a href="{{ url('general', $item->slug) }}">{{ $item->name }}</a>
                                        @endif

                                    </li>
                                </ul>
                            @endif
                        @endforeach
                    </nav>
                    <div class="web_search_pannel desktop-only-panel">
                        <form action="{{ route('search') }}" method="get" class="search_box voice-data-submit">
                            @csrf
                            <input type="text" name="search" placeholder="what are you looking for..."
                                class="typeahead form-control autosearch" id="search_data_value" required>
                            <ul class="search-result"></ul>

                            <div class="search_holder">
                                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <div id="suggestionsContainer">
                                <ul id="suggestionsList"></ul>
                            </div>
                        </form>
                        {{-- <div class="voice-search">
                            <a href="#" class="btn-voice-search" data-bs-toggle="modal"
                                data-bs-target="#voice-search-modal"><i class="fas fa-microphone"></i></a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="hamburger-icon">
                        {{-- <div>

                            <a href="{{ route('maps') }}" class="button">SEE MORE</a>
                        </div> --}}
                        <div class="register col-md-2">
                            @if (auth()->guard('customer')->check())
                                <form method="POST" action="{{ route('customer.logout') }}">
                                    @csrf
                                    <button type="submit" class="btn" style="padding: 20px;">
                                        <i class="fa-solid fa-right-from-bracket"></i>Logout
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('customer.login') }}">
                                    <i class="fa-regular fa-user" style="padding: 20px;"></i>Login/Register
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="border-top: 6px solid #ffd40d;  "></div>


    <div class="mobile-nav hmburger-menu" id="mobile-nav" style="display:block;">
        <div class="res-log">
            <a href="index.html">
                <img src="assets/img/logo.png" alt="Responsive Logo" class="white-logo">
            </a>
        </div>
        <ul>

            <li class="menu-item-has-children"><a href="{{ url('/') }}">Home</a>
            </li>
            <li class="menu-item-has-children"><a href="{{ route('maps') }}">Explore Resturants</a>
            </li>


            {{-- <li class="menu-item-has-children"><a href="JavaScript:void(0)">shop</a>

            <ul class="sub-menu">
              <li><a href="shop.html">our product</a></li>
              <li><a href="product-details.html">product details</a></li>
              <li><a href="shop-cart.html">shop cart</a></li>
              <li><a href="cart-checkout.html">cart checkout</a></li>
            </ul>

            </li> --}}


            <li><a href="#">About US</a></li>
            <li><a href="#">FAQ</a></li>

        </ul>

        <a href="JavaScript:void(0)" id="res-cross"></a>
    </div>

</header>
<style>
    .btn:hover {
        color: #f3274c;
        /* Change text color on hover */
    }

    .logo img:hover {
        animation: moveLogo 0.5s ease forwards;
    }

    @keyframes moveLogo {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(20px);
            /* Adjust the distance as needed */
        }
    }

    #suggestionsContainer {
        position: absolute;
        top: 100%;
        left: 0;
        width: calc(100% - 2px);
        background-color: rgba(255, 255, 255, 0.8);
        border: 1px solid #ccc;
        border-top: none;
        max-height: 200px;
        overflow-y: auto;
        display: none;
        z-index: 2;
        border-radius: 10px;
    }

    #suggestionsList {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    #suggestionsList li {
        padding: 5px 10px;
        cursor: pointer;
    }

    #suggestionsList li:hover {
        background-color: #f0f0f0;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search_data_value').keyup(function() {
            var query = $(this).val();

            // Make an AJAX request to fetch suggestions
            $.ajax({
                url: '{{ route('search.suggestions') }}',
                method: 'GET',
                data: {
                    search: query
                }, // Update key to 'search'
                success: function(response) {
                    if (!response.error) {
                        var suggestions = response.data;
                        var suggestionsHtml = '';
                        suggestions.forEach(function(suggestion) {
                            suggestionsHtml += '<li>' + suggestion.name +
                                '</li>'; // Assuming 'name' is the field you want to show as suggestion
                        });
                        $('#suggestionsList').html(suggestionsHtml);
                        $('#suggestionsContainer').show(); // Show the suggestions container
                    } else {
                        console.error(response.msg);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $(document).on('click', '#suggestionsList li', function() {
            var suggestion = $(this).text();
            $('#search_data_value').val(suggestion);
            $('#suggestionsContainer').hide();
        });
    });
</script>
