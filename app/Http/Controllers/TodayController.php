<?php

namespace App\Http\Controllers;
use App\Models\Todo;

class TodayController extends Controller
{
    public function index()
    {
        $current_date = date('Y-m-d');
        $data['todos'] = Todo::whereDate('do_datetime', $current_date)->orderBy('do_datetime','asc')->paginate(5);
        return view('dashboard', $data);
    }

    public function show(string $id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.show', compact('todo'));
    }
}
