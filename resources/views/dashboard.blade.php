<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="p-6 text-gray-900">
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($links as $link)
                    <div>
                        <a href="{{ $link->link }}" target="_blank"
                            style="background-color: {{ $link->user->background_color }}"
                            class="block max-w-sm p-6 border border-gray-200 rounded-lg shadow">

                            <h5 style="color: {{ $link->user->text_color }}"
                                class="mb-2 text-2xl font-bold tracking-tight">{{ $link->name }}</h5>
                            <p class="font-normal text-gray-700">{{ $link->visits->count() }}</p>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
