<article class="flex flex-col shadow my-4">
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
