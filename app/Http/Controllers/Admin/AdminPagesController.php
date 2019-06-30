<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;

use App\Page;

class AdminPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }
    
    
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index')->with('pages', $pages);
    }

    
    public function create()
    {
        return view('admin.pages.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'page_title' => 'required',
            'content' => 'required'
        ]);

        if($request->hasFile('banner')) {
            $banner = $request->banner;
            $banner_new_name = time().$banner->getClientOriginalName();
            $banner->move('uploads/banners', $banner_new_name);

            $page = Page::create([
                'page_title' => $request->page_title,
                'page_url' => str_slug($request->page_title),
                'banner' => 'uploads/banners/'.$banner_new_name,
                'content' => $request->content,
            ]);
        }else {

            $page = Page::create([
                'page_title' => $request->page_title,
                'page_url' => str_slug($request->page_title),
                'content' => $request->content,
            ]);
        }

        
        Session::flash('success', 'You have successfully added a page');

        return redirect()->route('admin.pages.index'); 
    }

    
    public function detail($id)
    {
        $page = Page::where('id', $id)->get()->first();
        return view('admin.pages.detail')
        ->with('page', $page);
    }

    
    public function edit($id)
    {
        $page = Page::where('id', $id)->get()->first();
        return view('admin.pages.edit')
        ->with('page', $page);   
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'page_title' => 'required',
            'content' => 'required'
        ]);

        $page = Page::find($id);

        if($request->hasFile('banner')) {
            $banner = $request->banner;
            $banner_new_name = time().$banner->getClientOriginalName();
            $banner->move('uploads/banners', $banner_new_name);
            $page->banner = 'uploads/banners/'.$banner_new_name;
        }

        $page->page_title = $request->page_title;
        $page->page_url = str_slug($request->page_title);
        $page->content = $request->content;
        $page->save();
        Session::flash('success', 'You have successfully edited the page');
        return redirect()->route('admin.pages.index');
    }

    
    public function delete($id)
    {
        $page = Page::where('id', $id)->get()->first();
        return view('admin.pages.delete')->with('page', $page);
    }


    public function destroy($id)
    {
        $page = Page::where('id', $id)->get()->first();
        $page->delete();
        Session::flash('success', 'You have successfully deleted the Page');
        return redirect()->route('admin.pages.index');
    }
}
