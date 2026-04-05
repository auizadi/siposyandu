    <div>
        {{-- Close your eyes. Count to one. That is how long forever feels. --}}
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Data Lansia') }}
            </h2>
        </x-slot>

        <div class="flex flex-row gap-2 justify-start items-start">
            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'tambah-data-lansia')"
                class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <i class="fa-solid fa-plus text-sm me-2"></i>
                Tambah Data
            </button>
            <button
                class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <i class="fa-solid fa-file-pdf text-sm me-2"></i>
                Export PDF
            </button>
        </div>

        {{-- modal --}}
        <x-modal name="tambah-data-lansia" :show="$errors->isNotEmpty()" focusable>
            <form wire:submit="{{ $isEdit ? 'updateDataLansia' : 'tambahDataLansia' }}" class="p-6">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-2 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $isEdit ? 'Edit' : 'Tambah' }} Data Lansia
                    </h3>
                    <button type="button" x-on:click="$dispatch('close')"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="grid grid-cols-2 mt-6 gap-4">
                    <div>
                        <x-input-label for="nik_lansia" value="{{ __('NIK LANSIA') }}" />

                        <x-text-input wire:model="nik_lansia" id="nik_lansia" name="nik_lansia" type="text"
                            class="mt-1 w-full" placeholder="{{ __('NIK LANSIA') }}" />

                        <x-input-error :messages="$errors->get('nik_lansia')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="nama_lansia" value="{{ __('NAMA LANSIA') }}" />

                        <x-text-input wire:model="nama_lansia" id="nama_lansia" name="nama_lansia" type="text"
                            class="mt-1 w-full" placeholder="{{ __('NAMA LANSIA') }}" />

                        <x-input-error :messages="$errors->get('nama_lansia')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="jenis_kelamin" value="{{ __('JENIS KELAMIN') }}" />

                        <select id="jenis_kelamin" wire:model="jenis_kelamin"
                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih</option>
                            <option value="Laki-laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>

                        </select>

                        <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="tanggal_lahir" value="{{ __('TANGGAL LAHIR') }}" />

                        <x-text-input wire:model="tanggal_lahir" id="tanggal_lahir" name="tanggal_lahir" type="date"
                            class="mt-1 w-full" placeholder="{{ __('TANGGAL LAHIR') }}" />

                        <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
                    </div>
                    <div class="col-span-2">
                        <x-input-label for="alamat" value="{{ __('ALAMAT') }}" />

                        <x-text-input wire:model="alamat" id="alamat" name="alamat" type="text"
                            class="mt-1 w-full" placeholder="{{ __('ALAMAT') }}" />

                        <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                    </div>
                    <div class="col-span-2">
                        <x-input-label for="riwayat_kesehatan" value="{{ __('RIWAYAT KESEHATAN') }}" />

                        <textarea id="message" rows="4" wire:model="riwayat_kesehatan"
                            class="block p-2.5 w-full mt-1 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ __('Tulis riwayat kesehatan disini...') }}"></textarea>


                        <x-input-error :messages="$errors->get('riwayat_kesehatan')" class="mt-2" />
                    </div>

                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Batal') }}
                    </x-secondary-button>

                    <x-primary-button class="ms-3" x-on:click="$dispatch('close')">
                        {{ $isEdit ? 'Update' : 'Simpan' }}
                    </x-primary-button>
                </div>
            </form>
        </x-modal>

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
                            placeholder="Cari data lansia..." required />
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
                            nik lansia
                        </th>
                        <th scope="col" class="px-6 py-3">
                            nama lansia
                        </th>
                        <th scope="col" class="px-6 py-3">
                            jk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            tgl lahir
                        </th>
                        <th scope="col" class="px-6 py-3">
                            umur
                        </th>
                        <th scope="col" class="px-6 py-3">
                            alamat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            riwayat kesehatan
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
                                {{ $item->nik_lansia }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->nama_lansia }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->jenis_kelamin === 'Laki-laki' ? 'L' : 'P' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->tanggal_lahir->translatedFormat('d F Y') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->umur }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->alamat }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->riwayat_kesehatan }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-row">
                                    <a href=""
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <i class="fa-solid fa-eye text-sm"></i>
                                    </a>
                                    <button wire:click="editDataLansia({{ $item->id }})" x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'tambah-data-lansia')"
                                        class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800"
                                        title="Edit">
                                        <i class="fa-solid fa-pen-to-square text-sm"></i>
                                    </button>
                                    <button wire:click="$dispatch('confirm-delete', { id: {{ $item->id }} })"
                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                        title="Hapus">
                                        <i class="fa-solid fa-trash text-sm"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center p-4 italic">
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
