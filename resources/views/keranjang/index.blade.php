<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Keranjang Belanja') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Sukses! </strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Gagal! </strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="flex flex-col md:flex-row gap-6">
                <!-- List Produk -->
                <div class="flex-1 space-y-4">
                    @forelse ($items as $item)
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-4 flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="bg-gray-200 dark:bg-gray-700 w-16 h-16 rounded-md flex items-center justify-center">
                                    <!-- Bisa diganti gambar produk -->
                                    <span class="text-gray-500 dark:text-gray-300 text-sm font-bold">IMG</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 dark:text-gray-200">{{ $item->produk->nama_produk }}</h4>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">Harga: Rp {{ number_format($item->produk->harga, 0, ',', '.') }}</p>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">Jumlah: {{ $item->jumlah }}</p>
                                    <p class="text-gray-800 dark:text-gray-200 font-semibold">Total: Rp {{ number_format($item->total_harga, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            <div>
                                <form action="{{ route('keranjang.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="openDeleteModal({{ $item->id }})" class="text-red-600 hover:text-red-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7L5 7M6 7l1 12a2 2 0 002 2h6a2 2 0 002-2l1-12M10 11v6M14 11v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-10 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                            <p class="text-gray-600 dark:text-gray-400">Belum ada produk di keranjang.</p>
                        </div>
                    @endforelse

                    <div class="text-center">
                        <a href="{{ route('keranjang.create') }}" class="inline-block bg-gradient-to-r from-indigo-600 to-purple-700 text-white font-bold py-2 px-4 rounded mt-4">
                            + Tambah Produk
                        </a>
                    </div>
                </div>

                <!-- Checkout Sidebar -->
                <div class="w-full md:w-1/3 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 space-y-4 h-fit">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Ringkasan Belanja</h3>

                    <div class="flex justify-between text-gray-700 dark:text-gray-300">
                        <span>Total Harga</span>
                        <span class="font-bold">Rp {{ number_format($total_belanja, 0, ',', '.') }}</span>
                    </div>

                    <form action="{{ route('keranjang.checkout') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit"
                            class="w-full px-4 py-2 rounded font-semibold text-white {{ count($items) === 0 ? 'bg-gray-400 cursor-not-allowed' :
                            'bg-gradient-to-r from-indigo-600 to-purple-700' }}"
                           
                            {{ count($items) === 0 ? 'disabled' : '' }}>
                            Bayar Sekarang
                        </button>
                        @if(count($items) === 0)
                            <p class="text-sm text-red-500 mt-2 text-center">Keranjang anda masih kosong!</p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center hidden z-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg max-w-sm w-full p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Konfirmasi Hapus</h3>
            <p class="mb-6 text-gray-700 dark:text-gray-300">Apakah Anda yakin ingin menghapus item ini?</p>

            <form id="deleteForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 rounded bg-red-600 hover:bg-red-700 text-white font-semibold">
                        Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Script JavaScript --}}
    <script>
        function openDeleteModal(itemId) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            form.action = `/keranjang/${itemId}`;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    </script>
</x-app-layout>
