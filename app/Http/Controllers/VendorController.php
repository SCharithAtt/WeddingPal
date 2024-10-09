<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // Get the filter and pagination parameters
        $category = $request->input('category');
        $perPage = $request->input('per_page', 25); // Default to 25 items per page

        // Query the vendors with optional filtering
        $vendorsQuery = Vendor::query();

        if ($category) {
            $vendorsQuery->where('category', $category);
        }

        // Paginate the results
        $vendors = $vendorsQuery->paginate($perPage);

        return response()->json($vendors);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return Inertia::render('Vendor/CreateStore',[
            //pass the names of categories to the view
            'categories' => Category::all()->pluck('name'),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if the user already has a Vendor
        $existingVendor = Vendor::where('user_id', auth()->user()->id)->first();

        if ($existingVendor) {
            return response()->json(['error' => 'You already have a Vendor Store on WeddingPal'], 422);
        }

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
            'bank_account_number' => 'nullable|string',
            'bank_name' => 'nullable|string',
            'branch' => 'nullable|string',
            'account_name' => 'nullable|string',
            'open_hours' => 'nullable|string',
            'website_url' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'facebook_link' => 'nullable|url',
            'brand_logo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', // 2MB max
            'gallery.*' => 'nullable|file|mimes:jpg,jpeg,png|max:8192', // 8MB max
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
            'bank_account_number' => $request->bank_account_number,
            'bank_name' => $request->bank_name,
            'branch' => $request->branch,
            'account_name' => $request->account_name,
            'open_hours' => $request->open_hours,
            'website_url' => $request->website_url,
            'instagram_link' => $request->instagram_link,
            'facebook_link' => $request->facebook_link,
        ]);

        // Initialize an array to store image URLs
        $imageUrls = [];

        // Define the paths
        $vendorLogoPath = public_path('vendor_media/' . $vendor->id . '/logo');
        $vendorGalleryPath = public_path('vendor_media/' . $vendor->id . '/gallery');

        // Create directories if they don't exist
        if (!file_exists($vendorLogoPath)) {
            mkdir($vendorLogoPath, 0755, true);
        }

        if (!file_exists($vendorGalleryPath)) {
            mkdir($vendorGalleryPath, 0755, true);
        }

        // Handle brand logo upload (1 file max)
        if ($request->hasFile('brand_logo')) {
            $logoFilename = 'logo.' . $request->file('brand_logo')->getClientOriginalExtension();
            $request->file('brand_logo')->move($vendorLogoPath, $logoFilename);
            $imageUrls['logo'] = asset('vendor_media/' . $vendor->id . '/logo/' . $logoFilename);
        }

        // Handle gallery images upload (max 5 files)
        if ($request->hasFile('gallery')) {
            if (count($request->file('gallery')) > 5) {
                return response()->json(['error' => 'A maximum of 5 gallery images is allowed.'], 422);
            }

            foreach ($request->file('gallery') as $index => $image) {
                $galleryFilename = 'image_' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Move the uploaded image to the appropriate directory
                $image->storeAs('public/vendors/' . $vendor->id . '/gallery', $galleryFilename);

                // Store the publicly accessible URL
                $imageUrls['image' . ($index + 1)] = asset('storage/vendors/' . $vendor->id . '/gallery/' . $galleryFilename);
            }
        }


        // Store the image URLs as a JSON object
        $vendor->images = $imageUrls;
        $vendor->save();

        return Inertia::location(route('dashboard'));
    }








    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vendor = Vendor::where('id', $id)->with('user')->first();
        return Inertia::render('Client/Market/FullVendor',[
            'vendor' => $vendor,
        ]
    );
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

    //private function to store images and make them accessible via a link for each.
    private function storeImages($images)
    {
        $vendor = Vendor::where('user_id', auth()->user()->id)->first();
        $storedImages = [];

        foreach ($images as $image) {
            //path in folder based on vendor id
            $path = $image->store('public/vendors/' . $vendor->id );

            $storedImages[] = asset('storage/' . $path);
        }

        return $storedImages;
    }

}
