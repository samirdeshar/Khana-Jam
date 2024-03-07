<?php

namespace Database\Seeders;

use App\Models\Admin\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::insert([
            'user_id'=>'1',
            'icon'=>'icon.jpeg',
            'logo'=>'logo.jpeg',
            'logo2'=>'logo2.jpeg',
            'site_name'=>'',
            'quatation'=>'FIND US IN KATHMANDU, NEPAL',
            'fb_link'=>'link',
            'twitter_link'=>'link',
            'linkedin_link'=>'link',
            'insta_link'=>'link',
            'youtube_link'=>'link',
            'pinterest_link'=>'link',
            'google_plus'=>'link',
            'address'=>'Nepal',
            'location_url'=>'link',
            'email'=>'',
            'phone'=>'',
            'contact'=>'',
            'contact_second'=>'+977',
            'meta_title'=>'',
            'meta_keywords'=>'',
            'meta_description'=>'',
        ]);
    }
}
