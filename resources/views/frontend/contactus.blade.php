@extends('frontend.layouts.main')
@section('main_content')
    @push('style')
        <style>
            @keyframes bounceIn {
                0% {
                    transform: translateY(-500px);
                    opacity: 0;
                }
                60% {
                    transform: translateY(30px);
                }
                80% {
                    transform: translateY(-10px);
                }
                100% {
                    transform: translateY(0);
                    opacity: 1;
                }
            }
            .contact-box {
                border: 2px solid #ccc;
                padding: 20px;
                border-radius: 10px;
                color: whitesmoke;
                margin-top: 50px;
                display: inline-block;
                margin-left: 26%;
                margin-right: auto;
                background-color: rgb(20, 20, 20);
                animation: bounceIn 1s cubic-bezier(0.215, 0.610, 0.355, 1.000);
            }

            .btn-submit {
                position: relative;
                overflow: hidden;
            }
       
        
        </style>
    @endpush
    <div class="container">
        <div class="wrapper">
            <div class="contact-box">
                <h2 class="" style="color: whitesmoke;">Get in Touch</h2>
                {!! Form::open(['url' => route('contact_us'), 'files' => true]) !!}
                @method('post')
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name*</label>
                        {{ Form::text('name', '', ['class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''), 'placeholder' => 'Name', 'required' => true]) }}
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email*</label>
                        {{ Form::email('email', '', ['class' => 'form-control ' . ($errors->has('email') ? 'is-invalid' : ''), 'placeholder' => 'Email', 'required' => true]) }}
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Subject*</label>
                        {{ Form::text('subject', '', ['class' => 'form-control ' . ($errors->has('subject') ? 'is-invalid' : ''), 'placeholder' => 'Subject', 'required' => true]) }}
                        @error('subject')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label>Message*</label>
                        {{ Form::textarea('message', '', ['class' => 'form-control ' . ($errors->has('message') ? 'is-invalid' : ''), 'placeholder' => 'Message', 'required' => true]) }}
                        @error('message')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 m-2">
                    <button type="submit" class="btn btn-secondary"><span>Submit</span></button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
