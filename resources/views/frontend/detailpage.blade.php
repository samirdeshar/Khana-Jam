@extends('frontend.layouts.main')
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-m7jw3qMi9BJ7Rm+O12Duvyt2ziOqU0CO0WP9YYtkP6rd4gO6E9HZaWZlrFNYuFSIgyBzZsFsv50I9C9lYjJgUw=="
        crossorigin="anonymous" />
@endpush

@section('main_content')


    <section class="gap our-blog">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="recent-news-two">
                        {{-- @dd($data->image) --}}
                        <img src="{{ asset($data->image) }}" style="height: 500px; width:700px;" alt="recent-news-img">
                        <div class="recent-news mt-3">
                            <div>
                                <a href="#"><span>{{ $data->updated_at }}</span></a>
                                <h2>{{ $data->name }}</h2>
                                {{-- <div class="d-flex align-items-center"><img alt="img" class="me-3"
                                        src="assets/img/man.jpg">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <p>
                        {!! $data->description !!}
                    </p>
                    {{-- <div class="quote">
                        <h3>{{ strip_tags($data->description) }}</h3>
                    </div> --}}
                    <div class="post-tags">
                        <h6>Tags:</h6>
                        <ul>
                            @forelse (explode(',', $data->keywords) as $keyword)
                                <li><a href="#">{{ trim($keyword) }}</a></li>
                            @empty
                                {{-- Handle the case when there are no keywords --}}
                            @endforelse
                        </ul>
                    </div>
                    <div class="comment">
                        <h3>{{ count($comments) }} Comments</h3>
                        <ul>
                            @foreach ($comments as $comment)
                                <li class="single-comment">
                                    <img alt="img" src="{{ asset($setting->logo) }}" style="height: 40px; width:40px;">
                                    {{-- <a href="#">reply</a> --}}
                                    <div class="ps-md-4">
                                        <div class="d-md-flex align-items-center">
                                            <h4>{{ $comment->name }}</h4>
                                            <span>{{ $comment->updated_at->format('F j, Y') }}</span>
                                        </div>
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @auth('customer')
                        <form method="POST" action="{{ route('save-comment') }}" class="add-review leave-comment comment">
                            @method('post')
                            @csrf
                            <div class="rating">
                                <h3>Add Review</h3>
                            </div>

                            <div class="row">
                                <input type="hidden" name="res_id" value="{{ $data->id }}">
                                <div class="col-lg-6 ps-lg-0">
                                    {!! Form::text('name', '', [
                                        'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''),
                                        'placeholder' => 'Full Name .....',
                                        'required' => true,
                                    ]) !!}
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 pe-lg-0">
                                    {!! Form::email('email', '', [
                                        'class' => 'form-control ' . ($errors->has('email') ? 'is-invalid' : ''),
                                        'placeholder' => 'Email .....',
                                    ]) !!}
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {!! Form::textarea('comment', '', [
                                    'class' => 'form-control ' . ($errors->has('comment') ? 'is-invalid' : ''),
                                    'placeholder' => 'Comments .....',
                                    'required' => true,
                                    'rows' => 5,
                                    'style' => 'resize:none;',
                                ]) !!}
                                @error('comment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <!-- Star Rating -->
                                <span>How do you rate it?</span>
                                <div class="star-rating" data-rating="0" data-res-id="{{ $data->id }}">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <i class="star fas fa-star" data-value="{{ $i }}"></i>
                                    @endfor
                                </div>
                                <input type="hidden" name="rating" id="rating" value="0">

                                <!-- Field to display the current rating -->
                                <div id="currentRating">Rating: Not rated</div>

                                <br><br>

                                <button class="button">
                                    <span>Post Comment</span>
                                </button>
                            </div>
                        </form>
                    @else
                        <p>Please <a href="{{ route('customer.login', ['redirect' => url()->current()]) }}">Login</a> to post a
                            comment and provide a rating.</p>
                    @endauth

                </div>
                <div class="col-xl-4">
                    <div class="posts recent-posts">
                        <h3>You may also like</h3>
                        <ul>
                            @foreach ($recommendations as $recommendation)
                                <li>
                                    <img alt="img" src="{{ asset($recommendation->image) }}"
                                        style="height: 100px; width:100px;">
                                    <div>
                                        <a
                                            href="{{ route('res_details', ['slug' => $recommendation->slug]) }}">{{ $recommendation->updated_at->format('F j, Y') }}<h3>{{ $recommendation->name }}</h3></a>
                                      
                                        {{-- <h6><a href="{{ route('blog.show', ['slug' => $recommendation->slug]) }}">{{ $recommendation->name }}</a></h6> --}}
                                        <h6>Rating:
                                            @php
                                                $averageRatingFormatted = number_format(
                                                    $recommendation->averageRating,
                                                    1,
                                                );
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
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="posts recent-posts">
                        <h3>Recommended Posts</h3>

                        @if (auth()->guard('customer')->check())
                            @php
                                $customerCity = strtolower(auth()->guard('customer')->user()->city);
                            @endphp
                            <ul>
                                @foreach ($posts as $restaurant)
                                    @if (strtolower($restaurant->city) == $customerCity)
                                        <li>
                                            <img class="align-content-center " alt="img"
                                                src="{{ asset($restaurant->image) }}" style="height: 100px; width:100px;">
                                            <div>
                                                <a href="{{ route('res_details', ['slug' => $restaurant->slug]) }}">{{ $recommendation->updated_at->format('F j, Y') }}
                                                    <h3>{{ $restaurant->name }}</h3>
                                                </a>
                                                {{-- <h6>Rating:
                                                    @php
                                                    
                                                        $averageRatingFormatted = number_format(
                                                            $recommendation->averageRating,
                                                            1,
                                                        );
                                                    @endphp
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $averageRatingFormatted)
                                                            <i class="fas fa-star text-warning"></i>
                                                        @else
                                                            <i class="far fa-star text-warning"></i>
                                                        @endif
                                                    @endfor
                                                    {{ $averageRatingFormatted }}
                                                </h6> --}}
                                            </div>

                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <ul>
                                @foreach ($posts as $restaurant)
                                    <li>
                                        <img alt="img" src="{{ asset($restaurant->image) }}"
                                            style="height: 100px; width:100px;">
                                        <div>
                                            <a href="{{ route('res_details', ['slug' => $restaurant->slug]) }}">{{ $restaurant->updated_at->format('F j, Y') }}
                                                <h3>{{ $restaurant->name }}</h3>
                                            </a>
                                            {{-- <h6>Rating:
                                                @php
                                                    $averageRatingFormatted = number_format(
                                                        $restaurant->averageRating,
                                                        1,
                                                    );
                                                @endphp
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $averageRatingFormatted)
                                                        <i class="fas fa-star text-warning"></i>
                                                    @else
                                                        <i class="far fa-star text-warning"></i>
                                                    @endif
                                                @endfor
                                                {{ $averageRatingFormatted }}
                                            </h6> --}}
                                            {{-- <p>{{ substr(strip_tags($restaurant->description), 0, 100) }}</p> --}}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star');
            const currentRating = document.getElementById('currentRating');
            const ratingInput = document.getElementById('rating');
            const resId = document.querySelector('.star-rating').getAttribute('data-res-id');
            let userRating = 0;

            stars.forEach(star => {
                star.addEventListener('mouseover', function() {
                    const rating = this.getAttribute('data-value');
                    highlightStars(rating);
                });

                star.addEventListener('mouseout', function() {
                    highlightStars(userRating);
                });

                star.addEventListener('click', function() {
                    const rating = this.getAttribute('data-value');
                    userRating = rating;
                    updateRating(userRating);
                });
            });

            function highlightStars(rating) {
                stars.forEach(star => {
                    const starValue = star.getAttribute('data-value');
                    star.classList.toggle('highlighted', starValue <= rating);
                });
            }

            function updateRating(rating) {
                highlightStars(rating);
                ratingInput.value = rating;
                currentRating.innerHTML = 'Rating: ' + rating;
            }
        });
    </script>
@endpush