<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerPeriodData;
use Illuminate\Support\Facades\Auth;
use DB;
class PeriodInfoController extends Controller
{
    public function period_information_update_input(Request $request){

//dd($request->id);
            //$mainIDFormData = $request->productid;


        $cupon_period_data = CustomerPeriodData::find($request->id);
        $cupon_period_data->user_id = Auth::user()->id;
        $cupon_period_data->period_date = $request->period_date;
        $cupon_period_data->total_days = $request->total_days;
        $cupon_period_data->cycle = $request->cycle;
        $cupon_period_data->status = 1;
        $cupon_period_data->save();

        $pId =$cupon_period_data->id;

         //new update code
         CustomerPeriodData::where('id', $pId)->update(array('update_date' => date('Y-m-d')));

         $customerIdDelete = CustomerPeriodData::where('user_id', Auth::user()->id)->where('id','>',$pId)->delete();
        //first level date

$firstDateFirstLevel =date('Y-m-d', strtotime($request->period_date. ' + '. $request->total_days .'days'));


$secondDateFirstLevel = date('Y-m-d', strtotime($firstDateFirstLevel. ' + '. $request->cycle .'days'));


//first Level Date



//second level date




//second level date


$firstDateSecondLevel =date('Y-m-d', strtotime($secondDateFirstLevel. ' + '. $request->total_days .'days'));


$secondDateSecondLevel = date('Y-m-d', strtotime($firstDateSecondLevel. ' + '. $request->cycle .'days'));


//third level date


$firstDateThirdLevel =date('Y-m-d', strtotime($secondDateSecondLevel. ' + '. $request->total_days .'days'));


$secondDateThirdLevel = date('Y-m-d', strtotime($firstDateThirdLevel. ' + '. $request->cycle .'days'));


//third level date

        //new update code


        $dataNew = [
            ['user_id'=>Auth::user()->id,'period_date'=> $secondDateFirstLevel ,'total_days'=> $request->total_days,'cycle'=> $request->cycle],
            ['user_id'=>Auth::user()->id,'period_date'=> $secondDateSecondLevel ,'total_days'=> $request->total_days,'cycle'=> $request->cycle],
            ['user_id'=>Auth::user()->id,'period_date'=> $secondDateThirdLevel ,'total_days'=> $request->total_days,'cycle'=> $request->cycle],
            //...
        ];

       // Model::insert($data); // Eloquent approach
        DB::table('customer_period_data')->insert($dataNew); // Query Builder approach

        return redirect()->back();


    }


    public function period_information_update_input_list(Request $request){


        $mainId = $request->productid;


        $inputId =CustomerPeriodData::where('id',$mainId)->first();



        return view('front.viewInputData',['inputId'=>$inputId]);



    }



    public function period_information_update_prediction_list(Request $request){


        $mainId = $request->productid;


        $inputId =CustomerPeriodData::where('id',$mainId)->first();



        return view('front.viewPredictionData',['inputId'=>$inputId]);



    }


    public function period_information_update_prediction(Request $request){

        //dd($request->id);
                    //$mainIDFormData = $request->productid;


                $cupon_period_data = CustomerPeriodData::find($request->id);
                $cupon_period_data->user_id = Auth::user()->id;
                $cupon_period_data->period_date = $request->period_date;
                $cupon_period_data->total_days = $request->total_days;
                $cupon_period_data->cycle = $request->cycle;
                $cupon_period_data->status = 0;
                $cupon_period_data->save();

                $pId =$cupon_period_data->id;

                 //new update code
                 CustomerPeriodData::where('id', $pId)->update(array('update_date' => date('Y-m-d')));

                 $customerIdDelete = CustomerPeriodData::where('user_id', Auth::user()->id)->where('id','>',$pId)->delete();
                //first level date

        $firstDateFirstLevel =date('Y-m-d', strtotime($request->period_date. ' + '. $request->total_days .'days'));


        $secondDateFirstLevel = date('Y-m-d', strtotime($firstDateFirstLevel. ' + '. $request->cycle .'days'));


        //first Level Date



        //second level date




        //second level date


        $firstDateSecondLevel =date('Y-m-d', strtotime($secondDateFirstLevel. ' + '. $request->total_days .'days'));


        $secondDateSecondLevel = date('Y-m-d', strtotime($firstDateSecondLevel. ' + '. $request->cycle .'days'));


        //third level date


        $firstDateThirdLevel =date('Y-m-d', strtotime($secondDateSecondLevel. ' + '. $request->total_days .'days'));


        $secondDateThirdLevel = date('Y-m-d', strtotime($firstDateThirdLevel. ' + '. $request->cycle .'days'));


        //third level date

                //new update code


                $dataNew = [
                    ['user_id'=>Auth::user()->id,'period_date'=> $secondDateFirstLevel ,'total_days'=> $request->total_days,'cycle'=> $request->cycle],
                    ['user_id'=>Auth::user()->id,'period_date'=> $secondDateSecondLevel ,'total_days'=> $request->total_days,'cycle'=> $request->cycle],
                    ['user_id'=>Auth::user()->id,'period_date'=> $secondDateThirdLevel ,'total_days'=> $request->total_days,'cycle'=> $request->cycle],
                    //...
                ];

               // Model::insert($data); // Eloquent approach
                DB::table('customer_period_data')->insert($dataNew); // Query Builder approach

                return redirect()->back();


            }
}
