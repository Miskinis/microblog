<!-- component -->
<div class="flex-grow justify-center relative top-1/3">
    <!-- This is an example component -->
    <div class="relative grid grid-cols-1 gap-4 p-4 mb-8 border rounded-lg bg-white shadow-lg">
        <div class="relative flex gap-4">
            <img src="{{$comment->user->profile_photo_url}}" class="relative rounded-lg -top-8 -mb-4 bg-white border h-20 w-20" alt="{{$comment->user->name}}" loading="lazy">
            <div class="flex flex-col w-full">
                <div class="flex flex-row justify-between">
                    <a class="relative text-xl overflow-auto" href="{{route('user', $comment->user->slug)}}">{{$comment->user->name}}</a>
                    @if(auth()->check() && auth()->user()->can('delete', $comment))
                        <button class="text-gray-500 text-xl" wire:click.prevent="delete()" onclick="return confirm('Are you sure you want to delete this comment?')"><i class="fa-solid fa-trash"></i></button>
                    @endif
                </div>
                <p class="text-gray-400 text-sm">{{$comment->created_at}}</p>
            </div>
        </div>
        <div class="-mt-4">
            @markdown($comment->content)
        </div>
    </div>
</div>
