<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Today Task') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg min-h-[300px]">
                @if ($todos->count() > 0)
                    <div class="p-2 grid sm:grid-cols-2 lg:grid-cols-4 gap-2">
                            @foreach ($todos as $todo)
                                <a href="{{ route('todos.show', $todo->id) }}" class="border p-2 text-left  h-full">
                                    <div class="flex justify-between flex-col h-full">
                                        <div>
                                            <div class="text-lg font-bold">{{ $todo->name }}</div>
                                            <div class="truncate-2-lines line-clamp-2 text-sm"><label class="font-semibold">Task Detail:</label> {{ isset($todo->detail) ? $todo->detail : '-' }}</div>                            

                                        </div>
                                        <div>
                                            <div class="text-sm mt-2">
                                                <label class="font-semibold">Status:</label> 
                                                    @if ($todo->is_done)
                                                    <label class="text-green-600">
                                                        Done
                                                    </label>
                                                    @else                                                    
                                                    <label class="text-orange-600">
                                                        Not Done
                                                    </label>                                               
                                                    @endif
                                            </div> 
                                            <div class="text-sm font-semibold">Due: {{ $todo->do_datetime }}</div>    
                                        </div>               
                                    </div> 
                                </a>
                            @endforeach
                    </div>
                @else 
                    <div class="text-center w-full h-full min-h-[300px] flex justify-center items-center">Don't have anything to do.</div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
