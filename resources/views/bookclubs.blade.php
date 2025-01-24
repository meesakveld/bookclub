<x-layouts.app>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bookclubs') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">
            <div>
                <h2 class="text-xl font-medium">All bookclubs</h2>
                <p>On this page you will find all bookclubs that are available.</p>
            </div>

            <div>
                @foreach ($bookclubs as $bookclub)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 flex justify-between max-md:flex-col items-baseline max-md:gap-2 md:items-center p-6">
                        <a href="{{ route('bookclubs.show', $bookclub) }}">
                            <div class="text-gray-900">
                                <h2 class="text-xl font-semibold">{{ $bookclub->title }}</h2>
                                <p>{{ $bookclub->description }}</p>
                            </div>
                        </a>
                        <div class="text-white px-4 py-2 rounded-md {{ $bookclub->users->contains(auth()->user()) ? 'bg-gray-300' : 'bg-blue-500' }}">
                            @if (!$bookclub->users->contains(auth()->user()))
                                <form action="{{ route('bookclubs.join', $bookclub) }}" method="POST">
                                    @csrf
                                    <button type="submit">Join</button>
                                </form>
                            @else
                                <p>Joined</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>