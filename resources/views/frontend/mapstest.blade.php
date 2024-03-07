<!-- Your Blade template -->

@extends('frontend.layouts.main')

@push('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 500px; /* Use 100% height of the map container */
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

        .loading-spinner {
            display: none;
            position: absolute;
            top: 50%;
            left: 40%;
            transform: translate(-50%, -50%);
            z-index: 1000;
        }
    </style>
@endpush

@section('main_content')
    <br>
    <br>
    <section class="hero text-center" aria-label="home" id="home">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div id="map"></div>
                </div>
                <div class="col-md-3">
                    <div class="content-list">
                        @php
                            $data = \App\Models\MapsData::where('status', 'active')->get();
                        @endphp

                        <div class="posts">
                            <h3>Trending Restaurant Places</h3>
                            @forelse ($data as $item)
                                <ul class="trending-dishes-list">
                                    <li class="pt-0">
                                        <div class="dishes-list">
                                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" style="width: 80px; height:80px;">
                                        </div>
                                        <h5><a href="{{ route('res_details', ['slug' => $item->slug]) }}">{{ $item->name }}</a></h5>
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
<script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var map = L.map('map').setView([51.505, -0.09], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            var dataContainer = $('#data-container');
            var locateButton = $('<button id="locate-button" class="btn btn-primary"><i class="fas fa-location-crosshairs"></i> Locate Me</button>');

            var loadingSpinner = $('.loading-spinner');

            // Custom icon for the locate button
            var locateIcon = new L.Icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            function onLocationFound(e) {
                loadingSpinner.hide();
                var radius = e.accuracy / 2;

                L.marker(e.latlng, { icon: locateIcon }).addTo(map)
                    .bindPopup("You are within " + radius + " meters from this point").openPopup();

                L.circle(e.latlng, radius).addTo(map);

                // Send an AJAX request to fetch data based on latitude and longitude range
                $.ajax({
                    url: '/get-data',
                    type: 'GET',
                    data: { latitude: e.latlng.lat, longitude: e.latlng.lng },
                    success: function (data) {
                        // Update the UI with the received data
                        console.log(data);
                        displayData(data);
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            }

            function onLocationError(e) {
                loadingSpinner.hide();
                alert(e.message);
            }

            function displayData(data) {
                // Update the UI with the fetched data
                dataContainer.empty();

                data.forEach(function (item) {
                    // Create a red marker for each location
                    var redMarker = L.marker([item.latitude, item.longitude], { icon: redIcon }).addTo(map);
                    redMarker.bindPopup('<div class="popup-content" style="height: 300px; width: 300px;"><h3><a href="/res-details/' + item.slug + '">' + item.name + '</a></h3><img src="' + item.image + '" alt="' + item.name + '" style="max-width: 100%; height: auto;"><h5>' + item.description + '</h5>'
                         +'<p>Average Rating: ' + item.average_rating + '</p>' +
                            '<a href="/res-details/' + item.slug + '">Read Reviews</a>' +
                            '</div>');


                    dataContainer.append('<p>' + item.name + '</p>'); // Update this based on your data structure
                });
            }

            map.on('locationfound', onLocationFound);
            map.on('locationerror', onLocationError);

            // Locate button click event
            locateButton.on('click', function () {
                loadingSpinner.show();
                map.locate({ setView: true, maxZoom: 16 });
            });

            // Custom red icon for markers
            var redIcon = new L.Icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            locateButton.appendTo(map.getContainer()); // Append the button to the map container
        });
    </script>
</script>
