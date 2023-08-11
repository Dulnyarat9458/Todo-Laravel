@extends('base')
@section('content')
    <br>
    <div class="sm:flex sm:justify-center min-h-screen">
        <div class="container mx-auto text-center">
            <div class="text-3xl font-semibold font-roboto my-4">{{ $todo->name }}</div>
            <br>
            <div class="max-w-md mx-auto md:max-w-lg px-2 md:px-0 text-start">
                <div class="font-semibold">Note:</div>
                <div>{{ $todo->detail }}</div>
                <br>
                <div class="font-semibold">Time:</div>
                <div>{{ $todo->do_datetime }}</div>
            </div>
            <br>
            <hr class="max-w-md mx-auto md:max-w-lg">
            <br>
            <form id="delete-form" action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                <div class="flex justify-center items-center">
                    <div class="block w-fit">
                        <a href="{{ route('todos.edit', $todo->id) }}">
                            <div class="bg-green-500 text-white px-4 py-2 rounded-md font-bold w-24 mx-auto">Edit</div>
                        </a>                    
                    </div>
                    <div class="mx-2"></div>
                    <br>
                    @csrf
                    @method('DELETE')
                    <button type="button" id="delete-button" class="bg-red-500 text-white px-4 py-2 rounded-md font-bold w-24">Delete</button>                    
                </div>
            </form>
        </div>
    </div>
    <x-form_confirm_modal 
        headtext="Confirm Delete" 
        bodytext="คุณต้องการจะลบจริง ๆ ใช่ไหม" 
        target="delete-form"
    />
    @if ($message = Session::get('success'))
        <x-alert 
            headtext="success" 
            bodytext="{{$message}}" 
        />
    @endif
@endsection
@section('script')
    @vite('resources/js/confirm.js')
    @vite('resources/js/alert.js')
@endsection
