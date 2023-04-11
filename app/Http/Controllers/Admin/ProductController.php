<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Image;
use App\Category;
use App\Subcategory;
use App\Volume;
use App\Supplier;
use App\Product_des;
use App\Photo;
use App\Stock;
use App\RewardPoint;
use App\Brand;
use App\Product;
use App\ParentDescription;
use App\ChildDescription;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
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

     	if (is_null($this->user) || !$this->user->can('product.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any product !');
        }

    	$categories=Category::orderBy('id','desc')->get();
    	$brands=Brand::orderBy('id','desc')->get();
        $products=Product::orderBy('id','desc')->get();
    	return view('admin.product.manage',['categories'=>$categories,'brands'=>$brands,'products'=>$products]);
    }


     public function create(){
     	if (is_null($this->user) || !$this->user->can('product.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any product !');
        }
        $categories=Category::orderBy('id','desc')->get();
        $subcats = Subcategory::orderBy('id','desc')->get();
        $brands = Brand::orderBy('id','desc')->get();
        $suppliers = Supplier::orderBy('id','desc')->get();
        $cdes=ChildDescription::orderBy('id','desc')->select('description_category')->distinct('description_category')->get();
        $rewards = RewardPoint::orderBy('id','desc')->get();
        $volumes = Volume::orderBy('id','desc')->get();
     return view('admin.product.create',[
         'categories'=>$categories,
         'subcats'=>$subcats,
         'brands'=>$brands,
         'suppliers'=>$suppliers,
         'cdes'=>$cdes,
         'rewards'=>$rewards,
         'volumes'=>$volumes,
         ]);
    }
    public function view($id){

        if (is_null($this->user) || !$this->user->can('product.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any product !');
        }


        $products=Product::where('id',$id)->orderBy('id','desc')->first();

        $category_id=Product::where('id',$id)->value('category_slug');
        $category_name=Category::where('category_slug',$category_id)->value('category_name');


        $subcategory_id=Product::where('id',$id)->value('subcategory_slug');
        $subcategory_name=Subcategory::where('subcategory_slug',$subcategory_id)->value('subcategory_name');


        $brand_id=Product::where('id',$id)->value('brand_id');
        $brand_name=Brand::where('id',$brand_id)->value('name');



        $volume_id=Product::where('id',$id)->value('volume_id');
        $volume_name=Volume::where('id',$volume_id)->value('name');



        $reward_id=Product::where('id',$id)->value('reward_id');
        $reward_name=RewardPoint::where('id',$reward_id)->value('name');


        $supplier_id=Product::where('id',$id)->value('supplier_id');
        $supplier_name=Supplier::where('id',$supplier_id)->value('name');


        $image_list = Photo::where('product_id',$id)->get();


        $des_list = Product_des::where('product_id',$id)->get();



        return view('admin.product.view',[
            'products'=>$products,
            'category_name'=>$category_name,
            'subcategory_name'=>$subcategory_name,
            'brand_name'=>$brand_name,
            'volume_name'=>$volume_name,
            'reward_name'=>$reward_name,
            'supplier_name'=>$supplier_name,
            'image_list'=>$image_list,
            'des_list'=>$des_list,
            ]);

    }


    public function destroy($id)
    {
    	if (is_null($this->user) || !$this->user->can('product.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any product !');
        }
         Product::find($id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();
    }



    public function product_img_delete($id){



        if (is_null($this->user) || !$this->user->can('product.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any product image !');
        }
        Photo::find($id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->back();





    }


    public function select_people(Request $request)

    {
     $subcategory=Subcategory::where('category_slug',$request->catId)->get();
     return response()->json($subcategory);
    }


    public function select_people_des(Request $request)

    {
     $subcategory=ChildDescription::where('description_category',$request->catId)->get();
     return response()->json($subcategory);
    }


    public function store1(Request $request)
    {
    	$imageName = request()->file->getClientOriginalName();
        request()->file->move(public_path('upload'), $imageName);


    	return response()->json(['uploaded' => '/upload/'.$imageName]);
    }






     public function store(Request $request)
    {





         $input_search = $request->all();
         $condition_search = $input_search['image'];
         $result_search = reset($condition_search);


         $image_name_for_product_table=$result_search->getClientOriginalName();

         //dd($image_name_for_product_table);

       $this->validate($request,[
            'product_name' => 'required',
            'category_slug' => 'required',

            'brand_id' => 'required',
            'sell_price' => 'required',
            'unit' => 'required',
            'volume_id' => 'required',
            'reward_id' => 'required',
            'reward_point_product_count' => 'required',
            'status' => 'required',

        ]);






        $category = new Product();
        $category->product_name = $request->product_name;
        $category->category_slug = $request->category_slug;
        $category->subcategory_slug = $request->subcategory_slug;
        $category->product_slug = Str::slug($request->product_name);
        $category->product_code = mt_rand(1000000, 9999999);
        $category->brand_id = $request->brand_id;
        $category->des = $request->des;
        $category->buy_price = $request->buy_price;
        $category->sell_price = $request->sell_price;
        $category->short_des = $request->short_des;
        $category->unit = $request->unit;
        $category->sh =   $image_name_for_product_table;
        $category->volume_id = $request->volume_id;
        $category->reward_id = $request->reward_id;
        $category->reward_point_product_count = $request->reward_point_product_count;
        $category->discount_type = $request->discount_type;
        $category->discount_amount = $request->discount_amount;
        $category->supplier_id = $request->supplier_id;
        $category->stock_unit = $request->stock_unit;
        $category->alert_quantity = $request->alert_quantity;
        $category->purchase_limit = $request->purchase_limit;
        $category->status = $request->status;
        $category->save();

        $productId = $category->id;


        $input = $request->all();
        $condition = $input['image'];

        foreach($condition as $key => $condition){
            $form= new Photo();
            $file=$input['image'][$key];
            $name=$file->getClientOriginalName();
            $file->move('public/upload/', $name);
            $form->image=$name;
            $form->product_id =  $productId;
            $form->save();
       }





       $parentDescription = $input['pdes'];
//dd($input);

         foreach ($parentDescription as $key1 => $parentDescription) {
            $detailorder = new Product_des;
            $detailorder->pdes = $input['pdes'][$key1];
            $detailorder->cdes = $input['cdes'][$key1];

            $detailorder->product_id = $productId;
            $detailorder->save();
            }


            $stock_store = new Stock();
            $stock_store->stock = $request->stock_unit;
            $stock_store->product_id = $productId;
            $stock_store->save();




        Toastr::success('Successfully Saved :)' ,'Success');
        return redirect()->route('admin.product');
    }



    public function edit($id)
    {
    	if (is_null($this->user) || !$this->user->can('product.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to create any product !');
        }
        $categories=Category::orderBy('id','desc')->get();
        $subcats = Subcategory::orderBy('id','desc')->get();
        $brands = Brand::orderBy('id','desc')->get();
        $suppliers = Supplier::orderBy('id','desc')->get();
        //$cdes=ChildDescription::orderBy('id','desc')->get();
        $cdes=ChildDescription::orderBy('id','desc')->select('description_category')->distinct('description_category')->get();
        $rewards = RewardPoint::orderBy('id','desc')->get();
        $volumes = Volume::orderBy('id','desc')->get();

        $products=Product::where('id',$id)->orderBy('id','desc')->first();

        $image_list = Photo::where('product_id',$id)->get();


        $des_list = Product_des::where('product_id',$id)->latest()->get();



     return view('admin.product.edit',[
         'categories'=>$categories,
         'subcats'=>$subcats,
         'brands'=>$brands,
         'suppliers'=>$suppliers,
         'cdes'=>$cdes,
         'rewards'=>$rewards,
         'volumes'=>$volumes,
         'products'=>$products,
         'image_list'=>$image_list,
         'des_list'=>$des_list,
         ]);
    }


     public function update(Request $request)
    {




        $category = Product::find($request->id);
        $category->product_name = $request->product_name;
        $category->category_slug = $request->category_slug;
        $category->subcategory_slug = $request->subcategory_slug;
        $category->product_slug = Str::slug($request->product_name);
        $category->brand_id = $request->brand_id;
        $category->des = $request->des;
        $category->sh = $request->sh;
        $category->buy_price = $request->buy_price;
        $category->short_des = $request->short_des;
        $category->sell_price = $request->sell_price;
        $category->unit = $request->unit;
        $category->volume_id = $request->volume_id;
        $category->reward_id = $request->reward_id;
        $category->reward_point_product_count = $request->reward_point_product_count;
        $category->discount_type = $request->discount_type;
        $category->discount_amount = $request->discount_amount;
        $category->supplier_id = $request->supplier_id;
        $category->stock_unit = $request->stock_unit;
        $category->alert_quantity = $request->alert_quantity;
        $category->purchase_limit = $request->purchase_limit;
        $category->status = $request->status;
        $category->save();

        $productId = $category->id;

        //$deletePhoto = Photo::where('product_id',$request->id)->delete();


         $input = $request->all();
       $parentDescription = $input['pdes'];

       //dd($parentDescription);

       $first_value = reset($parentDescription);


      // dd($first_value);










       if($first_value == '0'){

//dd('ok');

DB::table('stocks')->where('product_id', $request->id)->update(array('stock' => $request->stock_unit));

       }else{


//dd('ok1');

         $parentDescription = $input['pdes'];
//dd($input);

         foreach ($parentDescription as $key1 => $parentDescription) {
            $detailorder = new Product_des;
            $detailorder->pdes = $input['pdes'][$key1];
            $detailorder->cdes = $input['cdes'][$key1];

            $detailorder->product_id = $request->id;
            $detailorder->save();
            }


            DB::table('stocks')->where('product_id', $request->id)->update(array('stock' => $request->stock_unit));








       }










        Toastr::success('Successfully Updated :)' ,'Success');
        return redirect()->route('admin.product');
    }


    //edit product
    public function update1(Request $request)
    {
      $new = $request->productid;


      $desedt=Product_des::where('id',$new)->value('pdes');

      $desedt_id=Product_des::where('id',$new)->value('product_id');

$cdesnewedit=ChildDescription::where('description_category',$desedt)->orderBy('id','desc')->get();

        return view('admin.product.editDes',['desedt'=>$desedt,'cdesnewedit'=>$cdesnewedit,'new'=>$new,'desedt_id'=>$desedt_id]);
    }


      public function update12(Request $request)
    {




        $category = Product_des::find($request->id);
        $category->pdes = $request->pdes;
        $category->cdes = $request->cdes;
        $category->save();


        //product table slug update code



        //product table slug update code
        Toastr::success('Successfully Updated :)' ,'Success');
        return redirect()->route('admin.product.edit',$request->product_id);
    }



     public function update1image(Request $request)
    {
      $new = $request->productidimage;


      $imageEdit=Photo::where('id',$new)->value('image');

      $ProductId=Photo::where('id',$new)->value('product_id');



        return view('admin.product.editImage',['ProductId'=>$ProductId,'imageEdit'=>$imageEdit,'new'=>$new]);
    }



      public function updateimg(Request $request)
    {




        $category = Photo::find($request->id);
         if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/upload/', $filename);
            $category->image = $filename;
        }

        $category->save();


        //product table slug update code



        //product table slug update code
        Toastr::success('Successfully Updated :)' ,'Success');
        return redirect()->route('admin.product.edit',$request->product_id);
    }



     public function addimage(Request $request)
    {
      $new = $request->productid;





        return view('admin.product.addImage',['new'=>$new]);
    }



   public function addimg(Request $request)
    {




        $category = new Photo();
         if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/upload/', $filename);
            $category->image = $filename;
        }
        $category->product_id = $request->product_id;
        $category->save();


        //product table slug update code



        //product table slug update code
        Toastr::success('Successfully Updated :)' ,'Success');
        return redirect()->route('admin.product.edit',$request->product_id);
    }


public static function stock($id)
    {
      $stock=Photo::where('product_id',$id)->value('image');

      return $stock;
    }



    public static function brand_name($id)
    {
      $brand_name=Brand::where('id',$id)->value('name');

      return $brand_name;
    }


}
