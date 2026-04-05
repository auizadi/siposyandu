<div>
    {{-- In work, do what you enjoy. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Penimbangan') }}
        </h2>
    </x-slot>
    <div class="flex flex-row gap-2 justify-start items-start">
        <a href="{{ route('form-penimbangan') }}" wire:navigate
            class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <i class="fa-solid fa-plus text-sm me-2"></i>
            Tambah Data
        </a>
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
                <select id="show_entries" wire:model="perPage"
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
                    <input type="text" id="simple-search" wire:model.live="search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Cari data balita..." required />
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
                        no.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        tgl penimbangan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        nik anak
                    </th>
                    <th scope="col" class="px-6 py-3">
                        nama anak
                    </th>
                    <th scope="col" class="px-6 py-3">
                        jk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        usia
                    </th>
                    <th scope="col" class="px-6 py-3">
                        berat badan (kg)
                    </th>
                    <th scope="col" class="px-6 py-3">
                        tinggi badan (cm)
                    </th>
                    <th scope="col" class="px-6 py-3">
                        status gizi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $index => $item)
                    <tr class="bg-white dark:bg-gray-800 capitalize">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $data->firstItem() + $index }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->tanggal_penimbangan->translatedFormat('d F Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->balita->nik_anak }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->balita->nama_anak }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->balita->jenis_kelamin === 'Laki-laki' ? 'L' : 'P' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->balita->usia }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->berat_badan }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->tinggi_badan }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->status_gizi }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-row">
                                <a href=""
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </a>
                                <button
                                    class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800"
                                    title="Edit">
                                    <i class="fa-solid fa-pen-to-square text-sm"></i>
                                </button>
                                <button
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                    title="Hapus">
                                    <i class="fa-solid fa-trash text-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center p-4 italic">
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
            Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $data->firstItem() }}</span> to
            <span class="font-semibold text-gray-900 dark:text-white">{{ $data->lastItem() }}</span> of <span
                class="font-semibold text-gray-900 dark:text-white">{{ $data->total() }}</span> Entries
        </span>
        <!-- Buttons -->
        <div class="inline-flex mt-2 xs:mt-0">
            <button wire:click="previousPage" @if ($data->onFirstPage()) disabled @endif
                class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 rounded-s hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Prev
            </button>
            <button wire:click="nextPage" @if (!$data->hasMorePages()) disabled @endif
                class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Next
            </button>
        </div>
    </div>
</div>
