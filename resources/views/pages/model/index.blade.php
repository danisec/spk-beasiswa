<x-layouts.app-layout title="{{ $title }}">

    <section class="layout min-h-screen w-full py-8">
        <div class="grid grid-cols-2">
            <div class="mx-auto flex flex-col gap-6">
                <div class="rounded-t-lg bg-slate-200 px-10 py-4">
                    <h2 class="text-center text-2xl font-bold text-gray-800">Input Data Model
                    </h2>
                </div>

                <form class="flex flex-col gap-6" action="{{ route('model.store') }}" method="post">
                    @csrf

                    <div>
                        <select class="@error('id_beasiswa') border-red-300 bg-red-300 @enderror field-input dynamic"
                            name="id_beasiswa" required>
                            <option selected disabled>Pilih Jenis Beasiswa</option>
                            @foreach ($beasiswa as $item)
                                <option value="{{ $item->id_beasiswa }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>

                        @error('id_beasiswa')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <select class="@error('id_kriteria') border-red-300 bg-red-300 @enderror field-input dynamic"
                            name="id_kriteria" required>
                            <option selected disabled>Pilih Kriteria</option>
                            @foreach ($kriteria as $item)
                                <option value="{{ $item->id_kriteria }}">{{ $item->nama_kriteria }}</option>
                            @endforeach
                        </select>

                        @error('id_kriteria')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <input class="@error('keterangan') border-red-300 bg-red-300 @enderror field-input"
                            name="keterangan" type="text" value="{{ old('keterangan') }}" placeholder="Keterangan"
                            required>

                        @error('keterangan')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <input class="@error('bobot') border-red-300 bg-red-300 @enderror field-input" name="bobot"
                            type="text" value="{{ old('bobot') }}" placeholder="Bobot" required>

                        @error('bobot')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <button class="btn-auth" type="submit">Simpan</button>
                </form>
            </div>

            <div class="overflow-x-auto shadow-md shadow-slate-100">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-base uppercase text-gray-700">
                        <tr>
                            <th class="px-3 py-3" scope="col">
                                No
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Beasiswa
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Kriteria
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Keterangan
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Bobot
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    @foreach ($modeling as $item)
                        <tbody>
                            <tr class="border-b bg-white">
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ ($modeling->currentPage() - 1) * $modeling->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ $item->beasiswa->nama }}
                                </td>
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ $item->kriteria->nama_kriteria }}
                                </td>
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ $item->keterangan }}
                                </td>
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ $item->bobot }}
                                </td>
                                <td class="flex flex-row items-center gap-4 px-6 py-4">

                                    <a class="text-base font-medium text-blue-500 hover:text-blue-600 hover:underline hover:underline-offset-2"
                                        href="{{ route('model.edit', $item->id_model) }}">
                                        Edit
                                    </a>

                                    <form action="{{ route('model.destroy', $item->id_model) }}" method="post">
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
                    {{ $modeling->links('vendor.pagination.tailwind') }}
                </div>

            </div>
        </div>
    </section>

</x-layouts.app-layout>
