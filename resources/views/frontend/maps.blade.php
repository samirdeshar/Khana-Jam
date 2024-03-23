    <!-- Your Blade template -->

    @extends('frontend.layouts.main')

    @push('style')
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <style>
            #map {
                height: 500px;
                /* Use 100% height of the map container */
                width: 100%;
            }

            #locate-button {
                position: absolute;
                bottom: 10px;
                right: 10px;
                z-index: 1000;
                background-color: #5e4f4f;
                border: 1px solid #ccc;
                cursor: pointer;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                color: #fff;
                padding: 8px 15px;
                text-decoration: none;
                transition: background-color 0.3s ease-in-out;
            }

            #locate-button:hover {
                background-color: #2779bd;
            }

            #search-input {
                position: absolute;
                top: 15px;
                left: 10px;
                z-index: 1000;
                width: 650px;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #fff;
            }

            .loading-spinner {
                display: none;
                position: absolute;
                top: 50%;
                left: 40%;
                transform: translate(-50%, -50%);
                z-index: 1000;
            }

            .golden-star {
                color: #FFD700;
                /* Golden color */
            }

            #directionsButton {
                background-color: #4CAF50;
                /* Green */
                border: none;
                color: white;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
                border-radius: 5px;
            }

            #directionsButton:hover {
                background-color: #50a553;

            }
        </style>
    @endpush

    @section('main_content')
        <br>
        <br>
        <section class="hero text-center" aria-label="home" id="home">
            <div class="container">
                <input id="search-input" type="text" placeholder="Search places">
                <div class="row">

                    <div class="col-md-9">
                        <div id="map"></div>
                    </div>
                    <div class="col-md-3">
                        <div class="content-list">
                            <div class="posts">
                                <h3>Restaurant Places</h3>
                                @php
                                    $data = \App\Models\MapsData::where('status', 'active')
                                        ->inRandomOrder()
                                        ->take(4)
                                        ->get();
                                @endphp

                                {{-- @dd($data) --}}
                                @forelse ($data as $item)
                                    <ul class="trending-dishes-list">
                                        <li class="pt-0">
                                            <div class="dishes-list">
                                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}"
                                                    style="width: 80px; height:80px;">
                                            </div>
                                            <h5><a
                                                    href="{{ route('res_details', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                            </h5>
                                        </li>
                                    </ul>
                                @empty
                                    <p>No items available</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="loading-spinner">
                <i class="fas fa-spinner fa-spin fa-3x"></i>
            </div>
        </section>
    @endsection

    @push('script')
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initMap&libraries=places"
            type="text/javascript"></script>
        <script>
            let map;
            let latValue = {{ @$event->lat ?? 26.7271466 }};
            let lngValue = {{ @$event->lng ?? 85.9406745 }};
            let zoomValue = 13;
            let geocoder;
            let loadingSpinner = $('.loading-spinner');
            let locateButton;

            function initMap() {
                geocoder = new google.maps.Geocoder();
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: latValue,
                        lng: lngValue
                    },
                    zoom: zoomValue,
                    scrollwheel: true,
                });

                // Add the Locate Me button to the map container
                locateButton = document.createElement('div');
                locateButton.innerHTML =
                    '<button id="locate-button" class="btn btn-primary"><i class="fas fa-location-crosshairs"></i> Locate Me</button>';
                locateButton.style.position = 'absolute';
                locateButton.style.bottom = '10px';
                locateButton.style.right = '10px';
                locateButton.style.zIndex = '1000';
                locateButton.style.backgroundColor = '#5e4f4f';
                locateButton.style.border = '1px solid #ccc';
                locateButton.style.cursor = 'pointer';
                locateButton.style.borderRadius = '5px';
                locateButton.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 0.1)';
                locateButton.style.color = '#fff';
                locateButton.style.padding = '8px 15px';
                locateButton.style.textDecoration = 'none';
                locateButton.style.transition = 'background-color 0.3s ease-in-out';

                locateButton.addEventListener('click', function() {
                    loadingSpinner.show();

                    // Try HTML5 geolocation.
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            function(position) {
                                const pos = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude,
                                };

                                // Center the map on the current location
                                map.setCenter(pos);

                                const marker = new google.maps.Marker({
                                    position: pos,
                                    map: map,
                                    title: 'Your Location',
                                    icon: {
                                        url: '../img/icons8.png',
                                        scaledSize: new google.maps.Size(40,
                                            40),
                                        scale: 0.5,
                                        strokeWeight: 0.2,
                                        strokeColor: 'black',
                                        strokeOpacity: 1,
                                        fillColor: '#4183D7',
                                        fillOpacity: 0.7
                                    },
                                });

                                // Fetch data from the backend using AJAX
                                $.ajax({
                                    url: '/get-data',
                                    type: 'GET',
                                    data: {
                                        latitude: pos.lat,
                                        longitude: pos.lng
                                    },
                                    success: function(data) {
                                        // Update the UI with the received data
                                        console.log(data);
                                        displayData(data);
                                        loadingSpinner.hide();
                                    },
                                    error: function(error) {
                                        console.error(error);
                                        loadingSpinner.hide();
                                    }
                                });
                            },
                            function() {
                                handleLocationError(true, locateButton, map.getCenter());
                            }
                        );
                    } else {
                        // Browser doesn't support Geolocation
                        handleLocationError(false, locateButton, map.getCenter());
                    }
                });

                map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(locateButton);

                // Add the search input to the map container
                const searchInput = document.getElementById('search-input');
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(searchInput);

                // Set up the Places Autocomplete
                const autocomplete = new google.maps.places.Autocomplete(searchInput);

                // When the user selects a place from the dropdown, pan to the location and fetch data
                autocomplete.addListener('place_changed', function() {
                    loadingSpinner.show();
                    const place = autocomplete.getPlace();

                    if (!place.geometry) {
                        console.error('Place selection did not return geometry');
                        loadingSpinner.hide();
                        return;
                    }

                    const location = {
                        lat: place.geometry.location.lat(),
                        lng: place.geometry.location.lng(),
                    };

                    map.setCenter(location);
                    map.setZoom(zoomValue);

                    // Fetch data from the backend using AJAX
                    $.ajax({
                        url: '/get-data',
                        type: 'GET',
                        data: {
                            latitude: location.lat,
                            longitude: location.lng
                        },
                        success: function(data) {
                            // Update the UI with the received data
                            console.log(data);
                            displayData(data);
                            loadingSpinner.hide();
                        },
                        error: function(error) {
                            console.error(error);
                            loadingSpinner.hide();
                        }
                    });
                });
            }

            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                // Handle geolocation errors.
                // InfoWindow is optional. You can use it to display an error message.
                console.error(browserHasGeolocation ? 'Error: The Geolocation service failed.' :
                    'Error: Your browser doesn\'t support geolocation.');
            }
            const items = {!! json_encode($data) !!};

            function displayData(data) {
                // Update the UI with the fetched data
                data.forEach(function(item) {
                    // Create a marker for each location
                    const marker = new google.maps.Marker({
                        position: {
                            lat: parseFloat(item.latitude),
                            lng: parseFloat(item.longitude)
                        },
                        map: map,
                        title: item.name,
                        icon: {
                            url: '../img/pin.png',
                            scaledSize: new google.maps.Size(40, 40),
                            scale: 0.5,
                            strokeWeight: 0.2,
                            strokeColor: 'black',
                            strokeOpacity: 1,
                            fillColor: '#4183D7',
                            fillOpacity: 0.7
                        }
                    });

                    // Create a popup for each marker
                    const contentString =
                        `<div class="popup-content" style="height: 300px; width: 300px;">
                <a href="/res-details/${item.slug}" ><img src="${item.image}" alt="${item.name}" style="width: 300px; height: 150px;">
                <h3>${item.name}</h3></a>
                <p>${item.description}</p>
                <p>Rating: ${renderStars(item.average_rating)}</p>
                <button id="directionsButton" onclick="getDirections(${item.latitude}, ${item.longitude})">Get Directions</button>
            </div>`;

                    const infowindow = new google.maps.InfoWindow({
                        content: contentString,
                    });

                    marker.addListener('click', function() {
                        infowindow.open(map, marker);
                    });
                });
            }


            function renderStars(rating) {
                const filledStars = '<i class="fas fa-star golden-star"></i>'.repeat(Math.floor(rating));
                const halfStar = rating % 1 !== 0 ? '<i class="fas fa-star-half-alt golden-star"></i>' : '';
                const emptyStars = '<i class="far fa-star golden-star"></i>'.repeat(Math.floor(5 - rating));
                return filledStars + halfStar + emptyStars;
            }
            // Add this code to retrieve the user's current location
            function getCurrentLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        // Set currentUserLat and currentUserLng to the user's current latitude and longitude
                        currentUserLat = position.coords.latitude;
                        currentUserLng = position.coords.longitude;
                    }, function(error) {
                        console.error('Error getting current location:', error);
                    });
                } else {
                    console.error('Geolocation is not supported by this browser.');
                }
            }
            getCurrentLocation();

            function getDirections(destLat, destLng) {
                const directionsService = new google.maps.DirectionsService();
                // Get the user's current location (assuming you have access to it)
                const userLocation = new google.maps.LatLng(currentUserLat, currentUserLng);

                // Create a request object for the directions
                const request = {
                    origin: userLocation,
                    destination: {
                        lat: destLat,
                        lng: destLng
                    },
                    travelMode: google.maps.TravelMode.DRIVING // You can change this according to your needs
                };

                // Call the route method of the DirectionsService to generate the directions
                directionsService.route(request, function(result, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        // Display the directions on the map
                        const directionsRenderer = new google.maps.DirectionsRenderer();
                        directionsRenderer.setMap(map);
                        directionsRenderer.setDirections(result);
                    } else {
                        console.error('Error fetching directions:', status);
                    }
                });
            }
        </script>
    @endpush
