@extends('frontend.layouts.main')
@push('style')
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .panda-on-top {
            height: 100px;
            width: 100px;
            right: 50%;
            margin: 0;
            position: absolute;
        }

        .panda-eyes {
            width: 100px;
            height: auto;
            position: absolute;
            z-index: 1;
            transition: opacity 0.3s ease;

        }

        .panda-eyes.close {
            opacity: 0;
        }
    </style>
@endpush
@section('main_content')
    <section class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset('img/panda.png') }}" alt="Panda" class="panda-on-top">
                    <div class="box login">
                        <h3>Log In Your Account</h3>
                        <form action="{{ route('customer.login') }}" method="post">
                            @csrf
                            <input type="email" name="email" placeholder="Username or email address">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="password-input">
                                <input type="password" name="password" id="password" placeholder="Password">
                                <img src="{{ asset('img/open.png') }}" alt="Panda" class="panda-eyes open"
                                    id="panda-eyes-open">
                                <img src="{{ asset('img/close.png') }}" alt="Panda" class="panda-eyes close"
                                    id="panda-eyes-close">
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="remember">
                                <div class="first">
                                    <input type="checkbox" name="checkbox" id="checkbox">
                                    <label for="checkbox">Remember me</label>
                                </div>
                                <div class="second">
                                    <a href="{{ route('customer.forgetPassword') }}">Forget a Password?</a>
                                </div>
                            </div>
                            <button type="submit" class="button">Login</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box register">
                        <div class="parallax" style="background-color: black"></div>
                        <h3>Create Your Account</h3>
                        <form action="{{ route('customer.signup') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="text" class="form-control" id="first_name" name="first_name"
                                placeholder="First Name*" value="{{ old('first_name') }}" required>
                            @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <input type="text" class="form-control" id="middle_name" name="middle_name"
                                value="{{ old('middle_name') }}" placeholder="Middle Name*">
                            @error('middle_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <input type="text" class="form-control" id="last_name" name="last_name"
                                value="{{ old('last_name') }}" placeholder="Last Name*" required>
                            @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" placeholder="Email Address*" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <input type="text" class="form-control" id="country" name="country"
                                value="{{ old('country') }}" placeholder="Your Country*" required>
                            @error('country')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <input type="text" class="form-control" id="city" name="city"
                                value="{{ old('city') }}" placeholder="City*" required>
                            @error('city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <input type="text" class="form-control" id="contact_num" name="contact_num"
                                value="{{ old('contact_num') }}" placeholder="Contact Number*" required>
                            @error('contact_num')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="password" class="form-control" id="password" name="password"
                                value="{{ old('password') }}" placeholder="Password" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" value="{{ old('password_confirmation') }}"
                                placeholder="Confirm Password" required>
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                            <button type="submit" class="btn">Register Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        // Script to toggle panda eyes when password field gains or loses focus
        var passwordField = document.getElementById("password");
        var pandaEyesOpen = document.getElementById("panda-eyes-open");
        var pandaEyesClose = document.getElementById("panda-eyes-close");

        // Event listener for when password field gains focus
        passwordField.addEventListener("focus", function() {
            pandaEyesOpen.style.opacity = "0";
            pandaEyesClose.style.opacity = "1";
        });

        // Event listener for when password field loses focus
        passwordField.addEventListener("blur", function() {
            pandaEyesOpen.style.opacity = "1";
            pandaEyesClose.style.opacity = "0";
        });

        // Event listener for when other fields are clicked
        document.addEventListener("click", function(event) {
            var target = event.target;
            if (target !== passwordField) {
                pandaEyesOpen.style.opacity = "1";
                pandaEyesClose.style.opacity = "0";
            }
        });
    </script>
@endpush
