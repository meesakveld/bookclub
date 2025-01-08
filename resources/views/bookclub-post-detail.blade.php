<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->book->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 flex flex-col gap-6">
            <nav class="flex gap-2">
                <a class="text-green-800 font-bold" href="{{ route('bookclubs') }}">Bookclubs</a>
                <span>/</span>
                <a class="text-green-800 font-bold"
                    href="{{ route('bookclubs.show', ['id' => $post->bookclub->id]) }}">{{ $post->bookclub->title }}</a>
                <span>/</span>
                <span>{{ $post->book->title }}</span>
            </nav>

            <div class="flex flex-col gap-8">
                <h1 class="text-2xl font-semibold">{{ $post->book->title }}</h1>

                <div class="flex gap-12 max-md:flex-col">
                    <aside class="flex flex-col gap-4 md:w-1/3">
                        <img src="{{ asset('storage/' . $post->book->image_url) }}" alt="{{ $post->book->title }}"
                            class="rounded-lg">

                        <div class="flex gap-2">
                            <p class="text-lg font-semibold">Review by: </p>
                            <p class="text-lg">{{ $post->user->name ?? 'Unknown' }}</p>
                        </div>

                        <form
                            action="{{ route('bookclubs.post.destroy', ['id' => $post->bookclub->id, 'bookPostId' => $post->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white rounded-lg py-2 px-4">Delete</button>
                        </form>
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

                            <form
                                action="{{ route('bookclubs.post.comment', ['id' => $post->bookclub->id, 'bookPostId' => $post->id]) }}"
                                method="POST"
                                class="flex flex-col gap-4 bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 p-6">
                                @csrf
                                <textarea name="content" id="content"
                                    class="w-full rounded-lg border border-gray-300 p-2"
                                    placeholder="Write a comment"></textarea>
                                <button type="submit"
                                    class="bg-green-500 text-white rounded-lg p-2 mt-2">Submit</button>
                            </form>

                            @if (!$comments->isEmpty())
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 p-6 flex flex-col gap-6">
                                    @foreach ($comments as $comment)
                                        <div>
                                            <div class="flex flex-col gap-2">
                                                <p class="font-semibold">{{ $comment->user->name ?? 'Unknown' }}</p>
                                                <p>{{ $comment->content }}</p>
                                                <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>

                                                @if ($comment->user->id === auth()->id())
                                                    <form
                                                        action="{{ route('bookclubs.post.comment.delete', ['id' => $post->bookclub->id, 'bookPostId' => $post->id, 'commentId' => $comment->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="bg-red-500 text-white rounded-lg py-2 px-4">Delete</button>
                                                    </form>
                                                @endif
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </section>
                    </article>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>