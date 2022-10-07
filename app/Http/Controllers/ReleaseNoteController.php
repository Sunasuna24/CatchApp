<?php

namespace App\Http\Controllers;

use App\Models\ReleaseNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReleaseNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $release_notes = ReleaseNote::all();
        return view('release-note.index')->with('release_notes', $release_notes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $release_note = ReleaseNote::find($id);
        return view('release-note.show')->with('release_note', $release_note);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
