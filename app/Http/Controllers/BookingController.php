<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // booking

    public function Booking(Request $request){
        $cus_id=$request->header('id');
        $carName= $request->input('name');

        $pickUp= $request->input('pick-up');
        $dropOff= $request->input('drop-off');
        $pickTime= $request->input('pick-time');
        $dropTime= $request->input('drop-time');

        $pickUpTime=Carbon::parse($pickTime);
        $dropOffTime=Carbon::parse($dropTime);

        $totalDays=$pickUpTime->diffInDays($dropOffTime);
        $totalHours=$pickUpTime->diffInHours($dropOffTime);

        $price=Car::where('name', $carName)->value('daily_rent_price');


//
        $days=round($totalHours/24);
        $hours=$totalHours%24;
        $totalCost=$totalDays*$price;

        if ($cus_id==null){
            return response()->json(['message'=>'Please Login'],401);
        }
        return [
            'custmerId'=>$cus_id,
            'carName'=>$carName,
            "Pick Up Location" => $pickUp,
            "Drop Off Location" =>$dropOff,
            "Pick Up Date"=>$pickTime,
            "Drop Off Date"=>$dropTime,
            "Total Hours"=>$totalHours,
            "Total Cost"=>$totalCost,
            'price'=>$price,
            "days"=>$days,
            "hours"=>$hours


        ];
    }
}
