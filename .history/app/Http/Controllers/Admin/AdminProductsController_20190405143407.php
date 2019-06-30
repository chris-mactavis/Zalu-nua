<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;

use App\Product;

use App\ProductGallery;

use App\Category;

use App\Department;
use App\ProductAttributeOption;


class AdminProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(25);
        return view('admin.products.index')->with('products', $products);
    }


    public function create()
    {
        $categories = Category::all();
        $departments = Department::all();
        $product_attributes_options = ProductAttributeOption::all();

        return view('admin.products.add')
            ->with('categories', $categories)
            ->with('product_options', $product_attributes_options)
            ->with('departments', $departments);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'product_image' => 'required|image',
            'category_id' => 'required',
            'product_price' => 'required'
        ]);

        $product_image = $request->product_image;
        $product_image_new_name = time() . $product_image->getClientOriginalName();
        $product_image->move('uploads/banners', $product_image_new_name);

        $product = Product::create([
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'slug' => str_slug($request->product_name) . '-' . $request->product_code,
            'product_image' => 'uploads/banners/' . $product_image_new_name,
            'product_price' => $request->product_price,
            'sale' => $request->sale,
            'discount_price' => $request->discount_price,
            'category_id' => $request->category_id,
            'department_id' => $request->department_id,
            'featured' => $request->featured,
            'description' => $request->description,
            'quantity_available' => $request->quantity_available,
        ]);


        for ($i = 0; $i <= $request->iterate; $i++) {
            $product_options = [];
            foreach ($request->get('product_attributes_' . ($i + 1)) as $attribute) {
                $product_options[] = ProductAttributeOption::find($attribute)->option;
            }
            $options = join(", ", $product_options);
            
            return $product_image = $request->get('var_image_' . ($i + 1))[0];
            return $product_image = $request->get('var_image_' . ($i + 1))[0];
            $product_image_new_name = time() . $product_image->getClientOriginalName();
            $product_image->move('uploads/banners', $product_image_new_name);
            return $product_image_new_name;
            // $product->product_attributes()->create([
            //     'product_attributes' => $request->get()
            // ]);
        }
        return $request->all();

        Session::flash('success', 'You have successfully added a Product');
        return redirect()->route('admin.products.index');
    }


    public function view($id)
    {
        $product = Product::find($id);
        return view('admin.products.view')->with('product', $product);
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $departments = Department::all();
        return view('admin.products.edit')
            ->with('product', $product)
            ->with('categories', $categories)
            ->with('departments', $departments);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_name' => 'required',
        ]);

        $product = Product::find($id);

        if ($request->hasFile('product_image')) {
            $product_image = $request->product_image;
            $product_image_new_name = time() . $product_image->getClientOriginalName();
            $product_image->move('uploads/banners', $product_image_new_name);
            $product->product_image = 'uploads/banners/' . $product_image_new_name;
        }

        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->slug = str_slug($request->product_name) . '-' . $request->product_code;
        $product->product_price = $request->product_price;
        $product->quantity_available = $request->quantity_available;
        $product->sale = $request->sale;
        $product->discount_price = $request->discount_price;
        $product->category_id = $request->category_id;
        $product->department_id = $request->department_id;
        $product->featured = $request->featured;
        $product->description = $request->description;
        $product->save();

        Session::flash('success', 'You have successfully edited the product');
        return redirect()->route('admin.products.index');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        return view('admin.products.delete')->with('product', $product);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        Session::flash('success', 'You have successfully deleted the Product');
        return redirect()->route('admin.products.index');
    }


    public function view_gallery($id)
    {
        $product = Product::find($id);
        $product_galleries = ProductGallery::where('product_id', $id)->get();

        return view('admin.products.view_gallery')->with('product', $product)
            ->with('product_galleries', $product_galleries);
    }


    public function add_gallery($id, Request $request)
    {
        $product = Product::find($id);
        $product_id = $product->id;

        $product_image = $request->product_image;
        $product_image_new_name = time() . $product_image->getClientOriginalName();
        $product_image->move('uploads/banners', $product_image_new_name);

        $product_gallery = ProductGallery::create([
            'product_id' => $product_id,
            'product_image' => 'uploads/banners/' . $product_image_new_name,
        ]);
        Session::flash('success', 'You have successfully added a Product Image');
        return redirect()->route('admin.products.view_gallery', ['id' => $product_id]);
    }

    public function remove_gallery($product_id, $id)
    {
        $product_gallery = ProductGallery::find($id);
        $product_gallery->delete();
        Session::flash('success', 'You have successfully deleted the Product Image');
        return redirect()->route('admin.products.view_gallery', ['id' => $product_id]);
    }


    public function orders($id)
    {
        $orders = DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('users', 'orders.customer_id', '=', 'users.id')
            ->select('orders.*', 'order_details.product_id', 'users.name')
            ->where('order_details.product_id', '=', $id)
            ->get();
        return view('admin.products.orders')->with('orders', $orders);
    }
}
