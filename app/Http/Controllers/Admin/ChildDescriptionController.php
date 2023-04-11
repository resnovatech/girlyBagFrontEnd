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
use App\ChildDescription;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class ChildDescriptionController extends Controller
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

        if (is_null($this->user) || !$this->user->can('cdescription.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any cdescription !');
        }
        $categories_new=Category::orderBy('id','desc')->get();
        $cdes=ChildDescription::orderBy('id','desc')->get();
        $pdes=ParentDescription::orderBy('id','desc')->get();
        return view('admin.child_description.manage',['cdes'=>$cdes,'pdes'=>$pdes,'categories_new'=>$categories_new]);
    }


    public function select_people(Request $request)

    {
        $subcategory=ParentDescription::where('id',$request->catId)->get();
        return response()->json($subcategory);
    }


    public function create(){
        if (is_null($this->user) || !$this->user->can('cdescription.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any cdescription !');
        }
        $categories=Category::orderBy('id','desc')->get();
        return view('admin.child_description.create',['categories'=>$categories]);
    }






    public function store(Request $request)
    {
        $this->validate($request,[
            'description_child' => 'required'

        ]);



        $parent_id =ParentDescription::where('description_category',$request->description_category)->value('id');



//dd($parent_id);


        $category = new ChildDescription();
        $category->parent_id = $parent_id;
        $category->description_child = $request->description_child;
        $category->description_category = $request->description_category;
        $category->save();
        Toastr::success('Successfully Saved :)' ,'Success');
        return redirect()->route('admin.child_description');
    }

    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('cdescription.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any cdescription !');
        }
        ChildDescription::find($id)->delete();
        Toastr::warning('Successfully Deleted :)','Success');
        return redirect()->back();
    }

    public function edit($slug)
    {
        if (is_null($this->user) || !$this->user->can('cdescription.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any cdescription !');
        }
        $categories_new=Category::orderBy('id','desc')->get();
        $cats=ChildDescription::where('id',$slug)->first();
        $pdes=ParentDescription::orderBy('id','desc')->get();
        return view('admin.child_description.edit',['cats'=>$cats,'pdes'=>$pdes,'categories_new'=>$categories_new]);
    }


    public function update(Request $request)
    {




        $category = ChildDescription::find($request->id);
        $category->parent_id = $request->parent_id;
        $category->description_child = $request->description_child;
        $category->description_category = $request->description_category;
        $category->save();


        //product table slug update code



        //product table slug update code
        Toastr::success('Successfully Updated :)' ,'Success');
        return redirect()->route('admin.child_description');
    }
}
