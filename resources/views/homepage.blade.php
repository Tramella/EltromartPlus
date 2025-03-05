@extends('layouts.app')
@section('content')
    <div class="w-full flex flex-col justify-center items-center">
        {{-- Caurosel --}}
        <div class="w-full">
            <div x-data="carousel({
                slides: [{
                        imgSrc: '{{ asset('images/sub_sildeshow.png') }}',
                        imgAlt: 'Vibrant abstract painting with swirling blue and light pink hues on a canvas.',
                        title: 'New Collection for Black Friday',
                        description: 'The architects of the digital world, constantly battling against their mortal enemy – browser compatibility.',
                        button: 'Shop Now',
                        link: '#',
                    },
                    {
                        imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-2.webp',
                        imgAlt: 'Vibrant abstract painting with swirling red, yellow, and pink hues on a canvas.',
                        title: 'Back end developers',
                        description: 'Because not all superheroes wear capes, some wear headphones and stare at terminal screens',
                    },
                    {
                        imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-3.webp',
                        imgAlt: 'Vibrant abstract painting with swirling blue and purple hues on a canvas.',
                        title: 'Full stack developers',
                        description: 'Where &quot;burnout&quot; is just a fancy term for &quot;Tuesday&quot;.'
                    },
                ],
            })" class="relative w-full overflow-hidden">

                <!-- previous button -->
                <button type="button"
                    class="absolute left-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
                    aria-label="previous slide" x-on:click="previous()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                        stroke-width="3" class="size-5 md:size-6 pr-0.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </button>

                <!-- next button -->
                <button type="button"
                    class="absolute right-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
                    aria-label="next slide" x-on:click="next()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                        stroke-width="3" class="size-5 md:size-6 pl-0.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>

                <!-- slides -->
                <!-- Change min-h-[50svh] to your preferred height size -->
                <div class="relative min-h-[70svh] w-full">
                    <template x-for="(slide, index) in slides">
                        <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0"
                            x-transition.opacity.duration.1000ms>

                            <!-- Title and description -->
                            <div
                                class="lg:px-20 lg:py-14 absolute inset-0 z-10 flex flex-col items-start justify-end gap-2 to-transparent px-16 py-12 text-center">
                                {{-- <h3 class="w-full lg:w-[80%] text-balance text-2xl lg:text-3xl font-bold text-white"
                                x-text="slide.title" x-bind:aria-describedby="'slide' + (index + 1) + 'Description'"></h3> --}}
                                {{-- <p class="lg:w-1/2 w-full text-pretty text-sm text-neutral-300" x-text="slide.description"
                                x-bind:id="'slide' + (index + 1) + 'Description'"></p> --}}
                                <a href="slide.link" x-text='slide.button' class="button-caurosel"></a>
                            </div>

                            <img class="absolute w-full h-full inset-0 object-cover text-neutral-600 dark:text-neutral-300"
                                x-bind:src="slide.imgSrc" x-bind:alt="slide.imgAlt" />
                        </div>
                    </template>
                </div>

                <!-- indicators -->
                <div class="absolute rounded-md bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 px-1.5 py-1 md:px-2"
                    role="group" aria-label="slides">
                    <template x-for="(slide, index) in slides">
                        <button class="size-2 cursor-pointer rounded-full transition"
                            x-on:click="currentSlideIndex = index + 1"
                            x-bind:class="[currentSlideIndex === index + 1 ? 'bg-neutral-300' : 'bg-neutral-300/50']"
                            x-bind:aria-label="'slide ' + (index + 1)"></button>
                    </template>
                </div>
            </div>
        </div>

        {{-- Utilities --}}
        <div class="w-4/5 mt-3 mb-5 flex flex-wrap justify-between items-center ulities">
            <div class="flex items-center justify-center">
                <img src="{{ asset('images/FreeShipping.png') }}" alt="freeship" class="ulities_img" />
                <p class="ulities_text">Free Shipping & Returns</p>
            </div>
            <div class="flex items-center item-unilitie">
                <img src="{{ asset('images/Diploma.png') }}" alt="freeship" class="ulities_img" />
                <p class="ulities_text">Lowest Price Guarante</p>
            </div>
            <div class="flex items-center item-unilitie">
                <img src="{{ asset('images/Man Winner.png') }}" alt="freeship" class="ulities_img" />
                <p class="ulities_text">Longest Warranties Offer</p>
            </div>
        </div>

    </div>
    {{-- Flash Sale --}}
    <div class="w-full px-14 mb-5">

        <div class=" flex-col justify-start items-start">
            <div class="title-sales font">FLASH SALES</div>
            <div class="flex justify-center items-center">
                <ul id="autoplay" class="cs-hidden">
                    {{-- 1. --}}
                    @foreach ($saleProducts as $s)
                        <li class="item-a">
                            <div class="mt-5 me-3">

                                <div class="flex flex-col justify-center items-center item-product">
                                    <div class="overplay flex flex-col justify-center items-center">
                                        <a href="{{ route('product.detail', ['id' => $s->id]) }}" class="btn-buy2">View
                                            Details</a>

                                        <a href="#" class="btn-buy1 mt-2">Add to Cart</a>
                                    </div>
                                    <img src="{{ asset('images/productimg_rbg/' . $s->product_img) }}" alt="sp1"
                                        class="img-product" />
                                    <div class="text-start font-medium mt-5">
                                        <p class="text-start name-product">{{ $s->product_name }}</p>
                                        <p class="mt-3 text-sm">
                                            <span class="regular-price">
                                                <s class="reg_price font-normal">${{ $s->regular_price }}</s> to
                                            </span>
                                            <strong class="text-price">${{ $s->sale_price }}</strong>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>

            </div>
        </div>
    </div>

    {{-- Top Categories --}}
    <div class="flex flex-col mt-12 mb-10">
        <div class="text-center">
            <h2 class="title-sales font">TOP CATEGORIES</h2>
        </div>
        <div class="flex justify-end items-end pe-10 mt-3 mb-2">
            <u class="text-base font-light">More </u><img src="{{ asset('images/Right.png') }}" alt="more"
                class="moreicon ms-1" />
        </div>
        <div class="flex justify-center items-center flex-wrap">
            @foreach ($categories as $category)
                <a href="{{ route('product.' . $category->slug) }}"
                    class="w-cate item-cate flex flex-col justify-center items-center me-5 mb-5 mt-3">
                    <img src="{{ asset('images/' . $category->cate_img) }}" alt="cate1" class="img-cate" />


                    <p class="text-xs font-medium  name-product mt-2">{{ $category->cate_name }}</p>
                </a>
            @endforeach


        </div>
    </div>

    {{-- NEW PRODUCTS --}}
    <div class="w-full ps-14 mt-10 mb-8 pe-10">
        <div class="flex-col justify-start items-start">
            <div class="text-lg font-bold">NEW PRODUCTS</div>
            <div class="flex justify-end items-end mb-2">
                <u class="text-base font-light">More </u><img src="{{ asset('images/Right.png') }}" alt="more"
                    class="moreicon ms-1" />
            </div>
            <div class="flex flex-wrap justify-between items-center px-10">
                @foreach ($newProduct as $n)
                    <div class=" me-3">
                        <div class="flex flex-col justify-center items-center item-newproduct">
                            <img src="{{ asset('images/productimg_rbg/' . $n->product_img) }}" alt="sp1"
                                class="img-newproduct" />
                            <div class="text-start font-medium mt-5">
                                <p class="text-start  name-product">{{ $n->product_name }}</p>
                                <p class="mt-3 text-sm text-center"><span class="regular-price">
                                        @if ($n->sale_price == null)
                                            <strong class="text-price">${{ $n->regular_price }}</strong>
                                        @else
                                            <s class="reg_price font-normal">${{ $n->regular_price }}</s> to
                                    </span><strong class="text-price">${{ $n->sale_price }}</strong>
                @endif
                </p>

            </div>
            <div class="flex justify-between items-center mt-5 mb-2">
                <button class="btn-choose-product">Choose Options</button>
                <img src="{{ asset('images/Favorite.png') }}" alt="addwish" class="iconheart" />
            </div>
        </div>
    </div>
    @endforeach


    </div>
    </div>

    </div>

    {{-- Some Quality --}}
    <div class="w-full quality mb-10  flex flex-wrap justify-center items-center pb-5">
        <div class="flex flex-wrap justify-center items-center ">
            <div class="mt-4 me-5 px-5 pt-12 pb-16 flex flex-col justify-center items-center bg-white item-quality">
                <img src="{{ asset('images/StarHalfempty.png') }}" class="img-quality" />
                <h2 class="font-bold mt-5">QUALITY AND SAVING</h2>
                <p class="font-light text-sm mt-5 text-center">Comprehensive quality control and affordable prices</p>
            </div>
            <div class="mt-4 me-5 px-5 pt-12 pb-16 flex flex-col justify-center items-center bg-white item-quality">
                <img src="{{ asset('images/In Transit.png') }}" class="img-quality" />
                <h2 class="font-bold mt-5">FAST SHIPPING</h2>
                <p class="font-light text-sm mt-5 text-center">Fast and convenient door to door delivery</p>
            </div>
            <div class="mt-4 me-5 px-5 pt-12 pb-16 flex flex-col justify-center items-center bg-white item-quality">
                <img src="{{ asset('images/Protect.png') }}" class="img-quality" />
                <h2 class="font-bold mt-5">PAYMENT SECURITY</h2>
                <p class="font-light text-sm mt-5 text-center">More than 10 different secure payment methods</p>
            </div>
            <div class="mt-4  px-5 pt-12 pb-16 flex flex-col justify-center items-center bg-white item-quality">
                <img src="{{ asset('images/Ask_Question.png') }}" class="img-quality" />
                <h2 class="font-bold mt-5">HAVE A QUESTION?</h2>
                <p class="font-light text-sm mt-5 text-center">24/7 Customer Service - We're here and happy to help!</p>
            </div>
        </div>
    </div>
    {{-- Top Mobile Phones --}}
    <div class="w-full ps-14 mt-10 mb-8 pe-10">
        <div class="flex-col justify-start items-start">
            <div class="text-lg font-bold">TOP MOBILE PHONES</div>
            <div class="flex justify-end items-end mb-2">
                <u class="text-base font-light">More </u><img src="{{ asset('images/Right.png') }}" alt="more"
                    class="moreicon ms-1" />
            </div>
            <div class="flex flex-wrap justify-between items-center px-10">
                @foreach ($topMobile as $t)
                    <div class="me-3">
                        <div class="flex flex-col justify-center items-center item-newproduct">
                            <img src="{{ asset('images/productimg_rbg/' . $t->product_img) }}" alt="sp1"
                                class="img-newproduct" />
                            <div class="text-start font-medium mt-5">
                                <p class="text-start  name-product">{{ $t->product_name }}</p>
                                <p class="mt-3 text-sm"><span class="regular-price""><s
                                            class="reg_price font-normal">${{ $t->regular_price }}</s> to </span><strong
                                        class="text-price">${{ $t->sale_price }}</strong></p>
                            </div>
                            <div class="flex justify-between items-center mt-5 mb-2">
                                <button class="btn-choose-product">Choose Options</button>
                                <img src="{{ asset('images/Favorite.png') }}" alt="addwish" class="iconheart" />
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>

    </div>

    {{-- Top Laptops --}}
    <div class="w-full ps-14 mt-10 mb-10 pe-10">
        <div class="flex-col justify-start items-start">
            <div class="text-lg font-bold">TOP LAPTOPS</div>
            <div class="flex justify-end items-end mb-2">
                <u class="text-base font-light">More </u><img src="{{ asset('images/Right.png') }}" alt="more"
                    class="moreicon ms-1" />
            </div>
            <div class="flex flex-wrap justify-between items-center px-10">
                @foreach ($topLaptop as $l)
                    <div class="me-3">
                        <div class="flex flex-col justify-center items-center item-newproduct">
                            <img src="{{ asset('images/productimg_rbg/' . $l->product_img) }}" alt="sp1"
                                class="img-newproduct" />
                            <div class="text-start font-medium mt-5">
                                <p class="text-start  name-product">{{ $l->product_name }}</p>
                                <p class="mt-3 text-sm"><span class="regular-price""><s
                                            class="reg_price font-normal">${{ $l->regular_price }}</s> to </span><strong
                                        class="text-price">${{ $l->sale_price }}</strong></p>
                            </div>
                            <div class="flex justify-between items-center mt-5 mb-2">
                                <button class="btn-choose-product">Choose Options</button>
                                <img src="{{ asset('images/Favorite.png') }}" alt="addwish" class="iconheart" />
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>


    </div>
    {{-- FEATURED PRDUCTS --}}
    <div class="w-full flex flex-col mt-10 mb-10">
        <div class="text-center">
            <h2 class="font-bold text-lg">FEATURED PRODUCTS</h2>
        </div>
        <div class="flex justify-end items-end pe-10 mt-3 mb-2">
            <u class="text-base font-light">More </u><img src="{{ asset('images/Right.png') }}" alt="more"
                class="moreicon ms-1" />
        </div>
        <div class="flex flex-wrap justify-between items-center px-10">
            <div class="me-3">
                <div class="flex flex-col justify-center items-center item-newproduct">
                    <img src="{{ asset('images/laptop1.png') }}" alt="sp1" class="img-newproduct" />
                    <div class="text-start font-medium mt-5">
                        <p class="text-start  name-product">Computer Mac and Assoccities</p>
                        <p class="mt-3 text-sm"><span class="regular-price""><s class="reg_price font-normal">$199.99</s>
                                to </span><strong class="text-price">$179.99</strong></p>
                    </div>
                    <div class="flex justify-between items-center mt-5 mb-2">
                        <button class="btn-choose-product">Choose Options</button>
                        <img src="{{ asset('images/Favorite.png') }}" alt="addwish" class="iconheart" />
                    </div>
                </div>
            </div>
            <div class="me-3">
                <div class="flex flex-col justify-center items-center item-newproduct">
                    <img src="{{ asset('images/laptop1.png') }}" alt="sp1" class="img-newproduct" />
                    <div class="text-start font-medium mt-5">
                        <p class="text-start  name-product">Computer Mac and Assoccities</p>
                        <p class="mt-3 text-sm"><span class="regular-price""><s class="reg_price font-normal">$199.99</s>
                                to </span><strong class="text-price">$179.99</strong></p>
                    </div>
                    <div class="flex justify-between items-center mt-5 mb-2">
                        <button class="btn-choose-product">Choose Options</button>
                        <img src="{{ asset('images/Favorite.png') }}" alt="addwish" class="iconheart" />
                    </div>
                </div>
            </div>
            <div class="me-3">
                <div class="flex flex-col justify-center items-center item-newproduct">
                    <img src="{{ asset('images/laptop1.png') }}" alt="sp1" class="img-newproduct" />
                    <div class="text-start font-medium mt-5">
                        <p class="text-start  name-product">Computer Mac and Assoccities</p>
                        <p class="mt-3 text-sm"><span class="regular-price""><s class="reg_price font-normal">$199.99</s>
                                to </span><strong class="text-price">$179.99</strong></p>
                    </div>
                    <div class="flex justify-between items-center mt-5 mb-2">
                        <button class="btn-choose-product">Choose Options</button>
                        <img src="{{ asset('images/Favorite.png') }}" alt="addwish" class="iconheart" />
                    </div>
                </div>
            </div>
            <div class="me-3">
                <div class="flex flex-col justify-center items-center item-newproduct">
                    <img src="{{ asset('images/laptop1.png') }}" alt="sp1" class="img-newproduct" />
                    <div class="text-start font-medium mt-5">
                        <p class="text-start  name-product">Computer Mac and Assoccities</p>
                        <p class="mt-3 text-sm"><span class="regular-price""><s class="reg_price font-normal">$199.99</s>
                                to </span><strong class="text-price">$179.99</strong></p>
                    </div>
                    <div class="flex justify-between items-center mt-5 mb-2">
                        <button class="btn-choose-product">Choose Options</button>
                        <img src="{{ asset('images/Favorite.png') }}" alt="addwish" class="iconheart" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- TOP BRANDS --}}
    <div class="w-full flex flex-col mt-10 mb-10 justify-center">
        <div class="text-center mt-5">
            <h2 class="font-bold text-lg">TOP BRANDS</h2>
        </div>
        <div class="flex justify-end items-end pe-10 mt-1 mb-2">
            <u class="text-base font-light">More </u><img src="{{ asset('images/Right.png') }}" alt="more"
                class="moreicon ms-1" />
        </div>
        <div class="w-11/12 flex justify-between items-center ps-10">
            @foreach ($brands as $brand)
                <div class="w-cate item-cate flex flex-col justify-center items-center me-5 mb-5 mt-1">
                    <img src="{{ asset('images/' . $brand->brand_img) }}" alt="logobrand1" class="logo_brand" />
                </div>
            @endforeach


        </div>
    </div>
    {{-- SCRIPTS --}}
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('carousel', (carouselData = {
                slides: [],
            }, ) => ({
                slides: carouselData.slides,
                currentSlideIndex: 1,
                previous() {
                    if (this.currentSlideIndex > 1) {
                        this.currentSlideIndex = this.currentSlideIndex - 1
                    } else {
                        // If it's the first slide, go to the last slide
                        this.currentSlideIndex = this.slides.length
                    }
                },
                next() {
                    if (this.currentSlideIndex < this.slides.length) {
                        this.currentSlideIndex = this.currentSlideIndex + 1
                    } else {
                        // If it's the last slide, go to the first slide
                        this.currentSlideIndex = 1
                    }
                },
            }));
        });
        $(document).ready(function() {
            var autoplaySlider = $('#autoplay').lightSlider({
                auto: true,
                loop: true,
                pauseOnHover: true,
                item: 4,
                responsive: [{
                        breakpoint: 1500, // Nếu màn hình nhỏ hơn 768px
                        settings: {
                            item: 3 // Chỉ hiển thị 2 phần tử
                        }
                    }, {
                        breakpoint: 1100, // Nếu màn hình nhỏ hơn 768px
                        settings: {
                            item: 2 // Chỉ hiển thị 2 phần tử
                        }
                    },
                    {
                        breakpoint: 755, // Nếu màn hình nhỏ hơn 480px
                        settings: {
                            item: 1 // Chỉ hiển thị 1 phần tử
                        }
                    }
                ],
                speed: 1000, // Thời gian chuyển slide (1 giây)
                pause: 3000,
                controls: true,
                pager: false,
                onBeforeSlide: function(el) {
                    $('#current').text(el.getCurrentSlideCount());
                }
            });
            $('#total').text(autoplaySlider.getTotalSlideCount());

            // Chỉnh sửa màu sắc khi hover trên các nút prev và next
            $('.lSPrev, .lSNext').hover(
                function() {
                    $(this).css({
                        'background-color': '#9b9ea2', // Màu nền khi hover
                        'border-radius': "20px",
                        'padding': '10px',
                        'color': 'white' // Màu chữ khi hover
                    });
                },
                function() {
                    $(this).css({

                        'color': 'white' // Màu chữ mặc định
                    });
                }
            );
        });
    </script>


    @stack('scripts')
@endsection
