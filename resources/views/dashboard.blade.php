<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <!-- Welcome Banner -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-700 rounded-xl shadow-xl overflow-hidden">
                <div class="p-8 md:p-10 flex flex-col md:flex-row items-center justify-between">
                    <div class="flex items-center space-x-6">
                        <div class="bg-white bg-opacity-20 p-4 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 14.25C18 12.4551 16.5449 11 14.75 11H9.25C7.45507 11 6 12.4551 6 14.25V15.25C6 15.6642 6.33579 16 6.75 16H17.25C17.6642 16 18 15.6642 18 15.25V14.25Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 10C13.6569 10 15 8.65685 15 7C15 5.34315 13.6569 4 12 4C10.3431 4 9 5.34315 9 7C9 8.65685 10.3431 10 12 10Z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl md:text-3xl font-bold text-white">
                                {{ __("Welcome Back, Moon!") }}
                            </h3>
                            <p class="text-indigo-100 mt-1">
                                "The moon knows that it need not shine as bright as the sun to be beautiful."
                            </p>
                        </div>
                    </div>
                    <div class="mt-6 md:mt-0">
                        <p class="text-indigo-100 text-sm md:text-base">
                            {{ now()->format('l, d F Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="max-w-7xl mx-auto mt-10 px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6 flex flex-col items-center hover:shadow-lg hover:-translate-y-1 transition">
                    <div class="bg-indigo-100 p-4 rounded-full mb-4">
                        <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M3 7h18M3 12h18M3 17h18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <h4 class="text-gray-700 dark:text-white text-sm">Kategori</h4>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalCategories }}</p>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6 flex flex-col items-center hover:shadow-lg hover:-translate-y-1 transition">
                    <div class="bg-green-100 p-4 rounded-full mb-4">
                        <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M20 13V7a2 2 0 00-2-2h-4.586a1 1 0 00-.707.293l-1.414 1.414a1 1 0 01-.707.293H6a2 2 0 00-2 2v6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8 17h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h4 class="text-gray-700 dark:text-white text-sm">Produk</h4>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalProducts }}</p>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6 flex flex-col items-center hover:shadow-lg hover:-translate-y-1 transition">
                    <div class="bg-yellow-100 p-4 rounded-full mb-4">
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>                          
                    </div>
                    <h4 class="text-gray-700 dark:text-white text-sm">Transaksi</h4>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalTransactions }}</p>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6 flex flex-col items-center hover:shadow-lg hover:-translate-y-1 transition">
                    <div class="bg-blue-100 p-4 rounded-full mb-4">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z" 
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                    </div>
                    <h4 class="text-gray-700 dark:text-white text-sm">Pendapatan</h4>
                    <p class="text-2xl font-bold text-green-600 dark:text-green-400">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>


<!-- Activity Section -->
<div class="max-w-7xl mx-auto mt-10 px-6 lg:px-8 mb-10">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-700 rounded-3xl shadow-md p-8 text-center">
        <h3 class="text-lg font-bold text-white mb-4">Aktivitas Terbaru</h3>
        <a href="/transaksi" class="inline-block bg-white text-indigo-600 px-6 py-2 rounded-full font-semibold hover:bg-indigo-100 transition">
            Lihat Semua Aktivitas →
        </a>
    </div>
</div>

</div>



</x-app-layout>
