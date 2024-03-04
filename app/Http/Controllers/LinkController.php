<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = auth()->user()->links()->paginate(5);

        return view('links.index', [
            'links' => $links,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'link' => 'required|url'
        ]);

        $link = auth()->user()->links()
            ->create($request->only(['name', 'link']));

        if ($link) {
            return redirect()->route('links.index')->with('status', 'Link created!');
        }

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        if ($link->user_id !== auth()->user()->id) {
            return abort(404);
        }

        return view('links.edit', [
            'link' => $link
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        if ($link->user_id !== auth()->user()->id) {
            return abort(403);
        }

        $request->validate([
            'name' => 'required|max:255',
            'link' => 'required|url'
        ]);

        $link->update($request->only(['name', 'link']));

        return redirect()->route('links.index')->with('status', 'Link updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Link $link)
    {
        if ($link->user_id !== auth()->user()->id) {
            return abort(403);
        }

        $link->delete();

        return redirect()->route('links.index')->with('status', 'Link deleted!');

    }
}
