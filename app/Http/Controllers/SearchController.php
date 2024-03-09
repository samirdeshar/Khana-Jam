<?php

namespace App\Http\Controllers;

use App\Models\MapsData;
use Illuminate\Http\Request;

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
        // dd($restaurants);

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
        $sortType = $request->input('sortType');
        // Retrieve search results based on the previous search query
        $query = session()->get('search_query');
        $restaurants = MapsData::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhere('keywords', 'like', '%' . $query . '%')
            ->get();

        // Sort the search results based on the selected sorting type
        if ($sortType === 'nearest') {
          dd($restaurants);
        } elseif ($sortType === 'topRated') {
            // Sort by top-rated (you need to define how to determine the top-rated)
            // Example:
            // $restaurants = $restaurants->sortByDesc('rating');
        }

        // Return the sorted results to the view
        return view('frontend.searchdata', compact('restaurants'));
    }
}
