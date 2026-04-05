<div>
    {{-- The whole world belongs to you. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form Penimbangan') }}
        </h2>
    </x-slot>

    <div class="flex flex-col justify-center">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 my-2">
            {{ __('CARI DATA ANAK') }}
        </h2>

        <div>
            <form class="flex items-center mx-auto w-full">
                <x-input-label for="search" value="{{ __('Search') }}" class="sr-only" />
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">

                        <i class="fa-solid fa-magnifying-glass text-gray-500 dark:text-gray-400 text-sm"></i>
                    </div>
                    <input type="text" id="search" wire:model.live.debounce.500ms="search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukkan nama/nim anak..." required />

                </div>

            </form>
            @if (strlen($search) > 2)

                {{-- Jika ada hasil --}}
                @if ($this->hasilPencarian->isNotEmpty())
                    @foreach ($this->hasilPencarian as $balita)
                        <div wire:click="pilihBalita({{ $balita->id }})"
                            class="cursor-pointer dark:hover:text-white hover:font-bold my-2 text-sm text-gray-600 dark:text-gray-400">
                            {{ $balita->nik_anak }} - {{ $balita->nama_anak }}
                        </div>
                    @endforeach
                @else
                    {{-- Jika tidak ada hasil --}}
                    <div class="text-sm text-red-500 mt-2">
                        Data dengan kata kunci <b>"{{ $search }}"</b> tidak ditemukan
                    </div>
                @endif

            @endif
        </div>
        @if ($balitaTerpilih)
            <div class="my-3">
                <x-input-label for="nik_anak" value="{{ __('NIK ANAK') }}" />
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 capitalize">{{ $balitaTerpilih->nik_anak }}</p>
            </div>

            <div class="my-3">
                <x-input-label for="nama_anak" value="{{ __('NAMA ANAK') }}" />
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 capitalize">{{ $balitaTerpilih->nama_anak }}
                </p>
            </div>
            <div class="my-3">
                <x-input-label for="jenis_kelamin" value="{{ __('JENIS KELAMIN') }}" />
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 capitalize">
                    {{ $balitaTerpilih->jenis_kelamin === 'Laki-laki' ? 'L' : 'P' }}</p>
            </div>
            <div class="my-3">
                <x-input-label for="tanggal_lahir" value="{{ __('TANGGAL LAHIR') }}" />
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 capitalize">
                    {{ $balitaTerpilih->tanggal_lahir }}</p>
            </div>
            <div class="my-3">
                <x-input-label for="nama_ayah" value="{{ __('NAMA AYAH') }}" />
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 capitalize">{{ $balitaTerpilih->nama_ayah }}
                </p>
            </div>
            <div class="my-3">
                <x-input-label for="nama_ibu" value="{{ __('NAMA IBU') }}" />
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 capitalize">{{ $balitaTerpilih->nama_ibu }}</p>
            </div>
            <div class="my-3">
                <x-input-label for="alamat" value="{{ __('ALAMAT') }}" />
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 capitalize">{{ $balitaTerpilih->alamat }}</p>
            </div>

            <form wire:submit="simpan">
                <div class="my-3">
                    <x-input-label for="tanggal_penimbangan" :value="__('TANGGAL PENIMBANGAN')" />
                    <x-text-input wire:model="tanggal_penimbangan" id="tanggal_penimbangan" name="tanggal_penimbangan"
                        type="date" class="mt-1 block w-full" required />
                </div>
                <div class="my-3">
                    <x-input-label for="berat_badan" :value="__('BERAT BADAN (KG)')" />
                    <x-text-input wire:model="berat_badan" id="berat_badan" name="berat_badan" type="number"
                        min="1" max="200" step="any" class="mt-1 block w-full" required />
                </div>
                <div class="my-3">
                    <x-input-label for="tinggi_badan" :value="__('TINGGI BADAN (CM)')" />
                    <x-text-input wire:model="tinggi_badan" id="tinggi_badan" name="tinggi_badan" type="number"
                        min="1" max="200" step="any" class="mt-1 block w-full" required />
                </div>
                <div class="my-3"> <x-input-label for="status_gizi" :value="__('STATUS GIZI')" />

                    <select id="status_gizi" wire:model="status_gizi"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih</option>
                        <option value="Gizi Baik">Gizi Baik</option>
                        <option value="Gizi Lebih">Gizi Lebih</option>
                        <option value="Gizi Kurang">Gizi Kurang</option>

                    </select>

                </div>
                <x-primary-button class="mt-4">
                    {{ __('Simpan') }}
                </x-primary-button>
            </form>

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 my-2 mt-10">
                {{ __('DATA PENIMBANGAN (Per Anak)') }}
            </h2>

            <div class="relative overflow-x-auto shadow-md rounded-lg">
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                no.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                nama anak
                            </th>
                            <th scope="col" class="px-6 py-3">
                                tgl penimbangan
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

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($riwayatPenimbangan as $index => $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $riwayatPenimbangan->firstItem() + $index }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->balita->nama_anak }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->tanggal_penimbangan->translatedFormat('d F Y') }}
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

                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center p-4 italic">
                                    Belum ada riwayat penimbangan.
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
                    Showing <span
                        class="font-semibold text-gray-900 dark:text-white">{{ $riwayatPenimbangan->firstItem() }}</span>
                    to
                    <span
                        class="font-semibold text-gray-900 dark:text-white">{{ $riwayatPenimbangan->lastItem() }}</span>
                    of <span
                        class="font-semibold text-gray-900 dark:text-white">{{ $riwayatPenimbangan->total() }}</span>
                    Entries
                </span>
                <!-- Buttons -->
                <div class="inline-flex mt-2 xs:mt-0">
                    <button wire:click="previousPage" @if ($riwayatPenimbangan->onFirstPage()) disabled @endif
                        class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 rounded-s hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Prev
                    </button>
                    <button wire:click="nextPage" @if (!$riwayatPenimbangan->hasMorePages()) disabled @endif
                        class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Next
                    </button>
                </div>
            </div>
        @endif

    </div>


</div>
