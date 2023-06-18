<x-layouts.app-layout title="{{ $title }}">

    <section class="layout min-h-screen w-full py-8">

        <div class="mx-auto w-6/12">
            <div class="rounded-t-lg bg-slate-200 py-4">
                <h2 class="text-center text-2xl font-bold text-gray-800">Ubah Data Penilaian
                </h2>
            </div>

            <form class="mt-6 flex flex-col gap-6" action="{{ route('penilaian.update', $penilaian->id) }}" method="post">
                @method('put')
                @csrf

                <div>
                    <select class="@error('alternatif_id') border-red-300 bg-red-300 @enderror field-input w-full"
                        name="alternatif_id" required>

                        @foreach ($alternatif as $alter)
                            <option value="{{ $alter->id }}"
                                {{ $penilaian->alternatif->nama_alternatif == $alter->nama_alternatif ? 'selected' : '' }}>
                                {{ $alter->nama_alternatif }}
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

                        @foreach ($ipk as $item)
                            <option value="{{ $item->id }}"
                                {{ $penilaian->ipk->nama_crips == $item->nama_crips ? 'selected' : '' }}>
                                {{ $item->nama_crips }}
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

                        @foreach ($penghasilan as $item)
                            <option value="{{ $item->id }}"
                                {{ $penilaian->penghasilan->nama_crips == $item->nama_crips ? 'selected' : '' }}>
                                {{ $item->nama_crips }}
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

                        @foreach ($saudara as $item)
                            <option value="{{ $item->id }}"
                                {{ $penilaian->saudara->nama_crips == $item->nama_crips ? 'selected' : '' }}>
                                {{ $item->nama_crips }}
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

                        @foreach ($semester as $item)
                            <option value="{{ $item->id }}"
                                {{ $penilaian->semester->nama_crips == $item->nama_crips ? 'selected' : '' }}>
                                {{ $item->nama_crips }}
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

                        @foreach ($tanggungan as $item)
                            <option value="{{ $item->id }}"
                                {{ $penilaian->tanggungan->nama_crips == $item->nama_crips ? 'selected' : '' }}>
                                {{ $item->nama_crips }}
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

                    <button class="btn-primary h-12 w-full" type="submit">Ubah</button>
                </div>
            </form>
        </div>

    </section>

</x-layouts.app-layout>
