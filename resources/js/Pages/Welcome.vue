<script setup>
import { Head, Link } from '@inertiajs/vue3';
import VendorCard from '@/Components/VendorCard.vue';
import HomepageCover from "@/Components/HomepageCover.vue";

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


</script>

<template>
    <div class="page-container">
        <!-- Top header section -->
        <div class="flex justify-between items-center p-5 bg-gray-200">
            <!-- Logo -->
            <div class="logo-box">
                <svg class="logo-svg w-full h-full"
                     version="1.0"
                     viewBox="0 0 300.000000 214.000000"
                     preserveAspectRatio="xMidYMid meet"
                     id="svg18"
                     sodipodi:docname="WeddingPalLogo.svg"
                     xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                     xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                     xmlns="http://www.w3.org/2000/svg"
                     xmlns:svg="http://www.w3.org/2000/svg">
                    <defs
                        id="defs22"/>
                    <sodipodi:namedview
                        id="namedview20"
                        pagecolor="#ffffff"
                        bordercolor="#000000"
                        borderopacity="0.25"
                        inkscape:showpageshadow="2"
                        inkscape:pageopacity="0.0"
                        inkscape:pagecheckerboard="0"
                        inkscape:deskcolor="#d1d1d1"
                        inkscape:document-units="pt"/>
                    <g
                        transform="translate(0.000000,214.000000) scale(0.100000,-0.100000)"
                        fill="#000000"
                        stroke="none"
                        id="g16">
                        <path
                            d="M1046 1740 c33 -64 -35 -306 -122 -437 -62 -95 -81 -62 -42 72 16 55 19 78 11 86 -17 17 -29 4 -73 -79 -41 -78 -124 -192 -141 -192 -21 0 -5 39 62 153 75 127 133 243 143 289 8 34 -22 68 -58 68 -13 0 -64 -20 -112 -45 -104 -52 -191 -131 -229 -209 -22 -45 -24 -56 -14 -84 6 -18 15 -32 20 -32 5 0 12 0 17 0 4 0 7 8 8 18 2 41 62 127 140 202 77 74 159 129 172 115 9 -9 -39 -100 -118 -224 -79 -123 -109 -185 -110 -217 0 -26 30 -54 58 -54 22 0 103 72 134 120 l17 25 0 -27 c1 -33 36 -68 68 -68 15 0 44 19 74 47 82 77 179 297 179 408 0 42 -44 95 -78 95 -19 0 -20 -2 -6 -30z"
                            id="path2"/>
                        <path
                            d="M1550 1655 c0 -37 -41 -147 -69 -184 -17 -23 -19 -23 -44 -7 -23 16 -28 16 -54 3 -15 -8 -38 -26 -49 -39 -25 -26 -64 -97 -64 -115 0 -6 -26 -34 -57 -63 -72 -63 -97 -64 -101 -2 -3 40 -2 42 25 42 47 0 111 54 128 108 10 32 -28 72 -68 72 -36 0 -86 -49 -121 -119 -50 -98 -29 -171 48 -171 26 0 45 10 85 46 l51 46 0 -30 c0 -31 22 -62 43 -62 6 0 33 23 59 51 l48 51 0 -32 c0 -74 42 -91 91 -38 21 24 29 28 29 15 0 -9 11 -24 25 -33 23 -15 27 -15 50 0 14 9 36 34 50 56 14 22 27 40 29 40 2 0 2 -17 -1 -37 -6 -51 13 -77 50 -67 16 3 35 17 44 30 14 22 41 36 28 14 -7 -12 30 -50 49 -50 7 0 33 19 56 43 24 23 40 34 37 24 -9 -24 9 -67 28 -67 8 0 15 7 15 15 0 31 61 131 115 190 30 33 55 55 55 49 0 -6 -16 -47 -35 -91 -42 -97 -44 -127 -11 -148 30 -20 49 -11 95 40 30 34 31 35 31 11 0 -13 8 -34 18 -46 23 -29 46 -18 98 45 66 81 68 87 -149 -384 -67 -146 -107 -211 -128 -211 -17 0 -9 42 26 126 40 96 42 114 17 137 -24 22 -32 21 -32 -2 0 -47 -149 -269 -171 -255 -15 9 -10 29 26 100 40 81 87 134 118 134 21 1 22 1 3 15 -33 25 -70 18 -110 -21 -91 -88 -125 -254 -52 -254 17 0 38 16 70 52 l46 53 0 -41 c0 -22 5 -45 12 -52 19 -19 54 -14 79 12 l23 24 11 -21 c24 -49 101 -60 172 -26 81 39 123 121 89 174 -20 31 -36 32 -36 3 0 -48 -22 -100 -60 -139 -34 -35 -43 -40 -77 -37 -34 3 -38 6 -36 30 1 15 25 80 53 145 105 237 123 280 167 388 106 260 104 254 82 276 -33 33 -45 21 -54 -53 -5 -35 -19 -59 -88 -145 -46 -57 -67 -70 -67 -40 0 22 56 131 85 165 16 19 38 37 49 41 19 8 19 9 -7 26 -26 17 -28 17 -54 -1 -40 -25 -59 -51 -98 -125 -41 -80 -125 -160 -125 -119 0 5 16 45 36 87 43 93 51 128 34 148 -21 26 -42 17 -97 -41 -29 -31 -53 -53 -53 -50 0 3 8 22 17 42 17 35 17 36 -2 50 -26 19 -45 18 -45 -5 0 -29 -70 -148 -118 -203 -77 -85 -78 -62 -6 88 24 50 44 96 44 101 0 11 -42 53 -53 53 -4 0 -7 -11 -7 -24 0 -38 -69 -178 -108 -218 -80 -84 -70 -37 57 274 17 42 34 91 37 108 7 34 -9 60 -36 60 -14 0 -17 -8 -17 -37 2 -53 -70 -206 -92 -197 -36 15 -64 16 -88 3 -33 -17 -100 -120 -109 -164 -6 -34 -68 -104 -77 -88 -7 11 44 159 107 308 53 128 56 152 20 165 -35 14 -34 14 -34 -25z m-320 -255 c-15 -37 -76 -100 -96 -100 -19 0 14 65 58 115 37 43 58 34 38 -15z m230 23 c0 -35 -119 -213 -142 -213 -15 0 -4 62 21 113 43 88 121 153 121 100z m275 7 c13 -21 -117 -220 -143 -220 -28 0 19 123 75 198 24 32 56 42 68 22z"
                            id="path4"/>
                        <path
                            d="M1930 1599 c0 -36 2 -40 23 -37 39 5 31 78 -9 78 -10 0 -14 -13 -14 -41z"
                            id="path6"/>
                        <path
                            d="M2490 1210 c0 -41 -32 -96 -88 -152 -31 -32 -51 -58 -44 -58 49 0 155 82 178 137 16 36 6 76 -21 87 -24 9 -25 8 -25 -14z"
                            id="path8"/>
                        <path
                            d="M763 1161 c-28 -18 -33 -27 -33 -59 0 -59 74 -150 168 -205 18 -11 30 -23 25 -28 -10 -9 -165 -52 -243 -67 -129 -24 -232 -84 -260 -152 -7 -16 -9 -38 -5 -47 6 -14 9 -11 17 17 21 79 119 137 283 171 51 10 126 30 167 44 l75 25 59 -29 c76 -37 270 -92 348 -98 45 -3 57 -2 46 6 -8 6 -31 11 -51 11 -41 0 -247 61 -328 96 l-54 24 44 29 c83 53 140 151 119 206 -28 75 -173 70 -220 -7 -27 -45 -25 -69 3 -28 33 50 70 73 116 73 137 0 112 -134 -46 -242 l-33 -22 -57 39 c-117 80 -178 165 -152 213 19 36 102 37 141 2 10 -9 18 -11 18 -5 0 17 -43 42 -81 48 -24 3 -44 -1 -66 -15z"
                            id="path10"/>
                        <path
                            d="M1590 1104 c-203 -54 -379 -227 -302 -297 24 -22 32 -21 32 3 0 65 121 180 270 255 68 35 183 46 215 22 46 -35 9 -154 -77 -252 -45 -50 -146 -105 -195 -105 l-33 0 23 38 c39 62 137 254 137 268 0 7 -9 18 -19 24 -17 9 -23 4 -45 -43 -14 -28 -51 -92 -81 -142 -74 -119 -169 -311 -161 -324 20 -32 75 24 112 112 l17 42 81 0 c66 0 91 5 136 26 102 48 179 146 187 238 10 112 -33 151 -162 150 -44 0 -105 -7 -135 -15z"
                            id="path12"/>
                        <path
                            d="M2214 1074 c-25 -24 -25 -26 -8 -45 9 -10 29 -19 43 -19 l26 1 -27 15 c-34 18 -35 30 -5 55 12 10 16 18 9 19 -7 0 -24 -12 -38 -26z"
                            id="path14"/>
                    </g>
                </svg>
            </div>

            <!-- Buttons -->
            <div class="buttons flex flex-col space-y-4">
                <button class="ml-4 bg-blue-500 text-white py-2 px-4 rounded cursor-pointer hover:bg-blue-700">
                    <Link
                        :href="route('login')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Log in
                    </Link>
                </button>
                <button class="ml-4 bg-blue-500 text-white py-2 px-4 rounded cursor-pointer hover:bg-blue-700">
                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Register
                    </Link>
                </button>
            </div>


        </div>

        <div class="navigation-bar bg-gray-400 opacity-75 p-2 rounded-md">
            <ul class="flex items-center justify-center space-x-4">
                <li><a href="#"
                       class="py-2 px-4 text-white bg-gray-800 hover:bg-gray-700 rounded-md transition duration-300">Find
                    Vendors</a></li>
                <li><a href="#"
                       class="py-2 px-4 text-white bg-gray-800 hover:bg-gray-700 rounded-md transition duration-300">Wedding
                    Inspiration</a></li>
                <li><a href="#"
                       class="py-2 px-4 text-white bg-gray-800 hover:bg-gray-700 rounded-md transition duration-300">Destination
                    Weddings</a></li>
                <li><a href="#"
                       class="py-2 px-4 text-white bg-gray-800 hover:bg-gray-700 rounded-md transition duration-300">Why
                    WeddingPal?</a></li>
                <li><a href="#"
                       class="py-2 px-4 text-white bg-gray-800 hover:bg-gray-700 rounded-md transition duration-300">Become
                    a Vendor</a></li>
                <li><a href="#"
                       class="py-2 px-4 text-white bg-gray-800 hover:bg-gray-700 rounded-md transition duration-300">Start
                    Planning Your Wedding</a></li>
                <li><a href="#"
                       class="py-2 px-4 text-white bg-gray-800 hover:bg-gray-700 rounded-md transition duration-300">About
                    Us</a></li>
            </ul>
        </div>
        <!-- Your content goes here -->

        <div
            class="flex flex-col h-screen"
            style="background-image: url('/images/bgCover.jpg'); background-size: cover; background-position: center;"
        >
            <!--            This div-->

            <div
                class=" flex-grow  inset-0 flex flex-col justify-center items-center bg-black bg-opacity-50 text-white text-center">
                <h1 class="text-5xl font-bold">WeddingPal</h1>
                <p class="mt-4 text-2xl">Your Dream Wedding Starts Here</p>
                <a href="#" class="mt-8 bg-white text-black px-4 py-2 text-lg rounded-full">
                    Get Started
                </a>
            </div>


        </div>

    </div>
</template>

<script>
export default {
    name: 'PageWithHeaderAndNavigation',

}

</script>
