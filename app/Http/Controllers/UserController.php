<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function HomePage(){
        $cars=Car::where('availability','Available')->get();
        return view('user.pages.index',compact('cars'));
    }
    public function ProfilePage(){
        // Hardcoded demo customer data
        $customer = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '123-456-7890',
            'address' => '123 Main St, Springfield',
            'total_rentals' => 5,
            'total_spent' => 3000.00,
        ];

        // Hardcoded demo rental history data with more interaction
        $rentals = [
            [
                'id' => 1,
                'car_name' => 'Tesla Model S',
                'brand' => 'Tesla',
                'start_date' => '2023-09-01',
                'end_date' => '2023-09-05',
                'total_cost' => 750.00,
                'status' => 'Completed',
            ],
            [
                'id' => 2,
                'car_name' => 'BMW X5',
                'brand' => 'BMW',
                'start_date' => '2023-09-10',
                'end_date' => '2023-09-15',
                'total_cost' => 1000.00,
                'status' => 'Pending',
            ],
            // Add more rental history items if needed
        ];
        return view('user.pages.cus-profile', compact('customer', 'rentals'));
    }

    public function CarsPage(){
        $cars=Car::where('availability','Available')->get();
        return view('user.pages.cars',compact('cars'));
    }

    public function ServicePage(){
        return view('user.service');
    }

    public function ContactPage(){
        return view('user.contact');
    }
    public function AboutPage(){
        return view('user.about');
    }

    public function RegisterPage(){
        return view('user.pages.cus-registration');
    }

    public function LoginPage(){
        return view('user.pages.cus-login');
    }

    public function createCustomer(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:6',
        ]);

        $user = User::updateOrCreate(
            ['email' => $request->input('email')],
            ['name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'role' => "Customer"]
        );
        if ($user) {
            return redirect('cus-login')->with('success', 'User created successfully');
        } else {
            return redirect('cus-registration')->with('error', 'Failed to create user');
        }
    }



    public function loginCustomer(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = User::where('email', $request->input('email'))
            ->where('password', $request->input('password'))->first();

        if ($credentials) {
            $token = JWTToken::CreateToken($credentials->email, $credentials->id);
            return redirect('cus-profile')->cookie('token', $token, 3600,);
        } else {
            return redirect('cus-login')->withErrors('Invalid email or password')->withInput();
        }
    }

    public function logoutCustomer(Request $request)
    {
        return redirect('cus-login')->cookie('token', '', -1);
    }








}
