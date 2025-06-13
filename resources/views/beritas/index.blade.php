<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-pink-500 dark:text-pink-300 leading-tight tracking-wide">
                🎀 Daftar Berita Terbaru!!
            </h2>
            <a href="{{ route('beritas.create') }}"
                class="bg-pink-400 hover:bg-pink-500 text-white font-semibold px-4 py-2 rounded-full shadow transition-all duration-200 ease-in-out">
                <i class="fa-solid fa-plus mr-2"></i>Tambah Berita Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-100 border-l-4 border-green-500 p-4 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-md sm:rounded-xl border border-pink-200 dark:border-pink-500">
                <div class="p-6 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-pink-200 dark:divide-pink-500">
                            <thead class="bg-pink-100 dark:bg-pink-800 text-pink-800 dark:text-pink-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Foto</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Judul</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Penulis</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                                @forelse ($beritas as $berita)
                                <tr class="bg-white dark:bg-gray-800 hover:bg-pink-50 dark:hover:bg-pink-900 transition duration-150 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($berita->foto)
                                            <img src="{{ asset('storage/' . $berita->foto) }}"
                                                alt="{{ $berita->judul }}"
                                                class="w-16 h-16 object-cover rounded-md border border-pink-300 shadow">
                                        @else
                                            <span class="text-gray-400 dark:text-gray-500 text-sm">(tidak ada foto)</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm">{{ \Illuminate\Support\Str::limit($berita->judul, 70) }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $berita->penulis }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $berita->tanggal_publikasi->format('d M Y H:i') }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('beritas.show', $berita->id) }}"
                                                class="bg-blue-100 dark:bg-blue-600 text-blue-800 dark:text-white px-3 py-1 rounded-full text-xs font-semibold hover:bg-blue-200 dark:hover:bg-blue-700 transition">
                                                <i class="fa-solid fa-eye mr-1"></i> Lihat
                                            </a>
                                            <a href="{{ route('beritas.edit', $berita->id) }}"
                                                class="bg-yellow-100 dark:bg-yellow-500 text-yellow-800 dark:text-white px-3 py-1 rounded-full text-xs font-semibold hover:bg-yellow-200 dark:hover:bg-yellow-600 transition">
                                                <i class="fa-solid fa-pen-to-square mr-1"></i> Edit
                                            </a>
                                            <form action="{{ route('beritas.destroy', $berita->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-100 dark:bg-red-600 text-red-800 dark:text-white px-3 py-1 rounded-full text-xs font-semibold hover:bg-red-200 dark:hover:bg-red-700 transition">
                                                    <i class="fa-solid fa-trash-can mr-1"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                        Tidak ada berita yang tersedia.
                                        @if(Auth::check() && Auth::user()->role == 'admin')
                                            <a href="{{ route('beritas.create') }}" class="text-pink-500 hover:underline ml-1">Tambah Berita Baru</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if (isset($beritas) && method_exists($beritas, 'links'))
                        <div class="mt-4">
                            {{ $beritas->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
