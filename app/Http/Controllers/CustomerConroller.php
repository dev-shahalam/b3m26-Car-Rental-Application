<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerConroller extends Controller
{

    // Customer page



    // Login page

    // Registration page
    public function registration()
    {
        return view('admin.pages.cus-registration');
    }



    // Create Customer
    public function createCustomer(Request $request)
    {
            $request->validate([
                'name' => 'required',
                'email' => 'required | email',
                'password' => 'required | min:6',
            ]);

             User::updateOrCreate(
                ['email' => $request->input('email')],
                ['name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => $request->input('password'),
                    'role' => "Customer"]
            );

            return redirect()->route('login')->with('success', 'Customer created successfully');
    }

}
