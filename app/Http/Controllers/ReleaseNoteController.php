<?php

namespace App\Http\Controllers;

use App\Models\ReleaseNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReleaseNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $release_notes = ReleaseNote::orderBy('created_at', 'DESC')->get();
        return view('release-note.index')->with('release_notes', $release_notes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->email !== "sunasunayaka1218@gmail.com") {
            abort(404);
        }

        return view('release-note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->email !== "sunasunayaka1218@gmail.com") {
            abort(404);
        }

        $release_note_data = $request->validate([
            'title' => ['required', 'min:3'],
            'detail' => ['required']
        ]);

        ReleaseNote::create([
            'title' => $release_note_data['title'],
            'detail' => $release_note_data['detail']
        ]);

        return redirect()->route('release-note.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ReleaseNote $release_note)
    {
        return view('release-note.show')->with('release_note', $release_note);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReleaseNote $release_note)
    {
        if (Auth::user()->email !== "sunasunayaka1218@gmail.com") {
            abort(404);
        }

        return view('release-note.edit')->with('release_note', $release_note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReleaseNote $release_note)
    {
        if (Auth::user()->email !== "sunasunayaka1218@gmail.com") {
            abort(404);
        }

        $release_note_data = $request->validate([
            'title' => ['required', 'min:3'],
            'detail' => ['required']
        ]);

        $release_note->title = $release_note_data['title'];
        $release_note->detail = $release_note_data['detail'];
        $release_note->save();

        return redirect()->route('release-note.show', $release_note->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReleaseNote $release_note)
    {
        if (Auth::user()->email !== "sunasunayaka1218@gmail.com") {
            abort(404);
        }

        $release_note->delete();

        return redirect()->route('release-note.index');
    }
}
