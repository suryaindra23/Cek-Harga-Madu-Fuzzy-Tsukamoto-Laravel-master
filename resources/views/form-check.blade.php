<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cek Harga Madu Terkini</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
</head>

<body>
    <section class="h-full w-full border-box  transition-all duration-500 linear bg-white">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            .btn-outline-header-2-2 {
                border: 1px solid #555B61;
                color: #555B61;
            }

            .btn-outline-header-2-2:hover {
                border: 1px solid #27C499;
                color: #27C499;
            }

            .btn-outline-header-2-2:hover div path {
                fill: #27C499;
            }

            .btn-fill-header-2-2 {
                border: 1px solid #27C499;
            }

            .navigation-header-2-2 a:hover,
            .active::after {
                font-weight: 600;
            }
        </style>
        <!-- Navbar -->
        <div style="font-family: 'Poppins', sans-serif;">
            <header x-data="{ open: false }">
                <div
                    class="mx-auto flex py-12 lg:px-24 md:px-16 sm:px-8 px-8  items-center justify-between lg:justify-start">
                    <a href="/home">
                        <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-5.png"
                            alt="">
                    </a>
                    <div class="flex mr-0 lg:hidden cursor-pointer">
                        <svg class="w-6 h-6" @click="open = !open" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </div>
                    <div :class="{ 'hidden': !open }"
                        class="bg-black fixed w-full hidden h-full top-0 left-0 z-30 bg-opacity-60"
                        @click="open = !open">
                    </div>
                    <nav class="navigation-header-2-2 lg:mr-auto hidden lg:flex flex-col text-base justify-center z-50 fixed top-8 left-3 right-3 p-8 rounded-md shadow-md bg-white lg:flex lg:flex-row lg:relative lg:top-0 lg:shadow-none lg:bg-transparent lg:p-0 lg:items-center items-start"
                        :class="{ 'flex': open, 'hidden': !open }">
                        <a href="#">
                            <img class="m-0 lg:hidden mb-3"
                                src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-5.png"
                                alt="">
                        </a>
                        <a class=" text-lg font-semibold leading-6 mx-0 lg:mx-5 my-4 lg:my-0 relative active"
                            style="color: #1d1e3c; font-family: 'Poppins', sans-serif;" href="/home">Home</a>
                        <div class="flex items-center justify-end w-full lg:hidden mt-3">
                            <button
                                class=" text-white  text-lg py-3 px-8 rounded-xl focus:outline-none hover:shadow-lg  font-semibold"
                                style="background: #27C499; font-family: 'Poppins', sans-serif;">
                                Get Started
                            </button>
                        </div>
                        <svg @click="open = !open" class="w-6 h-6 absolute top-4 right-4  lg:hidden cursor-pointer"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </nav>
                </div>
            </header>
        </div>
    </section>
    <section class="h-full lg:px-24 md:px-16 sm:px-8 px-4 bg-white">
        <form class="w-full" method="POST" action="{{ route('check_price') }}">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-first-name">
                        Nama Anda
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" name="name" placeholder="Name"
                        value="{{ $data_form != null ? $data_form['name'] : '' }}">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-last-name">
                        Alamat Anda
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-last-name" type="text" name="address" placeholder="Address"
                        value="{{ $data_form != null ? $data_form['address'] : '' }}">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/6 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password">
                        Berat Madu
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-password" type="number" name="luas" placeholder="2 - 100"
                        value="{{ $data_form != null ? $data_form['luas'] : '' }}">
                    <p class="text-gray-600 text-xs italic">Dalam satuan Kilogram</p>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        Variant Madu
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[0]" value="10"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][0]) ? 'checked' : '' }} @endif>
                        <span span class="ml-2">Multiflora</span>
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[1]" value="20"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][1]) ? 'checked' : '' }} @endif>
                        <span class="ml-2">Randu</span>
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[2]" value="15"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][2]) ? 'checked' : '' }} @endif>
                        <span span class="ml-2">Kopi</span>
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[3]" value="60"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][3]) ? 'checked' : '' }} @endif>
                        <span class="ml-2">Durian</span>
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[4]" value="50"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][4]) ? 'checked' : '' }} @endif>
                        <span span class="ml-2">Kelengkeng</span>
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[5]" value="35"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][5]) ? 'checked' : '' }} @endif>
                        <span class="ml-2">Kaliandra</span>
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[6]" value="40"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][6]) ? 'checked' : '' }} @endif>
                        <span span class="ml-2">Rambutan</span>
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[7]" value="30"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][7]) ? 'checked' : '' }} @endif>
                        <span class="ml-2">Mangga</span>
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[8]" value="25"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][8]) ? 'checked' : '' }} @endif>
                        <span span class="ml-2">Karet</span>
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[9]" value="15"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][9]) ? 'checked' : '' }} @endif>
                        <span class="ml-2">Sonokeling</span>
                    </label>
                </div>
            </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/6 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password">
                        Enzim Diastase
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-password" type="number" name="enzim_diastase" placeholder="2 - 100"
                        value="{{ $data_form != null ? $data_form['enzim_diastase'] : '' }}">
                    <p class="text-gray-600 text-xs italic">Dalam satuan Kilogram</p>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/6 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password">
                        Kadar Air
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-password" type="number" name="kadar_air" placeholder="2 - 100"
                        value="{{ $data_form != null ? $data_form['kadar_air'] : '' }}">
                    <p class="text-gray-600 text-xs italic">Dalam satuan Kilogram</p>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/6 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password">
                        Glukosa
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-password" type="number" name="glukosa" placeholder="2 - 100"
                        value="{{ $data_form != null ? $data_form['glukosa'] : '' }}">
                    <p class="text-gray-600 text-xs italic">Dalam satuan Kilogram</p>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/6 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password">
                        Hidroksi Metilfurfural
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-password" type="number" name="hidroksi_metilfurfural" placeholder="2 - 100"
                        value="{{ $data_form != null ? $data_form['hidroksi_metilfurfural'] : '' }}">
                    <p class="text-gray-600 text-xs italic">Dalam satuan Kilogram</p>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/6 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password">
                        Stok / Bulan
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-password" type="number" name="stok" placeholder="2 - 100"
                        value="{{ $data_form != null ? $data_form['stok'] : '' }}">
                    <p class="text-gray-600 text-xs italic">Dalam satuan Kilogram</p>
                </div>
            </div>
            <div class="md:flex md:items-center -mx-3 mb-6 mt-10">
                <div class="md:w-2/3 ml-3">
                    <button
                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mr-auto"
                        type="submit">
                        Check Harga Sekarang
                    </button>
                </div>
            </div>
        </form>
    </section>
    </section>
    <section class="h-full w-full border-box bg-white">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            .btn-outline-content-2-1 {
                border: 1px solid #979797;
                color: #979797;
            }

            .btn-outline-content-2-1:hover {
                border: 1px solid #FF7C57;
                color: #FF7C57;
            }

            .btn-fill-content-2-1 {
                border: 1px solid #FF7C57;
            }

            .card-header-content-2-1 {
                background-color: #FFF7F4;
                border: 1px solid #FF7C57;
            }

            @media(min-width: 1024px) {
                .lg-show-content-2-1 {
                    display: block;
                }

                .lg-hide-content-2-1 {
                    display: none;
                }
            }

            @media(max-width: 1024px) {
                .lg-show-content-2-1 {
                    display: none;
                }

                .lg-hide-content-2-1 {
                    display: block;
                }
            }
        </style>
        <div style="font-family: 'Poppins', sans-serif;">
            <div class="container pb-12 mx-auto">
                <!-- Title Text -->
                <div class="flex flex-col text-center w-full">
                    <h2 class="text-base font-light title-font mx-12 lg:w-full md:w-full sm:w-3/6 sm:mx-auto mb-4"
                        style="color: #121212;">PERKIRAAN HARGA</h2>
                    <h1 class="text-4xl font-semibold title-font mb-2.5" style="color: #121212;">Rp.
                        {{ $result_price != null ? number_format($result_price, 0, '.', '.') : '-' }},-</h1>
                </div>
            </div>


        </div>
        <section class="h-full pt-20 pb-12 lg:px-24 md:px-16 sm:px-8 px-4 bg-white">
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

                .list-footer-2-1 li a {
                    color: #C7C7C7;
                }

                .list-footer-2-1 li a:hover {
                    color: #555252;
                    cursor: pointer;
                }

                .border-color-footer-2-1 {
                    color: #C7C7C7;
                }

                .footer-link-footer-2-1:hover {
                    color: #555252;
                    cursor: pointer;
                }

                .social-media-c-footer-2-1:hover circle,
                .social-media-p-footer-2-1:hover path {
                    fill: #555252;
                    cursor: pointer;
                }
            </style>
            <footer class="h-full" style="font-family: 'Poppins', sans-serif;">
                <div class="pb-24 mx-auto">
                    <div class="grid lg:grid-cols-4 md:grid-cols-2">
                        <div class="">
                            <div class="mb-5">
                                <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-2.png"
                                    alt="">
                            </div>
                            <nav class="list-none list-footer-2-1">
                                <li class="mb-5">
                                    <a>Home</a>
                                </li>
                                <li class="mb-5">
                                    <a>About</a>
                                </li>
                                <li class="mb-5">
                                    <a>Features</a>
                                </li>
                                <li class="mb-5">
                                    <a>Pricing</a>
                                </li>
                                <li class="mb-5">
                                    <a>Testimonial</a>
                                </li>
                                <li class="mb-5">
                                    <a>Help</a>
                                </li>
                            </nav>
                        </div>
                        <div class="">
                            <h2 class="title-font font-semibold text-2xl mb-5">Product</h2>
                            <nav class="list-none list-footer-2-1">
                                <li class="mb-5">
                                    <a>Real Time Analytic</a>
                                </li>
                                <li class="mb-5">
                                    <a>Easy to Operate</a>
                                </li>
                                <li class="mb-5">
                                    <a>Full Secured</a>
                                </li>
                                <li class="mb-5">
                                    <a>Analytic Tool</a>
                                </li>
                                <li class="mb-5">
                                    <a>Story</a>
                                </li>
                            </nav>
                        </div>
                        <div class="">
                            <h2 class="title-font font-semibold text-2xl mb-5">Company</h2>
                            <nav class="list-none list-footer-2-1">
                                <li class="mb-5">
                                    <a>Contact Us</a>
                                </li>
                                <li class="mb-5">
                                    <a>Blog</a>
                                </li>
                                <li class="mb-5">
                                    <a>Culture</a>
                                </li>
                                <li class="mb-5">
                                    <a>Security</a>
                                </li>
                            </nav>
                        </div>
                        <div class="">
                            <h2 class="title-font font-semibold text-2xl mb-5">Support</h2>
                            <nav class="list-none list-footer-2-1">
                                <li class="mb-5">
                                    <a>Getting Started</a>
                                </li>
                                <li class="mb-5">
                                    <a>Help Center</a>
                                </li>
                                <li class="mb-5">
                                    <a>Server Status</a>
                                </li>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="border-color-footer-2-1 mx-auto">
                    <div class="">
                        <hr>
                    </div>
                    <div
                        class="container mx-auto flex  pt-12 flex-col lg:flex-row items-center space-y-5 lg:space-y-0">
                        <div class="flex title-font font-medium items-center text-gray-900 mb-4 lg:mb-0 md:mb-0 space-x-5"
                            style="cursor: pointer;">
                            <svg class="social-media-c-footer-2-1" width="30" height="30" viewBox="0 0 30 30"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="15" cy="15" r="15" fill="#C7C7C7" />
                                <g clip-path="url(#clip0)">
                                    <path
                                        d="M17.6648 9.65667H19.1254V7.11267C18.8734 7.078 18.0068 7 16.9974 7C14.8914 7 13.4488 8.32467 13.4488 10.7593V13H11.1248V15.844H13.4488V23H16.2981V15.8447H18.5281L18.8821 13.0007H16.2974V11.0413C16.2981 10.2193 16.5194 9.65667 17.6648 9.65667V9.65667Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect width="16" height="16" fill="white"
                                            transform="translate(7 7)" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <svg class="social-media-c-footer-2-1" width="30" height="30" viewBox="0 0 30 30"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="15" cy="15" r="15" fill="#C7C7C7" />
                                <g clip-path="url(#clip0)">
                                    <path
                                        d="M23 10.039C22.405 10.3 21.771 10.473 21.11 10.557C21.79 10.151 22.309 9.513 22.553 8.744C21.919 9.122 21.219 9.389 20.473 9.538C19.871 8.897 19.013 8.5 18.077 8.5C16.261 8.5 14.799 9.974 14.799 11.781C14.799 12.041 14.821 12.291 14.875 12.529C12.148 12.396 9.735 11.089 8.114 9.098C7.831 9.589 7.665 10.151 7.665 10.756C7.665 11.892 8.25 12.899 9.122 13.482C8.595 13.472 8.078 13.319 7.64 13.078C7.64 13.088 7.64 13.101 7.64 13.114C7.64 14.708 8.777 16.032 10.268 16.337C10.001 16.41 9.71 16.445 9.408 16.445C9.198 16.445 8.986 16.433 8.787 16.389C9.212 17.688 10.418 18.643 11.852 18.674C10.736 19.547 9.319 20.073 7.785 20.073C7.516 20.073 7.258 20.061 7 20.028C8.453 20.965 10.175 21.5 12.032 21.5C18.068 21.5 21.368 16.5 21.368 12.166C21.368 12.021 21.363 11.881 21.356 11.742C22.007 11.28 22.554 10.703 23 10.039Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect width="16" height="16" fill="white"
                                            transform="translate(7 7)" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <svg class="social-media-p-footer-2-1" width="30" height="30" viewBox="0 0 30 30"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.8711 15C17.8711 16.5857 16.5857 17.8711 15 17.8711C13.4143 17.8711 12.1289 16.5857 12.1289 15C12.1289 13.4143 13.4143 12.1289 15 12.1289C16.5857 12.1289 17.8711 13.4143 17.8711 15Z"
                                    fill="#C7C7C7" />
                                <path
                                    d="M21.7144 9.92039C21.5764 9.5464 21.3562 9.20789 21.0701 8.93002C20.7923 8.64392 20.454 8.42374 20.0797 8.28572C19.7762 8.16785 19.3203 8.02754 18.4805 7.98932C17.5721 7.94789 17.2997 7.93896 14.9999 7.93896C12.6999 7.93896 12.4275 7.94766 11.5193 7.98909C10.6796 8.02754 10.2234 8.16785 9.92014 8.28572C9.54591 8.42374 9.2074 8.64392 8.92976 8.93002C8.64366 9.20789 8.42348 9.54617 8.28523 9.92039C8.16736 10.2239 8.02705 10.6801 7.98883 11.5198C7.9474 12.428 7.93848 12.7004 7.93848 15.0004C7.93848 17.3002 7.9474 17.5726 7.98883 18.481C8.02705 19.3208 8.16736 19.7767 8.28523 20.0802C8.42348 20.4545 8.64343 20.7927 8.92953 21.0706C9.2074 21.3567 9.54568 21.5769 9.91991 21.7149C10.2234 21.833 10.6796 21.9733 11.5193 22.0115C12.4275 22.053 12.6997 22.0617 14.9997 22.0617C17.3 22.0617 17.5723 22.053 18.4803 22.0115C19.3201 21.9733 19.7762 21.833 20.0797 21.7149C20.8309 21.4251 21.4247 20.8314 21.7144 20.0802C21.8323 19.7767 21.9726 19.3208 22.011 18.481C22.0525 17.5726 22.0612 17.3002 22.0612 15.0004C22.0612 12.7004 22.0525 12.428 22.011 11.5198C21.9728 10.6801 21.8325 10.2239 21.7144 9.92039V9.92039ZM14.9999 19.4231C12.5571 19.4231 10.5768 17.4431 10.5768 15.0002C10.5768 12.5573 12.5571 10.5773 14.9999 10.5773C17.4426 10.5773 19.4229 12.5573 19.4229 15.0002C19.4229 17.4431 17.4426 19.4231 14.9999 19.4231ZM19.5977 11.4361C19.0269 11.4361 18.5641 10.9733 18.5641 10.4024C18.5641 9.83159 19.0269 9.36879 19.5977 9.36879C20.1685 9.36879 20.6313 9.83159 20.6313 10.4024C20.6311 10.9733 20.1685 11.4361 19.5977 11.4361Z"
                                    fill="#C7C7C7" />
                                <path
                                    d="M15 0C6.717 0 0 6.717 0 15C0 23.283 6.717 30 15 30C23.283 30 30 23.283 30 15C30 6.717 23.283 0 15 0ZM23.5613 18.5511C23.5197 19.468 23.3739 20.094 23.161 20.6419C22.7135 21.7989 21.7989 22.7135 20.6419 23.161C20.0942 23.3739 19.468 23.5194 18.5513 23.5613C17.6328 23.6032 17.3394 23.6133 15.0002 23.6133C12.6608 23.6133 12.3676 23.6032 11.4489 23.5613C10.5322 23.5194 9.90601 23.3739 9.35829 23.161C8.78334 22.9447 8.26286 22.6057 7.83257 22.1674C7.39449 21.7374 7.05551 21.2167 6.83922 20.6419C6.62636 20.0942 6.48056 19.468 6.4389 18.5513C6.39656 17.6326 6.38672 17.3392 6.38672 15C6.38672 12.6608 6.39656 12.3674 6.43867 11.4489C6.48033 10.532 6.6259 9.90601 6.83876 9.35806C7.05505 8.78334 7.39426 8.26263 7.83257 7.83257C8.26263 7.39426 8.78334 7.05528 9.35806 6.83899C9.90601 6.62613 10.532 6.48056 11.4489 6.43867C12.3674 6.39679 12.6608 6.38672 15 6.38672C17.3392 6.38672 17.6326 6.39679 18.5511 6.4389C19.468 6.48056 20.094 6.62613 20.6419 6.83876C21.2167 7.05505 21.7374 7.39426 22.1677 7.83257C22.6057 8.26286 22.9449 8.78334 23.161 9.35806C23.3741 9.90601 23.5197 10.532 23.5616 11.4489C23.6034 12.3674 23.6133 12.6608 23.6133 15C23.6133 17.3392 23.6034 17.6326 23.5613 18.5511V18.5511Z"
                                    fill="#C7C7C7" />
                            </svg>
                            <svg class="social-media-c-footer-2-1" width="30" height="30" viewBox="0 0 30 30"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="15" cy="15" r="15" fill="#C7C7C7" />
                                <g clip-path="url(#clip0)">
                                    <path
                                        d="M17.9027 22.4467C17.916 22.4427 17.9287 22.4373 17.942 22.4327C26.0853 19.1973 23.8327 7 15 7C10.5673 7 7 10.6133 7 15C7 20.5513 12.6227 24.5127 17.9027 22.4467ZM10.5207 20.3727C11.0887 19.418 12.9267 16.7247 16.064 15.7953C16.72 17.468 17.18 19.4193 17.2253 21.632C14.848 22.4313 12.3407 21.8933 10.5207 20.3727V20.3727ZM18.2087 21.2147C18.1213 19.0887 17.6873 17.2033 17.0687 15.57C18.4567 15.3533 20.0633 15.498 21.8853 16.228C21.498 18.402 20.108 20.2293 18.2087 21.2147V21.2147ZM21.99 15.194C19.9833 14.44 18.2147 14.346 16.684 14.638C16.4473 14.1047 16.1987 13.592 15.9353 13.12C18.284 12.182 19.672 11.0387 20.2933 10.4333C21.39 11.7027 22.0413 13.346 21.99 15.194V15.194ZM19.5833 9.72133C19.018 10.2593 17.6867 11.346 15.41 12.2347C14.294 10.4693 13.1007 9.224 12.3447 8.52667C14.7633 7.53067 17.5527 7.956 19.5833 9.72133V9.72133ZM11.3887 9.01533C11.9593 9.51733 13.212 10.7227 14.4207 12.5867C12.7607 13.1213 10.6793 13.514 8.148 13.5693C8.55067 11.64 9.75333 10.0053 11.3887 9.01533V9.01533ZM8.02133 14.5733C10.8547 14.5273 13.148 14.08 14.9607 13.4747C15.2113 13.914 15.4493 14.3927 15.678 14.89C12.5213 15.8953 10.5487 18.4907 9.79333 19.6627C8.57467 18.3027 7.90267 16.528 8.02133 14.5733V14.5733Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect width="16" height="16" fill="white"
                                            transform="translate(7 7)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <nav class="mx-auto flex flex-wrap items-center text-base justify-center">
                            <a class="mr-5 footer-link-footer-2-1">Terms of Service</a>
                            <span class="mr-5">|</span>
                            <a class="mr-5 footer-link-footer-2-1">Privacy Policy</a>
                            <span class="mr-5">|</span>
                            <a class="mr-5 footer-link-footer-2-1">Licenses</a>
                        </nav>
                        <nav class="flex lg:flex-row flex-col items-center text-base justify-center">
                            <p>Copyright © 2021 Comot Dari Google</p>
                        </nav>
                    </div>
                </div>
            </footer>
        </section>
</body>

</html>
