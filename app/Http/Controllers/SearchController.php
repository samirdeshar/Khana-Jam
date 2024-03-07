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
            ->orWhere('keywords','like','%'.$query.'%')
            ->get();
        // dd($restaurants);

        return view('frontend.searchdata', compact('restaurants'));
    }
    public function suggestions(Request $request)
    {
        $query = $request->input('search');
        $suggestions = MapsData::where('name', 'like', '%'.$query.'%')
                        ->orWhere('keywords','like','%'.$query.'%')->limit(5)->get();
        $data =[
            'error'=>false,
            'data'=>$suggestions,
            'msg'=>'Suggestions Data'
        ];
        
        return response()->json($data);
    }
}
