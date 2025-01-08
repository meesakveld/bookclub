<div class="bg-white p-6 flex flex-col gap-4 rounded-lg">
    <img src="{{ asset('storage/' . $book->image_url) }}" alt="{{ $book->title }}" class="w-full rounded-lg">
    <h2 class="text-xl font-semibold">{{ $book->title }}</h2>
    <p>{{ $book->description }}</p>
    <p class="text-gray-500">Publishing date: {{ $book->published_at }}</p>
</div>