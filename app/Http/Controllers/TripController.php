<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Festival;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TripController extends Controller
{
// LCRUD --> List = index, Create (Read, Update) = edit + update, Delete = destroy
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        // Fetch trips for the given festival_id
        $trips = Trip::where('festivalid', request()->route('festival'))
            ->latest()
            ->paginate(5);
        // Return the trips to a view
        return view('trip.index', compact('trips'))
            ->with(['i', (request()->input('page', 1) - 1) * 5, 'message' => 'Trips zijn opgehaald']
            );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($festival)
    {
        return view('trip.create', ['festival' => $festival]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $festival)
    {
        $validated = $request->validate([
            'time' => 'required|string|max:5',
            'city' => 'required|string|max:100',
            'price' => 'required|string|max:10',
            'points_to_give' => 'required|integer|max:25',
        ]);

        // Create a new book record
        $trip = new Trip();
        $trip->time = $request->time;
        $trip->city = $request->city;
        $trip->price = $request->price;
        $trip->points_to_give = $request->points_to_give;
        $trip->festivalid = $request->festivalid;
        $trip->save();

        return redirect()->route('trip.index', ['festival' => $festival])->with('message', 'Trip created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(?Trip $trip): View
    {
        if ($trip === null) {
            $trip = new Trip();
        }
        return view('trip.edit', compact('trip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip): RedirectResponse
    {
        // dd($request->all());
        try {
            $req = $request->validate([
                'time' => 'required',
                'city' => 'required',
                'price' => 'required',
                'points_to_give' => 'required',
            ]);
            if ($trip->id === null) {
                Trip::create($req);
                $message = 'Trip is aangemaakt.';
            } else {
                $trip->update($req);
                $message = 'Trip is aangepast.';
            }
        }

        catch (\Exception $e) {
            $message = 'Er is iets fout gegaan.'.$e->getMessage();
            return  back()->with(['status' => 'error', 'message' => $message ])->withInput();
        }

        return redirect()->route('trip.index')->with(['status' => 'trip-updated', 'message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip): RedirectResponse
    {
        $trip->delete();
        return redirect()->route('trip.index')
            ->with('success', 'Trip is verwijderd.');
    }
}
