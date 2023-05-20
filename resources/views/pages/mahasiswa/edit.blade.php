<x-layouts.app-layout title="{{ $title }}">

    <section class="layout min-h-screen w-full py-8">

        <div class="mx-auto w-96">
            <div class="flex flex-col gap-6">
                <div class="rounded-t-lg bg-slate-200 px-10 py-4">
                    <h2 class="text-center text-2xl font-bold text-gray-800">Update Data Mahasiswa
                    </h2>
                </div>

                <form class="flex flex-col gap-6" action="/daftar-beasiswa/{{ $mahasiswa->nim }}"
                    enctype="multipart/form-data" method="post">
                    @method('put')
                    @csrf

                    <div>
                        <input class="@error('nim') border-red-300 bg-red-300 @enderror field-input"" name="nim"
                            type="number" value="{{ $mahasiswa->nim }}" placeholder="NIM" maxlength="10">

                        @error('nim')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <input class="@error('nama') border-red-300 bg-red-300 @enderror field-input"" name="nama"
                            type="text" value="{{ $mahasiswa->nama }}" placeholder="Nama Lengkap">

                        @error('nama')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <select class="@error('prodi') border-red-300 bg-red-300 @enderror field-input" name="prodi">
                            <option selected disabled>{{ $mahasiswa->prodi }}</option>
                            <option value="Akutansi">Akutansi</option>
                            <option value="Arsitek">Arsitek</option>
                            <option value="Informatika">Informatika</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                        </select>

                        @error('prodi')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <input class="@error('alamat') border-red-300 bg-red-300 @enderror field-input"" name="alamat"
                            type="text" value="{{ $mahasiswa->alamat }}" placeholder="Alamat">

                        @error('alamat')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <select class="@error('jenis_kelamin') border-red-300 bg-red-300 @enderror field-input"
                            name="jenis_kelamin">
                            <option selected disabled>{{ $mahasiswa->jenis_kelamin }}</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>

                        @error('jenis_kelamin')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <input class="@error('ipk') border-red-300 bg-red-300 @enderror field-input"" name="ipk"
                            type="text" value="{{ $mahasiswa->ipk }}" placeholder="IPK">

                        @error('ipk')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <input class="@error('semester') border-red-300 bg-red-300 @enderror field-input""
                            name="semester" type="text" value="{{ $mahasiswa->semester }}" placeholder="Semester">

                        @error('semester')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <input class="@error('pendapatan_orangtua') border-red-300 bg-red-300 @enderror field-input""
                            name="pendapatan_orangtua" type="text" value="{{ $mahasiswa->pendapatan_orangtua }}"
                            placeholder="Pendapatan Orang Tua">

                        @error('pendapatan_orangtua')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <input class="@error('jumlah_saudara') border-red-300 bg-red-300 @enderror field-input""
                            name="jumlah_saudara" type="text" value="{{ $mahasiswa->jumlah_saudara }}"
                            placeholder="Jumlah Bersaudara">

                        @error('jumlah_saudara')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-lg font-semibold text-gray-900" for="file_input">Upload
                            Transkrip Nilai</label>
                        <p class="pb-2 text-sm italic">Requirement : .pdf | Max : 5 MB</p>

                        <input name="oldTranskripNilai" type="hidden" value="{{ $mahasiswa->transkrip_nilai }}">
                        <input
                            class="@error('transkrip_nilai') border-red-300 bg-red-300 @enderror focus:border-primary focus:shadow-primary relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:outline-none"
                            name="transkrip_nilai" type="file">

                        <a class="{{ $mahasiswa->transkrip_nilai ? 'text-blue-500 hover:text-blue-600 hover:underline hover:underline-offset-2' : 'text-gray-500' }}"
                            href="{{ asset('storage/' . $mahasiswa->transkrip_nilai) }}" target="_blank">
                            {{ $mahasiswa->transkrip_nilai ? 'Lihat File' : 'File Tidak Ada' }}
                        </a>

                        @error('transkrip_nilai')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-lg font-semibold text-gray-900" for="file_input">Upload
                            Kartu Mahasiswa</label>
                        <p class="pb-2 text-sm italic">Requirement : .pdf | Max : 5 MB</p>

                        <input name="oldKartuMahasiswa" type="hidden" value="{{ $mahasiswa->kartu_mahasiswa }}">
                        <input
                            class="@error('kartu_mahasiswa') border-red-300 bg-red-300 @enderror focus:border-primary focus:shadow-primary relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:outline-none"
                            name="kartu_mahasiswa" type="file"
                            value="{{ asset('storage/' . $mahasiswa->kartu_mahasiswa) }}">

                        <a class="{{ $mahasiswa->kartu_mahasiswa ? 'text-blue-500 hover:text-blue-600 hover:underline hover:underline-offset-2' : 'text-gray-500' }}"
                            href="{{ asset('storage/' . $mahasiswa->kartu_mahasiswa) }}" target="_blank">
                            {{ $mahasiswa->kartu_mahasiswa ? 'Lihat File' : 'File Tidak Ada' }}
                        </a>

                        @error('kartu_mahasiswa')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-lg font-semibold text-gray-900" for="file_input">Upload
                            Slip Gaji</label>
                        <p class="pb-2 text-sm italic">Requirement : .pdf | Max : 5 MB</p>

                        <input name="oldSlipGaji" type="hidden" value="{{ $mahasiswa->slip_gaji }}">
                        <input
                            class="@error('slip_gaji') border-red-300 bg-red-300 @enderror focus:border-primary focus:shadow-primary relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:outline-none"
                            name="slip_gaji" type="file" value="{{ asset('storage/' . $mahasiswa->slip_gaji) }}">

                        <a class="{{ $mahasiswa->slip_gaji ? 'text-blue-500 hover:text-blue-600 hover:underline hover:underline-offset-2' : 'text-gray-500' }}"
                            href="{{ asset('storage/' . $mahasiswa->slip_gaji) }}" target="_blank">
                            {{ $mahasiswa->slip_gaji ? 'Lihat File' : 'File Tidak Ada' }}
                        </a>

                        @error('slip_gaji')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-row items-center gap-8">
                        <a class="rounded-lg bg-slate-100 px-6 py-3 text-center text-base font-semibold text-gray-800 hover:bg-slate-200"
                            href="{{ URL('daftar-beasiswa') }}">
                            Cancel
                        </a>

                        <button class="btn-auth" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </section>

</x-layouts.app-layout>
