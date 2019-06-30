<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;
use App\Admin;

class AdminUsersController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public function index()
    {
        $admins = Admin::all();
        return view('admin.managers.index')->with('admins', $admins);   
    }

   
    public function create()
    {
        return view('admin.managers.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        //$products->save();

        Session::flash('success', 'You have successfully added an admin');

        return redirect()->route('admin.managers.index'); 
    }
    
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.manageers.edit')->with('admin', $admin);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|max:255|unique:admins',
        ]);

        $admin = Admin::find($id);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->permission = $request->permission;
        $admin->save();
        Session::flash('success', 'You have successfully edited the admin');
        return redirect()->route('admin.managers.index');
    }

    
    public function delete($id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
