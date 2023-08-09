<?php

namespace App\Http\Controllers;

use App\Models\Todo;

use Illuminate\Http\Request;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['todos'] = Todo::orderBy('id','desc')->paginate(5);
        return view('todos.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create')->with('oldData', old());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'do_datetime' => 'required'
        ]);

        $todo = new Todo;
        $todo->name = $request->name;
        $todo->detail = $request->detail;
        $todo->do_datetime = $request->do_datetime;
        $todo->save();
        return redirect()->route('todos.index')->with('success', 'todo has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.show', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', ['todo' => $todo])->with('oldData', old());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'do_datetime' => 'required'
        ]);

        $todo = Todo::find($id);
        $todo->name = $request->name;
        $todo->detail = $request->detail;
        $todo->do_datetime = $request->do_datetime;
        $todo->save();
        return view('todos.show', ['todo' => $todo])->with('success', 'todo has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Todo = Todo::find($id);
        $Todo->delete();
        return redirect()->route('todos.index')->with('success', 'todo has been deleted successfully.');
    }
}
