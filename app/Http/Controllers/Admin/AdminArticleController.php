<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;

use App\Article;

class AdminPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }
    
    
    public function index()
    {
        $articles = Page::all();
        return view('admin.articles.index')->with('articles', $articles);
    }

    
    public function create()
    {
        return view('admin.articles.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $banner = $request->banner;
        $banner_new_name = time().$banner->getClientOriginalName();
        $banner->move('uploads/banners', $banner_new_name);

        $article = Page::create([
            'title' => $request->tile,
            'slug' => str_slug($request->title),
            'banner' => 'uploads/banners/'.$banner_new_name,
            'content' => $request->content,
        ]);

        //$products->save();

        Session::flash('success', 'You have successfully added an article');

        return redirect()->route('admin.articles.index'); 
    }

    
    public function show($id)
    {
        $article = Page::where(id, $id);
        return view('admin.articles.detail')->with('page', $article);
    }

    
    public function edit($id)
    {
        $article = Page::where(id, $id);
        return view('admin.articles.edit')->with('page', $article);   
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $article = Page::find($id);

        if($request->hasFile('cover_image')) {
            $banner = $request->banner;
            $banner_new_name = time().$banner->getClientOriginalName();
            $banner->move('uploads/banners', $banner_new_name);
            $category->banner = 'uploads/banners/'.$banner_new_name;
        }

        $article->title = $request->title;
        $article->slug = str_slug($request->title);
        $article->content = $request->content;
        $article->save();
        Session::flash('success', 'You have successfully edited the page');
        return redirect()->route('admin.articles.index');
    }

    
    public function delete($id)
    {
        $article = Page::where(id, $id);
        return view('admin.articles.edit')->with('page', $article);
    }


    public function destroy($id)
    {
        $article = Page::find($id);
        $article->delete();
        Session::flash('success', 'You have successfully deleted the article');
        return redirect()->route('admin.articles.index');
    }
}
