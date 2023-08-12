<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function update(Request $request, string $id)
    {
        $todo = Todo::find($id);
        if (!$request->is_done) {
            $todo->is_done = true;
            $todo->save();
            return redirect()->route('todos.show', compact('todo'))->with('success', 'Task has been Done');
        } else {
            $todo->is_done = false;
            $todo->save();
            return redirect()->route('todos.show', compact('todo'))->with('success', 'Task has been Canceled');
        }
    }
}
