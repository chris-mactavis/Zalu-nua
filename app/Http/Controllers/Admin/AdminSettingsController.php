<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;

use App\WebsiteDetail;

class AdminSettingsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }
    
    public function index()
    {
        $settings = WebsiteDetail::all();
        return view('admin.settings.index')->with('settings', $settings);
    }


    public function setup()
    {
        return view('admin.settings.setup');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        
        $logo = $request->logo;
        $logo_new_name = time().$logo->getClientOriginalName();
        $logo->move('uploads/banners', $logo_new_name);

        $settings = WebsiteDetail::create([
            'logo' => 'uploads/banners/'.$logo_new_name,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
        ]);

        Session::flash('success', 'You have successfully created your website settings');
        return redirect()->route('admin.settings');
    }

    
    public function edit($id)
    {   
        $settings = WebsiteDetail::find($id);
        return view('admin.settings.edit')->with('settings', $settings); 
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $settings = WebsiteDetail::find($id);

        if($request->hasFile('logo')) {
            $logo = $request->logo;
            $logo_new_name = time().$logo->getClientOriginalName();
            $logo->move('uploads/banners', $logo_new_name);
            $settings->logo = 'uploads/banners/'.$logo_new_name;
        }

        $settings->name = $request->name;
        $settings->email = $request->email;
        $settings->phone = $request->phone;
        $settings->address = $request->address;
        $settings->facebook = $request->facebook;
        $settings->twitter = $request->twitter;
        $settings->instagram = $request->instagram;
        $settings->linkedin = $request->linkedin;

        $settings->save();
        Session::flash('success', 'You have successfully edited the settings');
        return redirect()->route('admin.settings.index');
    }

    
}
