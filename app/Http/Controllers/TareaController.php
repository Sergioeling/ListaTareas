<?php

namespace App\Http\Controllers;

use App\Models\tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title['titles']=Tarea::all();

        return view('tarea.index', $title);
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
        $title = $request->all(); // o $title = $request->input('title');
        Tarea::create($title);
        return redirect ('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(tarea $tarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = Tarea::find($id);
        return view('tarea.edit', compact('title')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $titleData = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $title = Tarea::findOrFail($id);
        $title->update($titleData);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $title = Tarea::findOrFail($id);
        $title->delete();
        return redirect ('/');
    }
}
