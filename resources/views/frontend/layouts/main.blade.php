<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset(@$setting->icon) }}">
    <title>{{ $setting->site_name }} | {{ @$meta['meta_title'] ?? $setting->meta_title }}</title>
    <link rel="shortcut icon" href="{{$setting->logo ?? ''}}" type="image/x-icon">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    @include('frontend.meta')

    @include('frontend.layouts.style')

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initMap&libraries=places"
        type="text/javascript"></script>

</head>


<body id="top">
    @include('frontend.layouts.header')

    {{-- <div  class="preloader" data-preaload>
        <div class="circle"></div>
        <p class="text">Order Munch</p>
    </div> --}}


    {{-- <div class="preloader">
        <div class="container">
          <div class="dot dot-1">ORDER </div>
          <div class="dot dot-2">ORDER </div>
          <div class="dot dot-3">ORDER </div>
        </div>
    </div> --}}

    @yield('main_content')




    <div id="progress">
        <span id="progress-value"><i class="fa-solid fa-arrow-up"></i></span>
  </div>
      @include('frontend.layouts.footer')


</body>
@include('frontend.layouts.script')

