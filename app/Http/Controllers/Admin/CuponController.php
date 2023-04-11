<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Image;
use App\Category;
use App\Cupon;
use App\Subcategory;
use App\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CuponController extends Controller
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

     	if (is_null($this->user) || !$this->user->can('cupon.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Cupon !');
        }

    	$brands=Cupon::orderBy('id','desc')->get();

    	return view('admin.cupon.manage',['brands'=>$brands]);
    }


     public function create(){
     	if (is_null($this->user) || !$this->user->can('cupon.add')) {
            abort(403, 'Sorry !! You are Unauthorized to create any cupon !');
        }
        $brands=Cupon::orderBy('id','desc')->get();
     return view('admin.cupon.create',['brands'=>$brands]);
    }






     public function store(Request $request)
    {
       $this->validate($request,[
            'title' => 'required'

        ]);






        $category = new Cupon();
        $category->title = $request->title;
        $category->code = $request->code.'-'.substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,5);
        $category->first_order_only = $request->first_order_only;
        $category->active_from = $request->active_from;
        $category->active_to = $request->active_to;
        $category->discount_type = $request->discount_type;
        $category->discount_amount = $request->discount_amount;
        $category->maximum_purchase_amount = $request->maximum_purchase_amount;
        $category->mimimum_purchase_discount = $request->mimimum_purchase_discount;
        $category->usage_limit = $request->usage_limit;
        $category->save();
        Toastr::success('Successfully Saved :)' ,'Success');
        return redirect()->route('admin.cupon');
    }

    public function destroy($id)
    {
    	if (is_null($this->user) || !$this->user->can('cupon.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any cupon !');
        }
        Cupon::find($id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }

    public function edit($slug)
    {
    	if (is_null($this->user) || !$this->user->can('cupon.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any cupon !');
        }
         $cats=Cupon::where('id',$slug)->first();

         return view('admin.cupon.edit',['cats'=>$cats]);
    }


     public function update(Request $request)
    {




        $category =Cupon::find($request->id);
        $category->title = $request->title;
        $category->code = $request->code;
        // $category->first_order_only = $request->first_order_only;
        $category->active_from = $request->active_from;
        $category->active_to = $request->active_to;
        $category->discount_type = $request->discount_type;
        $category->discount_amount = $request->discount_amount;
        // $category->maximum_purchase_amount = $request->maximum_purchase_amount;
        // $category->mimimum_purchase_discount = $request->mimimum_purchase_discount;
        // $category->usage_limit = $request->usage_limit;
        $category->save();


        //product table slug update code



        //product table slug update code
        Toastr::success('Successfully Updated :)' ,'Success');
        return redirect()->route('admin.cupon');
    }
}
