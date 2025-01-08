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

            <div>
                @foreach ($books as $book)
                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 flex justify-between items-center p-6">
                        <div class="text-gray-900">
                        <img src="{{ asset('storage/' . $book->image_url) }}" alt="">
                            <h2 class="text-xl font-semibold">{{ $book->title }}</h2>
                            <p>{{ $book->description }}</p>
                            <p>{{ $book->published_at }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>