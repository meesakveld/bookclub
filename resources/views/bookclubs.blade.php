<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bookclubs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">
            <div>
                <h3 class="text-xl font-medium">Alle bookclubs</h3>
                <p>Op deze pagina vind je alle bookclubs die er zijn.</p>
            </div>

            <div>
                @foreach ($bookclubs as $bookclub)
                    <a href="{{ route('bookclubs.show', $bookclub) }}">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                            <div class="p-6 text-gray-900">
                                <h2 class="text-xl font-semibold">{{ $bookclub->title }}</h2>
                                <p>{{ $bookclub->description }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>