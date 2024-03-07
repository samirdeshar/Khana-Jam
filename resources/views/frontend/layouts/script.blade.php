<script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
   <!-- Toastr JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>

<!-- Owl Carousel JS -->
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>

<!-- Fancybox JS -->
<script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('frontend/js/custom.js') }}"></script>

<!-- Form Script -->
<script src="{{ asset('frontend/js/contact.js') }}"></script>
<script src="{{ asset('frontend/js/sweetalert.min.js') }}"></script>

<!-- Preloader JS -->
<script src="{{ asset('frontend/js/preloader.js') }}"></script>
<script src="{{asset('frontend/js/script.js')}}"></script>


@stack('script')


   <script>
       // Check if there are any messages in the session (e.g., after form submission)
       @if(session('success'))
           toastr.success("{{ session('success') }}");
       @endif
       @if(session('error'))
           toastr.error("{{ session('error') }}");
       @endif

       // If you want to show error messages, you can use the following code:
       @if($errors->any())
           @foreach($errors->all() as $error)
               toastr.error("{{ $error }}");
           @endforeach
       @endif
   </script>
