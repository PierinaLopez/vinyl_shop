<x-vinylshop-layout>
    <x-slot name="description">This page is under construction</x-slot>
    <x-slot name="title">Welcome to the Vinyl Shop</x-slot>
    <x-slot name="subtitle"></x-slot>

    <div class="grid md:grid-cols-2 gap-8 mt-8">
        <div class="hidden md:flex md:flex-row-reverse md:border-r-2 md:border-gray-300">
            <x-heroicon-s-face-frown class="size-40 text-gray-300" />
        </div>
        <div>
            <p class="text-5xl">COMING SOON</p>
            <p class="text-2xl font-light text-gray-400">THIS PAGE IS UNDER CONSTRUCTION</p>
            <div class="mt-4">
                <x-button>
                    <a href="{{ route('home') }}">Home</a>
                </x-button>
                <x-button>
                    <a href="#" onclick="window.history.back();">Back</a>
                </x-button>
            </div>
        </div>
    </div>
</x-vinylshop-layout>
