<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Client;
use App\Models\Category;
use App\Models\Vendor;

class ClientDashboardController extends Controller
{
    public function myWedding()
    {
        return Inertia::render('Client/MyWedding');
    }

    public function communications()
    {
        return Inertia::render('Client/Communications');
    }

    public function market()
    {
        return Inertia::render('Client/Market',[
            'user'=>auth()->user(),
            'vendor'=>Vendor::where('user_id',auth()->user()->id)->first(),
            'categories'=>Category::all()->pluck('name'),
        ]);
    }


    public function vendorContracts()
    {
        return Inertia::render('Client/Contracts');
    }

    public function disputes()
    {
        return Inertia::render('Client/Disputes');
    }

    public function weddingChecklist()
    {
        return Inertia::render('Client/Checklist');
    }


}
