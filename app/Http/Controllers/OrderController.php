<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Order;
use App\Course;
use DB;
use DateTime;
use DateTimezone;

class OrderController extends Controller
{
     protected $redirectTo = '/successOrder';
     public function index()
     {
         return view('home');
     }
    public function order(Request $request)
    {
        $this->validate(request(), [
            'nsu_id' => 'required',
        ]);
        if (Auth::check()){
             $self_id =  Auth::user()->id; 
             //dd($self_id);
            //$user =User::find(1);
            //dd(Auth::user());
            $order= new Order();
            $order->nsu_id=$request->input('nsu_id');
            $order->user_id=$self_id;
            //$order->user_id=$user->id;
            //$user->orders()->save($order);
            $order->save();
            return redirect()->to('/successOrder');
        }
    }
    
    public function success()
    {
        $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        //$date=date("H:i:s",time() - 6*3600);
        $courses=Course::with('order')
             ->join('orders', 'orders.nsu_id', '=', 'courses.nsu_id')
             ->select('orders.*','courses.class_start') // Avoid selecting everything from the stocks table
             ->where("class_start", "<=", $date->format('G:i a'))
             ->orderBy('courses.class_start', 'ASC')
             ->get();
        return view('priorityDashboard',compact('courses'));
    }
}