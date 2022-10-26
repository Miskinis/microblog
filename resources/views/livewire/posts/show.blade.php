<livewire:blog-navbar :wire:key="uniqid()"/>

<div class="container mx-auto flex flex-wrap py-6">
    @if(auth()->check() && $authUser->can('view', $post))
    <!-- Post Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        <div class="space-x-12">
            @if(auth()->check() && auth()->user()->can('update', $post))
                <a class="text-gray-500 text-xl" href="{{route('post.edit', $post)}}"><i class="fa-solid fa-pen"></i></a>
            @endif
            @if(auth()->check() && auth()->user()->can('delete', $post))
                <button class="text-gray-500 text-xl" wire:click.prevent="delete()" onclick="return confirm('Are you sure you want to delete this post?')"><i class="fa-solid fa-trash"></i></button>
            @endif
        </div>
        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img src="{{$post->img}}">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{$post->topic->name}}</a>
                <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$post->title}}</a>
                <p href="#" class="text-sm pb-8">
                    By <a href="{{route('user', $post->user->slug)}}" class="font-semibold hover:text-gray-800">{{$post->user->name}}</a>, Published on {{$post->created_at}}
                </p>
                @markdown($post->content)
            </div>

            @if(auth()->check() && auth()->user()->can('create', App\Models\Comment::class))
                <article class="flex flex-col shadow my-4">
                    <div class="bg-white flex flex-col justify-start p-6">
                        <livewire:comments.create-comment :post="$post"/>
                    </div>
                </article>
            @endif

            <article id="comments" class="flex flex-col shadow my-4">
                <div class="bg-white flex flex-col justify-start p-6">
                    @foreach($post->comments()->latest()->get() as $comment)
                        <livewire:comments.show-comment :comment="$comment" :wire:key="'comments-show-one-'.$comment->id"/>
                    @endforeach
                </div>
            </article>
        </article>
        @else
            <h1 class="py-12">You cannot view this post</h1>
        @endif

        <div class="w-full flex pt-6">
            <a href="#" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i> Previous</p>
                <p class="pt-2">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</p>
            </a>
            <a href="#" class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i class="fas fa-arrow-right pl-1"></i></p>
                <p class="pt-2">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</p>
            </a>
        </div>

        <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-white mt-10 mb-10 p-6">
            <div class="w-full md:w-1/5 flex justify-center md:justify-start pb-4">
                <img src="{{$post->user->profile_photo_url}}" class="rounded-full shadow h-32 w-32">
            </div>
            <div class="flex-1 flex flex-col justify-center md:justify-start">
                <p class="font-semibold text-2xl">{{$post->name}}</p>
                <p class="pt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel neque non libero suscipit suscipit eu eu urna.</p>
                <div class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4">
                    <a class="" href="#">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>

    </section>

    <!-- Sidebar Section -->
    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">About Us</p>
            <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
            <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                Get to know us
            </a>
        </div>

        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">Instagram</p>
            <div class="grid grid-cols-3 gap-3">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=1">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=2">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=3">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=4">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=5">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=6">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=7">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=8">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=9">
            </div>
            <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                <i class="fab fa-instagram mr-2"></i> Follow @dgrzyb
            </a>
        </div>
    </aside>
</div>

<footer class="w-full border-t bg-white pb-12">
    <div
        class="relative w-full flex items-center invisible md:visible md:pb-12"
        x-data="getCarouselData()">
        <button
            class="absolute bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 ml-12"
            x-on:click="decrement()">
            &#8592;
        </button>
        <template x-for="image in images.slice(currentIndex, currentIndex + 6)" :key="images.indexOf(image)">
            <img class="w-1/6 hover:opacity-75" :src="image">
        </template>
        <button
            class="absolute right-0 bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 mr-12"
            x-on:click="increment()">
            &#8594;
        </button>
    </div>
    <div class="w-full container mx-auto flex flex-col items-center">
        <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
            <a href="#" class="uppercase px-3">About Us</a>
            <a href="#" class="uppercase px-3">Privacy Policy</a>
            <a href="#" class="uppercase px-3">Terms & Conditions</a>
            <a href="#" class="uppercase px-3">Contact Us</a>
        </div>
        <div class="uppercase pb-6">&copy; myblog.com</div>
    </div>
</footer>

<script>
    function getCarouselData() {
        return {
            currentIndex: 0,
            images: [
                'https://source.unsplash.com/collection/1346951/800x800?sig=1',
                'https://source.unsplash.com/collection/1346951/800x800?sig=2',
                'https://source.unsplash.com/collection/1346951/800x800?sig=3',
                'https://source.unsplash.com/collection/1346951/800x800?sig=4',
                'https://source.unsplash.com/collection/1346951/800x800?sig=5',
                'https://source.unsplash.com/collection/1346951/800x800?sig=6',
                'https://source.unsplash.com/collection/1346951/800x800?sig=7',
                'https://source.unsplash.com/collection/1346951/800x800?sig=8',
                'https://source.unsplash.com/collection/1346951/800x800?sig=9',
            ],
            increment() {
                this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex + 1;
            },
            decrement() {
                this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex - 1;
            },
        }
    }
</script>
