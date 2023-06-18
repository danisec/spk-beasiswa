<x-layouts.app-layout title="{{ $title }}">

    <section class="layout min-h-screen w-full py-8">

        <div class="mx-auto w-6/12">
            <div class="rounded-t-lg bg-slate-200 py-4">
                <h2 class="text-center text-2xl font-bold text-gray-800">Ubah Data Crips
                </h2>
            </div>

            <form class="mt-6 flex flex-col gap-6" action="{{ route('crips.update', $crips->id) }}" method="post">
                @method('put')
                @csrf

                <div>
                    <select class="@error('kriteria_id') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="kriteria_id" required>
                        <option selected disabled hidden>Nama Kriteria</option>

                        @foreach ($kriteria as $item)
                            <option value="{{ $item->id }}"
                                {{ $crips->kriteria->nama_kriteria == $item->nama_kriteria ? 'selected' : '' }}>
                                {{ $item->nama_kriteria }}
                            </option>
                        @endforeach

                    </select>

                    @error('kriteria_id')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <input class="@error('nama_crips') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="nama_crips" type="text" value="{{ $crips->nama_crips }}" placeholder="Nama crips"
                        required>

                    @error('nama_crips')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <input class="@error('bobot') border-red-300 bg-red-300 @enderror field-input w-full" name="bobot"
                        type="text" value="{{ $crips->bobot }}" placeholder="Bobot Crips" required>

                    @error('bobot')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-row gap-4">
                    <a href="{{ route('crips.index') }}">
                        <button class="btn-gray h-12 w-52" type="button">Kembali</button>
                    </a>

                    <button class="btn-primary h-12 w-full" type="submit">Ubah</button>
                </div>
            </form>
        </div>

    </section>

</x-layouts.app-layout>
