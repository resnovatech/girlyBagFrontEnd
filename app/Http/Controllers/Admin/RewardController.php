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
use App\RewardPoint;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class RewardController extends Controller
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

     	if (is_null($this->user) || !$this->user->can('reward.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any reward point !');
        }

    	$categories=RewardPoint::orderBy('id','desc')->get();
        $ships=Shipping::orderBy('id','desc')->get();
    	return view('admin.reward.manage',['categories'=>$categories,'ships'=>$ships]);
    }


     public function create(){
     	if (is_null($this->user) || !$this->user->can('reward.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any reward point !');
        }
     return view('admin.reward.create');
    }


   



     public function store(Request $request)
    {
       $this->validate($request,[
            'point' => 'required'
          
        ]);


      

    

        $category = new RewardPoint();
        $category->name = $request->name;
        $category->point =$request->point;
        $category->amount = $request->amount;
        $category->status = $request->status;
        $category->save();
        Toastr::success('Successfully Saved :)' ,'Success');
        return redirect()->route('admin.reward');
    }

    public function destroy($id)
    {
    	if (is_null($this->user) || !$this->user->can('reward.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any reward point !');
        }
        RewardPoint::find($id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }

    public function edit($slug)
    {
    	if (is_null($this->user) || !$this->user->can('reward.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any reward point !');
        }
         $cats=RewardPoint::where('id',$slug)->first();
         $ships=Shipping::orderBy('id','desc')->get();
         return view('admin.reward.edit',['cats'=>$cats,'ships'=>$ships]);
    }


     public function update(Request $request)
    {
       $this->validate($request,[
            'point' => 'required'
          
        ]);

    

        $category = RewardPoint::find($request->id);
        $category->name = $request->name;
        $category->point =$request->point;
        $category->amount = $request->amount;
        $category->status = $request->status;
        $category->save();


        //product table slug update code 



        //product table slug update code 
        Toastr::success('Successfully Updated :)' ,'Success');
        return redirect()->route('admin.reward');
    }
}
