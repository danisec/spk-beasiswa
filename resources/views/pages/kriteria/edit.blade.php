<x-layouts.app-layout title="{{ $title }}">

    <section class="layout min-h-screen w-full py-8">

        <div class="mx-auto w-6/12">
            <div class="rounded-t-lg bg-slate-200 py-4">
                <h2 class="text-center text-2xl font-bold text-gray-800">Ubah Data Kriteria
                </h2>
            </div>

            <form class="mt-6 flex flex-col gap-6" action="{{ route('kriteria.update', $kriteria->id) }}" method="post">
                @method('put')
                @csrf

                <div>
                    <input class="@error('nama_kriteria') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="nama_kriteria" type="text" value="{{ $kriteria->nama_kriteria }}"
                        placeholder="Nama Kriteria" required>

                    @error('nama_kriteria')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <select class="@error('attribut') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="attribut" required>

                        @foreach ($attribut as $attr)
                            <option value="{{ $attr }}" {{ $kriteria->attribut == $attr ? 'selected' : '' }}>
                                {{ $attr }}
                            </option>
                        @endforeach

                    </select>

                    @error('attribut')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <input class="@error('bobot') border-red-300 bg-red-300 @enderror field-input w-full" name="bobot"
                        type="text" value="{{ $kriteria->bobot }}" placeholder="Bobot Kriteria" required>

                    @error('bobot')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-row gap-4">
                    <a href="{{ route('kriteria.index') }}">
                        <button class="btn-gray h-12 w-52" type="button">Kembali</button>
                    </a>

                    <button class="btn-primary h-12 w-full" type="submit">Ubah</button>
                </div>
            </form>
        </div>

    </section>

</x-layouts.app-layout>
