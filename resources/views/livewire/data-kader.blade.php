<div>
    {{-- Success is as dangerous as failure. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Kader') }}
        </h2>
    </x-slot>

    <x-modal name="create-kader" focusable>

        <form wire:submit="tambahKader" class="p-6">

            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                Tambah Kader
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Tambahkan data kader posyandu baru.
            </p>

            {{-- Nama --}}
            <div class="mt-6">

                <x-input-label for="name" value="Nama" />

                <x-text-input id="name" type="text" class="mt-1 block w-full" wire:model="name" />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />

            </div>

            {{-- Email --}}
            <div class="mt-4">

                <x-input-label for="email" value="Email" />

                <x-text-input id="email" type="email" class="mt-1 block w-full" wire:model="email" />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>

            {{-- Password --}}
            <div class="mt-4">

                <x-input-label for="password" value="Password" />

                <x-text-input id="password" type="password" class="mt-1 block w-full" wire:model="password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>

            {{-- Button --}}
            <div class="mt-6 flex justify-end gap-3">

                <x-secondary-button x-on:click="$dispatch('close-modal', 'create-kader')">

                    Batal

                </x-secondary-button>

                <x-primary-button>

                    Simpan

                </x-primary-button>

            </div>

        </form>

    </x-modal>


    <div class="flex flex-row gap-2 justify-start items-start">
        <button x-on:click="$dispatch('open-modal', 'create-kader')"
            class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <i class="fa-solid fa-plus text-sm me-2"></i>
            Tambah Kader
        </button>
        <button
            class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
            <i class="fa-solid fa-file-pdf text-sm me-2"></i>
            Export PDF
        </button>
    </div>

    {{-- search --}}
    <div
        class="flex flex-col lg:flex-row md:flex-row justify-start lg:justify-between md:justify-between items-end gap-4 my-8">
        <div>
            <form class="max-w-sm mx-auto">
                <label for="show_entries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Show
                    Entries</label>
                <select id="show_entries" wire:model.live='perPage'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="10">10</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </form>
        </div>
        <div>
            <form class="flex items-center max-w-sm mx-auto">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">

                        <i class="fa-solid fa-magnifying-glass text-gray-500 dark:text-gray-400 text-sm"></i>
                    </div>
                    <input type="text" id="simple-search" wire:model.live.debounce.500ms='search'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Cari data kader..." required />
                </div>

            </form>
        </div>
    </div>

    {{-- table --}}
    <div class="my-10 relative overflow-x-auto shadow-md rounded-lg">
        <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        no. hp
                    </th>

                    <th scope="col" class="px-6 py-3">
                        aksi
                    </th>

                </tr>
            </thead>
            <tbody>
                @forelse ($kaders as $index => $kader)
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $kaders->firstItem() + $index }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $kader->name }}

                        </td>
                        <td class="px-6 py-4">
                            {{ $kader->email }}

                        </td>

                        <td class="px-6 py-4">
                            <div class="flex flex-row justify-center">
                                <a href=""
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </a>
                                <button
                                    class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800"
                                    title="Edit">
                                    <i class="fa-solid fa-pen-to-square text-sm"></i>
                                </button>
                                <button wire:click="$dispatch('confirm-delete', { id: {{ $kader->id }} })"
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                    title="Hapus">
                                    <i class="fa-solid fa-trash text-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-4 italic">
                            @if ($search)
                                Data dengan kata kunci <b>"{{ $search }}"</b> tidak ditemukan.
                            @else
                                Data belum tersedia.
                            @endif
                        </td>
                    </tr>
                @endforelse



            </tbody>
        </table>
    </div>

    {{-- paginasi --}}
    <div class="flex flex-col items-center my-4">
        <!-- Help text -->
        <span class="text-sm text-gray-700 dark:text-gray-400">
            Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $kaders->firstItem() }}</span> to
            <span class="font-semibold text-gray-900 dark:text-white">{{ $kaders->lastItem() }}</span> of <span
                class="font-semibold text-gray-900 dark:text-white">{{ $kaders->total() }}</span> Entries
        </span>
        <!-- Buttons -->
        <div class="inline-flex mt-2 xs:mt-0">
            <button wire:click="previousPage" @if ($kaders->onFirstPage()) disabled @endif
                class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 rounded-s hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Prev
            </button>
            <button wire:click="nextPage" @if (!$kaders->hasMorePages()) disabled @endif
                class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Next
            </button>
        </div>
    </div>
</div>
