<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Session;
use App;
use Config;


class LanguageController extends Controller
{

  //   public function index() {

		// if(!Session::has('locale')) {
		// 	Session::put('locale', Input::get('locale'));
		// }else{
		// 	Session::put('locale', Input::get('locale')); 
		// }
		// return Redirect::back();
  //   }

    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('locale', $lang);
            App::setLocale($lang);
        }
        
        // if (\Session::has('locale') AND array_key_exists(\Session::get('locale'), Config::get('languages'))) {
        //     \App::setLocale(\Session::get('locale'));
        // }
        // else { // This is optional as Laravel will automatically set the fallback language if there is none specified
        //     \App::setLocale(\Config::get('app.fallback_locale'));
        // }


        return Redirect::back();
    }
}
