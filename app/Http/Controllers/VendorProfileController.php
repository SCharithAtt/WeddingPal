<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Inertia\Inertia;

class VendorProfileController extends Controller
{
    public function edit()
    {
        return Inertia::render('VendorSetupForm');
    }
}




