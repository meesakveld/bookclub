<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->book->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 flex flex-col gap-4">
            <p>← <a href="{{ route('bookclubs.show', ['id' => $post->bookclub_id]) }}"
                    class="text-green-800 font-bold">Back to bookclub</a></p>

            <div class="flex flex-col gap-8">
                <h1 class="text-2xl font-semibold">{{ $post->book->title }}</h1>

                <div class="flex gap-12 max-md:flex-col">
                    <aside class="flex flex-col gap-4 md:w-1/3">
                        <img src="{{ asset('storage/' . $post->book->image_url) }}" alt="{{ $post->book->title }}"
                            class="rounded-lg">
                        <p class="text-lg font-semibold">Review by: {{ $post->user->name ?? 'Unknown' }}</p>
                    </aside>

                    <article class="md:w-2/3 flex flex-col gap-12">
                        <section>
                            <h2 class="text-xl font-medium">Review</h2>
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 p-6">
                                <p>{{ $post->content }}</p>
                            </div>
                        </section>

                        <section>
                            <h2 class="text-xl font-medium">Comments</h2>
                            
                        </section>
                    </article>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>