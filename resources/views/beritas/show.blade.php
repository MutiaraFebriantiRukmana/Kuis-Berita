<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-pink-500 dark:text-pink-300 leading-tight tracking-wide">
                ✨ Detail Berita Menarik
            </h2>
            <a href="{{ route('dashboard') }}"
               class="bg-pink-400 hover:bg-pink-500 text-white font-semibold px-4 py-2 rounded-full shadow transition-all duration-200 ease-in-out">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 shadow-md sm:rounded-xl border border-pink-200 dark:border-pink-500 overflow-hidden">
                <div class="p-8 text-gray-900 dark:text-gray-100">

                    {{-- Foto Berita --}}
                    @if($berita->foto)
                        <div class="mb-6 text-center">
                            <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}"
                                 class="max-w-full md:max-w-2xl mx-auto h-auto rounded-xl border border-pink-300 dark:border-pink-600 shadow-lg object-cover">
                        </div>
                    @endif

                    {{-- Judul Berita --}}
                    <h1 class="text-3xl font-bold text-center text-pink-600 dark:text-pink-300 mb-4">
                        {{ $berita->judul }}
                    </h1>

                    {{-- Informasi Penulis dan Tanggal --}}
                    <p class="text-sm text-center text-gray-600 dark:text-gray-400 mb-6">
                        Ditulis oleh <span class="font-semibold">{{ $berita->penulis }}</span> pada
                        <span class="font-semibold">{{ $berita->tanggal_publikasi->format('d F Y, H:i') }} WIB</span>
                    </p>

                    {{-- Isi Berita --}}
                    <div class="prose dark:prose-invert prose-pink max-w-none text-justify text-gray-800 dark:text-gray-200 leading-relaxed">
                        {!! nl2br(e($berita->isi_berita)) !!}
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="mt-10 flex justify-end gap-3">
                        <a href="{{ route('beritas.edit', $berita->id) }}"
                           class="inline-flex items-center px-4 py-2 bg-yellow-100 dark:bg-yellow-500 text-yellow-800 dark:text-white text-sm rounded-full font-semibold shadow hover:bg-yellow-200 dark:hover:bg-yellow-600 transition">
                            <i class="fa-solid fa-pen-to-square mr-2"></i>Edit
                        </a>

                        <form action="{{ route('beritas.destroy', $berita->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-red-100 dark:bg-red-600 text-red-800 dark:text-white text-sm rounded-full font-semibold shadow hover:bg-red-200 dark:hover:bg-red-700 transition">
                                <i class="fa-solid fa-trash-can mr-2"></i>Hapus
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
