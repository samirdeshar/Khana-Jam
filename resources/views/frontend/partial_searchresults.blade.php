@if ($restaurants->isEmpty())
<p>No results found.</p>
@else
<div id="resultsContainer" class="row" style="border: 2px solid #ffd40d; padding:10px;">
    @foreach ($restaurants as $restaurant)
        <div class="col-md-6 mb-3 resultItem">
            <div class="card">
                <a href="{{ route('res_details', ['slug' => $restaurant->slug]) }}">
                    <img src="{{ $restaurant->image }}" style="max-width: 200px;"
                        class="card-img-top" alt="{{ $restaurant->name }}">
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