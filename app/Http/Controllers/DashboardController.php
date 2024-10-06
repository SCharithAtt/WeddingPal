<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->hasRole('Vendor')) {
            //Check if there is a Vendor model with user_id associated with the id of the User
            $vendor = Vendor::where('user_id', auth()->user()->id)->first();
            $user = Auth::user()->load('vendor');

            if(!$vendor){
                return inertia('Dashboard/IncompleteVendorDashboard');
            }else{
                return inertia('Dashboard/VendorDashboard', [
                    'vendor' => $vendor,
                    'user' => $user
                ]);

            }

        }elseif (auth()->user()->hasRole('Client')) {
            return inertia('Dashboard/ClientDashboard');
        }elseif (auth()->user()->hasRole('Admin')) {
            return inertia('Dashboard/AdminDashboard');
        }else{
            // Return a 403 Forbidden response
            return response()->json(['error' => 'You are not authorized to access this page'], 403);
        }

    }



}
