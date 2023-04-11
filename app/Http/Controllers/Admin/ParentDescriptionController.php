<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Image;
use App\Category;
use App\Subcategory;
use App\ParentDescription;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ParentDescriptionController extends Controller
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

     	if (is_null($this->user) || !$this->user->can('pdescription.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any pdescription !');
        }

    	$categories=Category::orderBy('id','desc')->get();
    	$pdes=ParentDescription::orderBy('id','desc')->get();
    	return view('admin.parent_description.manage',['categories'=>$categories,'pdes'=>$pdes]);
    }


     public function create(){
     	if (is_null($this->user) || !$this->user->can('pdescription.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any pdescription !');
        }
        $categories=Category::orderBy('id','desc')->get();
     return view('admin.parent_description.create',['categories'=>$categories]);
    }


   



     public function store(Request $request)
    {
       $this->validate($request,[
            'parent_id' => 'required'
          
        ]);


        

    

        $category = new ParentDescription();
        $category->parent_id = $request->parent_id;
        $category->description_category = $request->description_category;
        
        $category->save();
        Toastr::success('Successfully Saved :)' ,'Success');
        return redirect()->route('admin.parent_description');
    }

    public function destroy($id)
    {
    	if (is_null($this->user) || !$this->user->can('pdescription.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any pdescription !');
        }
        ParentDescription::find($id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }

    public function edit($slug)
    {
    	if (is_null($this->user) || !$this->user->can('pdescription.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any pdescription !');
        }
         $cats=ParentDescription::where('id',$slug)->first();
         $categories=Category::orderBy('id','desc')->get();
         return view('admin.parent_description.edit',['cats'=>$cats,'categories'=>$categories]);
    }


     public function update(Request $request)
    {
       

    

        $category = ParentDescription::find($request->id);
        $category->parent_id = $request->parent_id;
        $category->description_category = $request->description_category;
        $category->save();


        //product table slug update code 



        //product table slug update code 
        Toastr::success('Successfully Updated :)' ,'Success');
        return redirect()->route('admin.parent_description');
    }
}
