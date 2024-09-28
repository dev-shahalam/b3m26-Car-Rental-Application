<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Mail\OTPMail;
use App\Models\Car;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

    // Register page
    public function register(){
        return view('admin.pages.admin-registration');
    }

    // Login page
    public function login(){
        return view('admin.pages.admin-login');
    }

    // Dashboard page
    public function dashboard(Request $request){
        $total_car=Car::get()->count();
        $available_car=Car::where('availability','Available')->get()->count();
        return view('admin.pages.dashboard',compact('total_car','available_car'));
    }
    // Reset page
    public function sendOtp(){
        return view('admin.pages.reset');
    }

    // Verify page
    public function verifyOtp(){
        return view('admin.pages.submit-otp');
    }

    // Reset password page
    public function resetPassword(){
        return view('admin.pages.reset-password');
    }


    // Customer page
    public function customerPage(Request $request){
        $users = User::where('role', 'Customer')->orderBy('id', 'DESC')->get();
        return view('admin.pages.customers-page', compact('users'));
    }


    // Rental page
    public function rentalPage(){
        $customer = User::where('role', 'Customer')->orderBy('id', 'DESC')->get();
        $rentals = User::where('role', 'Renter')->orderBy('id', 'DESC')->get();
        return view('admin.pages.rentals-page', compact('customer', 'rentals'));

    }


    // Create Admin
    public function createAdmin(Request $request)
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
                'role' => "Admin"]
        );
        if ($user) {
            return redirect('admin-login');
        } else {
            return redirect('admin-registration');
        }
    }

    // Login Admin
    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = User::where('email', $request->input('email'))
            ->where('password', $request->input('password'))->first();

        if ($credentials) {
            $token = JWTToken::CreateToken($credentials->email, $credentials->id);
            return redirect('admin-dashboard')->cookie('token', $token, 3600,);
        } else {
            return redirect('admin-login')->withErrors('Invalid email or password')->withInput();
        }
    }

    public function logoutAdmin(Request $request)
    {
        return redirect('admin-login')->cookie('token', '', -1);
    }

    // Send Otp Admin
    public function sendOtpAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $otp = rand(1000, 9999);
        $credentials = User::where('email', $request->input('email'))->first();
        if ($credentials) {
            $request->session()->put('otp', $credentials->email);
            User::where('email', $request->input('email'))->update(['otp' => $otp]);
            Mail::to($credentials->email)->send(new OTPMail($otp));
            return redirect('submit-otp')->cookie('email', $credentials->email, 3600,);
        } else {
            return redirect('send-otp')->withErrors('User not found')->withInput();

        }
    }


//    Verify Otp Admin
    public function verifyOtpAdmin(Request $request)
    {
        $email = $request->cookie('email'); // get email from request
        $request->validate([
            'otp' => 'required',
        ]);

        $credentials = User::where('email', $email)->where('otp', $request->input('otp'))->first();
        if ($credentials) {
            User::where('email', $email)->update(['otp' => '0']);
            return redirect('reset-password');
        } else {
            return redirect()->back()->withErrors('Invalid OTP')->withInput();
        }
    }

//    Reset Password
    public function resetPasswordAdmin(Request $request)
    {
        $email = $request->cookie('email'); // get email from request
            $request->validate([
                'password' => 'required | min:6'
            ]);

            $credentials = User::where('email', $email)->first();
            if ($credentials) {
                User::where('email', $email)->update(['password' => $request->input('password')]);
                return redirect('login')->cookie('email', '', -1);
            }else{
                return redirect()->back()->withErrors('Password not updated')->withInput();
            }

    }



}
