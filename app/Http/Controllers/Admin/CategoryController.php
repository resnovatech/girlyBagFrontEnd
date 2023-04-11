<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Image;
use App\Category;
use App\Brand;
use App\Subcategory;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
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

     	if (is_null($this->user) || !$this->user->can('category.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any category !');
        }

    	$categories=Category::orderBy('id','desc')->get();
    	return view('admin.category.manage',['categories'=>$categories]);
    }


     public function create(){
     	if (is_null($this->user) || !$this->user->can('category.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any category !');
        }
     return view('admin.category.create');
    }


     protected function imageUpload($request)
    {
        $productImage = $request->file('icon');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'public/upload/';
        $imageUrl = $directory . $imageName;

        Image::make($productImage)->save($imageUrl);

        return $imageUrl;
    }



     public function store(Request $request)
    {
       $this->validate($request,[
            'category_name' => 'required'

        ]);


        if ($request->file('icon') !== null) {
            $image = $this->imageUpload($request);
        } else {
            $image = 'null';
        }



        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_slug =Str::slug($request->category_name);
        $category->status = $request->status;
        $category->icon = $image;
        $category->save();
        Toastr::success('Successfully Saved :)' ,'Success');
        return redirect()->route('admin.category');
    }

    public function destroy($id)
    {
    	if (is_null($this->user) || !$this->user->can('category.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any category !');
        }
         Category::find($id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }

    public function edit($slug)
    {
    	if (is_null($this->user) || !$this->user->can('category.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any category !');
        }
         $cats=Category::where('id',$slug)->first();;
         return view('admin.category.edit',['cats'=>$cats]);
    }


     public function update(Request $request)
    {
       //sucat table slug update
            $findCatSlug = Category::where('id',$request->id)->value('category_slug');

            $updateCAtname = $request->category_name;


            $updateSlug = Str::slug($request->category_name);


            Subcategory::where('category_slug', $findCatSlug)->update([
                'category_slug' => $updateSlug
             ]);


             Brand::where('cat_id', $findCatSlug)->update([
                'cat_id' => $updateSlug
             ]);



       //subcat table slug update



       //product table slug update

       Product::where('category_slug', $findCatSlug)->update([
        'category_slug' => $updateSlug
     ]);

       //product table slug Update



        $category = Category::find($request->id);
        $category->category_name = $request->category_name;
        $category->category_slug =Str::slug($request->category_name);
        $category->status = $request->status;

          if ($request->hasfile('icon')) {
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/upload/', $filename);
            $category->icon = 'public/upload/' . $filename;
        }
        $category->save();


        $update_slug = $category->category_slug;


        //product table slug update code



        //product table slug update code
        Toastr::success('Successfully Updated :)' ,'Success');
        return redirect()->route('admin.category');
    }
}
