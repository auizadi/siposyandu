<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Jadwal Posyandu') }}
        </h2>
    </x-slot>

    <h2 class="text-2xl mb-5 text-center font-medium text-gray-900 dark:text-gray-100">
        {{ __('ATUR JADWAL POSYANDU') }}
    </h2>

    <div class="flex flex-col lg:flex-row md:flex-row gap-5 justify-center items-center">
        {{-- jadwal posyandu balita --}}
        <div class="p-7 rounded-lg bg-red-300 dark:bg-gray-700 lg:w-1/3 w-full shadow-md shadow-gray-500">
            <form wire:submit="buatJadwalBalita">
                <x-input-label for="jadwal_posyandu_balita" value="{{ __('JADWAL POSYANDU BALITA') }}" />
                <x-text-input wire:model="jadwal_posyandu_balita" id="jadwal_posyandu_balita"
                    name="jadwal_posyandu_balita" type="date" class="mt-1 block w-full" />
                <x-primary-button class="mt-3">
                    {{ __('Simpan') }}
                </x-primary-button>
            </form>

        </div>
        {{-- jadwal posyandu lansia --}}
        <div class="p-7 rounded-lg bg-blue-300 dark:bg-gray-700 lg:w-1/3 shadow-md  w-full shadow-gray-500">
            <form wire:submit="buatJadwalLansia">
                <x-input-label for="jadwal_posyandu_lansia" value="{{ __('JADWAL POSYANDU LANSIA') }}" />
                <x-text-input wire:model="jadwal_posyandu_lansia" id="jadwal_posyandu_lansia"
                    name="jadwal_posyandu_lansia" type="date" class="mt-1 block w-full" />
                <x-primary-button class="mt-3">
                    {{ __('Simpan') }}
                </x-primary-button>
            </form>
        </div>
    </div>

    {{-- table --}}
    <div class="relative overflow-x-auto shadow-md rounded-lg my-10">
        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
            <div
                class="p-5 text-lg font-semibold text-center rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800 flex items-center">
                <i class="fa-solid fa-child me-2 text-xl "></i>
                <h2>JADWAL POSYANDU</h2>
            </div>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        no.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        nama posyandu
                    </th>
                    @for ($m = 1; $m <= 12; $m++)
                        <th scope="col" class="px-6 py-3">
                            {{ \Carbon\Carbon::create()->month($m)->translatedFormat('M') }}
                        </th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach ($posyandus as $i => $nama_posyandu)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $nama_posyandu }}
                        </td>
                        @for ($m = 1; $m <= 12; $m++)
                            <td class="px-6 py-4">
                                @foreach ($matrix[$nama_posyandu][$m] ?? [] as $item)
                                    <div class="text-xs">
                                        {{ $item['tanggal'] }} ({{ $item['jenis'] }})
                                    </div>
                                @endforeach
                            </td>
                        @endfor



                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>

</div>
