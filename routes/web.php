<?php

use App\Http\Controllers\Admin\Comment\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\FrontMapController;
use Illuminate\Support\Facades\Auth;




    Auth::routes();
    Route::get('/home', [HomeController::class, 'index'])->name('admin');
    Route::group(['middleware' => ['auth']], function() {
        Route::resource('user', UserController::class);
        Route::resource('permission', PermissionController::class);
        Route::resource('roles', RoleController::class);
    });
    Route::get('/be-friend',[FrontendController::class,'saveAlert'])->name('saveAlert');
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
//  -----------------------------------------------Backend Admin Routes Starts Here-------------------------------------


Route::get('/', [FrontController::class, 'home'])->name('fronthome');


Route::get('explore_resturants', [FrontController::class, 'mapsdata'])->name('maps');

Route::group(['middleware' => ['web']], function () {
Route::get('get-data', [FrontMapController::class, 'getData'])->name('get-data');
Route::get('maps-detail', [FrontendController::class, 'maps_detail'])->name('map_details');
Route::get('res-details/{slug}', [FrontController::class, 'resturantdetailPage'])->name('res_details');
Route::post('save-comment', [FrontController::class, 'comment'])->name('save-comment')->middleware('customerlogin');


    // Route::get('/review/index/{slug}',[FrontendController::class,'getReview'])->name('get.review');
    // Route::put('/review/index/{slug}',[FrontendController::class,'addReview'])->name('store.review');
    // Route::get('/review/{id}/detail',[FrontendController::class,'reviewDetail'])->name('review.details');

});

Route::get('/search', [SearchController::class, 'searchdata'])->name('search');
Route::get('/sort-results', [SearchController::class,'sortResults'])->name('sort.results');

Route::get('/search/suggestions', [SearchController::class, 'suggestions'])->name('search.suggestions');

Route::get('/general/{slug?}',[FrontendController::class, 'getPage']);

Route::post('contact_us', [ContactController::class, 'contact_us'])->name('contact_us');

include __DIR__.'/admin.php';

