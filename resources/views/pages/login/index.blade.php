<x-layouts.app-layout title="{{ $title }}">
    <section class="layout grid min-h-screen w-full grid-cols-2 justify-center bg-slate-50">
        <x-organisms.sidebarlogin />

        <div class="my-6 flex flex-col items-center justify-center rounded-xl bg-white shadow-md shadow-gray-50">
            <p class="text-center text-3xl font-bold text-gray-900">Silakan Masuk</p>

            <form class="my-8 flex flex-col gap-8" action="{{ route('login.authenticate') }}" method="post">
                @csrf

                <input class="@error('username') border-red-500 bg-red-500 @enderror field-input" name="username"
                    type="text" value="{{ old('username') }}" placeholder="Username" required>

                @error('username')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror

                <input class="@error('username') border-red-500 bg-red-500 @enderror field-input" name="password"
                    type="password" placeholder="Password" required>

                <div class="flex flex-row items-center justify-between">
                    <div>
                        <input
                            class="focus:ring-3 h-4.5 w-4.5 -mt-0.5 rounded border border-slate-200 bg-slate-50 focus:ring-blue-300"
                            name="remember" type="checkbox">

                        <label class="ml-2 text-base font-medium text-gray-900" for="remember">Ingat saya</label>
                    </div>

                    <div>
                        <p class="text-base font-medium text-gray-900">Belum punya akun?
                            <a class="font-semibold text-blue-600 hover:text-blue-700"
                                href="{{ URL('register') }}">Daftar</a>
                        </p>
                    </div>
                </div>

                <button class="btn-auth" type="submit">Login</button>
            </form>

        </div>
    </section>
</x-layouts.app-layout>
