@extends('frontend.layouts.main')
@section('main_content')
    <div class="form-singlepage">
        <div class="container">
            <div class="login-form">
                <h1>Reset Password</h1>
                <h6>It's free and always will be.</h6>
                <form action="{{ route('customerupdatePassword') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" aria-describedby="emailHelp" name="password"
                            placeholder="password" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <input type="email" value="{{ @$email }}" name="email" hidden>

                    <div class="mb-3">
                        <input type="password" class="form-control" id="password_confirmation" aria-describedby="emailHelp"
                            name="password_confirmation" placeholder="password_confirmation" required>
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn">Send</button>
                </form>
                <p><a href="{{ route('customer.login') }}">Login</a>| Are you a new user ?<a
                        href="{{ route('customer.signup') }}">Register</a> </p>
            </div>
        </div>
    </div>
@endsection
