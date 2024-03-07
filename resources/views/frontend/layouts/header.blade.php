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
                <div class="col-lg-3">
                    <div class="hamburger-icon">
                        {{-- <div>

                            <a href="{{ route('maps') }}" class="button">SEE MORE</a>
                        </div> --}}

                        <div class="register col-md-2">
                            <a href="{{ route('customer.login') }}"><i>
                                    <svg clip-rule="evenodd" fill-rule="evenodd" height="512" stroke-linejoin="round"
                                        stroke-miterlimit="2" viewBox="0 0 32 32" width="512"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="Approved-User">
                                            <path
                                                d="m10.105 22.3c.21-.482.511-.926.89-1.305.797-.797 1.878-1.245 3.005-1.245h4c1.127 0 2.208.448 3.005 1.245.379.379.68.823.89 1.305.166.379.608.553.988.387.379-.165.553-.608.387-.987-.285-.653-.691-1.253-1.204-1.766-1.078-1.078-2.541-1.684-4.066-1.684-1.3 0-2.7 0-4 0-1.525 0-2.988.606-4.066 1.684-.513.513-.919 1.113-1.204 1.766-.166.379.008.822.387.987.38.166.822-.008.988-.387z" />
                                            <path
                                                d="m16 8.25c-3.174 0-5.75 2.576-5.75 5.75s2.576 5.75 5.75 5.75 5.75-2.576 5.75-5.75-2.576-5.75-5.75-5.75zm0 1.5c2.346 0 4.25 1.904 4.25 4.25s-1.904 4.25-4.25 4.25-4.25-1.904-4.25-4.25 1.904-4.25 4.25-4.25z" />
                                            <path
                                                d="m26.609 12.25c.415 1.173.641 2.435.641 3.75 0 6.209-5.041 11.25-11.25 11.25s-11.25-5.041-11.25-11.25 5.041-11.25 11.25-11.25c1.315 0 2.577.226 3.75.641.39.138.819-.067.957-.457s-.067-.819-.457-.957c-1.329-.471-2.76-.727-4.25-.727-7.037 0-12.75 5.713-12.75 12.75s5.713 12.75 12.75 12.75 12.75-5.713 12.75-12.75c0-1.49-.256-2.921-.727-4.25-.138-.39-.567-.595-.957-.457s-.595.567-.457.957z" />
                                            <path
                                                d="m21.47 8.53 2 2c.293.293.767.293 1.06 0l4-4c.293-.292.293-.768 0-1.06-.292-.293-.768-.293-1.06 0l-3.47 3.469s-1.47-1.469-1.47-1.469c-.292-.293-.768-.293-1.06 0-.293.292-.293.768 0 1.06z" />
                                        </g>
                                    </svg>
                                    Login/Register
                                </i>
                            </a>
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
