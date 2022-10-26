<div class="flex mx-auto items-center justify-center shadow-lg p-12">
    <form wire:submit.prevent="process()" method="POST" id="toast-editor" class="w-full max-w-xl bg-white rounded-lg px-4 p-6">
        <div class="mb-4 px-2">
            <label for="is-public-toggle" class="inline-flex relative items-center cursor-pointer">
                <input wire:model="is_public" type="checkbox" value="" id="is-public-toggle" class="sr-only peer">
                <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="px-3 text-gray-600 font-semibold">Is Post Public</span>
            </label>
            @error('is_public') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>
        <div class="mb-4 p-2">
            <label for="title-input"
                   class="block text-gray-600 font-semibold">Name</label>
            <input type="text"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   id="title-input" placeholder="Enter Name" wire:model="title">
            @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>
        <div class="mb-4 p-2">
            <label for="topic-dropdown"
                   class="block text-gray-600 font-semibold">Topic</label>
            <select id="topic-dropdown" wire:model="topic_id">
                @foreach($topics as $topic)
                    <option value="{{$topic->id}}" {{$update_mode && $topic->id === $post->topic_id ? 'selected' : ''}}>
                        {{$topic->name}}
                    </option>
                @endforeach
            </select>
            @error('topic_id') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div wire:ignore class="w-full md:w-full px-3 mb-2 mt-2">
                <label for="editor" class="text-gray-600 font-semibold">Content</label>
                <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></div>
            </div>
            <div class="w-full md:w-full flex items-start md:w-full px-3">
                <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                    @if (session()->has('message'))
                        <svg fill="none" class="w-5 h-5 text-red-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-xs md:text-sm pt-px text-red-600">{{ session('message') }}</p>
                    @endif
                </div>

                <input type="hidden" wire:model="content" name="hidden-content" id="hidden-content">

                <div class="-mr-1">
                    <button type="submit" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">Post Comment</button>
                </div>
            </div>
        </div>
    </form>
</div>
@if(isset($post))
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            var content = @this.content;
            window.toast_ui_editor.setMarkdown(content);
        });
    </script>
@endif
