<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::all(); // Retrieve all vendors
        return response()->json($vendors); // Return vendors as JSON
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return Inertia::render('Vendor/CreateStore'); // This can be omitted for an API controller
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if the user already has a Vendor
        $existingVendor = Vendor::where('user_id', auth()->user()->id)->first();

        if ($existingVendor) {
            return response()->json(['error' => 'You already have a Vendor Store On WeddingPal'], 422);
        }else{

            // Validate the incoming request
            $validator = Validator::make($request->all(), [
                'store_name' => 'required|string|max:255',
                'store_address' => 'required|json|max:255',
                'store_email' => 'required|string|email|max:255',
                'store_contact' => 'required|json|max:255',
                'category' => 'required|string',
                'price_bracket' => 'required|integer|between:1,3',
                'service_area' => 'required|in:Island wide,District,Province',
                'bio' => 'nullable|string',
                'description' => 'nullable|string',
                'images' => 'nullable|array',
                'bank_account_number' => 'nullable|string',
                'bank_name' => 'nullable|string',
                'branch' => 'nullable|string',
                'account_name' => 'nullable|string',
                'open_hours' => 'nullable|string',
                'website_url' => 'nullable|url',
                'social_media_links' => 'nullable|array',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            // Create the Vendor
            $vendor = Vendor::create([
                'user_id' => auth()->user()->id,
                'store_name' => $request->store_name,
                'store_address' => $request->store_address,
                'store_email' => $request->store_email,
                'store_contact' => $request->store_contact,
                'category' => $request->category,
                'price_bracket' => $request->price_bracket,
                'service_area' => $request->service_area,
                'bio' => $request->bio,
                'description' => $request->description,
                'images' => json_encode($request->images), // Convert to JSON if necessary
                'bank_account_number' => $request->bank_account_number,
                'bank_name' => $request->bank_name,
                'branch' => $request->branch,
                'account_name' => $request->account_name,
                'open_hours' => $request->open_hours,
                'website_url' => $request->website_url,
                'social_media_links' => json_encode($request->social_media_links), // Convert to JSON if necessary
            ]);

        }

        return Inertia::location(route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vendor = Vendor::findOrFail($id);
        return response()->json($vendor);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // This can be omitted for an API controller
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vendor = Vendor::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'store_name' => 'sometimes|required|string|max:255',
            'store_address' => 'sometimes|required|string|max:255',
            'store_email' => 'sometimes|required|string|email|max:255',
            'store_contact' => 'sometimes|required|string|max:15',
            'category' => 'sometimes|required|string',
            'price_bracket' => 'sometimes|required|integer|between:1,3',
            'service_area' => 'sometimes|required|in:Island wide,District,Province',
            'bio' => 'nullable|string',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'bank_account' => 'nullable|array',
            'open_hours' => 'nullable|string',
            'terms_conditions' => 'nullable|string',
            'website_url' => 'nullable|url',
            'social_media_links' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $vendor->update($request->only([
            'store_name',
            'store_address',
            'store_email',
            'store_contact',
            'category',
            'price_bracket',
            'service_area',
            'bio',
            'description',
            'images',
            'bank_account',
            'open_hours',
            'terms_conditions',
            'website_url',
            'social_media_links',
        ]));

        return response()->json($vendor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->delete();
        return response()->json(null, 204); // No content
    }
}
