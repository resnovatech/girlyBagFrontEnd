<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Image;
use App\Category;
use App\Subcategory;
use App\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class BrandController extends Controller
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

     	if (is_null($this->user) || !$this->user->can('brand.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any brand !');
        }

    	$brands=Brand::orderBy('id','desc')->get();
        $categories = Category::latest()->get();
    	return view('admin.brand.manage',['brands'=>$brands,'categories'=>$categories]);
    }


     public function create(){
     	if (is_null($this->user) || !$this->user->can('brand.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any brand !');
        }
        $brands=Brand::orderBy('id','desc')->get();
     return view('admin.brand.create',['brands'=>$brands]);
    }






     public function store(Request $request)
    {
       $this->validate($request,[
            'name' => 'required'

        ]);






        $category = new Brand();
        $category->cat_id = $request->cat_id;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();
        Toastr::success('Successfully Saved :)' ,'Success');
        return redirect()->route('admin.brand');
    }

    public function destroy($id)
    {
    	if (is_null($this->user) || !$this->user->can('brand.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any brand !');
        }
         Brand::find($id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }

    public function edit($slug)
    {
    	if (is_null($this->user) || !$this->user->can('brand.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any brand !');
        }
        $categories = Category::latest()->get();
         $cats=Brand::where('id',$slug)->first();

         return view('admin.brand.edit',['cats'=>$cats,'categories'=>$categories]);
    }


     public function update(Request $request)
    {




        $category = Brand::find($request->id);
        $category->name = $request->name;
        $category->cat_id = $request->cat_id;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();


        //product table slug update code



        //product table slug update code
        Toastr::success('Successfully Updated :)' ,'Success');
        return redirect()->route('admin.brand');
    }
}
