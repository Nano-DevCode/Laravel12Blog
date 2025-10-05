<x-layouts.app>

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        {{--<img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">--}}

                        <flux:avatar :name="$post->user->name" class="mr-4 " size="lg" circle >

                        </flux:avatar>
                        <div>
                            <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">
                                {{$post->user->name}}
                            </a>
                            <p class="text-base text-gray-500 dark:text-gray-400">
                                Desarrollador Web
                            </p>
                            <p class="text-base text-gray-500 dark:text-gray-400">
                                <time pubdate datetime="2022-02-08" title="February 8th, 2022">
                                    {{$post->published_at->format('M. d, Y')}}
                                </time>
                            </p>
                        </div>
                    </div>
                </address>
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                    {{$post->title}}
                </h1>
            </header>

            <div class="mb-4">
                {{$post->content}}
            </div>
        </article>
    </div>
    </main>

    <aside aria-label="Articulos Relacionados" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800">
    <div class="px-4 mx-auto max-w-screen-xl">
        <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Articulos Relacionados</h2>
        <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">

            @foreach ( $relatedPosts as $relatedPost)
                <article class="flex flex-col">
                    <div class="flex-grow">
                        <a href="{{route('posts.show', $relatedPost)}}">
                            <img src="{{$relatedPost->image}}" class="mb-5 rounded-lg w-full h-48 object-cover" alt="{{$relatedPost->title}}">
                        </a>
                        <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                            <a href="{{route('posts.show', $relatedPost)}}">
                                {{$relatedPost->title}}
                            </a>
                        </h2>
                        <p class="mb-4 text-gray-500 dark:text-gray-400">
                            {{Str::limit($relatedPost->excerpt, 100)}}
                        </p>
                    </div>
                    <a href="{{route('posts.show', $relatedPost)}}" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                        Leer mas
                    </a>
                </article>
            @endforeach
        </div>
    </div>
    </aside>


</x-layouts.app>
