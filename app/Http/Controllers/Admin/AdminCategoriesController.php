<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;

use App\Category;

use App\Department;


class AdminCategoriesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }
    
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index')->with('categories', $categories);
    }

    
    public function create()
    {
        $departments = Department::all();
        return view('admin.categories.add')->with('departments', $departments);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);

        if($request->hasFile('cover_image')) {
            $cover_image = $request->cover_image;
            $cover_image_new_name = time().$cover_image->getClientOriginalName();
            $cover_image->move('uploads/banners', $cover_image_new_name);

            $category = Category::create([
                'category_name' => $request->category_name,
                'category_url' => str_slug($request->category_name),
                'cover_image' => 'uploads/banners/'.$cover_image_new_name,
                'department_id' => $request->department_id
            ]);
        }
        else {
            $category = Category::create([
                'category_name' => $request->category_name,
                'category_url' => str_slug($request->category_name),
                'cover_image' => 'uploads/no_image.png',
                'department_id' => $request->department_id
            ]);
        }
        
        Session::flash('success', 'You have successfully added a category');

        return redirect()->route('admin.categories.index'); 
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $departments = Department::all();
        return view('admin.categories.edit')->with('category', $category)->with('departments', $departments);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);

        $category = Category::find($id);

        if($request->hasFile('cover_image')) {
            $cover_image = $request->cover_image;
            $banner_new_name = time().$cover_image->getClientOriginalName();
            $cover_image->move('uploads/banners', $banner_new_name);
            $category->cover_image = 'uploads/banners/'.$banner_new_name;
        }

        $category->category_name = $request->category_name;
        $category->category_url = str_slug($request->category_name);
        $category->department_id = $request->department_id;
        $category->save();
        Session::flash('success', 'You have successfully edited the category');
        return redirect()->route('admin.categories.index');
    }

    public function delete($id) 
    {
        $category = Category::find($id);
        return view('admin.categories.delete')->with('category', $category);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Session::flash('success', 'You have successfully deleted the Category');
        return redirect()->route('admin.categories.index');
    }
}
