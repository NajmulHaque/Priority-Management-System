<?php
namespace App\Http\Controllers;

use Auth;
use DB;
use App\User;
use App\Order;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use DateTime;
use DateTimezone;


class PriorityController extends Controller
{
    
    public function order()
    {
        if (Auth::check()){
            $self_id =  Auth::user()->id; 
            //dd($self_id); 
            $orders = DB::table('orders')->orderBy('updated_at', 'asc')->get();
            return view('priorityDashboard')->with('orders',$orders);
        }
    }
    public function orderList()
    {
        // if (Auth::check()){
        //     $self_id =  Auth::user()->id; 
        //     //dd($self_id); 
        //     $orders = DB::table('orders')->orderBy('updated_at', 'asc')->get();
        //     return view('orderList')->with('orders',$orders);
        // }
        $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        $courses=Course::with('order')
             ->join('orders', 'orders.nsu_id', '=', 'courses.nsu_id')
             ->select('orders.*','courses.class_start') // Avoid selecting everything from the stocks table
             ->where("class_start", "<=", $date->format('G:i a'))
             ->orderBy('courses.class_start', 'ASC')
             ->get();
        return view('orderList',compact('courses'));
    }
}
