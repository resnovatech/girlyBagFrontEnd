<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Image;
use App\Category;
use App\Subcategory;
use App\Volume;
use App\Supplier;
use App\Product_des;
use App\Photo;
use App\Stock;
use App\Order;
use App\Orderlist;
use App\RewardPoint;
use App\Brand;
use App\Product;
use App\ParentDescription;
use App\ChildDescription;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    public function all_order(){

        $all_order = DB::table('orders')
        ->join('users','orders.user_id','=','users.id')
        ->join('ship_addresses','orders.shipping_id','=','ship_addresses.id')
        ->select('orders.*','orders.id as Newt','users.name as Username','ship_addresses.*')

        ->get();


        return view('admin.order.allorder',['all_order'=>$all_order]);

    }


    public function all_order_status_update(Request $request){


        $status_info = Order::where('id',$request->productid)->first();


        return view('admin.order.all_order_status_update',['status_info'=>$status_info]);
    }


    public function all_order_status_update_store(Request $request){


        $update_status = Order::find($request->id);
        $update_status->status= $request->status;
        $update_status->save();

        return redirect()->back();



    }
    
    

public function destroy($id)
    {
        Order::find($id)->delete();
        Orderlist::where('order_id',$id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }



    public function view($id){

        $order = DB::table('orders')
        ->join('users','orders.user_id','=','users.id')
        ->join('ship_addresses','orders.shipping_id','=','ship_addresses.id')
        ->select('orders.*','orders.id as Newt','users.name as Username','users.phone as Userphone','ship_addresses.*')
                    ->where('orders.id','=',$id)
                    ->first();
           $details = Orderlist::where('order_id','=',$id)->get();

        return view('admin.order.view',['order'=>$order,'details'=>$details]);

    }

     public function update(Request $request){
       DB::table('orders')->where('id',$request->id)->update(['status'=>4,'payment_status'=>1]);
         DB::table('orderlists')->where('order_id',$request->id)->update(['order_status'=>1]);

        Toastr::success('Successull :)' ,'Success');
        return redirect()->back();
    }





    public function processing_order(){

        $all_order = DB::table('orders')
        ->join('users','orders.user_id','=','users.id')
        ->join('ship_addresses','orders.shipping_id','=','ship_addresses.id')
        ->select('orders.*','orders.id as Newt','users.name as Username','ship_addresses.*')
        ->where('orders.status','=',2)
        ->get();


        return view('admin.order.processing_order',['all_order'=>$all_order]);

    }



    public function process_view($id){

        $order = DB::table('orders')
        ->join('users','orders.user_id','=','users.id')
        ->join('ship_addresses','orders.shipping_id','=','ship_addresses.id')
        ->select('orders.*','orders.id as Newt','users.name as Username','users.phone as Userphone','ship_addresses.*')
                    ->where('orders.id','=',$id)
                    ->first();
           $details = Orderlist::where('order_id','=',$id)->get();

        return view('admin.order.process_order_view',['order'=>$order,'details'=>$details]);

    }



    public function received_order(){

        $all_order = DB::table('orders')
        ->join('users','orders.user_id','=','users.id')
        ->join('ship_addresses','orders.shipping_id','=','ship_addresses.id')
        ->select('orders.*','orders.id as Newt','users.name as Username','ship_addresses.*')
        ->where('orders.status','=',4)
        ->get();


        return view('admin.order.receiveorder',['all_order'=>$all_order]);

    }


    public function receive_view($id){

        $order = DB::table('orders')
        ->join('users','orders.user_id','=','users.id')
        ->join('ship_addresses','orders.shipping_id','=','ship_addresses.id')
        ->select('orders.*','orders.id as Newt','users.name as Username','users.phone as Userphone','ship_addresses.*')
                    ->where('orders.id','=',$id)
                    ->first();
           $details = Orderlist::where('order_id','=',$id)->get();

        return view('admin.order.receive_order_view',['order'=>$order,'details'=>$details]);

    }
}
