<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Image;
use App\Category;
use App\Volume;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class VolumeController extends Controller
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

     	if (is_null($this->user) || !$this->user->can('volume.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any volume !');
        }

    	$categories=Volume::orderBy('id','desc')->get();
    	return view('admin.volume.manage',['categories'=>$categories]);
    }


     public function create(){
     	if (is_null($this->user) || !$this->user->can('volume.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any volume !');
        }
     return view('admin.volume.create');
    }


   



     public function store(Request $request)
    {
       $this->validate($request,[
            'name' => 'required'
          
        ]);


      

    

        $category = new Volume();
        $category->name = $request->name;
        $category->slug =Str::slug($request->name);
        $category->status = $request->status;
        
        $category->save();
        Toastr::success('Successfully Saved :)' ,'Success');
        return redirect()->route('admin.volume');
    }

    public function destroy($id)
    {
    	if (is_null($this->user) || !$this->user->can('volume.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any volume !');
        }
        Volume::find($id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }

    public function edit($slug)
    {
    	if (is_null($this->user) || !$this->user->can('volume.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any volume !');
        }
         $cats=Volume::where('id',$slug)->first();;
         return view('admin.volume.edit',['cats'=>$cats]);
    }


     public function update(Request $request)
    {
       $this->validate($request,[
            'name' => 'required'
          
        ]);

    

        $category = Volume::find($request->id);
        $category->name = $request->name;
        $category->slug =Str::slug($request->name);
        $category->status = $request->status;
        $category->save();


        //product table slug update code 



        //product table slug update code 
        Toastr::success('Successfully Updated :)' ,'Success');
        return redirect()->route('admin.volume');
    }
}
