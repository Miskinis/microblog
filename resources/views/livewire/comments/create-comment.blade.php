<div class="flex mx-auto items-center justify-center shadow-lg">
    <form wire:submit.prevent="store()" method="POST" id="toast-editor" class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
        <div class="flex flex-wrap -mx-3 mb-6">
            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
            <div wire:ignore class="w-full md:w-full px-3 mb-2 mt-2">
                <label for="editor" class="text-gray-600 font-semibold">Content</label>
                <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></div>
            </div>
            <div class="w-full md:w-full flex items-start md:w-full px-3">
                <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
{{--                    <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>--}}
{{--                    </svg>--}}
{{--                    <p class="text-xs md:text-sm pt-px">Markdown is supported.</p>--}}
                </div>

                <input type="hidden" wire:model="content" name="hidden-content" id="hidden-content">

                <div class="-mr-1">
                    <button type="submit" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">Post Comment</button>
                </div>
            </div>
        </div>
    </form>
</div>
