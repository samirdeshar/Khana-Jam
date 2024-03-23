@extends('frontend.layouts.main')
@push('style')
    <style>
        .gap {
            background-color: #1a1515;
        }

        .carousel-container {
            position: relative;
            overflow: hidden;
            width: 100%;
            margin: auto;
        }

        .carousel1 {
            display: flex;
            overflow-x: hidden;
            /* Hide the horizontal scrollbar */
        }


        .carousel-item1 {
            flex: 0 0 auto;
            width: 300px;
            margin-right: 20px;
            background-color: #ffffff;
            overflow: hidden;
            cursor: pointer;
        }


        .carousel-item1 img {
            width: 100%;
            height: auto;
            border-radius: 10px 10px 0 0;
            /* Rounded top corners for the image */
        }

        .carousel-item1 .content {
            padding: 20px;
        }

        .carousel-item1 h3 {
            margin: 0;
            font-size: 18px;
            color: #333333;
        }

        .carousel-item1 p {
            margin: 10px 0;
            font-size: 14px;
            color: #666666;
        }

        .recent-postsss li {
            display: block;
            align-items: center;
            padding-top: 15px;
        }
    </style>
@endpush


@section('main_content')
    {{-- <section class="home"> --}}
    <section class="featured-arae-three gap" style="background-image:url(frontend/img/patron-black.jpg)">
        <div class="container">
            <div class="row three-slider owl-carousel owl-theme">
                @foreach ($slider as $item)
                    <div class="col-xl-12 item">
                        <div class="row align-items-center">
                            <div class="col-xl-6">
                                <div class="fastest-delivery">
                                    <h4>KHANA JAM TOP PLACES FOR MONTH</h4>
                                    <h1>{{ $item->title }}</h1>
                                    <p>{!! $item->description !!}</p>
                                    <div class="d-flex align-items-center justify-content-xl-start justify-content-center">
                                        <a href="{{ $item->external_link }}" class="button">SEE MORE</a>
                                        {{-- <ul class="star ms-5">
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li>4.8</li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="fastest-delivery-img">
                                    {{-- <div class="good-food-steak-upto">
                                        <div>
                                            <h6>Upto</h6>
                                            <h2>20%</h2>
                                            <h6>Discount</h6>
                                        </div>
                                    </div> --}}
                                </div>
                                <img src="{{ asset($item->image) }}"
                                    style="height: 350px; width:500px; border-radius:10px 10px 10px 10px;margin-top:10px;"
                                    alt="img">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="featured-restaurant-list" style="margin-bottom: 50px;">
        <div class="container">
            <div class="row">
                <h3 class="text-center m-5">Recommended Posts</h3>
                <div class="carousel-container">
                    <div class="carousel1">
                        @php $count = 0; @endphp
                        @foreach ($data as $restaurant)
                            @if ($count < 6)
                                @if (auth()->guard('customer')->check())
                                    @php
                                        $customerCity = strtolower(auth()->guard('customer')->user()->city);
                                    @endphp
                                    @if (strtolower($restaurant->city) == $customerCity)
                                        <div class="carousel-item1">
                                            <div class="posts recent-postsss">
                                                <ul>
                                                    <li>
                                                        <img class="align-content-center" alt="img"
                                                            src="{{ asset($restaurant->image) }}"
                                                            style="height: 100px; width:100px;">
                                                        <div>
                                                            <a
                                                                href="{{ route('res_details', ['slug' => $restaurant->slug]) }}">
                                                                <h3>{{ $restaurant->name }}</h3>
                                                            </a>
                                                            <p>{{ substr(strip_tags($restaurant->description), 0, 100) }}
                                                            </p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @php $count++; @endphp
                                    @endif
                                @else
                                    <div class="carousel-item1">
                                        <div class="posts recent-postsss">
                                            <ul>
                                                <li>
                                                    <img class="align-content-center" alt="img"
                                                        src="{{ asset($restaurant->image) }}"
                                                        style="height: 100px; width:100px;">
                                                    <div>
                                                        <a href="{{ route('res_details', ['slug' => $restaurant->slug]) }}">
                                                            <h3>{{ $restaurant->name }}</h3>
                                                        </a>
                                                        <p>{{ substr(strip_tags($restaurant->description), 0, 100) }}</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @php $count++; @endphp
                                @endif
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="featured-restaurant-list">
        <div class="container">
            <div class="row">
                <h3 class="text-center m-5  ">Top Rated Khana Jam Places</h3>
                 @php
                    $sortedRestaurants = $restaurants->sortByDesc('averageRating');
                    $count =0
                @endphp
                @if ($count<6)
                @foreach ($sortedRestaurants as $restaurant)
                    <div class="col-xl-4">
                        <div class="posts recent-posts">
                            <ul>
                                <img class="align-content-center" alt="img" src="{{ asset($restaurant->image) }}"
                                    style="height: 100px; width:100px;">
                                <div>
                                    <a href="{{ route('res_details', ['slug' => $restaurant->slug]) }}">
                                        <h3>{{ $restaurant->name }}</h3>
                                    </a>
                                    <h6>Rating:
                                        @php
                                            $averageRatingFormatted = number_format($restaurant->averageRating, 1);
                                        @endphp
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $averageRatingFormatted)
                                                <i class="fas fa-star text-warning"></i>
                                            @else
                                                <i class="far fa-star text-warning"></i>
                                            @endif
                                        @endfor
                                        {{ $averageRatingFormatted }}
                                    </h6>
                                    <p>{{ substr(strip_tags($restaurant->description), 0, 100) }}</p>

                                </div>
                            </ul>
                        </div>
                    </div>
                @endforeach
                @php
                    $count++;
                @endphp
                @endif
            </div>
        </div>
    </section>
    <section class="featured-restaurant-list">
        <div class="container">
            <div class="row">
                <h3 class="text-center m-5">Near By You</h3>
                <div id="restaurant-list" class="row">
                </div>
            </div>
        </div>
    </section>
    {{-- </section> --}}

@endsection
@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchInput').keyup(function() {
                var query = $(this).val();

                // Send AJAX request to get suggestions
                $.ajax({
                    url: "{{ route('search.suggestions') }}",
                    method: "GET",
                    data: {
                        query: query
                    },
                    dataType: "json",
                    success: function(response) {
                        var suggestionsList = '';
                        $.each(response, function(index, item) {
                            suggestionsList += '<li>' + item.name + '</li>';
                        });
                        $('#suggestions').html(suggestionsList);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Set up auto-scrolling
            var autoScrollInterval = 5000;
            var scrollSpeed = 1;
            var isAutoScrolling = true;
            var itemWidth = $(".carousel-item1").outerWidth(true);

            function autoScroll() {
                if (isAutoScrolling) {
                    $(".carousel1").animate({
                        scrollLeft: "+=" + itemWidth
                    }, "slow", function() {
                        // Reset scroll position to the beginning if reached the end
                        if ($(".carousel1").scrollLeft() >= $(".carousel1")[0].scrollWidth - $(".carousel1")
                            .outerWidth()) {
                            $(".carousel1").scrollLeft(0);
                        }
                    });
                }
            }

            // Start auto-scrolling
            var autoScrollTimer = setInterval(autoScroll, autoScrollInterval);

            // Pause auto-scrolling on mouse hover
            $(".carousel1").hover(
                function() {
                    isAutoScrolling = false;
                },
                function() {
                    isAutoScrolling = true;
                }
            );
        });
    </script>
    <script>
        // Fetch user location and nearby restaurants
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    console.log(pos);
                    // Fetch nearby restaurants using AJAX
                    $.ajax({
                        url: '/get-data',
                        type: 'GET',
                        data: {
                            latitude: pos.lat,
                            longitude: pos.lng
                        },


                        success: function(data) {
                            // Update the UI with nearby restaurant data
                            updateRestaurantList(data);
                        },
                        error: function(error) {
                            console.error(error);
                        }
                    });
                },
                function() {
                    console.error('Error: The Geolocation service failed.');
                }
            );
        } else {
            console.error('Error: Your browser doesn\'t support geolocation.');
        }

        // Function to update restaurant list in the UI
        function updateRestaurantList(restaurants) {
            const restaurantListContainer = $('#restaurant-list');
            restaurantListContainer.empty();

            // Select only the first 6 restaurants
            const limitedRestaurants = restaurants.slice(0, 6);

            limitedRestaurants.forEach(function(restaurant) {
                // Format average rating
                const averageRatingFormatted = restaurant.average_rating !== undefined ? restaurant.average_rating
                    .toFixed(1) : 'N/A';
                const starsHtml = getStarsHtml(averageRatingFormatted);

                // Generate restaurant HTML
                const restaurantHtml = `
                <div class="col-xl-4">
                    <div class="posts recent-posts">
                        <ul>
                            <img class="align-content-center" alt="img" src="${restaurant.image}"
                                style="height: 100px; width:100px;">
                            <div>
                                <a href="{{ route('res_details', ['slug' => $restaurant->slug]) }}">
                                    <h3>${restaurant.name}</h3>
                                </a>
                                <h6>Rating: ${starsHtml} ${averageRatingFormatted}</h6>
                                <p>${restaurant.description.substring(0, 100)}</p>
                            </div>
                        </ul>
                    </div>
                </div>
            `;

                // Append restaurant HTML to container
                restaurantListContainer.append(restaurantHtml);
            });
        }

        // Function to generate star rating HTML
        function getStarsHtml(rating) {
            let starsHtml = '';
            for (let i = 1; i <= 5; i++) {
                if (i <= rating) {
                    starsHtml += '<i class="fas fa-star text-warning"></i>';
                } else {
                    starsHtml += '<i class="far fa-star text-warning"></i>';
                }
            }
            return starsHtml;
        }
    </script>
@endpush
