<?php

namespace App\Http\Controllers;

use App\Models\MapsData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
    public function searchdata(Request $request)
    {
        $query = $request->input('search');

        // dd($query);
        $restaurants = MapsData::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhere('keywords', 'like', '%' . $query . '%')
            ->get();
        Session::put('search_results', $restaurants);

        return view('frontend.searchdata', compact('restaurants'));
    }
    public function suggestions(Request $request)
    {
        $query = $request->input('search');
        $suggestions = MapsData::where('name', 'like', '%' . $query . '%')
            ->orWhere('keywords', 'like', '%' . $query . '%')->limit(5)->get();
        $data = [
            'error' => false,
            'data' => $suggestions,
            'msg' => 'Suggestions Data'
        ];

        return response()->json($data);
    }
    public function sortResults(Request $request)
    {
        $sortType = $request->input('sortBy');
        // dd($sortType);
        $query = $request->input('query');

        $userLatitude = null;
        $userLongitude = null;
        if ($sortType === 'nearest') {
            $userLatitude = $request->input('userLatitude');
            $userLongitude = $request->input('userLongitude');
        }

        $searchResults = Session::get('search_results');

        if ($sortType === 'nearest') {
            foreach ($searchResults as $restaurant) {
                $restaurantLatitude = $restaurant->latitude; 
                $restaurantLongitude = $restaurant->longitude; 
                $distance = $this->haversineDistance($userLatitude, $userLongitude, $restaurantLatitude, $restaurantLongitude);

                $restaurant->distance = $distance;
            }

            usort($searchResults, function ($a, $b) {
                return $a->distance - $b->distance;
            });
        } elseif ($sortType === 'topRated') {
            // Sort restaurants by top-rated
            $searchResults = $searchResults->sortByDesc('rating');
        }

        return view('frontend.partial_searchresults', compact('searchResults'));
    }
    private function haversineDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; // Earth's radius in kilometers

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c; // Distance in kilometers

        return $distance;
    }
}
