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
        if (Auth::check()){
            $self_id =  Auth::user()->id; 
            //dd($self_id); 
            $orders = DB::table('orders')->orderBy('updated_at', 'asc')->get();
            return view('orderList')->with('orders',$orders);
        }
    }
}
