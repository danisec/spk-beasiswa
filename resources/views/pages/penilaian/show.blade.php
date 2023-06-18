<x-layouts.app-layout title="{{ $title }}">

    <section class="layout min-h-screen w-full py-8">

        <div class="mx-auto w-6/12">
            <div class="rounded-t-lg bg-slate-200 py-4">
                <h2 class="text-center text-2xl font-bold text-gray-800">View Data Penilaian
                </h2>
            </div>

            <div class="mt-6 flex flex-col gap-6">

                <div>
                    <input class="@error('alternatif_id') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="alternatif_id" type="text" value="{{ $penilaian->alternatif->nama_alternatif }}"
                        placeholder="Nama Alternatif" @readonly(true) @disabled(true)>
                </div>

                <div>
                    <input class="@error('ipk_id') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="ipk_id" value="{{ $penilaian->ipk->nama_crips }}" placeholder="IPK" @readonly(true)
                        @disabled(true) />
                </div>

                <div>
                    <input class="@error('penghasilan_id') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="penghasilan_id" type="text" value="{{ $penilaian->penghasilan->nama_crips }}"
                        placeholder="Penghasilan Orang Tua" @readonly(true) @disabled(true)>
                </div>

                <div>
                    <input class="@error('saudara_id') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="saudara_id" type="text" value="{{ $penilaian->saudara->nama_crips }}"
                        placeholder="Saudara Kandung" @readonly(true) @disabled(true)>
                </div>

                <div>
                    <input class="@error('semester_id') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="semester_id" type="text" value="{{ $penilaian->semester->nama_crips }}"
                        placeholder="Semester" @readonly(true) @disabled(true)>
                </div>

                <div>
                    <input class="@error('tanggungan_id') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="tanggungan_id" type="text" value="{{ $penilaian->tanggungan->nama_crips }}"
                        placeholder="Tanggungan Orang Tua" @readonly(true) @disabled(true)>
                </div>

                <div class="flex flex-row justify-center">
                    <a href="{{ route('penilaian.index') }}">
                        <button class="btn-gray h-12 w-52" type="button">Kembali</button>
                    </a>
                </div>
            </div>
        </div>

    </section>

</x-layouts.app-layout>
