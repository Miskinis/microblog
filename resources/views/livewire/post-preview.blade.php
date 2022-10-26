<article class="flex flex-col shadow my-4">
    <div class="space-x-12 p-4">
        @if(auth()->check() && auth()->user()->can('update', $post))
            <a class="text-gray-500 text-xl" href="{{route('post.edit', $post)}}"><i class="fa-solid fa-pen"></i></a>
        @endif
        @if(auth()->check() && auth()->user()->can('delete', $post))
            <button class="text-gray-500 text-xl" wire:click.prevent="delete()" onclick="return confirm('Are you sure you want to delete this post?')"><i class="fa-solid fa-trash"></i></button>
        @endif
    </div>
    <!-- Article Image -->
    <a href="{{route('post', $post->slug)}}" class="hover:opacity-75">
        <img src="{{$post->img}}">
    </a>
    <div class="bg-white flex flex-col justify-start p-6">
        <a href="{{route('post', $post->slug)}}" class="text-blue-700 text-sm font-bold uppercase pb-4">{{$post->topic->name}}</a>
        <a href="{{route('post', $post->slug)}}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$post->title}}</a>
        <p href="{{route('post', $post->slug)}}" class="text-sm pb-3">
            By <a href="{{route('user', $post->user->slug)}}" class="font-semibold hover:text-gray-800">{{$post->user->name}}</a>, Published on {{$post->created_at}}
        </p>
        <a href="{{route('post', $post->slug)}}" class="pb-6 max-h-72 overflow-hidden fade">
            @markdown($post->content)
        </a>
        <a href="{{route('post', $post->slug)}}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
    </div>
</article>
