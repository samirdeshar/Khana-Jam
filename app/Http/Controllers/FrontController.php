<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\MapsData;
use App\Models\Slider;
use Illuminate\Http\Request;
use Auth;
use Kamaln7\Toastr\Facades\Toastr;

class FrontController extends Controller
{

    public function __construct(Request $request)
    {
    }

    public function home()
    {
        $value['data'] = MapsData::where('status', 'active')->latest()->get();
        $value['slider'] = Slider::where('status', 'active')->latest()->get();

        $restaurants = MapsData::all();
        foreach ($restaurants as $restaurant) {
            $restaurant->averageRating = $this->calculateAverageRating($restaurant);
        }
        $sortedRestaurants = $restaurants->sortByDesc('averageRating');
        //dd($sortedRestaurants);
        
        

        // dd($sortedRestaurants);
        $sortedRestaurants = $restaurants->filter(function ($restaurant) {
            return $restaurant->averageRating > 2;  
        });



        return view('frontend.home', $value, ['restaurants' => $sortedRestaurants]);
    }
    private function calculateAverageRating($restaurant)
    {
        $comments = Comment::where('res_id', $restaurant->id)->get();
        $totalRating = $comments->sum('rating');
        $commentsCount = $comments->count();
        return $commentsCount > 0 ? $totalRating / $commentsCount : 0;
    }

    public function mapsdata()
    {
        return view('frontend.maps');
    }


    public function resturantdetailPage($slug)
    {
        // Get the data for the current page using the provided slug
        $posts = MapsData::where('status', 'active')->limit(10)->get();

        $data = MapsData::where('slug', $slug)->first();
        $comments = Comment::where('res_id', $data->id)->latest()->take(10)->get();
        if (!$data) {
            abort(404);
        }
        // Extract keywords from the current page
        $currentKeywords = explode(',', $data->keywords);
        $allPages = MapsData::where('slug', '!=', $slug)->get();
        $similarityScores = [];

        foreach ($allPages as $page) {
            $otherKeywords = explode(',', $page->keywords);
            $similarityScores[$page->id] = $this->cosineSimilarity($currentKeywords, $otherKeywords);
        }
        // Sort pages based on similarity scores (descending order)
        arsort($similarityScores);
        $threshold = 0.2; // Set your desired threshold
        // Filter similarity scores based on the threshold
        $filteredRecommendations = array_filter($similarityScores, function ($score) use ($threshold) {
            return $score > $threshold;
        });
        // Get recommendations based on the filtered similarity scores
        $recommendations = MapsData::whereIn('id', array_keys($filteredRecommendations))->where('status', 'active')->get();
        foreach ($recommendations as $restaurant) {
            $restaurant->averageRating = $this->calculateAverageRating($restaurant);
        }
        $sortedRestaurants = $recommendations->sortByDesc('averageRating');
        $sortedrecommendations = $recommendations->filter(function ($restaurant) {
            return $restaurant->averageRating > 2;  
        });
        // Pass data to the view
        return view('frontend.detailpage', compact('data', 'recommendations', 'comments','posts'));
    }


    public function comment(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $data['user_id'] = Auth::id();
        Comment::create($data);
        Toastr::success('Commented Successfully !!', 'Success !!!');
        return redirect()->back()->with('success', 'Commented Successfully');
    }


    private function cosineSimilarity($keywords1, $keywords2)
    {
        // Create vectors with unique keywords
        $uniqueKeywords = array_unique(array_merge($keywords1, $keywords2));
        $vector1 = array_fill_keys($uniqueKeywords, 0);
        $vector2 = array_fill_keys($uniqueKeywords, 0);
        foreach ($vector1 as $keyword => &$value) {
            $value = in_array($keyword, $keywords1) ? 1 : 0;
        }
        foreach ($vector2 as $keyword => &$value) {
            $value = in_array($keyword, $keywords2) ? 1 : 0;
        }
        $dotProduct = array_sum(array_map(function ($x, $y) {
            return $x * $y;
        }, $vector1, $vector2));
        $magnitude1 = sqrt(array_sum(array_map(function ($x) {
            return $x * $x;
        }, $vector1)));
        $magnitude2 = sqrt(array_sum(array_map(function ($x) {
            return $x * $x;
        }, $vector2)));
        if ($magnitude1 > 0 && $magnitude2 > 0) {
            return $dotProduct / ($magnitude1 * $magnitude2);
        } else {
            return 0;
        }
    }
}
