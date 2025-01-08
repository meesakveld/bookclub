<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">
            <div>
                <h3 class="text-xl font-medium">All books</h3>
                <p>On this page you will find all books that are available.</p>
            </div>

            <div class="my-4 grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($books as $book)
                    <div class="bg-white p-6 flex flex-col gap-4 rounded-lg">
                        <img src="{{ asset('storage/' . $book->image_url) }}" alt="{{ $book->title }}" class="w-full rounded-lg">
                        <h2 class="text-xl font-semibold">{{ $book->title }}</h2>
                        <p>{{ $book->description }}</p>
                        <p class="text-gray-500">Publishing date: {{ $book->published_at }}</p>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-center">
                <div class="flex gap-2">
                    <a href="{{ route('books', ['page' => $page - 1]) }}" class="bg-green-500 text-white font-semibold p-2 rounded-md {{$page == 1 ? 'opacity-50 pointer-events-none cursor-not-allowed' : ''}}">Previous page</a>
                    <span class="font-semibold p-2 rounded-md">{{$page}}/{{$total_books / $per_page}}</span>
                    <a href="{{ route('books', ['page' => $page + 1]) }}" class="bg-green-500 text-white font-semibold p-2 rounded-md {{$page == ($total_books / $per_page) ? 'opacity-50 pointer-events-none cursor-not-allowed' : ''}}">Next page</a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>