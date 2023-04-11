<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Image;
use App\Category;
use App\Shipping;
use App\Supplier;
use App\ShippingCharge;
use App\RewardPoint;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class SupplierController extends Controller
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

     	if (is_null($this->user) || !$this->user->can('supplier.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any supplier !');
        }

    	$categories=Supplier::orderBy('id','desc')->get();
        $ships=Shipping::orderBy('id','desc')->get();
    	return view('admin.supplier.manage',['categories'=>$categories,'ships'=>$ships]);
    }


     public function create(){
     	if (is_null($this->user) || !$this->user->can('supplier.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any supplier !');
        }
     return view('admin.supplier.create');
    }


   



     public function store(Request $request)
    {
       $this->validate($request,[
            'name' => 'required'
          
        ]);


      

    

        $category = new Supplier();
        $category->name = $request->name;
        $category->mobile =$request->mobile;
        $category->email = $request->email;
        $category->address = $request->address;
        $category->status = $request->status;
        $category->save();
        Toastr::success('Successfully Saved :)' ,'Success');
        return redirect()->route('admin.supplier');
    }

    public function destroy($id)
    {
    	if (is_null($this->user) || !$this->user->can('supplier.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any supplier point !');
        }
        Supplier::find($id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }

    public function edit($slug)
    {
    	if (is_null($this->user) || !$this->user->can('supplier.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any supplier name !');
        }
         $cats=Supplier::where('id',$slug)->first();
         $ships=Shipping::orderBy('id','desc')->get();
         return view('admin.supplier.edit',['cats'=>$cats,'ships'=>$ships]);
    }


     public function update(Request $request)
    {
       $this->validate($request,[
            'name' => 'required'
          
        ]);

    

        $category = Supplier::find($request->id);
        $category->name = $request->name;
        $category->mobile =$request->mobile;
        $category->email = $request->email;
        $category->address = $request->address;
        $category->status = $request->status;
        $category->save();


        //product table slug update code 



        //product table slug update code 
        Toastr::success('Successfully Updated :)' ,'Success');
        return redirect()->route('admin.supplier');
    }
}
