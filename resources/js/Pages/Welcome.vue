<script setup>
// --------------------- Import --------------------------------
import {Head, Link, usePage} from '@inertiajs/vue3';
import {inject} from "vue";
const route = inject('route');

// -------------------------------------------------------------

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}

console.log('$page', usePage());
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 overflow-y-hidden">
        <img
            id="background"
            class="absolute -left-20 top-0 max-w-[877px]"
            src="https://laravel.com/assets/img/welcome/background.svg"
        />
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="flex justify-end items-center gap-2 py-10 lg:grid-cols-3">
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="usePage().props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            환영합니다. {{ usePage().props.auth.user.name }} 님
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                로그인
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                회원가입
                            </Link>
                        </template>
                    </nav>
                </header>

                <main class="mt-6">
                    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                        <a
                            href="/"
                            id="docs-card"
                            class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                        >
                            <div id="screenshot-container" class="relative flex w-full flex-1 items-stretch">
                                <div class="rounded-lg w-full bg-zinc-800">

                                </div>
                            </div>

                            <div class="relative flex items-center gap-6 lg:items-end">
                                <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                                    <div class="pt-3 sm:pt-5 lg:pt-0">
                                        <h2 class="text-xl font-semibold text-black dark:text-white">공지사항</h2>

                                        <p class="mt-4 text-sm/relaxed">
                                            공지사항을 확인하지 않음으로 인한 불이익은 온전히 본인에게 책임이 있습니다.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- odd and even -->
                        <a
                            :href="route('game.oddEven')"
                            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                        >
                            <div
                                class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16"
                            >
                                <svg
                                    class="size-7 sm:size-9"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512"  xml:space="preserve">
                                        <g fill="#FF2D20">
                                        <path class="st0" d="M449.532,105.602L288.463,8.989C278.474,2.994,267.235,0,256.011,0c-11.239,0-22.483,2.994-32.467,8.989
                                            L62.475,105.602c-19.012,11.406-30.647,31.95-30.647,54.117v192.562c0,22.168,11.635,42.711,30.647,54.117l161.069,96.613
                                            c9.984,5.988,21.228,8.989,32.467,8.989c11.225,0,22.463-3.001,32.452-8.989l161.069-96.613
                                            c19.012-11.406,30.64-31.949,30.64-54.117V159.719C480.172,137.552,468.544,117.008,449.532,105.602z M250.599,492.733
                                            c-6.029-0.745-11.93-2.719-17.32-5.948L72.21,390.172c-13.306-7.989-21.456-22.369-21.456-37.891V159.719
                                            c0-6.022,1.236-11.862,3.518-17.233l196.328,117.76V492.733z M59.669,133.114c3.364-4.464,7.593-8.318,12.541-11.285
                                            l161.069-96.613c6.995-4.196,14.85-6.291,22.732-6.291c7.868,0,15.723,2.095,22.718,6.291l161.069,96.613
                                            c4.941,2.967,9.184,6.821,12.54,11.285L256.011,250.881L59.669,133.114z M461.254,352.281c0,15.522-8.15,29.902-21.456,37.891
                                            l-161.069,96.613c-5.398,3.229-11.292,5.203-17.321,5.948V260.246l196.328-117.76c2.283,5.37,3.518,11.211,3.518,17.233V352.281z"
                                        />
                                                                            <path class="st0" d="M160.209,119.875c-9.828-7.278-26.021-7.465-36.165-0.41c-10.144,7.056-10.399,18.67-0.57,25.947
                                            c9.828,7.277,26.022,7.459,36.159,0.41C169.783,138.766,170.038,127.152,160.209,119.875z"/>
                                                                            <path class="st0" d="M279.159,48.686c-9.829-7.277-26.022-7.458-36.172-0.403c-10.137,7.049-10.393,18.664-0.564,25.941
                                            c9.829,7.284,26.022,7.458,36.159,0.416C288.732,67.578,288.987,55.963,279.159,48.686z"/>
                                                                            <path class="st0" d="M220.59,82.024c-9.834-7.27-26.028-7.458-36.172-0.403c-10.15,7.049-10.406,18.664-0.571,25.941
                                            c9.829,7.284,26.022,7.458,36.166,0.416C230.151,100.916,230.412,89.302,220.59,82.024z"/>
                                                                            <path class="st0" d="M267.437,184.754c-9.828-7.277-26.015-7.459-36.159-0.41c-10.15,7.056-10.405,18.671-0.577,25.947
                                            c9.828,7.284,26.021,7.459,36.172,0.41C277.01,203.645,277.265,192.031,267.437,184.754z"/>
                                                                            <path class="st0" d="M386.385,113.564c-9.828-7.271-26.021-7.458-36.158-0.403c-10.151,7.049-10.406,18.664-0.577,25.941
                                            c9.828,7.284,26.02,7.458,36.172,0.416C395.959,132.456,396.214,120.842,386.385,113.564z"/>
                                                                            <path class="st0" d="M327.817,146.903c-9.829-7.27-26.022-7.458-36.172-0.403c-10.137,7.049-10.392,18.664-0.564,25.941
                                            c9.828,7.284,26.021,7.465,36.158,0.416C337.391,165.795,337.646,154.188,327.817,146.903z"/>
                                                                            <path class="st0" d="M89.289,248.303c11.158,6.083,20.194,1.961,20.194-9.19c0-11.158-9.036-25.128-20.194-31.21
                                            c-11.157-6.083-20.207-1.967-20.207,9.19C69.081,228.244,78.131,242.221,89.289,248.303z"/>
                                                                            <path class="st0" d="M202.061,309.771c11.158,6.082,20.208,1.967,20.208-9.184c0-11.157-9.05-25.135-20.208-31.217
                                            c-11.15-6.076-20.194-1.961-20.194,9.198C181.867,289.719,190.911,303.689,202.061,309.771z"/>
                                                                            <path class="st0" d="M89.289,361.082c11.158,6.076,20.194,1.967,20.194-9.19c0-11.158-9.036-25.129-20.194-31.21
                                            c-11.157-6.083-20.207-1.968-20.207,9.19C69.081,341.029,78.131,355,89.289,361.082z"/>
                                                                            <path class="st0" d="M202.061,422.55c11.158,6.082,20.208,1.967,20.208-9.191c0-11.151-9.05-25.128-20.208-31.21
                                            c-11.15-6.076-20.194-1.961-20.194,9.19C181.867,402.497,190.911,416.468,202.061,422.55z"/>
                                                                            <path class="st0" d="M145.675,335.424c11.158,6.082,20.201,1.967,20.201-9.191c0-11.151-9.044-25.128-20.201-31.204
                                            c-11.158-6.082-20.201-1.967-20.201,9.185C125.474,315.37,134.517,329.341,145.675,335.424z"/>
                                                                            <path class="st0" d="M418.341,207.902c-11.158,6.082-20.208,20.053-20.208,31.21c0,11.151,9.05,15.273,20.208,9.19
                                            c11.144-6.082,20.194-20.059,20.194-31.21C438.535,205.935,429.486,201.819,418.341,207.902z"/>
                                                                            <path class="st0" d="M305.555,382.149c-11.158,6.082-20.194,20.059-20.194,31.21c0,11.158,9.036,15.273,20.194,9.191
                                            c11.158-6.082,20.194-20.053,20.194-31.211C325.749,380.188,316.714,376.074,305.555,382.149z"/>
                                                                            <path class="st0" d="M361.948,295.028c-11.158,6.076-20.207,20.053-20.207,31.204c0,11.158,9.05,15.273,20.207,9.191
                                            c11.158-6.083,20.194-20.053,20.194-31.21C382.142,293.062,373.106,288.947,361.948,295.028z"/>
                                    </g>
                                </svg>
                            </div>

                            <div class="pt-3 sm:pt-5">
                                <h2 class="text-xl font-semibold text-black dark:text-white">ODD or EVEN Game</h2>

                                <p class="mt-4 text-sm/relaxed">
                                    홀짝게임
                                </p>
                            </div>

                            <svg
                                class="size-6 shrink-0 self-center stroke-[#FF2D20]"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"
                                />
                            </svg>
                        </a>
                        <!-- graph -->
                        <a
                            :href="route('game.graph')"
                            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                        >
                            <div
                                class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16"
                            >
                                <svg class="size-8 sm:size-10"
                                     xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 -0.5 25 25" fill="none">
                                    <path d="M19.5 19H9.5C7.29086 19 5.5 17.2091 5.5 15V5" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15.619 7.25C15.2048 7.25 14.869 7.58579 14.869 8C14.869 8.41421 15.2048 8.75 15.619 8.75V7.25ZM19.5 8.75C19.9142 8.75 20.25 8.41421 20.25 8C20.25 7.58579 19.9142 7.25 19.5 7.25V8.75ZM20.25 8C20.25 7.58579 19.9142 7.25 19.5 7.25C19.0858 7.25 18.75 7.58579 18.75 8H20.25ZM18.75 11.607C18.75 12.0212 19.0858 12.357 19.5 12.357C19.9142 12.357 20.25 12.0212 20.25 11.607H18.75ZM20.0765 8.47973C20.3414 8.16133 20.2981 7.68844 19.9797 7.42349C19.6613 7.15855 19.1884 7.20188 18.9235 7.52027L20.0765 8.47973ZM15.5 12.807L16.0038 13.3626C16.0298 13.339 16.054 13.3137 16.0765 13.2867L15.5 12.807ZM13.931 12.868L13.4663 13.4567L13.4718 13.461L13.931 12.868ZM12.882 12.04L13.3467 11.4513L13.3429 11.4483L12.882 12.04ZM11.2 12.223L10.6226 11.7443C10.6152 11.7532 10.608 11.7623 10.601 11.7716L11.2 12.223ZM11.072 12.375L11.6074 12.9002C11.6112 12.8963 11.615 12.8923 11.6187 12.8884L11.072 12.375ZM7.83052 14.6088C7.54048 14.9046 7.54508 15.3794 7.8408 15.6694C8.13652 15.9595 8.61138 15.9549 8.90141 15.6592L7.83052 14.6088ZM15.619 8.75H19.5V7.25H15.619V8.75ZM18.75 8V11.607H20.25V8H18.75ZM18.9235 7.52027L14.9235 12.3273L16.0765 13.2867L20.0765 8.47973L18.9235 7.52027ZM14.9962 12.2514C14.8266 12.4052 14.5711 12.4151 14.3901 12.275L13.4718 13.461C14.228 14.0465 15.2953 14.005 16.0038 13.3626L14.9962 12.2514ZM14.3956 12.2793L13.3466 11.4513L12.4173 12.6287L13.4663 13.4567L14.3956 12.2793ZM13.3429 11.4483C12.5051 10.7957 11.3004 10.9268 10.6226 11.7443L11.7773 12.7017C11.9377 12.5082 12.2228 12.4772 12.4211 12.6317L13.3429 11.4483ZM10.601 11.7716C10.5774 11.8029 10.5521 11.833 10.5252 11.8616L11.6187 12.8884C11.6826 12.8203 11.7427 12.7489 11.7989 12.6744L10.601 11.7716ZM10.5365 11.8498L7.83052 14.6088L8.90141 15.6592L11.6074 12.9002L10.5365 11.8498Z" fill="#FF2D20"/>
                                </svg>
                            </div>

                            <div class="pt-3 sm:pt-5">
                                <h2 class="text-xl font-semibold text-black dark:text-white">Graph Game</h2>

                                <p class="mt-4 text-sm/relaxed">
                                    그래프 게임
                                </p>
                            </div>

                            <svg
                                class="size-6 shrink-0 self-center stroke-[#FF2D20]"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"
                                />
                            </svg>
                        </a>
                        <!-- mine -->
                        <a
                            :href="route('game.mine')"
                            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                        >
                            <div
                                class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16"
                            >
                                <svg class="size-8 sm:size-11"
                                     fill="#FF2D20"
                                     viewBox="0 0 512 512"
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g>
                                        <path d="M150.7274933,118.9896011c1.0347137,1.0345993,2.390213,1.5521011,3.7456055,1.5521011   c1.3554993,0,2.7109985-0.5175018,3.7460938-1.5521011c2.0694122-2.0697021,2.0694122-5.4223022,0-7.4918976   l-23.3055878-23.3057022c-2.069809-2.069603-5.4224091-2.069603-7.4922028,0c-2.0693054,2.0697021-2.0693054,5.4223022,0,7.4917984   L150.7274933,118.9896011z"/>
                                        <path d="M317.3232117,189.4161072v-24.5266113c0-2.9257965-2.3691101-5.2979889-5.297821-5.2979889h-30.4433899v-13.3978119   h27.1528931c20.8143921,0,37.7485046-16.9339905,37.7485046-37.7483978c0-20.8146973-16.9341125-37.7486954-37.7485046-37.7486954   c-20.8144836,0-37.7490845,16.9339981-37.7490845,37.7486954v27.1522064h-96.0268097   c-2.9257965,0-5.2978973,2.3722992-5.2978973,5.2982025c0,2.9256897,2.3721008,5.2979889,5.2978973,5.2979889h96.0268097   v13.3978119h-30.4423065c-2.9263,0-5.2984009,2.3721924-5.2984009,5.2979889v24.5266113   c-53.257309,17.5576935-90.1132965,68.1916809-90.1132965,124.5195007   c0,72.3152771,58.8344879,131.1524963,131.1524048,131.1524963c72.3148804,0,131.1522827-58.8372192,131.1522827-131.1524963   C407.4364929,257.6077881,370.5830078,206.9738007,317.3232117,189.4161072z M281.5820007,108.4452972   c0-14.9732971,12.1796875-27.1527939,27.1528931-27.1527939c14.973114,0,27.1523132,12.1794968,27.1523132,27.1527939   c0,14.9729004-12.1791992,27.1522064-27.1523132,27.1522064h-27.1528931V108.4452972z M276.2842102,434.4920959   c-66.4737091,0-120.5562134-54.0823975-120.5562134-120.556488c0-52.9933167,35.4956055-100.5076141,86.3179016-115.5453033   c2.2510071-0.6674042,3.7953949-2.7344055,3.7953949-5.0809021V170.1875h60.8858185v23.1219025   c0,2.3464966,1.5419006,4.4134979,3.7923889,5.0809021c50.8233032,15.0376892,86.3208008,62.5519867,86.3208008,115.5453033   C396.8403015,380.4096985,342.7583008,434.4920959,276.2842102,434.4920959z"/>
                                        <path d="M217.6743011,239.0621033c-19.9008942,0-36.0923004,16.1915894-36.0923004,36.0928955   c0,19.9012146,16.1914063,36.0928955,36.0923004,36.0928955c19.9019012,0,36.0932922-16.1916809,36.0932922-36.0928955   C253.7675934,255.2536926,237.5762024,239.0621033,217.6743011,239.0621033z M217.6743011,300.6517029   c-14.0596008,0-25.4965973-11.4367065-25.4965973-25.4967041c0-14.0602112,11.4369965-25.4969025,25.4965973-25.4969025   c14.0605927,0,25.4971008,11.4366913,25.4971008,25.4969025   C243.171402,289.2149963,231.7348938,300.6517029,217.6743011,300.6517029z"/>
                                        <path d="M196.9790039,317.208313c-11.4105988,0-20.6952972,9.2843018-20.6952972,20.695282   c0,11.4111938,9.2846985,20.6954956,20.6952972,20.6954956c11.4111023,0,20.6952972-9.2843018,20.6952972-20.6954956   C217.6743011,326.4926147,208.3901062,317.208313,196.9790039,317.208313z M196.9790039,348.0032043   c-5.5693054,0-10.0991058-4.5299072-10.0991058-10.0996094c0-5.5694885,4.5298004-10.0991821,10.0991058-10.0991821   c5.5702972,0,10.0995941,4.5296936,10.0995941,10.0991821C207.078598,343.4732971,202.5493011,348.0032043,196.9790039,348.0032043   z"/>
                                        <path d="M148.1195984,140.678299c0-2.9259033-2.371994-5.2978973-5.2978058-5.2978973h-32.9599915   c-2.9263,0-5.2983017,2.371994-5.2983017,5.2978973c0,2.9257965,2.3720016,5.2980042,5.2983017,5.2980042h32.9599915   C145.7476044,145.9763031,148.1195984,143.6040955,148.1195984,140.678299z"/>
                                        <path d="M158.2191925,162.3645935c-2.0697937-2.0694885-5.422287-2.0694885-7.4916992,0l-23.3060913,23.3058014   c-2.0693054,2.0695038-2.0693054,5.4221039,0,7.4916077c1.0350952,1.03479,2.3905945,1.5522919,3.7460938,1.5522919   c1.3554077,0,2.7114105-0.5175018,3.746109-1.5522919l23.3055878-23.305603   C160.2886047,167.7868958,160.2886047,164.4340973,158.2191925,162.3645935z"/>
                                        <path d="M180.7230988,209.1441956v-32.9601898c0-2.925705-2.3724976-5.2980042-5.2982941-5.2980042   c-2.9258118,0-5.2978058,2.3722992-5.2978058,5.2980042v32.9601898c0,2.925705,2.371994,5.298111,5.2978058,5.298111   C178.3506012,214.4423065,180.7230988,212.0699005,180.7230988,209.1441956z"/>
                                        <path d="M175.4248047,110.4681015c2.9257965,0,5.2982941-2.3722992,5.2982941-5.2980042V72.2098999   c0-2.9256973-2.3724976-5.2979965-5.2982941-5.2979965c-2.9258118,0-5.2978058,2.3722992-5.2978058,5.2979965v32.9601974   C170.1269989,108.0958023,172.4989929,110.4681015,175.4248047,110.4681015z"/>
                                    </g>
                                </svg>
                            </div>

                            <div class="pt-3 sm:pt-5">
                                <h2 class="text-xl font-semibold text-black dark:text-white">Minesweeper Game</h2>

                                <p class="mt-4 text-sm/relaxed">
                                    지뢰찾기 게임
                                </p>
                            </div>

                            <svg
                                class="size-6 shrink-0 self-center stroke-[#FF2D20]"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"
                                />
                            </svg>
                        </a>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    {{ new Date().toISOString().slice(0,10) }} Laravel v{{ laravelVersion }}
                </footer>
            </div>
        </div>
    </div>
</template>
