<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $bookclub->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 flex flex-col gap-4">
            <p>← <a href="{{ route('bookclubs') }}" class="text-green-800 font-bold">Terug naar alle bookclubs</a></p>

            <h1 class="text-2xl font-semibold">{{ $bookclub->title }}</h1>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 p-6">
                <h3 class="text-xl font-medium">Over deze bookclub</h3>
                <p>{{ $bookclub->description }}</p>
            </div>

            

        </div>
    </div>
</x-layouts.app>