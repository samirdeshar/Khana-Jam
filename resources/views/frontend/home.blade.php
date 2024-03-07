@extends('frontend.layouts.main')
@push('style')
@endpush
@section('main_content')
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
                                <img src="{{ asset($item->image) }}" style="height: 350px; width:500px; border-radius:10px 10px 10px 10px;margin-top:10px;" alt="img">
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
                @if (auth()->guard('customer')->check())
                    @php
                        $customerCity = strtolower(auth()->guard('customer')->user()->city);
                    @endphp
                    @foreach ($data as $restaurant)
                        {{-- @dd($resturant) --}}
                        @if (strtolower($restaurant->city) == $customerCity)
                            <div class="col-xl-4">
                                <div class="posts recent-posts">
                                    <ul>
                                        <img class="align-content-center " alt="img"
                                            src="{{ asset($restaurant->image) }}" style="height: 100px; width:100px;">
                                        <div>
                                            <a href="{{ route('res_details', ['slug' => $restaurant->slug]) }}">
                                                <h3>{{ $restaurant->name }}</h3>
                                            </a>
                                            <p>{{ substr(strip_tags($restaurant->description), 0, 100) }}</p></a>

                                        </div>

                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    @foreach ($data as $restaurant)
                        <div class="col-xl-4">
                            <div class="posts recent-posts">
                                <ul>
                                    <img class="align-content-center" alt="img" src="{{ asset($restaurant->image) }}"
                                        style="height: 100px; width:100px;">
                                    <div>
                                        <a href="{{ route('res_details', ['slug' => $restaurant->slug]) }}">
                                            <h3>{{ $restaurant->name }}</h3>
                                        </a>
                                        <p>{{ substr(strip_tags($restaurant->description), 0, 100) }}</p>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section class="featured-restaurant-list">
        <div class="container">
            <div class="row">
                <h3 class="text-center m-5  ">Top Rated Khana Jam Places</h3>
                @foreach ($restaurants as $restaurant)
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
            </div>
        </div>
    </section>

@endsection
@push('script')
    <!-- Include jQuery library -->
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
@endpush
