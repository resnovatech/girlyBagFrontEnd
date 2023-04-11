<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Image;
use App\Category;
use App\Shipping;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class ShipingController extends Controller
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

     	if (is_null($this->user) || !$this->user->can('ship.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any shiping address !');
        }

    	$categories=Shipping::orderBy('id','desc')->get();
    	return view('admin.shipping.manage',['categories'=>$categories]);
    }


     public function create(){
     	if (is_null($this->user) || !$this->user->can('ship.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any shipping address !');
        }
     return view('admin.shipping.create');
    }


   



     public function store(Request $request)
    {
       $this->validate($request,[
            'area' => 'required'
          
        ]);


      

    

        $category = new Shipping();
        $category->area = $request->area;
        $category->slug =Str::slug($request->area);
        $category->status = $request->status;
        
        $category->save();
        Toastr::success('Successfully Saved :)' ,'Success');
        return redirect()->route('admin.shipping');
    }

    public function destroy($id)
    {
    	if (is_null($this->user) || !$this->user->can('ship.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any shiping address !');
        }
        Shipping::find($id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }

    public function edit($slug)
    {
    	if (is_null($this->user) || !$this->user->can('ship.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any shipping address !');
        }
         $cats=Shipping::where('id',$slug)->first();;
         return view('admin.shipping.edit',['cats'=>$cats]);
    }


     public function update(Request $request)
    {
       $this->validate($request,[
            'area' => 'required'
          
        ]);

    

        $category = Shipping::find($request->id);
        $category->area = $request->area;
        $category->slug =Str::slug($request->area);
        $category->status = $request->status;
        $category->save();


        //product table slug update code 



        //product table slug update code 
        Toastr::success('Successfully Updated :)' ,'Success');
        return redirect()->route('admin.shipping');
    }
}
