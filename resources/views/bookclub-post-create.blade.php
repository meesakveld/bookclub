<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create a new post for {{ $bookclub->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 flex flex-col gap-6">
            <nav class="flex gap-2">
                <a href="{{ route('bookclubs') }}" class="text-green-800 font-bold">Bookclubs</a>
                <span>/</span>
                <span>{{ $bookclub->title }}</span>
                <span>/</span>
                <span>Create a new post</span>
            </nav>

            <div class="flex flex-col gap-8">
                <h1 class="text-2xl font-semibold">Create a new post for {{ $bookclub->title }}</h1>

                <form action="{{ route('bookclubs.post.create.store', $bookclub->id) }}" method="POST" class="flex flex-col gap-4">
                    @csrf

                    <div class="flex flex-col gap-2">
                        <label for="title" class="font-semibold">Book</label>
                        <select name="book_id" id="book_id" class="p-2 border border-gray-300 rounded-md" required>
                            <option value="">Select a book</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="content" class="font-semibold">Content</label>
                        <textarea name="content" id="content" rows="10" class="p-2 border border-gray-300 rounded-md" required></textarea>
                    </div>

                    <button type="submit" class="bg-green-500 text-white font-semibold p-2 rounded-md">Create post</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>