<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Link') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <form class="mx-auto" action="{{ route('links.update', $link->id) }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                    <input type="text" id="name" name="name" value="{{ $link->name }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="my super link" />
                    @error('name')
                        <p class="mt-2 text-red-700 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="link" class="block mb-2 text-sm font-medium text-gray-900">Link</label>
                    <input type="text" id="link" name="link" value="{{ $link->link }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="https://example.com/article/heavy-metal" />
                    @error('link')
                        <p class="mt-2 text-red-700 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="focus:outline-none bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Update</button>
                <form action="{{ route('links.destroy', $link->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                    class="focus:outline-none bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2"
                    onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">Delete</button>
                </form>
            </form>
        </div>
    </div>
</x-app-layout>
