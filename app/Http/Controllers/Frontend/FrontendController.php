<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Menu;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function getPage($slug){
    $page = Menu::where('slug', $slug)->firstOrFail();
    switch($slug){
        case 'contact-us':
            $contact = Contact::get();
            return view('frontend.contactus', $contact);
        break;
        case 'faq':
            return view('frontend.faq');
        default:
        return view('frontend.notfound');
        break;
    }



   }
}
