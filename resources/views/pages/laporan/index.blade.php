<x-layouts.app-layout title="{{ $title }}">

    <section class="layout min-h-screen w-full py-8">

        <section class="w-full">

            <div class="mt-10 overflow-x-auto shadow-md shadow-slate-100" x-data="{ isOpen: true }">

                <div class="flex flex-row justify-between border-b-2 border-gray-200 bg-gray-50 p-2">
                    <h2 class="text-lg font-semibold text-blue-600">Tahap
                        Analisa
                    </h2>
                    <button class="focus:outline-none" @click="isOpen = !isOpen"><svg class="h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </div>

                <table class="w-full text-left" x-show="isOpen" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100" x-cloak>
                    <thead class="bg-gray-50 text-base uppercase text-gray-700">
                        <tr>
                            <th class="px-3 py-3" scope="col">
                                No
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Nama Alternatif
                            </th>
                            <th class="px-6 py-3" scope="col">
                                IPK
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Penghasilan Orang Tua
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Saudara Kandung
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Semester
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Tanggungan Orang Tua
                            </th>
                        </tr>
                    </thead>

                    @foreach ($perhitungan as $item)
                        <tbody>
                            <tr class="border-b bg-white">
                                <td class="px-4 py-4 text-base font-normal text-gray-900">
                                    {{ ($perhitungan->currentPage() - 1) * $perhitungan->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ $item->alternatif->nama_alternatif }}
                                </td>
                                <td class="py-4 text-center text-base font-normal text-gray-900">
                                    {{ $item->ipk->bobot }}
                                </td>
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ $item->penghasilan->bobot }}
                                </td>
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ $item->saudara->bobot }}
                                </td>
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ $item->semester->bobot }}
                                </td>
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ $item->tanggungan->bobot }}
                                </td>
                            </tr>
                        </tbody>
                    @endforeach

                </table>

                <div class="p-6">
                    {{ $perhitungan->links('vendor.pagination.tailwind') }}
                </div>

            </div>
        </section>

        <section class="w-full">

            <div class="mt-10 overflow-x-auto shadow-md shadow-slate-100" x-data="{ isOpen: false }">

                <div class="flex flex-row justify-between border-b-2 border-gray-200 bg-gray-50 p-2">
                    <h2 class="text-lg font-semibold text-blue-600">Tahap
                        Normalisasi
                    </h2>
                    <button class="focus:outline-none" @click="isOpen = !isOpen"><svg class="h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </div>

                <table class="w-full text-left" x-show="isOpen" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100" x-cloak>
                    <thead class="bg-gray-50 text-base uppercase text-gray-700">
                        <tr>
                            <th class="px-3 py-3" scope="col">
                                No
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Nama Alternatif
                            </th>
                            <th class="px-6 py-3" scope="col">
                                IPK
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Penghasilan Orang Tua
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Saudara Kandung
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Semester
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Tanggungan Orang Tua
                            </th>
                        </tr>
                    </thead>

                    @foreach ($normalisasi as $item)
                        <tbody>
                            <tr class="border-b bg-white">
                                <td class="px-4 py-4 text-base font-normal text-gray-900">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ $item['alternatif'] }}
                                </td>
                                <td class="py-4 text-center text-base font-normal text-gray-900">
                                    {{ $item['C1'] }}
                                </td>
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ $item['C2'] }}
                                </td>
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ $item['C3'] }}
                                </td>
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ $item['C4'] }}
                                </td>
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ $item['C5'] }}
                                </td>
                            </tr>
                        </tbody>
                    @endforeach

                </table>

            </div>
        </section>

        <section class="w-full">

            <div class="mt-10 overflow-x-auto shadow-md shadow-slate-100" x-data="{ isOpen: false }">

                <div class="flex flex-row justify-between border-b-2 border-gray-200 bg-gray-50 p-2">
                    <h2 class="text-lg font-semibold text-blue-600">Tahap
                        Perangkingan
                    </h2>
                    <button class="focus:outline-none" @click="isOpen = !isOpen"><svg class="h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </div>

                <table class="w-full text-left" x-show="isOpen" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100" x-cloak>
                    <thead class="bg-gray-50 text-base uppercase text-gray-700">
                        <tr>
                            <th class="px-3 py-3" scope="col">
                                No
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Nama Alternatif
                            </th>
                            <th class="py-3 text-center" scope="col">
                                Total
                            </th>
                            <th class="py-3 text-center" scope="col">
                                Rank
                            </th>
                        </tr>
                    </thead>

                    @foreach ($hasil as $item)
                        <tbody>
                            <tr class="border-b bg-white">
                                <td class="px-4 py-4 text-base font-normal text-gray-900">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 text-base font-normal text-gray-900">
                                    {{ $item['alternatif'] }}
                                </td>
                                <td class="py-4 text-center text-base font-normal text-gray-900">
                                    {{ $item['nilai'] }}
                                </td>
                                <td class="py-4 text-center text-base font-normal text-gray-900">
                                    {{ $item['rank'] }}
                                </td>
                            </tr>
                        </tbody>
                    @endforeach

                </table>

            </div>
        </section>

    </section>



</x-layouts.app-layout>
