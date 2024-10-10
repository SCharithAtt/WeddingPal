<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Client;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\Wedding;

class ClientDashboardController extends Controller
{

    public function myWedding()
    {
        $client_id = Client::where('user_id',auth()->user()->id)->first()->id;
        return Inertia::render('Client/MyWedding',[
            'user'=>auth()->user(),
            'wedding'=>Wedding::where('client_id',$client_id)->first(),
        ]);
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
