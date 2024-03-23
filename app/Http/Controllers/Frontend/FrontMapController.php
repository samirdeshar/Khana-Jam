<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\MapsData;

class FrontMapController extends Controller
{

    public function getData(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $radius = 20;

        // Perform a query based on latitude and longitude within a certain radius
        $data = MapsData::whereBetween('latitude', [$latitude - $radius, $latitude + $radius])
            ->whereBetween('longitude', [$longitude - $radius, $longitude + $radius])
            ->get();
        foreach ($data as $restaurant) {
            $averageRating = $this->calculateAverageRating($restaurant);
            $restaurant->average_rating = $averageRating;
        }
        return response()->json($data);
    }
    public function mapsdata()
    {
        // $data = MapsData::get()->all()
    }

    private function calculateAverageRating($restaurant)
    {
        $comments = Comment::where('res_id', $restaurant->id)->get();
        $totalRating = $comments->sum('rating');
        $commentsCount = $comments->count();
        return $commentsCount > 0 ? $totalRating / $commentsCount : 0;
    }
}
