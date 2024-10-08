<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Vendor;


class VendorDashboardController extends Controller
{
    //My store
    public function myStore()
    {
        return Inertia::render('Vendor/MyStore',[
            'user'=>auth()->user(),
            'vendor'=>Vendor::where('user_id',auth()->user()->id)->first(),
        ]);
    }

    //Undertakings
    public function undertakings()
    {
        return Inertia::render('Vendor/Undertakings');
    }

    //Communications
    public function communications()
    {
        return Inertia::render('Vendor/Communications');
    }

    //Enquiries
    public function enquiries()
    {
        return Inertia::render('Vendor/CustomerEnquiries');
    }

    //Calendar
    public function calendar()
    {
        return Inertia::render('Vendor/Calendar');
    }

}
