<?php
namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TareaController extends Controller
{
    public function index()
    {
        $titles = Tarea::where('user_id', Auth::id())->get();
        return view('tarea.index', compact('titles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'priority' => 'nullable|string|in:low,medium,high',
            'status' => 'nullable|string|in:pending,completed',
            'tag' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();

        Tarea::create($validated);

        return redirect('/');
    }

    public function edit($id)
    {
        $title = Tarea::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('tarea.edit', compact('title'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'priority' => 'nullable|string|in:low,medium,high',
            'status' => 'nullable|string|in:pending,completed',
            'tag' => 'nullable|string',
        ]);

        $title = Tarea::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $title->update($validated);

        return redirect('/');
    }

    public function destroy($id)
    {
        $title = Tarea::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $title->delete();

        return redirect('/');
    }
}
