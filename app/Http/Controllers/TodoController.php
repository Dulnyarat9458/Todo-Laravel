<?php

namespace App\Http\Controllers;

use App\Models\Todo;

use Illuminate\Http\Request;


class TodoController extends Controller
{
    public function index()
    {
        $data['todos'] = Todo::orderBy('id','desc')->paginate(8);
        return view('todos.index', $data);
    }

    public function create()
    {
        return view('todos.create')->with('oldData', old());
    }

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

    public function show(string $id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.show', compact('todo'));
    }

    public function edit(string $id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'))->with('oldData', old());
    }

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
        return redirect()->route('todos.show', compact('todo'))->with('success', 'todo has been updated successfully.');
    }

    public function destroy(string $id)
    {
        $Todo = Todo::find($id);
        $Todo->delete();
        return redirect()->route('todos.index')->with('success', 'todo has been deleted successfully.');
    }
}
