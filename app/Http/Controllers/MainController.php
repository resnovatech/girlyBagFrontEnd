<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Photo;
use App\Product;
use App\Brand;
use App\Category;
use App\ShipAddress;
use App\Cupon;
use App\Shipping;
use App\ShippingCharge;
use Session;
use App\Product_des;
use App\ParentDescription;
use App\ChildDescription;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Admin\ProductController;

class MainController extends Controller
{


    public function Calender()
    {
        $cartCollection = \Cart::getContent();
        return view('front.calender', compact('cartCollection'));
    }

    public function calender1(Request $request)
    {
        $duration = (int)$request->duration - 1;
        $request = $request;
        $date = '';
        $start_date = Carbon::create($request->date);
        $s_year = $start_date->year;
        $s_month = $start_date->month - 1;
        $s_day = $start_date->day;

        $cycle_date = $request->cycle;

        $end_date = $start_date->addDays($duration);
        $e_year = $end_date->year;
        $e_month = $end_date->month - 1;
        $e_day = $end_date->day;

        $start_date = $start_date->toDateString();


        $cartCollection = \Cart::getContent();
        return view('front.calender1', compact('cartCollection', 'request', 'date', 's_day', 's_month', 's_year', 'e_day', 'e_month', 'e_year', 'cycle_date', 'duration'));

    }

