<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Image;
use App\Category;
use App\Subcategory;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class SubcategoryController extends Controller
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

     	if (is_null($this->user) || !$this->user->can('subcategory.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any subcategory !');
        }

    	$categories=Category::orderBy('id','desc')->get();
    	$subcategories=Subcategory::orderBy('id','desc')->get();
    	return view('admin.subcat.manage',['categories'=>$categories,'subcategories'=>$subcategories]);
    }


     public function create(){
     	if (is_null($this->user) || !$this->user->can('subcategory.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any subcategory !');
        }
        $categories=Category::orderBy('id','desc')->get();
     return view('admin.subcat.create',['categories'=>$categories]);
    }






     public function store(Request $request)
    {
       $this->validate($request,[
            'subcategory_name' => 'required'

        ]);






        $category = new Subcategory();
        $category->category_slug = $request->category_slug;
        $category->subcategory_name = $request->subcategory_name;
        $category->subcategory_slug = Str::slug($request->subcategory_name);
        $category->status = $request->status;
        $category->save();
        Toastr::success('Successfully Saved :)' ,'Success');
        return redirect()->route('admin.subcategory');
    }

    public function destroy($id)
    {
    	if (is_null($this->user) || !$this->user->can('subcategory.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any subcategory !');
        }
         Subcategory::find($id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }

    public function edit($slug)
    {
    	if (is_null($this->user) || !$this->user->can('subcategory.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any subcategory !');
        }
         $cats=Subcategory::where('id',$slug)->first();
         $categories=Category::orderBy('id','desc')->get();
         return view('admin.subcat.edit',['cats'=>$cats,'categories'=>$categories]);
    }


     public function update(Request $request)
    {


        //sucat table slug update
        $findCatSlug = Subcategory::where('id',$request->id)->value('subcategory_slug');

        $updateCAtname = $request->subcategory_name;


        $updateSlug = Str::slug($request->subcategory_name);






   //subcat table slug update



   //product table slug update

   Product::where('subcategory_slug', $findCatSlug)->update([
    'subcategory_slug' => $updateSlug
 ]);

   //product table slug Update



        $category = Subcategory::find($request->id);
        $category->category_slug = $request->category_slug;
        $category->subcategory_name = $request->subcategory_name;
        $category->subcategory_slug = Str::slug($request->subcategory_name);
        $category->status = $request->status;
        $category->save();


        //product table slug update code



        //product table slug update code
        Toastr::success('Successfully Updated :)' ,'Success');
        return redirect()->route('admin.subcategory');
    }
}
