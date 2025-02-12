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
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/user.css') }}" rel="stylesheet" />
    <!-- LightSlider CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightslider@1.1.6/dist/css/lightslider.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- jQuery (required) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- LightSlider JS -->
    <script src="https://cdn.jsdelivr.net/npm/lightslider@1.1.6/dist/js/lightslider.min.js"></script>


    @vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-white-100 dark:bg-gray-900 ">
        {{-- @include('layouts.nav') --}}
        {{-- NAVBAR --}}
        <nav class="w-full nav-header navbar-container">
            <div class="flex justify-center space-x-12 items-center py-4">
                <div class="col-3 space-x-5">
                    <a href="/">
                        <img src="{{ asset('images/eltromart+.png') }}" alt="logo" class="logo_project" />
                    </a>
                </div>
                <div class="col-4 space-x-3 font-bold flex container-search">
                    <input type="text" name="query" class="input-search-header" />
                    <div class="logoSearch flex justify-center items-center">
                        <img src="{{ asset('images/Search.png') }}" alt="logoSearch" class="imgSearch" />
                    </div>
                </div>
                <div class="col-5 flex justify-center items-center space-x-12">
                    <div class="font-medium text-contact">
                        <p>Available 24/7 at</p>
                        <p>(+84) 456 787</p>
                    </div>
                    <div class="flex justify-end items-center space-x-6">
                        <div class="icon_header flex justify-between items-center">
                            <img src="{{ asset('images/Heart.png') }}" class="image-header" />
                            <p class="font-semibold">Wish List</p>
                        </div>

                        @auth
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
                        @endauth
                        @guest
                            <div class="icon_header flex justify-between items-center">
                                <img src="{{ asset('images/MaleUser.png') }}"class="icon_header_signin" />
                                <a href="{{ route('login') }}" class="font-semibold">Sign In</a>
                            </div>
                        @endguest

                        <div class="icon_header flex justify-between items-center">
                            <img src="{{ asset('images/ShoppingCart.png') }}"class="image-header" />
                            <p class="font-semibold">Cart</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="link-header flex items-center justify-between">
                <div class="link-header flex items-center justify-center space-x-6 ms-10">
                    <div class="link-header-item">
                        <img src="{{ asset('images/mobilephone.png') }}" alt="logo" class="link-header-img" />
                        <p class="link-header-text font-normal">Mobile Phones</p>
                    </div>
                    <div class="link-header-item">
                        <img src="{{ asset('images/Laptop.png') }}" alt="logo" class="link-header-img" />
                        <p class="link-header-text font-normal">Laptops</p>
                    </div>
                    <div class="link-header-item">
                        <img src="{{ asset('images/Accessories.png') }}" alt="logo" class="link-header-img" />
                        <p class="link-header-text font-normal">Accessories</p>
                    </div>
                    <div class="link-header-item">
                        <img src="{{ asset('images/iPad.png') }}" alt="logo" class="link-header-img" />
                        <p class="link-header-text font-normal">Tablets</p>
                    </div>
                    <div class="link-header-item">
                        <img src="{{ asset('images/PCs.png') }}" alt="logo" class="link-header-img" />
                        <p class="link-header-text font-normal">PCs</p>
                    </div>
                    <div class="link-header-item">
                        <img src="{{ asset('images/Services.png') }}" alt="logo" class="link-header-img" />
                        <p class="link-header-text font-normal">Services</p>
                    </div>
                    <div class="link-header-item">
                        <img src="{{ asset('images/Info.png') }}" alt="logo" class="link-header-img" />
                        <p class="link-header-text font-normal">Blogs</p>
                    </div>
                </div>

                <div class="link-header-item me-10">
                    <img src="{{ asset('images/Online Support.png') }}" alt="logo" class="link-header-img" />
                    <p class="link-header-helpcenter font-thin">Help Center</p>
                </div>
            </div>

        </nav>
        <main class="mt-0 w-full mx-auto">
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
