<!-- component -->
<div class="flex justify-center relative top-1/3">
    <!-- This is an example component -->
    <div class="relative grid grid-cols-1 gap-4 p-4 mb-8 border rounded-lg bg-white shadow-lg">
        <div class="relative flex gap-4">
            <img src="https://icons.iconarchive.com/icons/diversity-avatars/avatars/256/charlie-chaplin-icon.png" class="relative rounded-lg -top-8 -mb-4 bg-white border h-20 w-20" alt="" loading="lazy">
            <div class="flex flex-col w-full">
                <div class="flex flex-row justify-between">
                    <a class="relative text-xl whitespace-nowrap truncate overflow-hidden" href="{{route('user', $comment->user->slug)}}">{{$comment->user->name}}</a>
                    @if(auth()->check() && auth()->user()->id === $comment->user->id)
                        <button class="text-gray-500 text-xl" wire:click.prevent="delete()"><i class="fa-solid fa-trash"></i></button>
                    @endif
                </div>
                <p class="text-gray-400 text-sm">{{$comment->created_at}}</p>
            </div>
        </div>
        <p class="-mt-4 text-gray-500">
            @markdown($comment->content)
        </p>
    </div>
</div>
