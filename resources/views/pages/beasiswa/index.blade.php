<x-layouts.app-layout title="{{ $title }}">

    <section class="layout min-h-screen w-full py-8">
        <div class="grid grid-cols-2">
            <div class="mx-auto flex flex-col gap-6">
                <div class="rounded-t-lg bg-slate-200 px-10 py-4">
                    <h2 class="text-center text-2xl font-bold text-gray-800">Input Jenis
                        Beasiswa
                    </h2>
                </div>

                <form class="flex flex-col gap-6" action="{{ route('beasiswa.store') }}" method="post">
                    @csrf

                    <div>
                        <input class="@error('nama') border-red-300 bg-red-300 @enderror field-input" name="nama"
                            type="text" value="{{ old('nama') }}" placeholder="Nama Beasiswa" required>

                        @error('nama')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <button class="btn-auth" type="submit">Simpan</button>
                </form>
            </div>

            <div class="overflow-x-auto shadow-md shadow-slate-100">
                <table class="w-full text-left text-sm text-gray-500">
                    <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-base font-bold text-gray-900" scope="col">
                                No
                            </th>
                            <th class="px-6 py-3 text-base font-bold text-gray-900" scope="col">
                                Nama
                            </th>
                            <th class="px-6 py-3 text-base font-bold text-gray-900" scope="col">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    @foreach ($beasiswa as $item)
                        <tbody>
                            <tr class="border-b bg-white">
                                <td class="px-6 py-4 text-lg font-normal text-gray-900">
                                    {{ ($beasiswa->currentPage() - 1) * $beasiswa->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 text-lg font-normal text-gray-900">
                                    {{ $item->nama }}
                                </td>
                                <td class="flex flex-row items-center gap-4 px-6 py-4">

                                    <a class="text-base font-medium text-blue-500 hover:text-blue-600 hover:underline hover:underline-offset-2"
                                        href="{{ route('beasiswa.edit', $item->id_beasiswa) }}">
                                        Edit
                                    </a>

                                    <form action="{{ route('beasiswa.destroy', $item->id_beasiswa) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button
                                            class="h-9 w-16 rounded-md bg-red-500 text-base font-medium text-white hover:bg-red-600"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach

                </table>

                <div class="p-6">
                    {{ $beasiswa->links('vendor.pagination.tailwind') }}
                </div>

            </div>
        </div>
    </section>

</x-layouts.app-layout>
