<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-pink-700 dark:text-pink-300 leading-tight">
                🗞️ Berita Terkini
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg sm:rounded-2xl border border-pink-200 dark:border-pink-500">
                <div class="p-8 text-gray-800 dark:text-gray-100">

                    {{-- Sapaan Pengguna --}}
                    <h3 class="text-3xl font-bold text-pink-600 dark:text-pink-300 mb-6">
                        ✨ Halo, {{ Auth::user()->name }}! Selamat datang di Portal Berita.
                    </h3>

                    {{-- Judul Berita Pilihan --}}
                    <h4 class="text-xl font-semibold text-indigo-700 dark:text-indigo-300 mb-6">
                        🎯 Berita Pilihan Terbaru
                    </h4>

                    {{-- Daftar Berita --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        @forelse($beritas as $berita)
                            <div class="bg-pink-50 dark:bg-gray-800 rounded-xl shadow hover:shadow-md transform transition duration-300 hover:scale-105">
                                @if($berita->foto)
                                    <img src="{{ Storage::url($berita->foto) }}" alt="{{ $berita->judul }}"
                                         class="w-full h-48 object-cover rounded-t-xl">
                                @else
                                    <div class="w-full h-48 bg-pink-200 dark:bg-gray-600 flex items-center justify-center text-pink-600 dark:text-gray-400 rounded-t-xl">
                                        Gambar Tidak Tersedia
                                    </div>
                                @endif
                                <div class="p-4">
                                    <a href="{{ route('beritas.show', $berita->id) }}" class="block">
                                        <h5 class="font-bold text-lg mb-2 text-gray-900 dark:text-pink-100 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                                            {{ \Illuminate\Support\Str::limit($berita->judul, 50) }}
                                        </h5>
                                    </a>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">
                                        Oleh <span class="font-medium">{{ $berita->penulis }}</span> – {{ $berita->tanggal_publikasi->format('d M Y') }}
                                    </p>
                                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-4">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi_berita), 100) }}
                                    </p>
                                    <a href="{{ route('beritas.show', $berita->id) }}"
                                       class="text-sm font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
                                        Baca Selengkapnya &rarr;
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="col-span-full text-center text-gray-600 dark:text-gray-400">
                                Belum ada berita terbaru saat ini.
                            </p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
