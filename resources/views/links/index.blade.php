<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Links') }}
        </h2>
        @if (session()->has('status'))
            <div x-data="{show: true}"
                x-init="setTimeout(() => show = false, 4000)"
                x-show="show"
                class="bg-laravel text-blue-700 text-sm font-bold">
                <p>
                    {{ session('status') }}
                </p>
            </div>
        @endif
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <div class="m-4">
                    <a href="{{ route('links.create') }}"
                        class="p-2 rounded-md bg-blue-500 text-white text-lg font-semibold">Add Link</a>
                </div>

                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Url</th>
                            <th scope="col" class="px-6 py-3">Visits</th>
                            <th scope="col" class="px-6 py-3">Last Visit</th>
                            <th scope="col" class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($links as $link)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">{{ $link->name }}</td>
                            <td class="px-6 py-4"><a href="{{ $link->link }}" data-link-id="{{ $link->id }}" class="user-link text-blue-500 hover:underline">{{ $link->link }}</a></td>
                            <td class="px-6 py-4">{{ $link->visits_count }}</td>
                            <td class="px-6 py-4">{{ $link->latest_visit ? $link->latest_visit->created_at->format('M j Y - H:ia') : 'N/A' }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('links.edit', $link->id) }}"
                                    class="p-1 rounded-md bg-amber-500 text-white text-sm font-semibold">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $links->links() }}
        </div>
</x-app-layout>
