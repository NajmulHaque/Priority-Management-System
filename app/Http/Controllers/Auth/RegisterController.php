<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\NewUser;
use App\User;
use App\Course;
use App\Order;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

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
            'name' => ['required', 'string', 'max:255'],
            // 'nsu_id' => ['required', 'integer', 'max:999999999'],
            'nsu_id' => 'required',
            'course' => ['required', 'string', 'max:255'],
            'section' => ['required', 'integer', 'max:999'],
            'class_start' => ['required', 'string', 'max:255'],
            'class_end' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
            //    $user = User::create([
    //        'name' => $request->input('name'),
    //        'nsu_id' => $request->input('nsu_id'),
    //        'email' => $request->input('email'),
    //        'password' => Hash::make($request['password']),
    //    ]);
        $x= User::create([
            'name' => $data['name'],
            'nsu_id' => $data['nsu_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $time = $data['class_start'];
        $date = date_format(date_create($time),'H:i:s');   
        $y= Course::create([ 
                'nsu_id' => $data['nsu_id'],
                'course' => $data['course'],
                'section' => $data['section'],
                'class_start' => $date,
                'class_end' => $data['class_end'],
            ]);

         $admin = User::where('admin', 1)->first();
         if ($admin) {
             $admin->notify(new NewUser($user));
         }
   
        return $user;
    }
}
