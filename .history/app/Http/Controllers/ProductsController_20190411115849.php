<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Illuminate\Http\Request;

use App\Department;

use App\Category;

use App\Product;

use App\Color;
use App\ProductVariant;

class ProductsController extends Controller
{
    
    public function index()
    {
        $departments = Department::all();
        $products = Product::all();
        return view('products.index')->with('departments', $departments)->with('products', $products);
    }


    public function returnStore($products, $department, $categories) {
        return view('products.department')
            ->with('products', $products)
            ->with('department', $department)
            ->with('categories', $categories);
    }

   
    public function stores($department_url)
    {
        
        $department = Department::where('department_url', $department_url)->first();
        if(!empty($department)) {
            $department_id = $department->department_id; 
            $categories = Category::where('department_id', $department_id)->get();
            
            if(isset($_GET['sort'])) {
                if($_GET['sort'] == 'newest') {
                    $products = Product::where('department_id', $department_id)->orderBy('created_at', 'desc')->paginate(15);
                    return $this->returnStore($products, $department, $categories);
                }
                else if($_GET['sort'] == 'high-to-low') {
                    $products = Product::where('department_id', $department_id)->orderBy('product_price', 'desc')->paginate(15);
                    return $this->returnStore($products, $department, $categories);
                }
                else if($_GET['sort'] == 'low-to-high') {
                    $products = Product::where('department_id', $department_id)->orderBy('product_price', 'asc')->paginate(15);
                    return $this->returnStore($products, $department, $categories);
                }
                
            }
            else {
                $products = Product::where('department_id', $department_id)->paginate(15);
                return $this->returnStore($products, $department, $categories);
            } 
        }
        else {
            return view('errors.404');
        }
           
                                
    }


    public function returnCategory($products, $category, $categories, $department) {
        return view('products.category')
            ->with('products', $products)
            ->with('category', $category)
            ->with('categories', $categories)
            ->with('department', $department);
    }


    public function category($department_url, $category_url, $category_id)
    {
        $department = Department::where('department_url',$department_url)->first();
        $department_id = $department->department_id;

        $categories = Category::where('department_id', $department_id)->get();

        $category = Category::where('category_id', $category_id)->first();
        //$category_id = $category->id;

        if(isset($_GET['sort'])) {
            if($_GET['sort'] == 'newest') {
                $products = Product::where('category_id', $category_id)->orderBy('created_at', 'desc')->paginate(15);
                return $this->returnCategory($products, $category, $categories, $department);
            }
            else if($_GET['sort'] == 'high-to-low') {
                $products = Product::where('category_id', $category_id)->orderBy('product_price', 'desc')->paginate(15);
                return $this->returnCategory($products, $category, $categories, $department);
            }
            else if($_GET['sort'] == 'low-to-high') {
                $products = Product::where('category_id', $category_id)->orderBy('product_price', 'asc')->paginate(15);
                return $this->returnCategory($products, $category, $categories, $department);
            }
            
        }
        else {
            $products = Product::where('category_id', $category_id)->paginate(15);
            return $this->returnCategory($products, $category, $categories, $department);
        }   

    }

    
    public function view($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if(!empty($product)) {
            return $product_variants = ($product->variants;
            $product_variants = $product->product_attributes()->with('product_attribute')->get()->groupBy('product_attribute.attribute');
            $product_cat = $product->category_id;
            $related_product_coll = Product::where('category_id', $product_cat)->get();
            if(count($related_product_coll) > 4) {
                $related_products = $related_product_coll->random(4);
            }
            else {
                $related_products = $related_product_coll;
            }

            return view('products.view')
            ->with('product', $product)
            ->with('product_variants', $product_variants)
            ->with('related_products', $related_products);
        }
        else {
            return view('errors.404');
        }
    }

    

    public function sale()
    {
        $departments = Department::all();
        $products = Product::where('sale', 'yes')->get();

        return view('products.sale')
        ->with('departments', $departments)
        ->with('products', $products);
    }


    public function search(Request $request) {
        $search_text = $request->search_text;
        $departments = Department::all();

        //start search query
        $products = DB::table('products')
        ->join('departments', 'products.department_id', '=', 'departments.department_id')
        ->join('categories', 'products.category_id', '=', 'categories.category_id')
        ->where('products.product_name', 'like', '%' . $search_text . '%')
        ->orWhere('departments.department_name', 'like', '%' . $search_text . '%')
        ->orWhere('categories.category_name', 'like', '%' . $search_text . '%')
        ->get();

        return view('products.search')
        ->with('departments', $departments)
        ->with('products', $products)
        ->with('search_text', $search_text);

    }

    
}
