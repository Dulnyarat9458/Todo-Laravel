@extends('base')
@section('content')
    <div class="sm:flex sm:justify-center min-h-screen">
        <div class="container mx-auto text-center">
            <div class="text-3xl font-semibold font-roboto my-4">Show Todo</div>
            <br>
            <div class="max-w-md mx-auto md:max-w-lg px-2 md:px-0">
                <div>{{ $todo->name }}</div>
                <div>{{ $todo->detail }}</div>
                <div>{{ $todo->do_datetime }}</div>
            </div>
            <br>
            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                <div class="block">
                    <a href="{{ route('todos.edit', $todo->id) }}">
                        <div class="bg-green-500 text-white px-4 py-2 rounded-md font-bold w-24 mx-auto">Edit</div>
                    </a>                    
                </div>
                <br>
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md font-bold w-24">Delete</button>
            </form>
        </div>
    </div>
@endsection
