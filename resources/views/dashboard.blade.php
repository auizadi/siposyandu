<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="p-6 text-center rounded-lg mb-10 bg-gray-800 text-white">
        <p class="capitalize font-bold text-2xl mb-2">selamat datang !</p>
        <p class="font-normal text-xs lg:text-base">Selamat Datang di Sistem Informasi Posyandu Anggrek, Anda Login
            sebagai <b>{{ Auth::user()->getRoleNames()->first() }} Posyandu</b></p>
    </div>
    <div class="grid grid-cols-1 lg:md:grid-cols-3 mb-4 text-gray-900 dark:text-gray-100 ">
        <div class="p-6 col-span-1 lg:col-span-2 bg-white dark:bg-gray-800 rounded-lg">
            <p class="uppercase font-bold mb-2">jumlah kader posyandu</p>
            <p class="text-3xl font-bold">12</p>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-3 gap-4 text-gray-900 dark:text-gray-100 ">
        <div class="p-6 bg-white dark:bg-gray-800 rounded-lg">
            <p class="uppercase font-bold mb-2">data balita</p>
            <p class="text-3xl font-bold">12</p>
        </div>
        <div class="p-6 bg-white dark:bg-gray-800 rounded-lg">
            <p class="uppercase font-bold mb-2">perempuan</p>
            <p class="text-3xl font-bold">12</p>
        </div>
        <div class="p-6 bg-white dark:bg-gray-800 rounded-lg">
            <p class="uppercase font-bold mb-2">laki-laki</p>
            <p class="text-3xl font-bold">12</p>
        </div>

        <div class="p-6 bg-white dark:bg-gray-800 rounded-lg">
            <p class="uppercase font-bold mb-2">data lansia</p>
            <p class="text-3xl font-bold">12</p>
        </div>
        <div class="p-6 bg-white dark:bg-gray-800 rounded-lg">
            <p class="uppercase font-bold mb-2">perempuan</p>
            <p class="text-3xl font-bold">12</p>
        </div>
        <div class="p-6 bg-white dark:bg-gray-800 rounded-lg">
            <p class="uppercase font-bold mb-2">laki-laki</p>
            <p class="text-3xl font-bold">12</p>
        </div>
    </div>
</x-app-layout>
