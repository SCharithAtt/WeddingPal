<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WeddingController extends Controller
{
    public function index()
    {
        $wedding = Wedding::with(['client', 'vendor'])->where('client_id', auth()->id())->first();
        return Inertia::render('Wedding/Index', [
            'wedding' => $wedding,
        ]);
    }

    public function create()
    {
        // You may need to pass vendors or other data
        return Inertia::render('Client/Wedding/CreateWedding');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bride' => 'required|string|max:255',
            'groom' => 'required|string|max:255',
            'date' => 'required|date',
            'time_from' => 'required|date_format:H:i',
            'time_to' => 'required|date_format:H:i',
            'venue' => 'required|string|max:255',
            'number_of_guests' => 'required|integer',
            'contact_person_name' => 'required|string|max:255',
            'contact_person_mobile' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $client = Client::where('user_id', auth()->id())->first();
        Wedding::create([
            'client_id' => $client,
            'date' => $request->date,
            'location' => $request->location,
            'details' => $request->details,
            'bride' => $request->bride,
            'groom' => $request->groom,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
            'venue' => $request->venue,
            'number_of_guests' => $request->number_of_guests,
            'contact_person_name' => $request->contact_person_name,
            'contact_person_mobile' => $request->contact_person_mobile,
            'notes' => $request->notes,
        ]);

        return Inertia::location(route('weddings.index'));
    }

    public function show()
    {
        $wedding = Wedding::with(['client', 'vendor'])->where('client_id', auth()->id())->first();
        return Inertia::render('Wedding/Show', [
            'wedding' => $wedding,
        ]);
    }

    public function edit()
    {
        $wedding = Wedding::where('client_id', auth()->id())->first();
        return Inertia::render('Wedding/Edit', [
            'wedding' => $wedding,
        ]);
    }

    public function update(Request $request)
    {
        $wedding = Wedding::where('client_id', auth()->id())->first();

        $request->validate([
            'bride' => 'required|string|max:255',
            'groom' => 'required|string|max:255',
            'date' => 'required|date',
            'time_from' => 'required|date_format:H:i',
            'time_to' => 'required|date_format:H:i',
            'venue' => 'required|string|max:255',
            'number_of_guests' => 'required|integer',
            'contact_person_name' => 'required|string|max:255',
            'contact_person_mobile' => 'required|string|max:255',
            'notes' => 'nullable|string',

        ]);

        $wedding->update($request->all());

        return Inertia::location(route('weddings.index'));
    }

    public function destroy()
    {
        $wedding = Wedding::where('client_id', auth()->id())->first();
        if ($wedding) {
            $wedding->delete();
        }

        return Inertia::location(route('weddings.index'));
    }
}
