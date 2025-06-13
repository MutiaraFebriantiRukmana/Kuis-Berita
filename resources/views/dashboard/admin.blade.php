<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 shadow-lg sm:rounded-2xl border border-pink-200 dark:border-pink-500 overflow-hidden">
                <div class="p-8 text-gray-800 dark:text-gray-100">
                    
                    {{-- Salam --}}
                    <h3 class="text-3xl font-bold text-pink-600 dark:text-pink-300 mb-4">
                        Hallo {{ Auth::user()->name }}!
                    </h3>

                    {{-- Akses Cepat --}}
                    <h4 class="text-xl font-semibold text-indigo-700 dark:text-indigo-300 mb-4">Update Beritamu!</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
                        <a href="{{ route('beritas.index') }}"
                           class="flex flex-col items-center justify-center bg-pink-100 dark:bg-pink-700 text-pink-900 dark:text-white p-5 rounded-xl shadow hover:shadow-md transition-all duration-200 hover:scale-105">
                            <i class="fas fa-newspaper text-3xl mb-3"></i>
                            <span class="font-medium">Kelola Berita</span>
                        </a>

                        @if (Auth::user()->role === 'admin')
                            <a href="{{ route('beritas.create') }}"
                               class="flex flex-col items-center justify-center bg-green-100 dark:bg-green-700 text-green-900 dark:text-white p-5 rounded-xl shadow hover:shadow-md transition-all duration-200 hover:scale-105">
                                <i class="fas fa-plus-circle text-3xl mb-3"></i>
                                <span class="font-medium">Tambah Berita</span>
                            </a>
                        @endif
                    </div>

                    {{-- Berita Terbaru --}}
                    <h4 class="text-xl font-semibold text-indigo-700 dark:text-indigo-300 mb-4">📰 Berita Terbaru</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($beritas as $berita)
                            <div class="bg-white dark:bg-gray-800 border border-pink-100 dark:border-pink-600 rounded-lg shadow hover:shadow-md transition overflow-hidden">
                                @if ($berita->foto)
                                    <img src="{{ Storage::url($berita->foto) }}" alt="{{ $berita->judul }}"
                                         class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-pink-200 dark:bg-gray-600 flex items-center justify-center text-pink-700 dark:text-gray-400">
                                        Tidak ada gambar
                                    </div>
                                @endif

                                <div class="p-4">
                                    <h5 class="font-bold text-lg mb-1 truncate text-pink-600 dark:text-pink-300">
                                        {{ $berita->judul }}
                                    </h5>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                                        Oleh {{ $berita->penulis }} – {{ $berita->tanggal_publikasi->diffForHumans() }}
                                    </p>
                                    <a href="{{ route('beritas.show', $berita->id) }}"
                                       class="inline-block mt-2 text-sm text-indigo-600 dark:text-indigo-300 hover:underline">
                                        Baca Selengkapnya &rarr;
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="col-span-full text-center text-gray-600 dark:text-gray-400">
                                Belum ada berita yang diterbitkan.
                            </p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
