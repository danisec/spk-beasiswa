<x-layouts.app-layout title="{{ $title }}">

    <section class="layout min-h-screen w-full py-8">

        <div class="mx-auto flex w-10/12 flex-col items-center justify-center">
            <h1 class="text-center text-3xl font-semibold text-gray-900">Anak-anak ku ayo jangan mager, jangan baper,
                Indonesia
                itu perlu energimu Bangsamu butuh kreativitasmu kini saatnya kalian bergerak.</h1>

            <div class="my-6 focus:outline-none" x-data="{ show: false }">
                <button
                    class="h-12 w-32 rounded-md bg-white text-base font-semibold text-gray-900 shadow-md shadow-gray-100"
                    @click="show = !show">Ibu Kita Tercinta</button>
                <h1 x-show="show">
                    <img src="{{ asset('images/mega-chan.jpg') }}" srcset="" alt="">
                </h1>
            </div>
        </div>

    </section>

    {{-- manipulate id datasa using jquery --}}
    <script type="module">
        $(document).ready(function() {
            $('#datasa').text('Hello World');
        });
    </script>

</x-layouts.app-layout>
