@extends('frontend.layouts.main')
@push('style')
    <style>
        .list-view .resultItem {
            display: flex;
        }

        .list-view .resultItem .card {
            width: 100%;
        }

        .clear-left {
            clear: left;
        }

        /* Style for the view button */
        .view-btn {
            font-size: 20px !important;
            padding: 10px 15px !important;
            border: none !important;
            background-color: transparent !important;
            color: #0a0909 !important;
            transition: background-color 0.3s;
        }

        .view-btn:hover {
            background-color: rgba(27, 182, 13, 0.2) !important;
        }

        @keyframes bounce {
            0% {
                transform: translateY(-20px);
            }

            50% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .animate {
            animation: bounce 1s infinite alternate, fadeIn 1s ease-in-out;
        }

        .sidebar {
            background-color: whitesmoke;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            height: auto;
        }
    </style>
@endpush

@section('main_content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 sidebar">
                <h3>Filter Options</h3>
                <label for="radius">Radius (km):</label>
                <input type="range" id="radius" name="radius" min="1" max="100" value="10">
                <span id="radiusValue">10</span> km
            </div>
            <div class="col-md-8" style="padding-left: 2rem;">
                <div class="d-flex justify-content-end mb-3">
                    <button id="viewBtn" class="view-btn" data-view="grid">
                    </button>
                </div>
                <h2 class="animate">Search Results</h2>

                @if ($restaurants->isEmpty())
                    <p>No results found.</p>
                @else
                    <div id="resultsContainer" class="row" style="border: 2px solid #ffd40d; padding:10px;">
                        @foreach ($restaurants as $restaurant)
                            <div class="col-md-6 mb-3 resultItem">
                                <div class="card">
                                    <a href="{{ route('res_details', ['slug' => $restaurant->slug]) }}">
                                        <img src="{{ $restaurant->image }}" style="max-width: 200px;" class="card-img-top"
                                            alt="{{ $restaurant->name }}">
                                    </a>
                                    <div class="card-body">
                                        <a
                                            href="{{ route('res_details', ['slug' => $restaurant->slug]) }}">{{ $restaurant->name }}</a>
                                        <p class="card-text">{!! $restaurant->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>



@endsection
@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const viewBtn = document.getElementById('viewBtn');
            const resultsContainer = document.getElementById('resultsContainer');

            viewBtn.setAttribute('data-view', 'list');
            viewBtn.innerHTML = '<i class="fas fa-bars"></i>';

            viewBtn.addEventListener('click', function() {
                const currentView = viewBtn.getAttribute('data-view');
                const nextView = currentView === 'grid' ? 'list' : 'grid';

                resultsContainer.classList.toggle('list-view', nextView === 'list');
                viewBtn.setAttribute('data-view', nextView);
                viewBtn.innerHTML = nextView === 'grid' ? '<i class="fas fa-bars"></i>' :
                    '<i class="fas fa-th-large"></i>';

                arrangeGrid();
            });
            arrangeGrid();
        });

        function arrangeGrid() {
            const resultsContainer = document.getElementById('resultsContainer');
            const resultItems = resultsContainer.querySelectorAll('.resultItem');

            if (resultsContainer.classList.contains('list-view')) {
                // In list view, keep the items as they are
                resultItems.forEach(item => {
                    item.classList.remove('col-md-6');
                    item.classList.add('col-md-12');
                });
            } else {
                // In grid view, arrange in 2-column layout
                resultItems.forEach((item, index) => {
                    item.classList.remove('col-md-12');
                    item.classList.add('col-md-6');
                    if (index % 2 === 0) {
                        item.classList.add('clear-left');
                    } else {
                        item.classList.remove('clear-left');
                    }
                });
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const radiusInput = document.getElementById('radius');
    const radiusValue = document.getElementById('radiusValue');
    const resultsContainer = document.getElementById('resultsContainer');
    let restaurants = {!! $restaurants !!}; // Assuming $restaurants is already available in the blade template

    radiusInput.addEventListener('input', function() {
        const radius = parseInt(radiusInput.value);
        radiusValue.textContent = radius;

        filterResults(radius);
    });

    function filterResults(radius) {
        const userLocation = getUserLocation(); // Implement this function to get user's location
        const filteredRestaurants = restaurants.filter(function(restaurant) {
            const distance = calculateDistance(userLocation, restaurant.location); // Implement this function to calculate distance between two locations
            return distance <= radius;
        });

        displayResults(filteredRestaurants);
    }

   

    // You need to implement the functions getUserLocation() and calculateDistance() according to your requirements
});

    </script>
@endpush
