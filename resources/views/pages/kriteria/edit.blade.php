<x-layouts.app-layout title="{{ $title }}">

    <section class="layout min-h-screen w-full py-8">

        <div class="mx-auto w-96">
            <div class="flex flex-col gap-6">
                <div class="rounded-t-lg bg-slate-200 px-10 py-4">
                    <h2 class="text-center text-2xl font-bold text-gray-800">Update Data Mahasiswa
                    </h2>
                </div>

                <form class="flex flex-col gap-6" action="/data-kriteria/{{ $kriteria->id_kriteria }}" method="post">
                    @method('put')
                    @csrf

                    <div>
                        <select class="@error('id_beasiswa') border-red-300 bg-red-300 @enderror field-input"
                            name="id_beasiswa">
                            <option selected disabled>{{ $kriteria->beasiswa->nama }}</option>
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
                        <input class="@error('nama_kriteria') border-red-300 bg-red-300 @enderror field-input"
                            name="nama_kriteria" type="text" value="{{ $kriteria->nama_kriteria }}"
                            placeholder="Nama Kriteria">

                        @error('nama_kriteria')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <select class="@error('sifat') border-red-300 bg-red-300 @enderror field-input" name="sifat">
                            <option selected disabled>{{ $kriteria->sifat }}</option>
                            <option value="Min">Min</option>
                            <option value="Max">Max</option>
                        </select>

                        @error('sifat')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <input class="@error('syarat') border-red-300 bg-red-300 @enderror field-input" name="syarat"
                            type="text" value="{{ $kriteria->syarat }}" placeholder="Persyaratan">

                        @error('syarat')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-row items-center gap-8">
                        <a class="rounded-lg bg-slate-100 px-6 py-3 text-center text-base font-semibold text-gray-800 hover:bg-slate-200"
                            href="{{ URL('data-kriteria') }}">
                            Batal
                        </a>

                        <button class="btn-auth" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </section>

</x-layouts.app-layout>
