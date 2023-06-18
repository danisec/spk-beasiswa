<x-layouts.app-layout title="{{ $title }}">
    <section class="layout grid min-h-screen w-full grid-cols-2 justify-center bg-slate-50">
        <x-organisms.sidebarlogin />

        <div class="my-6 flex flex-col items-center justify-center rounded-xl bg-white shadow-md shadow-gray-50">
            <p class="text-center text-3xl font-bold text-gray-900">Daftar Akun</p>

            <form class="my-8 flex flex-col gap-8" action="{{ route('register.store') }}" method="post">
                @csrf

                <div>
                    <input class="@error('name') border-red-100 bg-red-100 @enderror field-input w-full w-full"
                        name="name" type="text" value="{{ old('name') }}" placeholder="Nama Lengkap" required>

                    @error('name')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <input class="@error('username') border-red-100 bg-red-100 @enderror field-input w-full"
                        name="username" type="text" value="{{ old('username') }}" placeholder="Username" required>

                    @error('username')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <input class="@error('email') border-red-100 bg-red-100 @enderror field-input w-full" name="email"
                        type="email" value="{{ old('email') }}" placeholder="Email" required>

                    @error('email')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <input class="@error('password') border-red-100 bg-red-100 @enderror field-input w-full"
                        name="password" type="password" placeholder="Password" required>
                </div>

                <div class="flex items-center justify-end">
                    <p class="text-base font-medium text-gray-900">Sudah punya akun?
                        <a class="font-semibold text-blue-600 hover:text-blue-700" href="{{ URL('login') }}">Masuk</a>
                    </p>
                </div>

                <button class="btn-primary h-12 w-96" type="submit">Register</button>
            </form>

        </div>
    </section>
</x-layouts.app-layout>
