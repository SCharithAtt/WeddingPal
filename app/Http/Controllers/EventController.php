<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Vendor;
use Inertia\Inertia;
use Illuminate\Http\Request;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('vendor_id', auth()->id())->get();
        return Inertia::render('Vendor/Calendar', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
        ]);
        $vendor_id = Vendor::where('user_id', auth()->id())->first()->id;
        Event::create([
            'vendor_id' => $vendor_id,
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //destory the event
        $event->delete();
        return back();

    }
}
