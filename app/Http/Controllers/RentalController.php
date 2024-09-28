<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Exception;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function createRental(Request $request)
    {
        try {
            $user_id = 6;
            $total_cost = 8500 * 3;
            $request->validate([
                'car_id' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
            ]);

            $rental=Rental::updateOrCreate(
                ['id' => $request->id],
                [
                    'car_id' => $request->car_id,
                    'user_id' => $user_id,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'total_cost' => $total_cost,
                ]
            );

            return $rental;

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
