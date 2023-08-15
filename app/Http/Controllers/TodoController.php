<?php

namespace App\Http\Controllers;

use App\Models\Todo;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class TodoController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Todo::where('user', $user->id);

        if ($request->has('status') && isset($request->status) ) {
            $query->where('is_done', $request->status);
        }
        if ($request->has('due_date') && isset($request->due_date) ) {
            $query->whereDate('due_time', $request->due_date);
        }

        $data['todos'] = $query->where('user', $user->id)
            ->orderBy('id','desc')
            ->paginate(12);
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
            'due_time' => 'required'
        ]);

        $user = Auth::user();
        $todo = new Todo;
        $todo->name = $request->name;
        $todo->detail = $request->detail;
        $todo->due_time = $request->due_time;
        $todo->user = $user->id;
        $todo->save();
        return redirect()
                ->route('todos.index')
                ->with('success', 'todo has been created successfully.');
    }

    public function show(string $id)
    {
        $user = Auth::user();
        $todo = Todo::where('id', $id)
            ->where('user', $user->id)
            ->firstOrFail();
        return view('todos.show', compact('todo'));
    }

    public function edit(string $id)
    {
        $user = Auth::user();
        $todo = Todo::where('id', $id)
            ->where('user', $user->id)
            ->firstOrFail();
        return view('todos.edit', compact('todo'))->with('oldData', old());
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'due_time' => 'required'
        ]);
        $user = Auth::user();
        $todo = Todo::where('id', $id)
            ->where('user', $user->id)
            ->firstOrFail();
        $todo->name = $request->name;
        $todo->detail = $request->detail;
        $todo->due_time = $request->due_time;
        $todo->save();
        return redirect()->route('todos.show', compact('todo'))
            ->with('success', 'todo has been updated successfully.');
    }

    public function destroy(string $id)
    {
        $user = Auth::user();
        $todo = Todo::where('id', $id)
            ->where('user', $user->id)
            ->firstOrFail();
        $todo->delete();
        return redirect()
            ->route('todos.index')
            ->with('success', 'todo has been deleted successfully.');
    }
}
