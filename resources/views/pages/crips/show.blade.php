<x-layouts.app-layout title="{{ $title }}">

    <section class="layout min-h-screen w-full py-8">

        <div class="mx-auto w-6/12">
            <div class="rounded-t-lg bg-slate-200 py-4">
                <h2 class="text-center text-2xl font-bold text-gray-800">View Data Crips
                </h2>
            </div>

            <div class="mt-6 flex flex-col gap-6">

                <div>
                    <input class="@error('kriteria_id') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="kriteria_id" type="text" value="{{ $crips->kriteria->nama_kriteria }}"
                        placeholder="Nama Kriteria" @readonly(true) @disabled(true)>
                </div>

                <div>
                    <input class="@error('nama_crips') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="nama_crips" value="{{ $crips->nama_crips }}" placeholder="Nama Crips" @readonly(true)
                        @disabled(true) />
                </div>

                <div>
                    <input class="@error('bobot') border-red-300 bg-red-300 @enderror field-input w-full" name="bobot"
                        type="text" value="{{ $crips->bobot }}" placeholder="Bobot Kriteria" @readonly(true)
                        @disabled(true)>
                </div>

                <div class="flex flex-row justify-center">
                    <a href="{{ route('crips.index') }}">
                        <button class="btn-gray h-12 w-52" type="button">Kembali</button>
                    </a>
                </div>
            </div>
        </div>

    </section>

</x-layouts.app-layout>
