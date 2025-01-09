<x-layouts.app>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h1>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto p-6 flex flex-col gap-12">
        <div>
            <h2 class="text-2xl font-semibold">Welkom!</h2>
            <p>Magna ut ipsum cillum elit mollit dolor laborum pariatur eu ut adipisicing esse laborum. Fugiat aliquip
                laborum consequat fugiat do excepteur. Sunt aute ad et fugiat amet minim in sunt aliqua minim ut culpa
                mollit. Aliquip ad elit quis quis ex et non. Magna velit minim fugiat sunt nostrud laboris dolor. Anim
                dolore cillum consectetur adipisicing deserunt occaecat veniam. Nisi veniam anim aliquip ea dolore
                cillum tempor mollit cupidatat ipsum cupidatat.

                Sint Lorem aliqua nostrud incididunt mollit consequat tempor non consectetur esse ullamco culpa.
                Consectetur est aliqua culpa culpa. Elit eiusmod Lorem minim incididunt non nulla voluptate occaecat
                quis duis id nisi irure. Esse velit et labore veniam elit velit ad dolor proident culpa pariatur.
                Commodo Lorem minim aliquip cupidatat reprehenderit. Magna anim voluptate dolor exercitation minim
                veniam velit nostrud ullamco deserunt ex officia anim. Enim amet sint do ex pariatur do.</p>
        </div>

        <div class=" grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('bookclubs') }}">
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full aspect-square flex flex-col items-center justify-center">
                    <p class="text-green-800 font-bold text-4xl">Bookclubs</p>
                </div>
            </a>

            <a href="{{ route('books') }}">
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full aspect-square flex flex-col items-center justify-center">
                    <p class="text-green-800 font-bold text-4xl">Books</p>
                </div>
            </a>
        </div>
    </div>
</x-layouts.app>