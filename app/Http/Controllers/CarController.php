<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{


    // Car page
    public function carPage(Request $request)
    {
        $cars = Car::orderBy('id', 'DESC')->get();
        return view('admin.pages.cars-page', compact('cars'));
    }

    // Car create page
    public function createCarPage()
    {
        return view('admin.pages.car-create');
    }

    public function createCar(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'car_type' => 'required|in:Sedans,Hatchbacks,SUVs,Hybrids,Luxury,Crossovers',
            'daily_rent_price' => 'required',
            'availability' => 'required |in:Available,Not Available',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $time = time();
            $file_name = $image->getClientOriginalName();
            $image_name = $time . $file_name;
            $image_path = "uploads/{$image_name}";
//            Upload Image
            $image->move(public_path('/uploads'), $image_name);

            Car::create([
                'name' => $request->name,
                'brand' => $request->brand,
                'model' => $request->model,
                'year' => $request->year,
                'car_type' => $request->car_type,
                'daily_rent_price' => $request->daily_rent_price,
                'availability' => $request->availability,
                'image' => $image_path
            ]);

            return redirect()->route('car-page')->with('success', 'Car created successfully');

        } else {
            return redirect()->back()->with('error', 'image not found')->withInput();
        }
    }


    public function viewCarById(Request $request, $id)
    {
        $car = Car::find($id);
        // Check if the car exists
        if (!$car) {
            return redirect()->back()->with('error', 'Car not found');
        }
        return view('admin.pages.car-view', compact('car'));
    }

    // Update Car

    public function updateCar(Request $request, $id)
    {
         $car_id=$id;
         $car=Car::where('id',$car_id)->first();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $time = time();
                $file_name = $image->getClientOriginalName();
                $image_name = $time . $file_name;
                $image_path = "uploads/{$image_name}";
                $image->move(public_path('/uploads'), $image_name);


                // old image delete
                $old_img_path=$car->image;
                File::delete($old_img_path);

                Car::where('id', $car_id)->update([
                    'name' => $request->name,
                    'brand' => $request->brand,
                    'model' => $request->model,
                    'year' => $request->year,
                    'car_type' => $request->car_type,
                    'daily_rent_price' => $request->daily_rent_price,
                    'availability' => $request->availability,
                    'image' => $image_path
                ]);
                return redirect()->route('car-page')->with('success', 'Car Updated successfully');
            }else{
                Car::where('id', $car_id)->update([
                    'name' => $request->name,
                    'brand' => $request->brand,
                    'model' => $request->model,
                    'year' => $request->year,
                    'car_type' => $request->car_type,
                    'daily_rent_price' => $request->daily_rent_price,
                    'availability' => $request->availability,
                ]);

            return redirect()->route('car-page')->with('success', 'Car Updated successfully');

        }

    }

    // deleteCar
    public function deleteCar(Request $request, $id)
    {
        $car = Car::find($id);
        // Check if the car exists
        if (!$car) {
            return redirect()->back()->with('error', 'Car not found');
        }

        // Delete the image
        if ($car->image) {
            $image_path = $car->image;
            if (file_exists(public_path($image_path))) {
                unlink(public_path($image_path));
            }
        }
        $car->delete();
        return redirect()->route('car-page')->with('success', 'Car deleted successfully');
    }


}
