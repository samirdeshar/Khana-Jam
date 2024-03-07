@extends('layouts.backend_layout.template')


@section('title', 'Admin || mapsdata-Form')

@push('styles')
    <style>
        .highlighted-keyword {
            background-color: #5cb85c;
            /* Green color */
            color: #ffffff;
            /* Text color on green background */
            padding: 2px 4px;
            /* Optional padding for better appearance */
            border-radius: 4px;
            /* Optional border-radius for rounded corners */
            margin: 2px;
            /* Optional margin between keywords */
            display: inline-block;
        }

        #map {
            height: 400px;
        }
    </style>
@endpush

@section('main-content')

    <div class="pagetitle">
        <h1>mapsdata-Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active"><a href="">mapsdatas List</a></li>
                <li class="breadcrumb-item active">mapsdata Form</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <div>
                <h5 class="card-title">
                    @isset($data)
                        Update
                    @else
                        Add
                    @endisset
                    mapsdata Form
                </h5>

            </div>

            <div>
                @isset($data)
                    {{-- @dd($data->id) --}}

                    {{ Form::open(['url' => route('mapsdata.update', $data->id), 'files' => true]) }}
                    @method('put')
                @else
                    {{ Form::open(['url' => route('mapsdata.store'), 'files' => true]) }}
                @endisset
                <div class="row">
                    <div class="col-md-4 mb-2">
                        {{ Form::label('name', 'Name:', ['class' => 'form-label']) }}
                        {{ Form::text('name', @$data->name, ['class' => 'form-control ' . ($errors->has('title') ? 'is-invalid' : ''), 'placeholder' => 'Enter Name .....', 'required' => true]) }}
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-2">
                        {{ Form::label('latitude', 'Latitude:', ['class' => 'form-label']) }}
                        {{ Form::text('latitude', @$data->latitude, ['class' => 'form-control ' . ($errors->has('latitude') ? 'is-invalid' : ''), 'placeholder' => 'Enter Latitude .....', 'required' => true, 'id' => 'latitude']) }}
                        @error('latitude')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-2">
                        {{ Form::label('longitude', 'Longitude:', ['class' => 'form-label']) }}
                        {{ Form::text('longitude', @$data->longitude, ['class' => 'form-control ' . ($errors->has('longitude') ? 'is-invalid' : ''), 'placeholder' => 'Enter Longitude .....', 'required' => true, 'id' => 'longitude']) }}
                        @error('longitude')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-2 mb-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mapModal">
                            Choose on Map
                        </button>
                    </div>
                    <div class="col-md-3 mb-2">
                        {{ Form::label('City', 'City:', ['class' => 'form-label']) }}
                        {{ Form::text('city', @$data->city, ['class' => 'form-control ' . ($errors->has('city') ? 'is-invalid' : ''), 'placeholder' => 'Enter city .....', 'required' => true, 'id' => 'city']) }}
                        @error('city')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-2">
                        {{ Form::label('description', 'Description:', ['class' => 'form-label']) }}
                        {{ Form::textarea('description', @$data->description, ['class' => 'form-control  ' . ($errors->has('Description') ? 'is-invalid' : ''), 'placeholder' => 'Enter  Description Here.....', 'required' => true, 'rows' => 5, 'style' => 'resize:none;']) }}
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-2">
                        {{ Form::label('keywords', 'Keywords:', ['class' => 'form-label']) }}
                        {{ Form::textarea('keywords', @$data->keywords, ['class' => 'form-control ' . ($errors->has('keywords') ? 'is-invalid' : ''), 'placeholder' => 'Enter keywords Here.....', 'required' => true, 'rows' => 5, 'style' => 'resize:none;', 'id' => 'keywordsInput']) }}
                        @error('keywords')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div id="highlightedKeywordsContainer" class="mt-2">
                            <!-- Highlighted keywords will be dynamically added here -->
                        </div>
                    </div>

                    <div id="highlightedKeywordsContainer" class="mt-2">
                        <!-- Highlighted keywords will be dynamically added here -->
                    </div>

                </div>
                <div class="col-md-6 mb-2">
                    {{ Form::label('image', 'Image:', ['class' => 'form-label']) }}
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="image"
                                value="{{ old('image', @$data->image) }}">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                        @error('record')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror

                        @isset($data)
                            <div class="col-md-6 mb-2">
                                <img src="{{ asset(@$data->image) }}" alt="video" class="img img-fluid img-thumbnail"
                                    style="width:100px; height:auto;">
                            </div>
                        @endisset
                    </div>
                    <div class="col-6 mb-2">
                        {{ Form::label('status', 'Status:', ['class' => 'form-label']) }}
                        {{ Form::select('status', ['active' => 'Active', 'inactive' => 'In-Active'], @$data->status, ['class' => 'form-control  ' . ($errors->has('status') ? 'is-invalid' : ''), 'placeholder' => '------------Select If Any---------------', 'required' => true]) }}
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mapModalLabel">Choose Location on Map</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="map"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary" id="chooseLocationBtn">Choose Location</button> --}}
                </div>
            </div>
        </div>
    </div>

    </div>
    <div class="text-center mt-2">
        {{ Form::button('<i class="bi bi-x"></i> Reset', ['class' => 'btn btn-sm btn-danger', 'type' => 'reset']) }}
        @isset($data)
            {{ Form::button('<i class="bi bi-send"></i> Update', ['class' => 'btn btn-sm btn-success', 'type' => 'submit']) }}
        @else
            {{ Form::button('<i class="bi bi-send"></i> Add', ['class' => 'btn btn-sm btn-success', 'type' => 'submit']) }}
        @endisset
    </div>
    </div>

@endsection
@section('backend-js')
    <script>
        $(document).ready(function() {
            $('#lfm').filemanager('image');
        });
    </script>


    <script type="text/javascript">
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}',
        };

        CKEDITOR.replace('description', options);
    </script>
    <script>
        function updateHighlightedKeywords() {
            var keywordsInput = document.getElementById('keywordsInput');
            var highlightedKeywordsContainer = document.getElementById('highlightedKeywordsContainer');

            var keywords = keywordsInput.value.split(',').map(function(keyword) {
                return keyword.trim();
            });

            highlightedKeywordsContainer.innerHTML = '';

            keywords.forEach(function(keyword) {
                if (keyword !== '') {
                    var span = document.createElement('span');
                    span.classList.add('highlighted-keyword');
                    span.textContent = keyword;

                    highlightedKeywordsContainer.appendChild(span);
                }
            });
        }

        document.getElementById('keywordsInput').addEventListener('input', updateHighlightedKeywords);

        // Initial update on page load
        updateHighlightedKeywords();
    </script>
    <script>
        var map, marker;

        function initMap() {
            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        var userLocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };

                        map = new google.maps.Map(document.getElementById('map'), {
                            center: userLocation,
                            zoom: 15
                        });

                        marker = new google.maps.Marker({
                            position: userLocation,
                            map: map,
                            draggable: true
                        });

                        google.maps.event.addListener(marker, 'dragend', function(event) {
                            document.getElementById('latitude').value = event.latLng.lat();
                            document.getElementById('longitude').value = event.latLng.lng();
                        });
                    },
                    function() {
                        // Handle geolocation error
                        handleLocationError(true, map.getCenter());
                    }
                );
            } else {
                // Browser doesn't support geolocation
                handleLocationError(false, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, pos) {
            // Handle geolocation error
            var infoWindow = new google.maps.InfoWindow();
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initMap" async defer>
    </script>
@endsection
