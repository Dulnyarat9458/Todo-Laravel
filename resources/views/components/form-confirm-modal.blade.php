<div id="confirm-modal" class="hidden fixed inset-0 items-center justify-center z-50 bg-black bg-opacity-40 duration-200">
    <div class="bg-white w-64 p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">{{ $text['headtext'] }}</h2>
        <p class="mb-4"> {{ $text['bodytext'] }} </p>
        <div class="flex justify-end">
            <button id="cancel-button" type="button" class="mr-2 px-4 py-2 text-gray-600 rounded">Cancel</button>
            <button type="submit" id="confirm-button" data-target="{{ $text['target'] }}"  class="px-4 py-2 bg-red-500 text-white rounded">Confirm</button>
        </div>
    </div>
</div>
