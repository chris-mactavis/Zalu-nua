<?php

namespace App\Http\Controllers\Admin;

use Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Department;

class AdminDepartmentsController extends Controller
{
    
    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.index')->with('departments', $departments);
    }

    
    public function create()
    {
        return view('admin.departments.add');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'department_name' => 'required',
        ]);

        $department_banner = $request->department_banner;
        $department_banner_new_name = time().$department_banner->getClientOriginalName();
        $department_banner->move('uploads/banners', $department_banner_new_name);

        $department = Department::create([
            'department_name' => $request->department_name,
            'department_url' => str_slug($request->department_name),
            'department_banner' => 'uploads/banners/'.$department_banner_new_name,
        ]);

        Session::flash('success', 'You have successfully added a department');

        return redirect()->route('admin.departments.index'); 
    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        $department = Department::find($id);
        return view('admin.departments.edit')->with('department', $department);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'department_name' => 'required',
        ]);

        $department = Department::find($id);

        if($request->hasFile('department_banner')) {
            $department_banner = $request->department_banner;
            $banner_new_name = time().$department_banner->getClientOriginalName();
            $department_banner->move('uploads/banners', $banner_new_name);
            $department->department_banner = 'uploads/banners/'.$banner_new_name;
        }

        $department->department_name = $request->department_name;
        $department->department_url = str_slug($request->department_name);
        $department->save();

        Session::flash('success', 'You have successfully edited the department');

        return redirect()->route('admin.departments.index');
    }

    
    public function delete($id)
    {
        $department = Department::find($id);
        return view('admin.departments.delete')->with('department', $department);
    }


    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        Session::flash('success', 'You have successfully deleted the Department');

        return redirect()->route('admin.departments.index');
    }
}
