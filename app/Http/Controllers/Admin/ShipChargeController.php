<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Image;
use App\Category;
use App\Shipping;
use App\ShippingCharge;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class ShipChargeController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
     public function index(){

     	if (is_null($this->user) || !$this->user->can('shipcharge.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any shiping charge !');
        }

    	$categories=ShippingCharge::orderBy('id','desc')->get();
        $ships=Shipping::orderBy('id','desc')->get();
    	return view('admin.shipping_charge.manage',['categories'=>$categories,'ships'=>$ships]);
    }


     public function create(){
     	if (is_null($this->user) || !$this->user->can('shipcharge.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any shipping charge !');
        }
     return view('admin.shipping_charge.create');
    }


   



     public function store(Request $request)
    {
       $this->validate($request,[
            'method' => 'required'
          
        ]);


      

    

        $category = new ShippingCharge();
        $category->ship_id = $request->ship_id;
        $category->method =$request->method;
        $category->price = $request->price;
        
        $category->save();
        Toastr::success('Successfully Saved :)' ,'Success');
        return redirect()->route('admin.shipping_charge');
    }

    public function destroy($id)
    {
    	if (is_null($this->user) || !$this->user->can('shipcharge.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any shiping charge !');
        }
        ShippingCharge::find($id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }

    public function edit($slug)
    {
    	if (is_null($this->user) || !$this->user->can('shipcharge.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any shipping charge !');
        }
         $cats=ShippingCharge::where('id',$slug)->first();
         $ships=Shipping::orderBy('id','desc')->get();
         return view('admin.shipping_charge.edit',['cats'=>$cats,'ships'=>$ships]);
    }


     public function update(Request $request)
    {
       $this->validate($request,[
            'method' => 'required'
          
        ]);

    

        $category = ShippingCharge::find($request->id);
        $category->ship_id = $request->ship_id;
        $category->method =$request->method;
        $category->price = $request->price;
        $category->save();


        //product table slug update code 



        //product table slug update code 
        Toastr::success('Successfully Updated :)' ,'Success');
        return redirect()->route('admin.shipping_charge');
    }
}
