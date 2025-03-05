<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('images/Logo_small.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Lexend:wght@100..900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/user.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/productdetail.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/blog.css') }}?v={{ time() }}" rel="stylesheet" />
    <link href="{{ asset('css/wishlist.css') }}?v={{ time() }}" rel="stylesheet" />
    <link href="{{ asset('css/cart.css') }}?v={{ time() }}" rel="stylesheet" />
    <link href="{{ asset('css/pay.css') }}?v={{ time() }}" rel="stylesheet" />

    <!-- LightSlider CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightslider@1.1.6/dist/css/lightslider.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- jQuery (required) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- LightSlider JS -->
    <script src="https://cdn.jsdelivr.net/npm/lightslider@1.1.6/dist/js/lightslider.min.js"></script>

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"> --}}
    {{-- </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans antialiased">

    <div class="min-h-screen bg-white-100 dark:bg-gray-900 ">
        {{-- @include('layouts.nav') --}}
        {{-- NAVBAR --}}
        <nav class="w-full nav-header navbar-container">
            <div class="top-nav flex justify-center space-x-12 items-center py-4">
                <div class="col-3 space-x-5">
                    <a href="/">
                        <img src="{{ asset('images/eltromart+.png') }}" alt="logo" class="logo_project" />
                    </a>
                </div>
                <form action="{{ route('product.search') }}" class="col-4 space-x-3 font-bold flex container-search"
                    method="get">
                    <input type="text" name="query" class="input-search-header"
                        vvalue="{{ old('query', request('query')) }}" />
                    <div class="logoSearch flex justify-center items-center">
                        <img src="{{ asset('images/Search.png') }}" alt="logoSearch" class="imgSearch" />
                    </div>
                </form>
                <div class="col-5 flex justify-center items-center space-x-12">
                    <div class="font-medium text-contact">
                        <p>Available 24/7 at</p>
                        <p>(+84) 456 787</p>
                    </div>
                    <div class="flex justify-end items-center space-x-6">
                        <a href="{{ route('wishlist.index') }}" class="icon_header flex justify-between items-center">
                            <img src="{{ asset('images/Heart.png') }}" class="image-header" />
                            <p class="font-semibold">Wish List</p>
                        </a>

                        {{-- @auth
                            <div>
                                <div class="icon_header flex justify-between items-center">
                                    <img src="{{ asset('images/Logoutheader.png') }}" class="icon_header_signin"
                                        width="20" />
                                    <form method="post" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="font-semibold">Logout</button>
                                    </form>
                                </div>
                            </div>
                        @endauth --}}
                        @auth
                            @if (Auth::user()->utype === 'ADM')
                                <a href="{{ route('admin.index') }}" class="icon_header flex justify-between items-center">
                                @else
                                    <a href="{{ route('user.index') }}"
                                        class="icon_header flex justify-between items-center">
                            @endif

                            {{-- Hiển thị Avatar nếu có, nếu không thì dùng ảnh mặc định --}}
                            <img src="{{ Auth::user()->avatar ? asset('images/' . Auth::user()->avatar) : asset('images/default-avatar.png') }}"
                                class="icon_header_signin rounded-full" width="40" />

                            {{-- Hiển thị Username --}}
                            <span class="font-semibold">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
                            </a>
                        @endauth

                        @guest
                            <div class="icon_header flex justify-between items-center">
                                <img src="{{ asset('images/MaleUser.png') }}"class="icon_header_signin" />
                                <a href="{{ route('login') }}" class="font-semibold">Sign In</a>
                            </div>
                        @endguest

                        <a href="{{ route('cart.index') }}" class="icon_header flex justify-between items-center">
                            <img src="{{ asset('images/ShoppingCart.png') }}"class="image-header" />
                            <p class="font-semibold">Cart</p>
                            <span id="cart-count"
                                class="absolute text-white rounded-full flex justify-center items-center total-item-cart">
                                {{ session('cart_total', 0) }}
                            </span>
                        </a>
                    </div>

                </div>
            </div>
            <div class="bottom-nav link-header flex items-end justify-between bottom-0">
                <div class="link-header flex items-end justify-center space-x-6 ms-10 bottom-0">
                    <a href="{{ route('product.index') }}" class="link-header-item">
                        <p class="link-header-text font-normal all-iconproduct"><i class="fa-solid fa-bars"></i></p>
                    </a>
                    <a href="{{ route('product.mobile') }}" class="link-header-item pb-1">
                        <img src="{{ asset('images/mobilephone.png') }}" alt="logo" class="link-header-img" />
                        <p class="link-header-text font-normal">Mobile Phones</p>
                    </a>
                    <a href="{{ route('product.laptop') }}" class="link-header-item pb-1">
                        <img src="{{ asset('images/Laptop.png') }}" alt="logo" class="link-header-img" />
                        <p class="link-header-text font-normal">Laptops</p>
                    </a>

                    <div id="dropdownContainer1" class="relative inline-block bottom-0">
                        <!-- Dropdown Button -->
                        <div id="dropdownButton1"
                            class="link-header-item flex items-center gap-0 px-5 pt-2 pb-1 cursor-pointer">
                            <img src="{{ asset('images/Accessories.png') }}" alt="logo"
                                class="link-header-img" />
                            <p class="link-header-text font-normal">Accessories</p>
                        </div>

                        <!-- Dropdown Menu -->
                        <div id="dropdownMenu1"
                            class="absolute left-0 top-8 w-accessories bg-white shadow-lg opacity-0 invisible transition-all duration-300 cursor-pointer">
                            <div class="w-full flex justify-start items-start py-4 ps-2">
                                <div class="w-full flex flex-col pe-2 justify-start items-start">
                                    {{-- Mobile --}}
                                    <p class="title-catedropdown">Mobile Accessories</p>
                                    <div class="w-full flex flex-wrap justify-start items-center mb-3">
                                        <div class="cate-dropdown flex flex-col justify-start items-center">
                                            <div class="border-cate flex justify-center items-center">
                                                <img src="{{ asset('images/BackupCharger1.png') }}" alt="logo"
                                                    class="cate-header-img" />
                                            </div>
                                            <p class="text-cate-header">Backup Charger</p>
                                        </div>
                                        <a href="{{ route('product.mobileAcc.case') }}"
                                            class="cate-dropdown flex flex-col justify-start items-center">
                                            <div class="border-cate flex justify-center items-center">
                                                <img src="{{ asset('images/cases1.jpg') }}" alt="logo"
                                                    class="cate-header-img" />
                                            </div>
                                            <p class="text-cate-header">Cases</p>
                                        </a>
                                        <a href="{{ route('product.mobileAcc.charger') }}"
                                            class="cate-dropdown flex flex-col justify-start items-center">
                                            <div class="border-cate flex justify-center items-center">
                                                <img src="{{ asset('images/ChargerCable1.jpg') }}" alt="logo"
                                                    class="cate-header-img" />
                                            </div>
                                            <p class="text-cate-header">Charger, charging cable</p>
                                        </a>
                                        <a href="{{ route('product.mobileAcc.apdapter') }}"
                                            class="cate-dropdown flex flex-col justify-start items-center">
                                            <div class="border-cate flex justify-center items-center">
                                                <img src="{{ asset('images/adapter-sac-2-cong-usb-type-c-iq3-20w-anker-a2348-den-1-638622776812389109-750x500.jpg') }}"
                                                    alt="logo" class="cate-header-img" />
                                            </div>
                                            <p class="text-cate-header">Adaper</p>
                                        </a>
                                    </div>
                                    {{-- Brand --}}
                                    <p class="title-catedropdown">Top Brands</p>
                                    <div class="w-full flex flex-wrap justify-start items-center mb-3">
                                        @foreach ($brands as $brand)
                                            <div class="cate-dropdown2 flex flex-col justify-center items-center me-2">
                                                <div class=" flex justify-center items-center">
                                                    <img src="{{ asset('images/' . $brand->brand_img) }}"
                                                        alt="logo" class="cate-header-img1" />
                                                </div>
                                                {{-- <p class="text-cate-header">{{ $brand->brand_name }}</p> --}}
                                            </div>
                                        @endforeach

                                    </div>

                                    {{-- Storage --}}
                                    <p class="title-catedropdown">Storage Devices</p>
                                    <div class="w-full flex flex-wrap justify-start items-center mb-3">
                                        <div class="cate-dropdown flex flex-col justify-center items-center">
                                            <div class="border-cate flex justify-center items-center">
                                                <img src="{{ asset('images/pc.jpg') }}" alt="logo"
                                                    class="cate-header-img" />
                                            </div>
                                            <p class="text-cate-header">Desktop Computers</p>
                                        </div>
                                        <div class="cate-dropdown flex flex-col justify-center items-center">
                                            <div class="border-cate flex justify-center items-center">
                                                <img src="{{ asset('images/pc.jpg') }}" alt="logo"
                                                    class="cate-header-img" />
                                            </div>
                                            <p class="text-cate-header">Desktop Computers</p>
                                        </div>
                                        <div class="cate-dropdown flex flex-col justify-center items-center">
                                            <div class="border-cate flex justify-center items-center">
                                                <img src="{{ asset('images/pc.jpg') }}" alt="logo"
                                                    class="cate-header-img" />
                                            </div>
                                            <p class="text-cate-header">Desktop Computers</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="w-full flex flex-col ps-3 justify-start items-start">
                                    <p class="title-catedropdown">Audio Equipment</p>
                                    <div class="w-full flex flex-wrap justify-start items-start mb-3">

                                        <div class="cate-dropdown flex flex-col justify-start items-center">
                                            <div class="border-cate flex justify-center items-center">
                                                <img src="{{ asset('images/bluetoothheadphone_processed.jpg') }}"
                                                    alt="logo" class="cate-header-img" />
                                            </div>
                                            <p class="text-cate-header">Bluetooth headphones</p>
                                        </div>
                                        <div class="cate-dropdown flex flex-col justify-start items-center">
                                            <div class="border-cate flex justify-center items-center">
                                                <img src="{{ asset('images/wired-headphones_processed.jpg') }}"
                                                    alt="logo" class="cate-header-img" />
                                            </div>
                                            <p class="text-cate-header">Wired headphones</p>
                                        </div>
                                        <div class="cate-dropdown flex flex-col justify-start items-center">
                                            <div class="border-cate flex justify-center items-center">
                                                <img src="{{ asset('images/over-ear_processed.jpg') }}"
                                                    alt="logo" class="cate-header-img" />
                                            </div>
                                            <p class="text-cate-header">Over-ear headphones</p>
                                        </div>
                                        <div class="cate-dropdown flex flex-col justify-start items-center">
                                            <div class="border-cate flex justify-center items-center">
                                                <img src="{{ asset('images/micros_processed.jpg') }}" alt="logo"
                                                    class="cate-header-img" />
                                            </div>
                                            <p class="text-cate-header">Micros</p>
                                        </div>
                                        <div class="cate-dropdown flex flex-col justify-start items-center">
                                            <div class="border-cate flex justify-center items-center">
                                                <img src="{{ asset('images/Speaker_processed.jpg') }}" alt="logo"
                                                    class="cate-header-img" />
                                            </div>
                                            <p class="text-cate-header">Speakers</p>
                                        </div>

                                    </div>

                                    {{-- Laptop --}}
                                    <p class="title-catedropdown">Accessories For Laptop</p>
                                    <div class="w-full flex flex-wrap justify-start items-center mb-3">
                                        <div class="cate-dropdown flex flex-col justify-start items-center">
                                            <div class="border-cate flex justify-center items-center">
                                                <img src="{{ asset('images/mouses_processed.jpg') }}" alt="logo"
                                                    class="cate-header-img" />
                                            </div>
                                            <p class="text-cate-header">Mouses</p>
                                        </div>
                                        <div class="cate-dropdown flex flex-col justify-start items-center">
                                            <div class="border-cate flex justify-center items-center">
                                                <div class="img-w"><img
                                                        src="{{ asset('images/Keyborads_processed.jpg') }}"
                                                        alt="logo" class="cate-header-img3" />
                                                </div>
                                            </div>
                                            <p class="text-cate-header">Keyboards</p>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <a href="{{ route('product.tablet') }}" class="link-header-item pb-1">
                        <img src="{{ asset('images/iPad.png') }}" alt="logo" class="link-header-img" />
                        <p class="link-header-text font-normal">Tablets</p>
                    </a>


                    <div id="dropdownContainer" class="relative inline-block bottom-0">
                        <!-- Dropdown Button -->
                        <div id="dropdownButton"
                            class="link-header-item flex items-center gap-0 px-5 pt-2 pb-1 cursor-pointer">
                            <img src="{{ asset('images/PCs.png') }}" alt="logo" class="link-header-img" />
                            <p class="link-header-text font-normal">PCs</p>
                        </div>

                        <!-- Dropdown Menu -->
                        <div id="dropdownMenu"
                            class="absolute z-20 left-0 top-8 w-48 bg-white shadow-lg opacity-0 invisible transition-all duration-300 cursor-pointer">
                            <div class="w-full flex justify-center items-center py-3">
                                <a href="{{ route('product.pc') }}"
                                    class="cate-dropdown flex flex-col justify-center items-center">
                                    <div class="border-cate flex justify-center items-center">
                                        <img src="{{ asset('images/pc_processed.jpg') }}" alt="logo"
                                            class="cate-header-img" />
                                    </div>
                                    <p class="text-cate-header">Desktop Computers</p>
                                </a>
                                <a href="{{ route('product.monitor') }}"
                                    class="cate-dropdown flex flex-col justify-center items-center ms-5">
                                    <div class="border-cate flex justify-center items-center">
                                        <img src="{{ asset('images/monitor_processed.jpg') }}" alt="logo"
                                            class="cate-header-img" />
                                    </div>
                                    <p class="text-cate-header">Computer Monitors</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="link-header-item pb-1">
                        <img src="{{ asset('images/Services.png') }}" alt="logo" class="link-header-img" />
                        <p class="link-header-text font-normal">Services</p>
                    </div>
                    <a href="{{ route('blog.index') }}" class="link-header-item pb-1">
                        <img src="{{ asset('images/Info.png') }}" alt="logo" class="link-header-img" />
                        <p class="link-header-text font-normal">Blogs</p>
                    </a>
                </div>

                <div class="link-header-item me-10 pb-1">
                    <img src="{{ asset('images/Online Support.png') }}" alt="logo" class="link-header-img" />
                    <p class="link-header-helpcenter font-thin">Help Center</p>
                </div>
            </div>

        </nav>
        <div id="loader">
            <div class="spinner"></div>
        </div>
        <main id="content" class="mt-0 w-full mx-auto">
            @yield('content')


        </main>

        <footer>
            <div class="flex flex-col justify-center items-center p-5 w-full">
                <div class="flex flex-col justify-center items-center mt-4">
                    <h2 class="font-bold text-xl">SUBSCRIBE TO OUR NEWSLETTER</h2>
                    <p class="font-light text-xs">Get the latest updates on new products and upcoming sales</p>
                </div>
                <div class="mt-10 mb-10">
                    <input type="text" placeholder="Enter your email address" class="contact-footer" />
                    <button class="contact-submit font-semibold ms-3" type="submit">SUBMIT</button>
                </div>
                <div class="flex flex-wrap justify-between w-11/12 row px-5">
                    {{-- Main Footer --}}
                    <div class="flex flex-col justify-start items-start col-3 pt-6">
                        <h2 class="text-md font-bold">SHOP</h2>
                        <p class="mt-4 font-light text-sm">Mobile phones</p>
                        <p class="mt-3 font-light text-sm">Laptops</p>
                        <p class="mt-3 font-light text-sm">PCs</p>
                        <p class="mt-3 font-light text-sm">Accessories</p>
                    </div>
                    <div class="flex flex-col justify-start items-start col-3 pt-6">
                        <h2 class="text-md font-bold">FURTHER INFO.</h2>
                        <p class="mt-4 font-light text-sm">About</p>
                        <p class="mt-3 font-light text-sm">Blogs</p>
                    </div>
                    <div class="flex flex-col justify-start items-start col-3 pt-6">
                        <h2 class="text-md font-bold">CUSTOMER SERVICE</h2>
                        <p class="mt-4 font-light text-sm">Orders and returns</p>
                        <p class="mt-3 font-light text-sm">Contact us</p>
                        <p class="mt-3 font-light text-sm"><u>Theme FAQs</u></p>
                        <p class="mt-3 font-light text-sm">Advanced Search</p>

                    </div>
                    <div class="flex flex-col justify-start items-start col-3">
                        <div>
                            <img src="{{ asset('images/eltromart+_bg_grey.png') }}" class="img_footer" />
                        </div>
                        <div class="flex flex-wrap mt-5 ps-4">
                            <img src="{{ asset('images/Address.png') }}" class="img_map me-3" />
                            <span class="font-light text-sm">685 Market Street<br />San Francisco, CA 94105, US</span>
                        </div>
                        <div class="flex flex-wrap mt-5 ps-4">
                            <img src="{{ asset('images/Phone.png') }}" class="img_phone me-4" />
                            <span class="font-light text-sm">Call us at <u>(415) 555-5555</u></span>
                        </div>
                        <div class="flex flex-wrap mt-7 ps-4">
                            <img src="{{ asset('images/Mail.png') }}" class="img_phone me-4" />
                            <span class="font-light text-sm">eltromartplus@gmail.com</u></span>
                        </div>
                        <div class="flex flex-wrap mt-9 ps-3 mb-4">
                            <img src="{{ asset('images/Facebook Circled.png') }}" class="img_social" />
                            <img src="{{ asset('images/Instagram Circle.png') }}" class="img_social" />
                            <img src="{{ asset('images/Pinterest.png') }}" class="img_social" />
                            <img src="{{ asset('images/TwitterX.png') }}" class="img_social" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer w-full">
                <div class="w-full mx-auto flex flex-wrap justify-between items-center pt-3">
                    <!-- Text nằm bên trái -->
                    <div class="text-start ps-10">
                        <p class="font-light text-sm">© 2024, eltromartplus about technological equipment. All rights
                            reserved.
                            Website by EllaTran
                        </p>
                    </div>

                    <!-- Hình ảnh nằm bên phải -->
                    <div class="text-end">
                        <img src="{{ asset('images/payments.png') }}" class="img_payment" />
                    </div>
                </div>
            </div>

        </footer>
    </div>
</body>

</html>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdownButton = document.getElementById("dropdownButton");
        const dropdownMenu = document.getElementById("dropdownMenu");
        const dropdownContainer = document.getElementById("dropdownContainer");

        function showDropdown() {
            dropdownMenu.classList.remove("opacity-0", "invisible");
            dropdownMenu.classList.add("opacity-100", "visible");
            dropdownButton.classList.add("dropdown-header");
        }

        function hideDropdown(event) {
            // Kiểm tra nếu chuột vẫn trong container thì không ẩn dropdown
            if (dropdownContainer.contains(event.relatedTarget)) {
                return;
            }
            dropdownMenu.classList.add("opacity-0", "invisible");
            dropdownMenu.classList.remove("opacity-100", "visible");
            dropdownButton.classList.remove("dropdown-header");
        }

        // Khi chuột vào container (bao gồm cả button & menu) => Hiện dropdown
        dropdownContainer.addEventListener("mouseenter", showDropdown);

        // Khi chuột rời khỏi container => Ẩn dropdown
        dropdownContainer.addEventListener("mouseleave", hideDropdown);
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdownButton1 = document.getElementById("dropdownButton1");
        const dropdownMenu1 = document.getElementById("dropdownMenu1");
        const dropdownContainer1 = document.getElementById("dropdownContainer1");

        function showDropdown() {
            dropdownMenu1.classList.remove("opacity-0", "invisible");
            dropdownMenu1.classList.add("opacity-100", "visible");
            dropdownButton1.classList.add("dropdown-header");
        }

        function hideDropdown(event) {
            // Kiểm tra nếu chuột vẫn trong container thì không ẩn dropdown
            if (dropdownContainer1.contains(event.relatedTarget)) {
                return;
            }
            dropdownMenu1.classList.add("opacity-0", "invisible");
            dropdownMenu1.classList.remove("opacity-100", "visible");
            dropdownButton1.classList.remove("dropdown-header");
        }

        // Khi chuột vào container (bao gồm cả button & menu) => Hiện dropdown
        dropdownContainer1.addEventListener("mouseenter", showDropdown);

        // Khi chuột rời khỏi container => Ẩn dropdown
        dropdownContainer1.addEventListener("mouseleave", hideDropdown);
    });
</script>
<script>
    window.addEventListener("load", function() {
        setTimeout(() => {
            document.getElementById("loader").classList.add("fade-out");
            document.getElementById("content").style.opacity = "1";

            setTimeout(() => {
                document.getElementById("loader").style.display = "none";
            }, 400); // Đợi hiệu ứng fade-out hoàn tất
        }, 200); // Giữ loader trong 0.3s để tránh giật
    });
</script>
