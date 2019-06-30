<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StaticPagesController extends Controller
{
    
    public function contact()
    {
        return view('contact');
    }

    
    public function about()
    {
        return view('about');
    }


    public function page($page_url)
    {
        
        $page = Page::where('page_url', $page_url)->get()->first();
        return view('page')
        ->with('page', $page);
    }

    
    public function submitform(Request $request)
    {

        Mail::to('info@zalu-nua.com')->send(new ContactMail($request->all()));
        
        return redirect('contact');
    }
    

    
}
