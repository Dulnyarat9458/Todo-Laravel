@extends('base')
@section('content')
    <div class="sm:flex sm:justify-center min-h-screen">
        <div class="container mx-auto text-center">
            <div class="text-3xl font-semibold font-roboto my-4">Edit Todo</div>
            <br>
            <div class="max-w-md mx-auto md:max-w-lg px-2 md:px-0">
                <form action="{{ route('todos.update', $todo->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="text-left my-4">
                        <p class="font-bold">ชื่อ:</p>
                        <input type="text" name="name" class="w-full bg-slate-100 rounded-md p-2 border @error('name') border-red-400 @enderror" value="{{ isset($oldData['name']) ? $oldData['name'] : $todo->name }}">
                        @error('name')
                            <div class="text-sm text-red-500">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-left my-4">
                        <p class="font-bold">รายละเอียด:</p>
                        <input type="text" name="detail" class="w-full bg-slate-100 rounded-md p-2 border @error('detail') border-red-400 @enderror" value="{{ isset($oldData['detail']) ? $oldData['detail'] : $todo->detail }}">
                        @error('detail')
                            <div class="text-sm text-red-500">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-left my-4">
                        <p class="font-bold">ทำวันที่:</p>
                        <input type="datetime-local" name="do_datetime" class="w-full bg-slate-100 rounded-md p-2 border @error('do_datetime') border-red-400 @enderror" value="{{ isset($oldData['do_datetime']) ? $oldData['do_datetime'] : $todo->do_datetime }}">
                        @error('do_datetime')
                            <div class="text-sm text-red-500">*{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="mt-3 btn btn-primary font-bold bg-green-500 text-white px-4 py-2 rounded-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
