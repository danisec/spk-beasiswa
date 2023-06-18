<x-layouts.app-layout title="{{ $title }}">

    <section class="layout min-h-screen w-full py-8">

        <div class="mx-auto w-6/12">
            <div class="rounded-t-lg bg-slate-200 py-4">
                <h2 class="text-center text-2xl font-bold text-gray-800">Tambah Data Penilaian
                </h2>
            </div>

            <form class="mt-6 flex flex-col gap-6" action="{{ route('penilaian.store') }}" method="post">
                @csrf

                <div>
                    <select class="@error('alternatif_id') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="alternatif_id" required>
                        <option selected disabled hidden>Nama Alternatif</option>

                        @foreach ($alternatif as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_alternatif }}
                            </option>
                        @endforeach

                    </select>

                    @error('alternatif_id')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <select class="@error('ipk_id') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="ipk_id" required>
                        <option selected disabled hidden>IPK</option>

                        @foreach ($cripsIPK as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_crips }}
                            </option>
                        @endforeach

                    </select>

                    @error('ipk_id')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <select class="@error('penghasilan_id') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="penghasilan_id" required>
                        <option selected disabled hidden>Penghasilan Orang Tua</option>

                        @foreach ($cripsPOT as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_crips }}
                            </option>
                        @endforeach

                    </select>

                    @error('penghasilan_id')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <select class="@error('saudara_id') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="saudara_id" required>
                        <option selected disabled hidden>Saudara Kandung</option>

                        @foreach ($cripsSK as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_crips }}
                            </option>
                        @endforeach

                    </select>

                    @error('saudara_id')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <select class="@error('semester_id') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="semester_id" required>
                        <option selected disabled hidden>Semester</option>

                        @foreach ($cripsSMT as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_crips }}
                            </option>
                        @endforeach

                    </select>

                    @error('semester_id')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <select class="@error('tanggungan_id') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="tanggungan_id" required>
                        <option selected disabled hidden>Tanggungan Orang Tua</option>

                        @foreach ($cripsTO as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_crips }}
                            </option>
                        @endforeach

                    </select>

                    @error('tanggungan_id')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-row gap-4">
                    <a href="{{ route('penilaian.index') }}">
                        <button class="btn-gray h-12 w-52" type="button">Kembali</button>
                    </a>

                    <button class="btn-primary h-12 w-full" type="submit">Simpan</button>
                </div>
            </form>
        </div>

    </section>

</x-layouts.app-layout>
