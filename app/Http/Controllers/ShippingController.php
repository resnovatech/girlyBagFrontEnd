<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
use App\Category;
use App\User;
use App\Subcategory;
use App\Brand;
use App\Cupon;
use Session;
use App\ShipAddress;
use App\CustomerPeriodData;
use App\Order;
use App\Orderlist;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use App\Shipping;
class ShippingController extends Controller
{
    public function shippinindex(){

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        $ship_address = Shipping::latest()->get();
        return view('front.ship_address',['cart_data'=>$cart_data,'ship_address'=>$ship_address ]);

    }





    public function add(Request $request){


        //dd(Session::get('CUPONPRICEDATA'));



        //dd($request->code);
        if($request->cupon == 'removecupon'){
            session()->forget('final_price');
            session()->forget('payment_amount');
            session()->forget('percentage');
            session()->forget('promo_code');

            //Toastr::error('Cupon Removed' ,'Success');
            return redirect()->back()->with('error', 'Cupon Removed');


        }elseif($request->cupon == 'cupon'){


            Session::put('fname', $request->fname);
            Session::put('lname', $request->lname);
            Session::put('pdate', $request->pdate);
            Session::put('total_days', $request->total_days);
            Session::put('cycle', $request->cycle);
            Session::put('phone', $request->phone);
            Session::put('address', $request->address);
            Session::put('country', $request->country);
            Session::put('dis', $request->dis);
            Session::put('cstatus', $request->cstatus);
            Session::put('payment_type', $request->payment_type);
            Session::put('order_comment', $request->order_comment);






            //multiple time condition check

            if(Session::get('promo_code') == $request->code){

                //Toastr::error('You Have already Use This code' ,'Success');
                return redirect()->back()->with('error', 'You Have already Use This code');

            }else{


 //multiple time conition check


 $promo_code_search = Cupon::where('code',$request->code)->value('code');


 //dd($request->code);

  if(empty($promo_code_search)){

     // Toastr::error('Invalid Code' ,'Success');
      return redirect()->back()->with('error', 'Invalid Code');

  }else{

      //expirey date check

      $today = date('Y-m-d');
      $promo_code_active_date_full = Cupon::where('code',$request->code)->value('active_from');
      $promo_code_end_date_full = Cupon::where('code',$request->code)->value('active_to');


      $timestamp = strtotime($promo_code_active_date_full);
      $promo_code_active_date_only = date('d', $timestamp);



      $timestamp1 = strtotime($promo_code_end_date_full);
      $promo_code_end_date_only = date('d', $timestamp1);


      $timestamp2 = strtotime($today);
      $today_date_only = date('d', $timestamp2);




//dd($today_date_only);

      if($promo_code_active_date_only == $today_date_only || $promo_code_end_date_only >= $today_date_only){

//dd(2);
          $promo_code = $request->code;
          $total_price =$request->total_price;



          $payment_type = Cupon::where('code',$promo_code)->value('discount_type');
          $payment_amount = Cupon::where('code',$promo_code)->value('discount_amount');



          if($payment_type = 0){


             $final_price = $total_price - $payment_amount;


          }else{


             $final_price = ($total_price*$payment_amount)/100;

             //$final_price = $total_price - $percentage;


          }



          Session::put('payment_amount', $payment_amount);


          Session::put('final_price', $final_price);


          Session::put('promo_code', $promo_code );

         // Toastr::success('Success' ,'Success');
          return redirect()->back()->with('success', 'Success');


      }else{

        //dd('ok1');

         // Toastr::error('Promo Code Date expired or offer is not start ' ,'Success');
          return redirect()->back()->with('error', 'Promo Code Date expired or offer is not start!');


      }




      //expirey date check







  }







            }







        }else{



//code for new card
$cookie_data = stripslashes(Cookie::get('shopping_cart'));
$cart_data = json_decode($cookie_data, true);


if(isset($cart_data)){


    if(Cookie::get('shopping_cart')){

        $total= 0 ;


        foreach($cart_data as $data){


             $total = $total + ($data["item_quantity"] * $data["item_price"]);

        }


        Session::put('CUPONPRICEDATA',$total);


    }



}


$new_card_sub = Session::get('CUPONPRICEDATA');

//code for new card



            $this->validate($request,[
                'pdate' => 'required',


            ]);


            $user= Session::get('customerId');


            if(Auth::guest()){


                    $customer = new ShipAddress();
                    $customer->Fname = $request->fname;
                    $customer->lname = $request->lname;
                    $customer->pdate = $request->pdate;
                    $customer->user_id = $user;
                    $customer->phone = $request->phone;
                    $customer->address = $request->address;
                    $customer->country = $request->country;
                    $customer->dis = $request->dis;
                    $customer->cstatus = $request->cstatus;
                    $customer->payment_type = $request->payment_type;
                    $customer->order_comment = $request->order_comment;
                    $customer->save();


                    $cupon_period_data = new CustomerPeriodData();
                    $cupon_period_data->user_id = $user;
                    $cupon_period_data->period_date = $request->pdate;
                    $cupon_period_data->total_days = $request->total_days;
                    $cupon_period_data->cycle = $request->cycle;
                    $cupon_period_data->status = 1;
                    $cupon_period_data->save();

                    //new update code

                    //first level date

            $firstDateFirstLevel =date('Y-m-d', strtotime($request->pdate. ' + '. $request->total_days .'days'));


            $secondDateFirstLevel = date('Y-m-d', strtotime($firstDateFirstLevel. ' + '. $request->cycle .'days'));


//first Level Date



//second level date




//second level date


$firstDateSecondLevel =date('Y-m-d', strtotime($secondDateFirstLevel. ' + '. $request->total_days .'days'));


$secondDateSecondLevel = date('Y-m-d', strtotime($firstDateSecondLevel. ' + '. $request->cycle .'days'));


//third level date


$firstDateThirdLevel =date('Y-m-d', strtotime($secondDateSecondLevel. ' + '. $request->total_days .'days'));


$secondDateThirdLevel = date('Y-m-d', strtotime($firstDateThirdLevel. ' + '. $request->cycle .'days'));


//third level date

                    //new update code


                    $dataNew = [
                        ['user_id'=>Auth::user()->id,'period_date'=> $secondDateFirstLevel ,'total_days'=> $request->total_days,'cycle'=> $request->cycle],
                        ['user_id'=>Auth::user()->id,'period_date'=> $secondDateSecondLevel ,'total_days'=> $request->total_days,'cycle'=> $request->cycle],
                        ['user_id'=>Auth::user()->id,'period_date'=> $secondDateThirdLevel ,'total_days'=> $request->total_days,'cycle'=> $request->cycle],
                        //...
                    ];

                   // Model::insert($data); // Eloquent approach
                    DB::table('customer_period_data')->insert($dataNew); // Query Builder approach

            }else{
//dd($request->id);

//dd(Auth::user()->id);
if(empty($request->id)){
    $customer = new ShipAddress();
    $customer->Fname = $request->fname;
    $customer->lname = $request->lname;
    $customer->pdate = $request->pdate;
    $customer->user_id = Auth::user()->id;
    $customer->phone = $request->phone;
    $customer->address = $request->address;
    $customer->country = $request->country;
    $customer->dis = $request->dis;
    $customer->cstatus = $request->cstatus;
    $customer->payment_type = $request->payment_type;
    $customer->order_comment = $request->order_comment;
    $customer->save();


    $cupon_period_data = new CustomerPeriodData();
    $cupon_period_data->user_id = Auth::user()->id;
    $cupon_period_data->period_date = $request->pdate;
    $cupon_period_data->total_days = $request->total_days;
    $cupon_period_data->cycle = $request->cycle;
    $cupon_period_data->status = 1;
    $cupon_period_data->save();


     //new update code

                    //first level date

                    $firstDateFirstLevel =date('Y-m-d', strtotime($request->pdate. ' + '. $request->total_days .'days'));


                    $secondDateFirstLevel = date('Y-m-d', strtotime($firstDateFirstLevel. ' + '. $request->cycle .'days'));


        //first Level Date



        //second level date




        //second level date


        $firstDateSecondLevel =date('Y-m-d', strtotime($secondDateFirstLevel. ' + '. $request->total_days .'days'));


        $secondDateSecondLevel = date('Y-m-d', strtotime($firstDateSecondLevel. ' + '. $request->cycle .'days'));


        //third level date


        $firstDateThirdLevel =date('Y-m-d', strtotime($secondDateSecondLevel. ' + '. $request->total_days .'days'));


        $secondDateThirdLevel = date('Y-m-d', strtotime($firstDateThirdLevel. ' + '. $request->cycle .'days'));


        //third level date

                            //new update code


                            $dataNew = [
                                ['user_id'=>Auth::user()->id,'period_date'=> $secondDateFirstLevel ,'total_days'=> $request->total_days,'cycle'=> $request->cycle],
                                ['user_id'=>Auth::user()->id,'period_date'=> $secondDateSecondLevel ,'total_days'=> $request->total_days,'cycle'=> $request->cycle],
                                ['user_id'=>Auth::user()->id,'period_date'=> $secondDateThirdLevel ,'total_days'=> $request->total_days,'cycle'=> $request->cycle],
                                //...
                            ];

                           // Model::insert($data); // Eloquent approach
                            DB::table('customer_period_data')->insert($dataNew); // Query Builder approach

}else{


                $customer =ShipAddress::find($request->id);
                $customer->Fname = $request->fname;
                $customer->lname = $request->lname;
                $customer->pdate = $request->pdate;
                $customer->user_id = Auth::user()->id;
                $customer->phone = $request->phone;
                $customer->address = $request->address;
                $customer->country = $request->country;
                $customer->dis = $request->dis;
                $customer->cstatus = $request->cstatus;
                $customer->payment_type = $request->payment_type;
                $customer->order_comment = $request->order_comment;
                $customer->save();


                    $cupon_period_data = new CustomerPeriodData();
                    $cupon_period_data->user_id = Auth::user()->id;
                    $cupon_period_data->period_date = $request->pdate;
                    $cupon_period_data->total_days = $request->total_days;
                    $cupon_period_data->cycle = $request->cycle;
                    $cupon_period_data->status = 1;
                    $cupon_period_data->save();

                     //new update code

                    //first level date

            $firstDateFirstLevel =date('Y-m-d', strtotime($request->pdate. ' + '. $request->total_days .'days'));


            $secondDateFirstLevel = date('Y-m-d', strtotime($firstDateFirstLevel. ' + '. $request->cycle .'days'));


//first Level Date



//second level date




//second level date


$firstDateSecondLevel =date('Y-m-d', strtotime($secondDateFirstLevel. ' + '. $request->total_days .'days'));


$secondDateSecondLevel = date('Y-m-d', strtotime($firstDateSecondLevel. ' + '. $request->cycle .'days'));


//third level date


$firstDateThirdLevel =date('Y-m-d', strtotime($secondDateSecondLevel. ' + '. $request->total_days .'days'));


$secondDateThirdLevel = date('Y-m-d', strtotime($firstDateThirdLevel. ' + '. $request->cycle .'days'));


//third level date

                    //new update code


                    $dataNew = [
                        ['user_id'=>Auth::user()->id,'period_date'=> $secondDateFirstLevel ,'total_days'=> $request->total_days,'cycle'=> $request->cycle],
                        ['user_id'=>Auth::user()->id,'period_date'=> $secondDateSecondLevel ,'total_days'=> $request->total_days,'cycle'=> $request->cycle],
                        ['user_id'=>Auth::user()->id,'period_date'=> $secondDateThirdLevel ,'total_days'=> $request->total_days,'cycle'=> $request->cycle],
                        //...
                    ];

                   // Model::insert($data); // Eloquent approach
                    DB::table('customer_period_data')->insert($dataNew); // Query Builder approach
}

            }
                    $shippingId = $customer->id;
                    $userId = $customer->user_id;


                      if(Auth::guest()){

                        $mainOrder = new Order();
                        $mainOrder->user_id = $userId;
                        $mainOrder->shipping_id =  $shippingId;
                        $mainOrder->pin ='GBAG-'.rand('10000000','99999999');
                        $mainOrder->date =  date('d-m-Y');


                        if(Session::has('final_price')){
                            $mainOrder->discount_amount  =Session::get('final_price');
                            $mainOrder->order_total  =$new_card_sub - Session::get('final_price');
                        }else{

                            $mainOrder->order_total=$new_card_sub;
                        }
                        $mainOrder->save();

                        $orderId=$mainOrder->id;

                        $cartCollection = json_decode($cookie_data, true);
                        // dd($cartCollection);
                        foreach ($cartCollection as $data){

                         $order= new Orderlist();
                         $order->user_id = $userId;
                         $order->shipping_id =  $shippingId;
                         $order->product_id = $data["item_id"];
                         $order->order_id = $orderId;
                         $order->product_name = $data["item_name"];
                         $order->reward_point = 0;
                         $order->product_price = $data["item_price"];
                         $order->product_quantity =$data["item_quantity"];
                         $order->order_total = $data["item_quantity"] * $data["item_price"];

                         $order->save();


                     }

                      }else{

                          $mainOrder = new Order();
                          $mainOrder->user_id = Auth::user()->id;
                        $mainOrder->shipping_id =  $shippingId;
                        $mainOrder->date =  date('d-m-Y');
                        $mainOrder->pin ='GBAG-'.rand('10000000','99999999');
                        if(Session::has('final_price')){
                            $mainOrder->discount_amount  =Session::get('final_price');
                            $mainOrder->order_total  =$new_card_sub - Session::get('final_price');
                        }else{

                            $mainOrder->order_total=$new_card_sub;
                        }
                        $mainOrder->save();

                        $orderId=$mainOrder->id;

                           $cartCollection = json_decode($cookie_data, true);
                        // dd($cartCollection);

                     foreach ($cartCollection as $data){

                         $order= new Orderlist();
                         $order->user_id = Auth::user()->id;
                         $order->shipping_id =  $shippingId;
                         $order->product_id = $data["item_id"];
                         $order->order_id = $orderId;
                         $order->product_name = $data["item_name"];
                         $order->reward_point = 0;
                         $order->product_price = $data["item_price"];
                         $order->product_quantity =$data["item_quantity"];
                         $order->order_total = $data["item_quantity"] * $data["item_price"];

                         $order->save();

                     }

                      }

                      session()->forget('final_price');
                      session()->forget('payment_amount');
                      session()->forget('percentage');
                      session()->forget('promo_code');


                      session()->forget('fname');
                      session()->forget('lname');
                      session()->forget('pdate');
                      session()->forget('total_days');
                      session()->forget('cycle');
                      session()->forget('phone');
                      session()->forget('address');
                      session()->forget('country');
                      session()->forget('dis');
                      session()->forget('cstatus');
                      session()->forget('payment_type');
                      session()->forget('order_comment');

                      Cookie::queue(Cookie::forget('shopping_cart'));

                      \Cart::clear();
                      //Toastr::success('Successfull :)' ,'Success');






                      $cartCollection = \Cart::getContent();
                      return view('front.success',['cartCollection'=>$cartCollection]);

        }






    }



    public function shipping_name(Request $request)
{

    Session::put('fname', $request->type);


  return 1;
}
}
