<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use App\HomePageSlider;

use App\Product;

use App\Category;

use App\Department;

use App\Article;

class HomePageController extends Controller
{
   
    public function index()
    {
        
        $feat_collection = Product::where('featured','yes')->get();
        if(count($feat_collection) > 4) {
            $feat_products = $feat_collection->random(4);
        }
        else {
            $feat_products = $feat_collection;
        }

        $collection = Article::all();
        if(count($collection) > 4) {
            $articles = $collection->random(4);
        }
        else {
            $articles = $collection;
        }

        $categories_collection = DB::table('categories')
            ->whereRaw('exists (select * from products where categories.category_id = products.category_id)')
            ->distinct()->get();
        if(count($categories_collection) > 4) {
            $categories = $categories_collection->random(4);
        }
        else {
            $categories = $categories_collection;
        }

        $department = Department::find(1);

        $stores_collection = Department::all();

        $index_stores = $stores_collection->random(4);

        return view('home')          
            ->with('sliders', HomePageSlider::all())
            ->with('categories', $categories)
            ->with('department', $department)
            ->with('index_stores', $index_stores)
            ->with('feat_products', $feat_products);
    
    }

    public function falsehome() {
        return view('falsehome');
    }

    public function articles() {
        $articles = Article::all();
        return view('articles.index')->with('articles', $articles);
    }

    public function view_article($slug) {
        $article = Article::where('slug', $slug)->first();

        return view('articles.view')->with('article', $article);
    }
    
    
}
