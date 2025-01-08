<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $bookclub->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 flex flex-col gap-4">
            <p>← <a href="{{ route('bookclubs') }}" class="text-green-800 font-bold">Back to bookclubs</a></p>

            <div class="flex flex-col gap-8">
                <h1 class="text-2xl font-semibold">{{ $bookclub->title }}</h1>

                <article>
                    <h2 class="text-xl font-medium">About this bookclub</h2>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 p-6">
                        <p>{{ $bookclub->description }}</p>
                    </div>
                </article>

                <article>
                    <h2 class="text-xl font-medium mt-4">Books in this bookclub</h2>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach ($posts as $post)
                            <a href="{{ route('bookclubs.post', ['id' => $bookclub->id, 'bookPostId' => $post->id]) }}">
                                <section class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 p-6 flex flex-col gap-4 h-full">
                                    <img src="{{ asset('storage/' . $post->book->image_url) }}" alt="{{ $post->book->title }}"
                                        class="w-full rounded-lg">
                                    <h3 class="text-xl font-medium">{{ $post->book->title }}</h3>
                                    <p>Review by: {{ $post->user->name ?? 'Unknown' }}</p>
                                </section>
                            </a>
                        @endforeach
                    </div>
                </article>
            </div>
        </div>
    </div>
</x-layouts.app>