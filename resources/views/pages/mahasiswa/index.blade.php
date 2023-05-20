<x-layouts.app-layout title="{{ $title }}">

    <section class="layout min-h-screen w-full py-8">

        <div class="flex flex-row justify-end pb-6">
            <a class="rounded-md bg-blue-700 py-3 px-6 text-base font-medium text-white hover:bg-blue-600"
                href="{{ route('mahasiswa.create') }}">Tambah</a>
        </div>

        <div class="overflow-x-auto shadow-md shadow-slate-100">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-base uppercase text-gray-700">
                    <tr>
                        <th class="px-3 py-3" scope="col">
                            No
                        </th>
                        <th class="px-6 py-3" scope="col">
                            NIM
                        </th>
                        <th class="w-40 px-6 py-3" scope="col">
                            Nama
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Prodi
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Alamat
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Jenis Kelamin
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Semester
                        </th>
                        <th class="px-6 py-3" scope="col">
                            IPK
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Pendapatan Orang Tua
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Jumlah Bersaudara
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Transkrip Nilai
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Kartu Mahasiswa
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Slip Gaji
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Aksi
                        </th>
                    </tr>
                </thead>

                @foreach ($mahasiswa as $item)
                    <tbody>
                        <tr class="border-b bg-white">
                            <td class="px-6 py-4 text-base font-normal text-gray-900">
                                {{ ($mahasiswa->currentPage() - 1) * $mahasiswa->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 text-base font-normal text-gray-900">
                                {{ $item->nim }}
                            </td>
                            <td class="px-6 py-4 text-base font-normal text-gray-900">
                                {{ $item->nama }}
                            </td>
                            <td class="px-6 py-4 text-base font-normal text-gray-900">
                                {{ $item->prodi }}
                            </td>
                            <td class="px-6 py-4 text-base font-normal text-gray-900">
                                {{ $item->alamat }}
                            </td>
                            <td class="px-6 py-4 text-base font-normal text-gray-900">
                                {{ $item->jenis_kelamin }}
                            </td>
                            <td class="px-6 py-4 text-base font-normal text-gray-900">
                                {{ $item->semester }}
                            </td>
                            <td class="px-6 py-4 text-base font-normal text-gray-900">
                                {{ $item->ipk }}
                            </td>
                            <td class="px-6 py-4 text-base font-normal text-gray-900">
                                {{ $item->pendapatan_orangtua }}
                            </td>
                            <td class="px-6 py-4 text-base font-normal text-gray-900">
                                {{ $item->jumlah_saudara }}
                            </td>
                            <td class="px-6 py-4 text-base font-normal text-gray-900">
                                <a class="{{ $item->transkrip_nilai ? 'text-blue-500 hover:text-blue-600 hover:underline hover:underline-offset-2' : 'text-gray-500' }}"
                                    href="{{ asset('storage/' . $item->transkrip_nilai) }}" target="_blank">
                                    {{ $item->transkrip_nilai ? 'Lihat File' : 'File Tidak Ada' }}
                                </a>
                            </td>
                            <td class="px-6 py-4 text-base font-normal text-gray-900">
                                <a class="{{ $item->kartu_mahasiswa ? 'text-blue-500 hover:text-blue-600 hover:underline hover:underline-offset-2' : 'text-gray-500' }}"
                                    href="{{ asset('storage/' . $item->kartu_mahasiswa) }}" target="_blank">
                                    {{ $item->kartu_mahasiswa ? 'Lihat File' : 'File Tidak Ada' }}
                                </a>
                            </td>
                            <td class="px-6 py-4 text-base font-normal text-gray-900">
                                <a class="{{ $item->slip_gaji ? 'text-blue-500 hover:text-blue-600 hover:underline hover:underline-offset-2' : 'text-gray-500' }}"
                                    href="{{ asset('storage/' . $item->slip_gaji) }}" target="_blank">
                                    {{ $item->slip_gaji ? 'Lihat File' : 'File Tidak Ada' }}
                                </a>
                            </td>
                            <td class="flex flex-row items-center gap-4 px-6 py-4">

                                <a class="text-base font-medium text-blue-500 hover:text-blue-600 hover:underline hover:underline-offset-2"
                                    href="{{ route('mahasiswa.edit', $item->nim) }}">
                                    Edit
                                </a>

                                <form action="{{ route('mahasiswa.destroy', $item->nim) }}" method="post">
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
                {{ $mahasiswa->links('vendor.pagination.tailwind') }}
            </div>
        </div>

    </section>

</x-layouts.app-layout>
