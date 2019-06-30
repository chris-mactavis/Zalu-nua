<?php

namespace App\Http\Controllers\Admin;

use Session;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\HomePageSlider;

class AdminSlidersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }
    
    
    public function index()
    {
        $sliders = HomePageSlider::all();
        return view('admin.sliders.index')->with('sliders', $sliders);
    }

   
    public function showsliders() {
        
    }

    public function addslider() {
        return view('admin.sliders.add');
    }


    public function store(Request $request) {
        $this->validate($request, [
            'image' => 'required|image',
        ]);

        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/banners', $image_new_name);

        $slider = HomePageSlider::create([  
            'image' => 'uploads/banners/'.$image_new_name,
            'url' => $request->url,
        ]);

        Session::flash('success', 'You have successfully added a slider');
        return redirect()->route('admin.sliders.index'); 
    }


    public function editslider($id) {
        $slider = HomePageSlider::find($id);
        return view('admin.sliders.edit')->with('slider', $slider);
    }


    public function updateslider($id) {
        $this->validate($request, [
            'url' => 'required',
        ]);

        $slider = HomePageSlider::find($id);

        if($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/banners', $image_new_name);
            $slider->image = 'uploads/banners/'.$image_new_name;
        }

        $slider->url = $request->url;
        $slider->save();
        Session::flash('success', 'You have successfully edited the slider');
        return redirect()->route('admin.sliders.index');
    }

    public function deleteslider($id) {
        $slider = HomePageSlider::find($id);
        return view('admin.sliders.delete')->with('slider', $slider);
    }


    public function destroy($id) {
        $slider = HomePageSlider::find($id);
        $slider->delete();
        Session::flash('success', 'You have successfully deleted the Slider');
        return redirect()->route('admin.sliders.index');
    }
}
