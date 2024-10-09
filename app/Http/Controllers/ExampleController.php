<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Category;


class ExampleController extends Controller
{
    public function index()
    {
        return Inertia::render('Example',[
            'user'=>auth()->user(),
            'vendor'=>Vendor::where('user_id',auth()->user()->id)->first(),
            'categories'=>Category::all()->pluck('name'),
        ]);
    }
}
