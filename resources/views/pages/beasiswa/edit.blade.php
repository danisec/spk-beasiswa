<x-layouts.app-layout title="{{ $title }}">

    <section class="layout min-h-screen w-full py-8">

        <div class="mx-auto w-96">
            <div class="flex flex-col gap-6">
                <div class="rounded-t-lg bg-slate-200 px-10 py-4">
                    <h2 class="text-center text-2xl font-bold text-gray-800">Update Jenis
                        Beasiswa
                    </h2>
                </div>

                <form class="flex flex-col gap-6" action="/data-beasiswa/{{ $beasiswa->id_beasiswa }}" method="post">
                    @method('put')
                    @csrf

                    <div>
                        <input class="@error('nama') border-red-300 bg-red-300 @enderror field-input" name="nama"
                            type="text" value="{{ $beasiswa->nama }}" placeholder="Nama">

                        @error('nama')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-row items-center gap-8">
                        <a class="rounded-lg bg-slate-100 px-6 py-3 text-center text-base font-semibold text-gray-800 hover:bg-slate-200"
                            href="{{ URL('data-beasiswa') }}">
                            Batal
                        </a>

                        <button class="btn-auth" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </section>

</x-layouts.app-layout>
