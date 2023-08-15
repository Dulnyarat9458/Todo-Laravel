<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg min-h-[300px] py-2">
                <div class="container mx-auto text-center">
                    <div class="text-3xl font-semibold font-roboto my-4">{{ $todo->name }}</div>
                    <br>
                    <div class="max-w-md mx-auto md:max-w-lg px-2 md:px-0 text-start">
                        <div class="font-semibold">Note:</div>
                        <div>{{ $todo->detail }}</div>
                        <br>
                        <div class="font-semibold">Time:</div>
                        <div>{{ $todo->due_time }}</div>
                        <br>
                        <div class="font-semibold">Status:</div>
                        @if($todo->is_done)
                            <div class="text-green-600">Done</div>
                        @else
                            @if ($todo->due_time < now())
                            <label class="text-red-600">
                                Late
                            </label>
                            @else                                                    
                            <label class="text-orange-600">
                                Not Done
                            </label>                                               
                            @endif     
                        @endif
                    </div>
                    <br>
                    <hr class="max-w-md mx-auto md:max-w-lg">
                    <br>
                    <form id="done-task-form" action="{{ route('task.update', $todo->id) }}" method="POST">
                        <div class="flex justify-center items-center">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="is_done" value="{{ $todo->is_done }}">
                            @if($todo->is_done)
                                <button type="submit" id="done-task-button" class="text-black px-4 py-2 rounded-md font-bold w-36 bg-purple-300">Cancel Task</button> 
                            @else
                                <button type="submit" id="done-task-button" class="text-white px-4 py-2 rounded-md font-bold w-36 bg-purple-600">Done Task</button>                                 
                            @endif
                        </div>
                    </form>
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
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md font-bold w-24">Delete</button>                    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <x-alert 
            headtext="success" 
            bodytext="{{$message}}" 
        />
    @endif
    @section('script')
        @vite('resources/js/alert.js')
    @endsection
</x-app-layout>
