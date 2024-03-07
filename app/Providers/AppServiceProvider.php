<?php

namespace App\Providers;


use Illuminate\Pagination\Paginator;
use App\Models\Admin\Faqs\GeneralFaq;
use App\Models\Admin\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Schema;

use App\Models\Admin\Pages\GeneralPage;
use App\Models\Frontend\Contact;
use UniSharp\LaravelFilemanager\LaravelFilemanagerServiceProvider;
use Intervention\Image\ImageServiceProvider;

use App\Models\Menu;
// use App\Models\Service\Service;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);

        View::composer(['frontend*'],function($view){
            $view->with('setting',Setting::first());
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

    // Setting Sharing
        @$setting = Setting::find(1);
        view()->share('setting', @$setting);
    // Mailing for site
        define('SITE_MAIL', @$setting->email);

        View::share('menus', Menu::where(['parent_id'=> null, 'publish_status'=>1])
            ->select('id', 'name', 'slug', 'position', 'parent_id', 'header_footer', 'external_link','category_slug','page_title','title_slug','icon','image')
            ->with('children:id,name,slug,position,parent_id,header_footer,external_link,category_slug,page_title,title_slug')
            ->orderBy('position', 'ASC')
            ->get());

            // not nescessarry but needed on footer of frontend only there
            $faqs =GeneralFaq::where('status', 'active')->get();
            view()->share('faqs', $faqs);
    }
}
