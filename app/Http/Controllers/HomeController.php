<?php

namespace App\Http\Controllers;

use App\Models\Admin\Banner\Banner;
use App\Models\Admin\Post\Post;
use App\Models\Admin\Team\Team;
use App\Models\Admin\Trip\Trip;
use App\Models\Comment;
use App\Models\Frontend\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->user()->can("view-dashboard")) {

            $comments = Comment::get();
                return view('layouts.backend_layout.dashboard', compact('comments'));
        }
        else
        {
            return view('layouts.backend_layout.user-dashboard');
        }
    }
}
