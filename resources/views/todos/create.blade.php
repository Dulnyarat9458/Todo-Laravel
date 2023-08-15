<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg min-h-[300px]">
                <div class="max-w-md mx-auto md:max-w-lg p-2 md:px-0">
                    <form action="{{ route('todos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="text-left my-4">
                            <p class="font-bold">ชื่อ:</p>
                            <input type="text" name="name" class="w-full bg-slate-100 rounded-md p-2 border @error('name') border-red-400 @enderror" value="{{ isset($oldData['name']) ? $oldData['name'] : '' }}">
                            @error('name')
                                <div class="text-sm text-red-500">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-left my-4">
                            <p class="font-bold">รายละเอียด:</p>
                            <textarea name="detail" rows="8" class="w-full bg-slate-100 rounded-md p-2 border @error('detail') border-red-400 @enderror">{{ isset($oldData['detail']) ? $oldData['detail'] : '' }}</textarea>
                            @error('detail')
                                <div class="text-sm text-red-500">*{{ $message }}</div>
                            @enderror
                        </div>     
                        <div class="text-left my-4">
                            <p class="font-bold">ทำวันที่:</p>
                            <input type="datetime-local" name="due_time" class="w-full bg-slate-100 rounded-md p-2 border @error('due_time') border-red-400 @enderror" value="{{ isset($oldData['due_time']) ? $oldData['due_time'] : '' }}">
                            @error('due_time')
                                <div class="text-sm text-red-500">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4 text-center">
                            <button type="submit" class="mt-3 btn btn-primary font-bold bg-green-500 text-white px-4 py-2 rounded-md">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        @vite('resources/js/form_confirm.js')
        @vite('resources/js/alert.js')
    @endsection
</x-app-layout>
