<header class="layout sticky top-0 z-50 flex flex-row items-center bg-blue-800 py-8 text-white">

    <div class="left-0 right-0 mx-auto">
        <ul>
            <li class="flex flex-row items-center gap-12">
                @foreach ($navbar as $name => $url)
                    <a class="{{ request()->segment(1) == $url
                        ? 'text-white font-semibold text-lg bg-indigo-600 rounded-md px-4 py-2 transition-all ease-in'
                        : 'text-white font-normal text-lg' }}"
                        href="{{ $url == '/' ? url('') : url('') . '/' . $url }}">{{ $name }}</a>
                @endforeach

                <div href="#" x-data="{ show: false }">
                    <button class="flex flex-row items-center gap-1 text-lg font-semibold text-white focus:outline-none"
                        type="button" @click="show = !show">
                        <p class="text-lg font-normal text-white">Input Data</p>

                        <svg class="mt-1.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                    {{-- AlpineJS dont show modal after refresh page --}}
                    <div class="absolute mt-4 w-48 rounded-lg bg-white shadow-md shadow-slate-100" x-show="show"
                        x-on:click.outside="show = !show" x-bind:class="hidden = !show"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100" x-cloak>
                        <ul class="m-4">
                            <li class="flex w-40 flex-col gap-3">
                                @foreach ($inputData as $name => $url)
                                    <a class="{{ request()->segment(1) == $url
                                        ? 'text-white font-semibold text-lg bg-indigo-600 p-2 rounded-md transition-all ease-in'
                                        : 'text-gray-900 p-2 hover:bg-slate-100 hover:p-2 hover:rounded-md hover:transition-all hover:ease-in font-normal text-lg' }}"
                                        href="{{ $url == '/' ? url('') : url('') . '/' . $url }}">{{ $name }}</a>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>

                @foreach ($penilaian as $name => $url)
                    <a class="{{ request()->segment(1) == $url
                        ? 'text-white font-semibold text-lg bg-indigo-600 rounded-md px-4 py-2 transition-all ease-in'
                        : 'text-white font-normal text-lg' }}"
                        href="{{ $url == '/' ? url('') : url('') . '/' . $url }}">{{ $name }}</a>
                @endforeach

                @foreach ($report as $name => $url)
                    <a class="{{ request()->segment(1) == $url
                        ? 'text-white font-semibold text-lg bg-indigo-600 rounded-md px-4 py-2 transition-all ease-in'
                        : 'text-white font-normal text-lg' }}"
                        href="{{ $url == '/' ? url('') : url('') . '/' . $url }}">{{ $name }}</a>
                @endforeach

            </li>
        </ul>
    </div>

    <x-organisms.avatar />

</header>
