<?php

namespace App\Http\Controllers\Auth;

use App\City;
use App\Http\Controllers\Controller;
use App\State;
use App\User;

use App\Userinfo;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        Userinfo::create([
            'user_id' => $user->id,
            'address' => $data['address'],
            'city' => $data['country'] == 'Nigeria' ? $data['city'] : '',
            'state_id' => $data['country'] == 'Nigeria' ? State::find($data['state_id'])->state_name : '',
            'city_alt' => $data['country'] != 'Nigeria' ? $data['city_alt'] : '',
            'state_alt' => $data['country'] != 'Nigeria' ? $data['state_id_alt'] : '',
            'country' => $data['country'],
            'phone' => $data['phone'],
            'lga' => $data['country'] == 'Nigeria' ? City::whereCity($data['city'])->first()->id : ''
        ]);

        return ($user);
    }
}
