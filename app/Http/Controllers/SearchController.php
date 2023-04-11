<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Product;
use App\Brand;
use App\Category;
use App\ShipAddress;
use App\Cupon;
use Session;
use DB;
use Carbon\Carbon;
use App\Product_des;
use App\ParentDescription;
use App\ChildDescription;
use Illuminate\Support\Facades\Cookie;
class SearchController extends Controller
{
    public function autocomplete(Request $request){

        if($request->ajax())
        {
        $output="";
        $products=DB::table('products')->where('product_name','LIKE','%'.$request->search.'%')->get();


        if($products)
        {
        foreach ($products as $key => $product) {
        $output.='<tr>'.
        '<td>'.' <img src="http://localhost/girlybaglastupdate/public/upload/'.$product->sh.'"  class="searchImage"> '. '</td>'.
        '<td>'.'<a href="http://localhost/girlybaglastupdate/product/'.$product->product_slug.'">'.$product->product_name.'</a>'.'</td>'.

        //'<td>'.'<button onclick="singleData('.$product->product_slug.')">'.$product->product_name.'</button>'.'</td>'.

        '</tr>';
        }
        return Response($output);
           }
           }
    }


    public function search(Request $request)
    {

        $product_single_view = Product::where("product_name","LIKE","%{$request->input('search')}%")
             ->orwhere("product_slug","LIKE","%{$request->input('search')}%")
             ->first();

        $slug = Product::where("product_name","LIKE","%{$request->input('search')}%")
        ->orwhere("product_slug","LIKE","%{$request->input('search')}%")
        ->value('product_slug');

        $category_slug = Product::where('product_slug', $slug)->value('category_slug');
        $product_id = Product::where('product_slug', $slug)->value('id');

        $category_name = Category::where('category_slug', $category_slug)->value('category_name');


        $cartCollection = \Cart::getContent();

        //$product_single_view = Product::where('product_slug', $slug)->first();

        $product_photo = Photo::where('product_id', $product_id)->get();


        $randomOder_list = Product::where('category_slug', $category_slug)->inRandomOrder()->limit(8)->get();


        $brands = Brand::all();


        return view('front.search', ['category_name' => $category_name, 'product_single_view' => $product_single_view,
            'product_photo' => $product_photo, 'randomOder_list' => $randomOder_list, 'cartCollection' => $cartCollection, 'brands' => $brands]);

            // $product_show_category_brand_wise = Product::where("product_name","LIKE","%{$request->input('search')}%")
            // ->orwhere("product_slug","LIKE","%{$request->input('search')}%")
            // ->get();


    }
}
