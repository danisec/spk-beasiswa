<x-layouts.app-layout title="{{ $title }}">

    <section class="layout min-h-screen w-full py-8">
        <div class="w-full">

            <div class="flex justify-end">
                <a href="{{ route('crips.create') }}">
                    <button class="btn-primary h-12 w-24">Tambah</button>
                </a>
            </div>

            <div class="mt-10 overflow-x-auto shadow-md shadow-slate-100">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-base uppercase text-gray-700">
                        <tr>
                            <th class="px-3 py-3" scope="col">
                                No
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Nama Kriteria
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Nama Crips
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Bobot Crips
                            </th>
                            <th class="px-6 py-3 text-center" scope="col">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    @foreach ($crips as $item)
                        <tbody>
                            <tr class="border-b bg-white">
                                <td class="px-4 py-4 text-base font-normal text-gray-900">
                                    {{ ($crips->currentPage() - 1) * $crips->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ $item->kriteria->nama_kriteria }}
                                </td>
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ $item->nama_crips }}
                                </td>
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ $item->bobot }}
                                </td>
                                <td class="flex flex-row justify-center gap-4 py-4">
                                    <a href="{{ route('crips.show', $item->id) }}">
                                        <button class="btn-gray h-9 w-16" type="button">View</button>
                                    </a>

                                    <a href="{{ route('crips.edit', $item->id) }}">
                                        <button class="btn-primary h-9 w-16" type="button">Edit</button>
                                    </a>

                                    <form action="{{ route('crips.destroy', $item->id) }}" method="post">
                                        @method('delete')
                                        @csrf

                                        <button class="btn-red h-9 w-16"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach

                </table>

                <div class="p-6">
                    {{ $crips->links('vendor.pagination.tailwind') }}
                </div>

            </div>
        </div>
    </section>

</x-layouts.app-layout>
