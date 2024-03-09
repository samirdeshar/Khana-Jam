<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\MenuController;
use App\Http\Controllers\MapsDataController;
use App\Http\Controllers\Admin\About\AboutController;
use App\Http\Controllers\CkeditorFileUploadController;
use App\Http\Controllers\Admin\Gallery\PhotoController;
use App\Http\Controllers\Admin\Gallery\VideoController;
use App\Http\Controllers\Admin\Comment\ContactController;
use App\Http\Controllers\Admin\Faqs\GeneralFaqController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Slider\SliderController;
use App\Http\Controllers\NotificationController;

//  -----------------------------------------------Backend Admin Routes Starts Here-------------------------------------
Route::group(['prefix'=>'admin','middleware'=>'auth'],function()
    {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::put('/user/update-profile/{id}', 'UserController@updateProfile')->name('user.update-profile');
        Route::put('/user/update-password/{slug}', 'UserController@updatePassword')->name('user.update-password');

        Route::post('ckeditor', [CkeditorFileUploadController::class,'store'])->name('ckeditor.upload');

        Route::resource('setting', SettingController::class);
        Route::resource('about', AboutController::class);






        Route::resource('mapsdata', MapsDataController::class);
        Route::post('/mapsdata-action',[MapsDataController::class,'toMaps'])->name('to-mapsdata');
        Route::get('/mapsdata/status/{status}',[MapsDataController::class,'getmapsStatus'])->name('get-mapsdata-status');
        Route::get('/mapsdata/update_status/{id}/{status}',[MapsDataController::class,'updateStatus'])->name('mapsdata-update-status');

        //Sliders
        Route::resource('slider', SliderController::class);
        Route::get('/slider/status/{status}',[SliderController::class,'getsliderStatus'])->name('get-slider-status');
        Route::post('/slider-action',[SliderController::class,'toSlider'])->name('to-slider');
        Route::get('/slider/update_status/{id}/{status}',[SliderController::class,'updateStatus'])->name('slider-update-status');
        // General Faq
        Route::resource('generalFaq', GeneralFaqController::class);
        Route::get('generalFaq/update/status/{id}',[GeneralFaqController::class,'updateStatus'])->name('update-generalFaq-status');
        // Bul Action
        Route::post('generalFaq/select/delet',[GeneralFaqController::class,'destroyBulk'])->name('to-perform-generalFaq');
        // Search Status
        Route::get('generalFaq/search/status/{status}',[GeneralFaqController::class,'searchStatus'])->name('get-generalFaq-status');



        // -----------------Menu---------------------
        Route::resource('/menu',MenuController::class);
        Route::post('updateMenu', [MenuController::class, 'updateMenuOrder'])->name('updateMenuOrder');
        Route::get('menu/link/course', [MenuController::class, 'menuLinkCourse'])->name('menuLinkCourse');
        Route::post('saveMenuCategory', [MenuController::class, 'create_menuCategory'])->name('saveMenuCategory');




        Route::resource('photo', PhotoController::class);
        Route::get('/photo/status/{status}',[PhotoController::class,'getphotoStatus'])->name('get-photo-status');
        Route::post('/photo-action',[PhotoController::class,'toPhoto'])->name('to-photo');
        Route::get('/photo/update_status/{id}/{status}',[PhotoController::class,'updateStatus'])->name('photo-update-status');
        //---------------------------------video-------------------------------//
        Route::resource('video', VideoController::class);
        Route::get('/video/status/{status}',[VideoController::class,'getVideoStatus'])->name('get-video-status');
        Route::post('/video-action',[VideoController::class,'toVideo'])->name('to-video');
        Route::get('/video/update_status/{id}/{status}',[VideoController::class,'updateStatus'])->name('video-update-status');


        // Notifications
        
        Route::post('/mark-notification-as-read', [NotificationController::class, 'markAsRead'])->name('mark_as_read');
        
    });

    Route::resource('admin/all-messages', ContactController::class)->middleware('auth');
    Route::get('admin/all_contacts', [ContactController::class, 'contact_view'])->name('contact_view')->middleware('auth');
    Route::delete('admin/contact_delete/{contcatValue}', [ContactController::class, 'contact_destroy'])->name('contact_us_destroy')->middleware('auth');





