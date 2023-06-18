<x-layouts.app-layout title="{{ $title }}">

    <section class="layout min-h-screen w-full py-8">

        <div class="mx-auto flex w-10/12 flex-col items-center justify-center">
            <h1 class="text-center text-3xl font-semibold text-gray-900">Selamat Datang di Sistem Pendukung Keputusan
                Beasiswa Universitas Pembangunan Jaya</h1>
        </div>

    </section>

    {{-- manipulate id datasa using jquery --}}
    <script type="module">
        $(document).ready(function() {
            $('#datasa').text('Hello World');
        });
    </script>

</x-layouts.app-layout>
