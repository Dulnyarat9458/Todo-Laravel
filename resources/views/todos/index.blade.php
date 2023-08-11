@extends('base')
@section('content')
    <div class="sm:flex sm:justify-center min-h-screen">
        <div class="container mx-auto text-center">
            <div class="text-3xl font-semibold font-roboto my-4">My to do list</div>
            <div class="py-2 my-2 text-end">
                <a href="{{ route('todos.create') }}" class="p-2 bg-green-500 text-white font-bold rounded-md">Create</a>
            </div>
            <div class="p-2 grid sm:grid-cols-2 lg:grid-cols-4 gap-2">
                @foreach ($todos as $todo)
                <a href="{{ route('todos.show', $todo->id) }}" class="border p-2 text-left  h-full">
                    <div class="flex justify-between flex-col h-full">
                        <div>
                            <div class="text-lg font-bold">{{ $todo->name }}</div>
                            <div class="truncate-2-lines line-clamp-2 text-sm">รายละเอียด: {{ isset($todo->detail) ? $todo->detail : '-' }}</div>                            
                        </div>
                        <div class="text-sm font-semibold mt-2">ทำในวันที่: {{ $todo->do_datetime }}</div>                        
                    </div> 
                </a>
                @endforeach
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <x-alert 
            headtext="success" 
            bodytext="{{$message}}" 
        />
    @endif
@endsection
@section('script')
    @vite('resources/js/alert.js')
@endsection
