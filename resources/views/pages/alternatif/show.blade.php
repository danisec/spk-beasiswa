<x-layouts.app-layout title="{{ $title }}">

    <section class="layout min-h-screen w-full py-8">

        <div class="mx-auto w-6/12">
            <div class="rounded-t-lg bg-slate-200 py-4">
                <h2 class="text-center text-2xl font-bold text-gray-800">View Data Alternatif
                </h2>
            </div>

            <div class="mt-6 flex flex-col gap-6">

                <div>
                    <input class="@error('nama_alternatif') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="nama_alternatif" type="text" value="{{ $alternatif->nama_alternatif }}"
                        placeholder="Nama Alternatif" @readonly(true) @disabled(true)>
                </div>

                <div class="flex flex-row justify-center">
                    <a href="{{ route('alternatif.index') }}">
                        <button class="btn-gray h-12 w-52" type="button">Kembali</button>
                    </a>
                </div>
            </div>
        </div>

    </section>

</x-layouts.app-layout>
