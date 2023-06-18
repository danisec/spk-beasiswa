<x-layouts.app-layout title="{{ $title }}">

    <section class="layout min-h-screen w-full py-8">

        <div class="mx-auto w-6/12">
            <div class="rounded-t-lg bg-slate-200 py-4">
                <h2 class="text-center text-2xl font-bold text-gray-800">Tambah Data Alternatif
                </h2>
            </div>

            <form class="mt-6 flex flex-col gap-6" action="{{ route('alternatif.store') }}" method="post">
                @csrf

                <div>
                    <input class="@error('nama_alternatif') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="nama_alternatif" type="text" value="{{ old('nama_alternatif') }}"
                        placeholder="Nama Alternatif" required>

                    @error('nama_alternatif')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-row gap-4">
                    <a href="{{ route('alternatif.index') }}">
                        <button class="btn-gray h-12 w-52" type="button">Kembali</button>
                    </a>

                    <button class="btn-primary h-12 w-full" type="submit">Simpan</button>
                </div>
            </form>
        </div>

    </section>

</x-layouts.app-layout>
