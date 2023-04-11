<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Image;
use App\Category;
use App\User;
use App\Subcategory;
use App\ShipAddress;
use App\Brand;
use App\Order;
use App\CustomerPeriodData;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class CustomerLoginController extends Controller
{
    public function customer_login(){


        $cartCollection = \Cart::getContent();

    	return view('front.customer_login',['cartCollection'=>$cartCollection]);

    }



    public function customer_register(){


        $cartCollection = \Cart::getContent();

    	return view('front.customer_register',['cartCollection'=>$cartCollection]);

    }


    public function customer_login_header(){


        $cartCollection = \Cart::getContent();

    	return view('front.customer_login_header',['cartCollection'=>$cartCollection]);

    }



    public function customer_register_header(){


        $cartCollection = \Cart::getContent();

    	return view('front.customer_register_header',['cartCollection'=>$cartCollection]);

    }


    public function customer_data_store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'email | unique:users',
            'lname' => 'required',
            'password' => 'min:3',
        ]);


        $store_data = new User();
        $store_data->name = $request->name;
        $store_data->lname = $request->lname;
        $store_data->email = $request->email;
        $store_data->password = Hash::make($request->password);
        $store_data->save();

                $customerId = $store_data->id;
                Session::put('customerId',$customerId);

        //Toastr::success('Successfully Register :)' ,'Success');
        return redirect()->route('customer_dashoard.login');





    }


    public function customer_login_check(Request $request){


        $request->validate([
            'email' => 'required|max:50',
            'password' => 'required',
        ]);


			if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
				// Redirect to dashboard
				//Toastr::success('Successully login :)' ,'Success');
				return redirect('/shipping');
			} else {
				// Search using username

				// error
			  //Toastr::error('Invalid email and password :)' ,'Error');
				return redirect()->back();
			}
		}



        public function customer_information_edit(Request $request){




            $store_data = User::find($request->id);
            $store_data->name = $request->name;
            $store_data->phone = $request->phone;
            $store_data->lname = $request->lname;
            $store_data->email = $request->email;

            $store_data->save();



            //Toastr::success('Successfully Updated :)' ,'Success');
            return redirect()->back();





        }


        public function customer_addresss(){
            $auth = Auth::user()->id;
            $cartCollection = \Cart::getContent();
            $new_add = ShipAddress::where('user_id',$auth)->first();

           // dd(count($new_add));
            return view('front.customer_address',['cartCollection'=>$cartCollection,'new_add'=>$new_add]);
        }



        public function customer_history(){

            $cartCollection = \Cart::getContent();
            $auth = Auth::user()->id;
            $order_history = Order::where('user_id',$auth)->get();

            return view('front.customer_history',['cartCollection'=>$cartCollection,'order_history'=>$order_history]);

        }



        public function period_information(){

            $auth = Auth::user()->id;
            $periodHistory=CustomerPeriodData::where('user_id',$auth)->get();


            $periodDate =CustomerPeriodData::where('user_id',$auth)->value('period_date');









            return view('front.customer_period_information',[
                'periodHistory'=>$periodHistory,

            ]);


        }



        public function customer_addresss_edit(Request $request){




            $store_data = ShipAddress::find($request->id);
            $store_data->country = $request->country;
            $store_data->dis = $request->dis;
            $store_data->address = $request->address;
            $store_data->phone = $request->phone;

            $store_data->save();



           // Toastr::success('Successfully Updated :)' ,'Success');
            return redirect()->back();





        }





}
