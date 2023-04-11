<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Orderlist;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $cartCollection = \Cart::getContent();
        $total_reward_point = Orderlist::where('user_id',$id)->sum('reward_point');

        $product_quantity = Orderlist::where('user_id',$id)->sum('product_quantity');

        return view('home',['cartCollection'=>$cartCollection,'total_reward_point'=>$total_reward_point,'product_quantity'=>$product_quantity]);
    }
}
