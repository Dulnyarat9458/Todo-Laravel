@extends('base')
@section('content')
    <div class="sm:flex sm:justify-center min-h-screen">
        <div class="container mx-auto text-center">
            <div class="text-3xl font-semibold font-roboto my-4">My to do list</div>
            <div class="py-2 my-2 text-end">
                <a href="{{ route('todos.create') }}" class="p-2 bg-green-500 text-white font-bold rounded-md">Create</a>
            </div>
            <div class="p-2 h-screen shadow-md grid sm:grid-cols-2 lg:grid-cols-4 gap-2">
                @foreach ($todos as $todo)
                <a href="{{ route('todos.show', $todo->id) }}" class="border h-fit p-2 text-left">
                    <div class="text-lg font-bold">{{ $todo->name }}</div>
                    <div>รายละเอียด: {{ isset($todo->detail) ? $todo->detail : '-' }}</div>
                    <div>ทำในวันที่: {{ $todo->do_datetime }}</div>                    
                </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
