<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App;
use App\Models\Block;
use App\Models\Feature;
use Mail;


use Redirect;
use Session;
use Validator;
use Carbon\Carbon;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Inquiry;
use App\Models\Partner;



class FrontController extends Controller
{



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        $about = Page::where('slug','about')->first();
        $spiritblock = Block::where('slug','the-spirit-of-najd-combined-with-modernity')->first();
        $block7 = Block::where('slug','7-minutes-block')->first();
        $counters =  Block::where('slug','counters')->first();
        $info =  Block::where('slug','info-block')->first();
        $features = Feature::where('is_active',1)->get();
        
        return view('front.index',compact('about','spiritblock','block7','counters','info','features'));

    }    


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function pageShow($slug)
    {
        $page = Page::whereSlug($slug)->first();
        if ($page) {
            $partners = Partner::where('is_active',1)->get();
            return view('front.pages.show',compact('page','partners'));
        }
        return view('front.pages.error');
    }

    /**
     * Show the contact us form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function contactUs()
    {
        return view('front.pages.contact');
    }


    /**
     * Show the contact us form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function OrderRequest()
    {
        return view('front.order.request');
    }


    public function InquiryStore(Request $request) {

        // Form validation
        $this->validate($request, [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone'=>'required',
            'body' => 'required',
         ]);

        $requests = $request->all();
        $inquiry = Inquiry::create($requests);

        $mail_setting = Setting::where('key','contact_email')->first();


        Mail::send('mail.mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->get('email'));
            $message->to($mail_setting->value ?? env('MAIL_FROM_ADDRESS'), $request->get('name'))->subject($request->get('subject'));
        });
        
        return back()->with('success', __('file.sent_success'));

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function phpinfo()
    {
        return phpinfo();
    }

    




}
