<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Session;


use App\Department;

use App\Category;

use App\SubCategory;


class FetchDynamicController extends Controller
{

	public function getCategories(Request $request) {
		$department_id = Input::get('department_id');

		$categories = Category::where('department_id', $department_id)->get();

		return response()->json($categories);
	}

}