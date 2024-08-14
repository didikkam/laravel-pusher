<?php

namespace App\Http\Controllers;

use App\Events\TodoUpdated;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos', ['todos' => $todos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $todo = Todo::create($request->all());
        broadcast(new TodoUpdated($todo)); // Siarkan event

        return response()->json($todo, 201);
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->update($request->all());
        broadcast(new TodoUpdated($todo));
        return response()->json($todo);
    }
}