    public function index()
    {
        $product_napkin = Product::where('category_slug', 'sanitary-napkin')->latest()->limit(4)->get();
        $product_diaper = Product::where('category_slug', 'diaper')->latest()->limit(4)->get();
        $photos = Photo::latest()->get();
        $index_photo = Photo::limit(1)->get();
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));

        $cartCollection = json_decode($cookie_data, true);
        $brands = Brand::all();

        return view('front.index', ['product_diaper' =>
            $product_diaper, 'product_napkin' => $product_napkin,
            'photos' => $photos, 'index_photo' => $index_photo, 'cartCollection' => $cartCollection, 'brands' => $brands]);
    }


    public function single_category(Request $request)
    {


        $productid = $request->productid;


        $products_new = Product::where('id', $productid)->latest()->first();

        $secondImage = Photo::where('product_id', $productid)->value('image');

        $cartCollection = \Cart::getContent();

        return view('front.single_product', ['products_new' => $products_new, 'secondImage' => $secondImage, 'cartCollection' => $cartCollection]);
    }


    public function single_category1(Request $request)
    {


        $productid = $request->productid1;


        $products_new = Product::where('id', $productid)->latest()->first();

        $secondImage = Photo::where('product_id', $productid)->value('image');

        $cartCollection = \Cart::getContent();

        return view('front.single_product1', ['products_new' => $products_new, 'secondImage' => $secondImage, 'cartCollection' => $cartCollection]);
    }


    public function product_single_view($slug)
    {

        $category_slug = Product::where('product_slug', $slug)->value('category_slug');
        $product_id = Product::where('product_slug', $slug)->value('id');

        $category_name = Category::where('category_slug', $category_slug)->value('category_name');


        $cartCollection = \Cart::getContent();

        $product_single_view = Product::where('product_slug', $slug)->first();

        $product_photo = Photo::where('product_id', $product_id)->get();


        $randomOder_list = Product::where('category_slug', $category_slug)->inRandomOrder()->limit(8)->get();


        $brands = Brand::all();


        return view('front.single_product_new_view', ['category_name' => $category_name, 'product_single_view' => $product_single_view,
            'product_photo' => $product_photo, 'randomOder_list' => $randomOder_list, 'cartCollection' => $cartCollection, 'brands' => $brands]);


    }


    public function about()
    {

        $cartCollection = \Cart::getContent();
        return view('front.about', ['cartCollection' => $cartCollection]);
    }


    public function contact()
    {
        $cartCollection = \Cart::getContent();
        return view('front.contact', ['cartCollection' => $cartCollection]);

    }


    public function blog()
    {
        $cartCollection = \Cart::getContent();
        return view('front.blog', ['cartCollection' => $cartCollection]);

    }


    public static function stock1($id)
    {
        $stock1 = ShipAddress::where('user_id', $id)->count();

        return $stock1;
    }


    public function category($url =null,Request $request)
    {
        $cartCollection = \Cart::getContent();
        $random_product_list = Product::where('category_slug', 'sanitary-napkin')->get();

        $randomOder_list = Product::inRandomOrder()->limit(8)->get();


        $category_wise_product_view = Category::where('id',7)->get();

        //dd($category_wise_product_view);

        $category_wise_product_view_inactive = Category::whereIn('id',[2,6])->get();


        $category_wise_product_view_inactive1 = Category::orderBy('id','desc')->get();

        if(Session::has('filter_category_name')){


            $category_name = Session::get('filter_category_name');


            $category_id = Category::where('category_name',$category_name)->value('id');

            $parent_description_active_product = ParentDescription::where('parent_id', $category_id)->latest()->get();

        }else{


        $parent_description_active_product = ParentDescription::where('parent_id', 6)->latest()->get();
    }

        $child_description_active_product = ChildDescription::latest()->get();


        $brands = Brand::all();


        $category_wise_brand_list = Brand::latest()->get();



        $cat_id_brand = Session::get('filter_category_name');


        $cat_slug_brand = Category::where('category_name',$cat_id_brand)->value('category_slug');

        if(Session::get('filter_category_name') == 'All'){


        $category_wise_brand_list_diaper = Brand::latest()->get();
        }else{
//dd('ww');
            $category_wise_brand_list_diaper = Brand::where('cat_id',$cat_slug_brand)->get();

           // dd($category_wise_brand_list_diaper);

        }

        //Session::put('brand_wise_product_list',$brandArray);

        //brand wise work


        if(Session::has('filter_category_name')){
           //dd('ok1');
            $brand_wise_product_list=Session::get('brand_wise_product_list');
            $child_des_name = Session::get('child_des_name_list');
            $cat_slug=Session::get('filter_category_slug');


            //all product code
if(Session::get('filter_category_name') == 'All'){

    $brand_wise_product_list=Session::get('brand_wise_product_list');
            $child_des_name = Session::get('child_des_name_list');
            $cat_slug=Session::get('filter_category_slug');

//dd(1);

     //dd( $cat_slug);


 if(empty($brand_wise_product_list)){

    $emptyBrandcheck = 1;

   }

else{
    $emptyBrandcheck = array_filter($brand_wise_product_list);

}


if(empty($child_des_name)){

    $emptyChildcheck = 2;
}else{

    $emptyChildcheck = array_filter($child_des_name);
}



//dd($brand_wise_product_list);

//dd($brand_wise_product_list);

//dd($child_des_name);


//dd($emptyBrandcheck);


    //dd($brand_wise_product_list);

    if(empty($child_des_name) && empty($brand_wise_product_list)){

       // dd(144);


        $child_description_active_productchild_product_id = ChildDescription::latest()->get();

        $product_show_category_brand_wise = Product::inRandomOrder()->paginate(12);

        $brand_name = Brand::latest()->get();

        //dd($product_show_category_brand_wise);





    }elseif($emptyChildcheck == [] && $emptyBrandcheck == []){

        //dd(12);
        $child_description_active_productchild_product_id = ChildDescription::latest()->get();

        $product_show_category_brand_wise =
        Product::inRandomOrder()->paginate(12);


       // dd($product_show_category_brand_wise);

        $brand_name = Brand::latest()->get();







    }elseif($emptyChildcheck == []){
       //dd('23w');
        $product_show_category_brand_wise = Product::whereIn('brand_id',$brand_wise_product_list)
        ->inRandomOrder()->paginate(12);
       // dd($product_show_category_brand_wise);

        $child_description_active_productchild_product_id = ChildDescription::latest()->get();




          $brand_name = Brand::whereIn('id',$brand_wise_product_list)->get();







    }elseif($emptyBrandcheck == []){

       // dd('23w33');
        $filter_category_name_child_product_id = Product_des::whereIn('cdes',$child_des_name)->select('product_id')->distinct('product_id')->get();
$child_description_active_productchild_product_id = ChildDescription::whereIn('description_child',$child_des_name)->latest()->get();

$product_show_category_brand_wise= Product::whereIn('id', $filter_category_name_child_product_id)

->inRandomOrder()->paginate(12);

$brand_name = Brand::latest()->get();



    }else{


//dd('43');

            $filter_category_name_child_product_id = Product_des::whereIn('cdes',$child_des_name)->select('product_id')->distinct('product_id')->get();
            //dd($filter_category_name_child_product_id);
            $child_description_active_productchild_product_id = ChildDescription::whereIn('description_child',$child_des_name)->latest()->get();
            //dd($child_description_active_productchild_product_id);
            $brand_name = Brand::whereIn('id',$brand_wise_product_list)->get();

           // dd($brand_name);

            $product_show_category_brand_wise= Product::whereIn('id', $filter_category_name_child_product_id)
            ->whereIn('brand_id',$brand_wise_product_list)
            ->orderBy('created_at','DESC')->paginate(12);




    }


}else{

    $brand_wise_product_list=Session::get('brand_wise_product_list');
            $child_des_name = Session::get('child_des_name_list');
            $cat_slug=Session::get('filter_category_slug');

 //dd( $cat_slug);


 if(empty($brand_wise_product_list)){

    $emptyBrandcheck = 1;

   }

else{
    $emptyBrandcheck = array_filter($brand_wise_product_list);

}


if(empty($child_des_name)){

    $emptyChildcheck = 2;
}else{

    $emptyChildcheck = array_filter($child_des_name);
}



//dd($brand_wise_product_list);

//dd($brand_wise_product_list);

//dd($child_des_name);


//dd($emptyBrandcheck);


    //dd($brand_wise_product_list);

    if(empty($child_des_name) && empty($brand_wise_product_list)){

        //dd(144);


        $child_description_active_productchild_product_id = ChildDescription::latest()->get();

        $product_show_category_brand_wise = Product::where('category_slug',$cat_slug)
        ->orderBy('created_at','DESC')->paginate(12);

        $brand_name = Brand::latest()->get();

        //dd($product_show_category_brand_wise);





    }elseif($emptyChildcheck == [] && $emptyBrandcheck == []){

    //dd(12);

        $child_description_active_productchild_product_id = ChildDescription::latest()->get();

        $product_show_category_brand_wise =
        Product::where('category_slug',$cat_slug)->orderBy('created_at','DESC')->paginate(12);


       // dd($product_show_category_brand_wise);

        $brand_name = Brand::latest()->get();







    }elseif($emptyChildcheck == []){
       //dd($brand_wise_product_list);
        $product_show_category_brand_wise = Product::where('category_slug',$cat_slug)->whereIn('brand_id',$brand_wise_product_list)
        ->orderBy('created_at','DESC')->paginate(12);
        //dd($product_show_category_brand_wise);

        $child_description_active_productchild_product_id = ChildDescription::latest()->get();




          $brand_name = Brand::whereIn('id',$brand_wise_product_list)->get();







    }elseif($emptyBrandcheck == []){

        ////dd('23w33');
        $filter_category_name_child_product_id = Product_des::whereIn('cdes',$child_des_name)->select('product_id')->distinct('product_id')->get();
$child_description_active_productchild_product_id = ChildDescription::whereIn('description_child',$child_des_name)->latest()->get();

$product_show_category_brand_wise= Product::whereIn('id', $filter_category_name_child_product_id)->where('category_slug',$cat_slug)
->orderBy('created_at','DESC')->paginate(12);

$brand_name = Brand::latest()->get();



    }else{


//dd('43');

            $filter_category_name_child_product_id = Product_des::whereIn('cdes',$child_des_name)->select('product_id')->distinct('product_id')->get();
            //dd($filter_category_name_child_product_id);
            $child_description_active_productchild_product_id = ChildDescription::whereIn('description_child',$child_des_name)->latest()->get();
            //dd($child_description_active_productchild_product_id);
            $brand_name = Brand::whereIn('id',$brand_wise_product_list)->get();

           // dd($brand_name);

            $product_show_category_brand_wise= Product::whereIn('id', $filter_category_name_child_product_id)
            ->whereIn('brand_id',$brand_wise_product_list)->where('category_slug',$cat_slug)
            ->orderBy('created_at','DESC')->paginate(12);




    }






}


            //all product code





        }elseif(Session::has('brand_wise_product_list')){

            //dd('t');

            $brand_wise_product_list=Session::get('brand_wise_product_list');
            $child_des_name = Session::get('child_des_name_list');
            $cat_slug=Session::get('filter_category_slug');


            //dd($brand_wise_product_list);


           if(empty($brand_wise_product_list)){

            $emptyBrandcheck = 1;

           }

else{
            $emptyBrandcheck = array_filter($brand_wise_product_list);

        }


        if(empty($child_des_name)){

            $emptyChildcheck = 2;
        }else{

            $emptyChildcheck = array_filter($child_des_name);
        }



       //dd($emptyBrandcheck);


        //dd($child_des_name);


            //dd($brand_wise_product_list);

            if($emptyChildcheck == [] && $emptyBrandcheck == []){

                //dd('1b');


                $child_description_active_productchild_product_id = ChildDescription::latest()->get();

                $product_show_category_brand_wise = Product::inRandomOrder()->paginate(12);

                $brand_name = Brand::latest()->get();



            }elseif($emptyChildcheck == []){
              // dd('2b');
                $product_show_category_brand_wise = Product::whereIn('brand_id',$brand_wise_product_list)
                ->inRandomOrder()->paginate(12);


                $child_description_active_productchild_product_id = ChildDescription::latest()->get();

            $brand_name = Brand::whereIn('id',$brand_wise_product_list)->get();






            }elseif($emptyBrandcheck == []){

                //dd('3b');
                $filter_category_name_child_product_id = Product_des::whereIn('cdes',$child_des_name)->select('product_id')->distinct('product_id')->get();
$child_description_active_productchild_product_id = ChildDescription::whereIn('description_child',$child_des_name)->latest()->get();

$product_show_category_brand_wise= Product::whereIn('id', $filter_category_name_child_product_id)
->inRandomOrder()->paginate(12);

//dd($product_show_category_brand_wise);

$brand_name = Brand::latest()->get();




            }else{


//dd('4b');

                    $filter_category_name_child_product_id = Product_des::whereIn('cdes',$child_des_name)->select('product_id')->distinct('product_id')->get();
                    //dd($filter_category_name_child_product_id);
                    $child_description_active_productchild_product_id = ChildDescription::whereIn('description_child',$child_des_name)->latest()->get();
                    //dd($child_description_active_productchild_product_id);
                    $brand_name = Brand::whereIn('id',$brand_wise_product_list)->get();

                   // dd($brand_name);

                    $product_show_category_brand_wise= Product::whereIn('id', $filter_category_name_child_product_id)
                    ->whereIn('brand_id',$brand_wise_product_list)
                   ->inRandomOrder()->paginate(12);



            }

        }else{

//dd('yy');
           //dd(Session::get('child_des_name'));

          $child_description_active_productchild_product_id = ChildDescription::latest()->get();
            $product_show_category_brand_wise = Product::
            inRandomOrder()->paginate(12);

            $brand_name = Brand::latest()->get();





        }


 $child_description_active_productchild_product_id = ChildDescription::latest()->get();
        //brand wise work


        //$product_show_category_brand_wise = Product::where('category_slug', 'sanitary-napkin')->get();


        return view('front.category_wise_product_view', [
            'random_product_list' => $random_product_list,
            'randomOder_list' => $randomOder_list, 'cartCollection' => $cartCollection,
            'category_wise_product_view' => $category_wise_product_view,
            'category_wise_product_view_inactive' => $category_wise_product_view_inactive,

            'parent_description_active_product' => $parent_description_active_product,
            'child_description_active_product' => $child_description_active_product,
            'category_wise_product_view_inactive1' => $category_wise_product_view_inactive1,
            'brands' => $brands,
            'category_wise_brand_list'=>$category_wise_brand_list,
            'category_wise_brand_list_diaper'=>$category_wise_brand_list_diaper,
            'url'=>$url,
            'product_show_category_brand_wise'=>$product_show_category_brand_wise,
            'brand_name'=>$brand_name,
            'child_description_active_productchild_product_id'=>$child_description_active_productchild_product_id


        ]);
    }


    public static function stock($id)
    {
        $stock = ShipAddress::where('user_id', $id)->first();

        return $stock;
    }


    public function cupon_check(Request $request)
    {


        $promo_code = $request->code;
        $total_price = $request->total_price;


        $payment_type = Cupon::where('code', $promo_code)->value('discount_type');
        $payment_amount = Cupon::where('code', $promo_code)->value('discount_amount');


        if ($payment_type = 0) {


            $final_price = $total_price - $payment_amount;


        } else {


            $percentage = ($total_price * $payment_amount) / 100;

            $final_price = $total_price - $percentage;


        }


        Session::put('payment_amount', $payment_amount);


        Session::put('final_price', $final_price);


        Session::put('percentage', $percentage);

        //Toastr::success('Success', 'Success');
        return redirect()->back();


    }


    public function filter_view(Request $request)
    {

        //Session::forget('brand_wise_product_list');


        $id = $request->customerId;


        //filter work


        $filter_category_name = Category::where('category_slug', $id)->value('category_name');

        $filter_category_product_detail = Product::where('category_slug', $id)->get();


        Session::put('filter_category_name', $filter_category_name);


        Session::put('filter_category_slug', $id);


        Session::put('filter_category_product_detail', $filter_category_product_detail);


        //filter work


        return 1;


    }


    public function filter_view_brand(Request $request)
    {


        $barnd_id = $request->customerIdbrand;

        //dd('ok');
        $category_slug_brand = Session::get('filter_category_slug');


        //filter work

        if (Session::has('filter_category_slug')) {

            $filter_category_product_detail_brand = Product::where('category_slug', $category_slug_brand)->where('brand_id', $barnd_id)->get();


        } else {
            $filter_category_product_detail_brand = Product::where('category_slug', 'sanitary-napkin')->where('brand_id', $barnd_id)->get();

        }


        //$filter_category_name = Category::where('category_slug', $id)->value('category_name');

        $filter_category_product_detail_brand = Product::where('category_slug', $category_slug_brand)->where('brand_id', $barnd_id)->get();


        Session::put('filter_category_brand_id_new', $barnd_id);


        //Session::put('filter_category_slug', $id);


        Session::put('filter_category_product_detail_brand', $filter_category_product_detail_brand);


        //filter work


        return 1;


    }


    public function filter_view1(Request $request)
    {

        //Session::forget('brand_wise_product_list');


        $input = $request->all();
        $condition = $input['child_desw'];


        //category wise check

        if (Session::has('filter_category_slug')) {

            // dd('ok');

//$new_array = json_encode(array_values($condition));


//dd($new_array);


//dd($filter_category_name_child_product_id);


            $child_description_active_productchild_product_id = ChildDescription::whereIn('description_child', $condition)->latest()->get();


//dd($child_description_active_productchild_product_id );

//$neww =

            $children_description_product_view = Product::whereIn('id', $filter_category_name_child_product_id)->where('category_slug', Session::get('filter_category_slug'))->get();


//dd($children_description_product_view);


//dd(Session::get('filter_category_slug'));


//dd($filter_category_name_child_product_id);

            Session::put('children_description_product_view', $children_description_product_view);
            Session::put('filter_category_name_child_product_id', $filter_category_name_child_product_id);


            Session::put('all_condition_new', $condition);


            Session::put('child_description_active_productchild_product_id', $child_description_active_productchild_product_id);

//dd($child_description_active_productchild_product_id);


        } else {
//dd('ok1');


            //$new_array = json_encode(array_values($condition));


//dd($new_array);


            $filter_category_name_child_product_id = Product_des::whereIn('cdes', $condition)->select('product_id')->distinct('product_id')->get();


//dd($filter_category_name_child_product_id);


            $child_description_active_productchild_product_id = ChildDescription::whereIn('description_child', $condition)->latest()->get();


//dd($child_description_active_productchild_product_id );

//$neww =

            $children_description_product_view = Product::whereIn('id', $filter_category_name_child_product_id)->where('category_slug', 'pad')->get();


//dd($children_description_product_view);


//dd(Session::get('filter_category_slug'));


//dd($filter_category_name_child_product_id);
            Session::put('children_description_product_view', $children_description_product_view);

            Session::put('filter_category_name_child_product_id', $filter_category_name_child_product_id);


            Session::put('all_condition_new', $condition);


            Session::put('child_description_active_productchild_product_id', $child_description_active_productchild_product_id);

//dd($child_description_active_productchild_product_id);


        }


        //category wise check


        return redirect()->back();


    }


    public function clear_all_data()
    {


        Session::forget('filter_category_name_child_product_id');
        Session::forget('all_condition_new');
        Session::forget('child_description_active_productchild_product_id');
        Session::forget('filter_category_name');
        Session::forget('filter_category_slug');
        Session::forget('filter_category_product_detail');
        Session::forget('brand_id_list');

        Session::forget('brand_wise_product_list');
        Session::forget('child_des_name_list');
        Session::forget('child_des_name');
        return redirect()->back();


    }

    public function blog1()
    {
        $cartCollection = \Cart::getContent();
        return view('front.blog1', ['cartCollection' => $cartCollection]);
    }


    public function filter(Request $request)
    {

        Session::forget('brand_wise_product_list');
        Session::forget('child_des_name_list');
        Session::forget('child_des_name');

        $data = $request->all();


        //dd($data);


        $brandUrl = "";


        if (!empty($data['maincategorybrand'])) {

            foreach ($data['maincategorybrand'] as $brand) {

                if (empty($brandUrl)) {

                    $brandUrl = $brand;
                } else {

                    $brandUrl .= "-" . $brand;
                }


            }

        }


        $childUrl = "";


        if (!empty($data['child_desw'])) {

            foreach ($data['child_desw'] as $child) {

                if (empty($childUrl)) {

                    $childUrl = $child;
                } else {

                    $childUrl .= "-" . $child;
                }


            }

        }

        //dd($brandUrl);


        Session::put('brand_id_list', $brandUrl);
        Session::put('child_des_name', $childUrl);

        //dd(Session::get('brand_id_list'));

        //$finalUrl ="products/"."brands"."?".$brandUrl;

        //dd($finalUrl);

        //return redirect::to($finalUrl);

        $brandArray = explode('-', Session::get('brand_id_list'));
        $childArray = explode('-', Session::get('child_des_name'));

        Session::put('brand_wise_product_list', $brandArray);
        Session::put('child_des_name_list', $childArray);


        //dd(Session::get('brand_wise_product_list'));


        $newwork = (Session::get('brand_wise_product_list'));

        $newwork1 = (Session::get('child_des_name_list'));

        //dd($newwork);


        return redirect()->back();

    }


    //load more data


    public function loadDataAjax(Request $request)
    {
        $output = '';
        $id = $request->id;

        $posts = Product::where('id', '<', $id)->orderBy('created_at', 'DESC')->limit(6)->get();

        if (!$posts->isEmpty()) {
            foreach ($posts as $post) {
                $single_product_url = url('product/' . $post->product_slug);
                $image_url = 'http://localhost/girlybaglastupdate/public/upload/' . $post->sh;
                $cart_url = url('/cart/add');
                $cart_new = url('/cart');


                // $body = substr(strip_tags($post->body),0,500);
                // $body .= strlen(strip_tags($post->body))>500?"...":"";


                $output .= '<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                <div class="prd-inside">

                <div class="prd-img-area">
                <a href="' . $single_product_url . '"
                    class="prd-img image-hover-scale image-container"
                    style="padding-bottom: 128.48%">
                    <img src="data:' . $image_url . '"
                        data-src="' . $image_url . '"
                        alt="Oversized Cotton Blouse" class="js-prd-img lazyload fade-up">
                    <div class="foxic-loader"></div>
                </a>
                <div class="prd-circle-labels">
                    <a href="#"
                        class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                        title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#"
                        class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                        title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                    <a href="#" class="circle-label-qview view-product prd-hide-mobile"
                        data-productid="' . $post->id . '"><i
                            class="icon-eye"></i><span>QUICK VIEW</span></a>
                </div>
            </div>

                </div>
                </div>';
            }

            $output .= '<div id="remove-row">
                            <button id="btn-more" data-id="' . $post->id . '" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" > Load More </button>
                        </div>';

            return $output;
        }
    }


    public function area_select(Request $request)
    {
        $id = $request->customerId;
        $shipId = Shipping::where('area', $id)->value('id');

        //($shipId);

        $price = ShippingCharge::where('ship_id', $shipId)->value('price');


        Session::put('area_name', $id);
        Session::put('ship_price', $price);
        return 1;
    }


}
