<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Log;

class TodayController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $current_date = date('Y-m-d');
        $query = Todo::whereDate('due_time', $current_date)
            ->where('user', $user->id);

        if ($request->has('status') && isset($request->status) ) {
            $query->where('is_done', $request->status);
        }

        $data['todos'] = $query
            ->orderBy('due_time','asc')
            ->paginate(12);
        return view('dashboard', $data);
    }

    public function show(string $id)
    {
        $user = Auth::user();
        $todo = Todo::where('id', $id)
            ->where('user', $user->id)
            ->firstOrFail();
        return view('todos.show', compact('todo'));
    }
}
