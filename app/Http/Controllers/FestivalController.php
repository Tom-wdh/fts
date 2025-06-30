<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class FestivalController extends Controller
{
    // LCRUD --> List = index, Create (Read, Update) = edit + update, Delete = destroy
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $festivals = Festival::latest()->paginate(5);
        return view('festival.index', compact('festivals'))
            ->with(['i', (request()->input('page', 1) - 1) * 5, 'message' => 'Festivals zijn opgehaald']
            );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('festival.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'date' => 'required|string|max:10',
        ]);

        // Create a new book record
        Festival::create($validated);

        // Redirect back to the book index page with a success message
        return redirect()->route('festival.index')->with('message', 'Festival created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Festival $festival)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(?Festival $festival): View
    {
        if ($festival=== null) {
            $festival = new Festival();
        }
        return view('festival.edit', compact('festival'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Festival $festival): RedirectResponse
    {
        // dd($request->all());
        try {
            $req = $request->validate([
                'name' => 'required',
                'city' => 'required',
                'date' => 'required',
            ]);
            if ($festival->id === null) {
                Festival::create($req);
                $message = 'Festival is aangemaakt.';
            } else {
                $festival->update($req);
                $message = 'Festival is aangepast.';
            }
        }

        catch (\Exception $e) {
            $message = 'Er is iets fout gegaan.'.$e->getMessage();
            return  back()->with(['status' => 'error', 'message' => $message ])->withInput();
        }

        return redirect()->route('festival.index')->with(['status' => 'festival-updated', 'message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Festival $festival): RedirectResponse
    {
        $festival->delete();
        return redirect()->route('festival.index')
            ->with('success', 'Festival is verwijderd.');
    }
}
