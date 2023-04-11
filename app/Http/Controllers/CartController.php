<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Image;
use App\Product;
use App\Category;
use App\Subcategory;
use App\Brand;
use App\Photo;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
class CartController extends Controller
{
    public function cart(){


        $cartCollection = \Cart::getContent();
        // dd($cartCollection);
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

// return $cart_data;
        return view('front.cart', compact('cartCollection','cookie_data','cart_data'));
    }

    public function add(Request $request){


        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        }
        else
        {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    $cart_data[$keys]["item_quantity"] = $request->input('quantity');
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Already Added to Cart','status2'=>'2']);
                }
            }
        }
        else
        {

            $photo_one = Photo::where('product_id',$prod_id)->value('image');
            $products = Product::find($prod_id);
            $prod_name = $products->product_name;
            $prod_slug = $products->product_slug;
            $prod_image = $photo_one;
            $priceval = $products->sell_price;

            if($products)
            {
                $item_array = array(
                    'item_id' => $prod_id,
                    'item_name' => $prod_name,
                    'item_slug' => $prod_slug,
                    'item_quantity' => $quantity,
                    'item_price' => $priceval,
                    'item_image' => $prod_image
                );
                $cart_data[] = $item_array;

                $item_data = json_encode($cart_data);
                $minutes = 60;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return response()->json(['status'=>'"'.$prod_name.'" Added to Cart']);
            }
        }
	}




    public function cartloadbyajax()
    {
        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $totalcart = count($cart_data);

            echo json_encode(array('totalcart' => $totalcart)); die;
            return;
        }
        else
        {
            $totalcart = "0";
            echo json_encode(array('totalcart' => $totalcart)); die;
            return;
        }
    }



    public function load_cart_data_all_data()
    {
        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $data = json_decode($cookie_data, true);
            //$totalcart = count($cart_data);

            return response()->json($data);
        }
        else
        {
            $data = "0";
            return response()->json($data);
        }
    }



    public function clearcart()
    {
        Cookie::queue(Cookie::forget('shopping_cart'));
        return response()->json(['status'=>'Your Cart is Cleared']);
    }



    public function updatetocart(Request $request)
    {
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);

            $item_id_list = array_column($cart_data, 'item_id');
            $prod_id_is_there = $prod_id;

            if(in_array($prod_id_is_there, $item_id_list))
            {
                foreach($cart_data as $keys => $values)
                {
                    if($cart_data[$keys]["item_id"] == $prod_id)
                    {
                        $cart_data[$keys]["item_quantity"] =  $quantity;
                        $ttprice =($cart_data[$keys]["item_price"]*$quantity);
                        $grand_total_price = number_format($ttprice);
                        $item_data = json_encode($cart_data);
                        $minutes = 60;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                        return response()->json([
                            'status'=>'"'.$cart_data[$keys]["item_name"].'" Quantity Updated',
                            'gtprice'=>''.$grand_total_price.''
                            ]);
                    }
                }
            }
        }
    }



    public function updatetocart_side_bar(Request $request)
    {
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);

            $item_id_list = array_column($cart_data, 'item_id');
            $prod_id_is_there = $prod_id;

            if(in_array($prod_id_is_there, $item_id_list))
            {
                foreach($cart_data as $keys => $values)
                {
                    if($cart_data[$keys]["item_id"] == $prod_id)
                    {
                        $cart_data[$keys]["item_quantity"] =  $quantity;
                        $ttprice =($cart_data[$keys]["item_price"]*$quantity);
                        $grand_total_price = number_format($ttprice);
                        $item_data = json_encode($cart_data);
                        $minutes = 60;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                        return response()->json([
                            'status'=>'"'.$cart_data[$keys]["item_name"].'" Quantity Updated',
                            'gtprice'=>''.$grand_total_price.''
                            ]);
                    }
                }
            }
        }
    }





    public function deletefromcart(Request $request)
    {
        $prod_id = $request->input('product_id');

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status'=>'Item Removed from Cart']);
                }
            }
        }
    }


    public function deletefromcart_sidebar(Request $request)
    {
        $prod_id = $request->input('product_id');

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status'=>'Item Removed from Cart and sidebar']);
                }
            }
        }
    }



    public function add_single(Request $request){







            // dd($request);
            \Cart::add(array(
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,

                'attributes' => array(
                    'image' => $request->img,
                    'product_slug' => $request->product_slug,
                    'reward_point_product_count' => $request->reward_point_product_count,
                )
            ));






            try{
            //Toastr::success('Item Add 🙂' ,'Success');
            //$request->session()->flush();
            //$request->session()->put('cart_product_name',$name);

            return route('index');



            }catch(\Exception $e){

                return 1;

            }








    }

    public function update(Request $request){

        if($request->clear_cart == 'delete_data_single'){

            \Cart::remove($request->del_id);

        }elseif($request->clear_cart == 'delete_data'){

            \Cart::clear();

        }else{


        //multiple update
        $input = $request->all();
        $product_id = $input['id'];
        $product_quantity = $input['quantity'];



        //dd($product_quantity);



        foreach ($product_id as $key1 => $product_id) {
            // $detailorder = new Product_des;
            // $detailorder->pdes = $input['pdes'][$key1];
            // $detailorder->cdes = $input['cdes'][$key1];

            // $detailorder->product_id = $request->id;
            // $detailorder->save();


            \Cart::update($input['id'][$key1],
			array(
				'quantity' => array(
					'relative' => false,
					'value' => $input['quantity'][$key1]
				),
			));



            }


        //multiple update

    }


        //Toastr::success('Successully Updated 🙂' ,'Success');
		return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
	}

    public function remove(Request $request){

		\Cart::remove($request->id);
        //Toastr::warning('Successully Deleted 🙂' ,'Success');
		return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
	}

    public function clear(){

		\Cart::clear();
        //Toastr::warning('Successully Deleted 🙂' ,'Success');
		return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
	}



    public function quantity_increase_dcrease(Request $request){



        $id=$request->customerId1;


        $quantity=$request->customerId + 1;


        \Cart::update($id,
			array(
				'quantity' => array(
					'relative' => false,
					'value' => $quantity
				),
			));



        return 1;




    }



    public function quantity_increase_dcrease_last(Request $request){



        $id=$request->customerId1;


        $quantity=$request->customerId - 1;


        \Cart::update($id,
			array(
				'quantity' => array(
					'relative' => false,
					'value' => $quantity
				),
			));



        return 1;




    }
}
