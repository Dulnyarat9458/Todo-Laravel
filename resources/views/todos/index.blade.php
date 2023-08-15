<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos Task') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg min-h-[300px]">
                <div class="text-end my-4 mx-2">
                    <form id="filter-form" action="{{ route('todos.index') }}" method="get">
                        <div class="flex justify-end items-center">
                            <div class="ml-4">
                                <label for="status">Status:</label>
                                <select name="status" id="status"
                                    onchange="this.form.submit()">
                                    <option value="">All</option>
                                    <option value="1" 
                                        {{ request('status') === '1' ? 'selected' : '' }}>
                                        Done
                                    </option>
                                    <option value="0" 
                                        {{ request('status') === '0' ? 'selected' : '' }}>
                                        Not Done
                                    </option>
                                </select>
                            </div>
                            <div  class="ml-4">
                                <label for="due_date">Due Date:</label>
                                <input type="date" name="due_date" id="due_date"
                                    value="{{ request('due_date') !==null ? request('due_date'): '' }}"
                                    onchange="this.form.submit()">
                            </div>
                            <div class="ml-4">
                                <a href="{{ route('todos.create') }}"
                                    class="rounded font-semibold bg-green-500 text-white px-4 py-2">Create</a>                                
                            </div>
                        </div>
                    </form>
                </div>
                @if ($todos->count() > 0)
                    <div class="p-2 grid sm:grid-cols-2 lg:grid-cols-4 gap-2">
                        @foreach ($todos as $todo)
                            <a href="{{ route('todos.show', $todo->id) }}" class="border p-2 text-left  h-full">
                                <div class="flex justify-between flex-col h-full">
                                    <div>
                                        <div class="text-lg font-bold">{{ $todo->name }}</div>
                                        <div class="truncate-2-lines line-clamp-2 text-sm"><label
                                                class="font-semibold">Task Detail:</label>
                                            {{ isset($todo->detail) ? $todo->detail : '-' }}</div>
                                    </div>
                                    <div>
                                        <div class="text-sm mt-2">
                                            <label class="font-semibold">Status:</label>
                                            @if ($todo->is_done)
                                                <label class="text-green-600">
                                                    Done
                                                </label>
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
                                        <div class="text-sm font-semibold">Due: {{ $todo->due_time }}</div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="mt-4 p-2">
                        {{ $todos->links() }}
                    </div>
                @else
                    <div class="text-center w-full h-full min-h-[300px] flex justify-center items-center">Don't have
                        anything to do.</div>
                @endif
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <x-alert headtext="success" bodytext="{{ $message }}" />
    @endif
    @section('script')
        @vite('resources/js/alert.js')
    @endsection
</x-app-layout>
