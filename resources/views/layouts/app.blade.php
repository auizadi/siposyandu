<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/998802c292.js" crossorigin="anonymous"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <livewire:layout.navigation />

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="pb-16">
            <div class="py-8">
                <div class="max-w-7xl mx-auto px-6 lg:px-8">
                    <div class=" overflow-hidden shadow-sm">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </main>

        {{-- footer --}}
        <footer
            class="fixed bottom-0 left-0 z-20 w-full p-4 bg-white border-t border-gray-200 shadow-sm md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ now()->year }} <a
                    href="" class="hover:underline">SIPOS</a>. All Rights Reserved.
            </span>
            <ul
                class="hidden md:flex lg:flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                <li>
                    <a href="{{ route('dashboard') }}" wire:navigate
                        class="hover:underline me-4 md:me-6 {{ request()->routeIs('dashboard') ? 'font-bold text-white' : '' }}">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('data-kader') }}" wire:navigate
                        class="hover:underline me-4 md:me-6 {{ request()->routeIs('data-kader') ? 'font-bold text-white' : '' }}">Data Kader</a>
                </li>
                <li>
                    <a href="{{ route('data-balita') }}" wire:navigate
                        class="hover:underline me-4 md:me-6 {{ request()->routeIs('data-balita') ? 'font-bold text-white' : '' }}">Data
                        Balita</a>
                </li>
                <li>
                    <a href="{{ route('data-lansia') }}" wire:navigate
                        class="hover:underline me-4 md:me-6 {{ request()->routeIs('data-lansia') ? 'font-bold text-white' : '' }}">Data
                        Lansia</a>
                </li>
                <li>
                    <a href="{{ route('data-penimbangan') }}" wire:navigate
                        class="hover:underline me-4 md:me-6 {{ request()->routeIs('data-penimbangan') ? 'font-bold text-white' : '' }}">Data Penimbangan</a>
                </li>
                <li>
                    <a href="{{ route('jadwal-posyandu') }}" wire:navigate
                        class="hover:underline me-4 md:me-6 {{ request()->routeIs('jadwal-posyandu') ? 'font-bold text-white' : '' }}">Jadwal
                        Posyandu</a>
                </li>

            </ul>
        </footer>

    </div>

    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // alert create dan update
        document.addEventListener('livewire:init', () => {
            Livewire.on('success', (event) => {
                Swal.fire({
                    title: 'Berhasil',
                    text: event.message,
                    icon: 'success',
                    theme: 'auto',
                    showConfirmButton: false,
                    timer: 3000,
                });
            });
        });

        // alert delete
        document.addEventListener('livewire:init', () => {
            Livewire.on('confirm-delete', (event) => {
                Swal.fire({
                    title: 'Yakin hapus data?',
                    text: 'Data yang dihapus tidak dapat dikembalikan!',
                    icon: 'warning',
                    theme: 'auto',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('delete-data', {
                            id: event.id
                        });
                    }
                });
            });
        });

        // notifikasi berhasil delete
        document.addEventListener('livewire:init', () => {
            Livewire.on('deleted', () => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    theme: 'auto',
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Data berhasil dihapus",
                });
            })
        })

        // alert jadwal
        window.addEventListener('swal', event => {
            const data = event.detail[0];
            Swal.fire({
                title: data.title,
                text: data.text,
                icon: data.icon,
                showConfirmButton: false,
                timer: 3000,
                theme: 'auto',
            });
        });
    </script>
</body>

</html>
