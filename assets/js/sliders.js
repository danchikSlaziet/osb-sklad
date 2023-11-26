if ($(".swiper").length > 0) {
    let js = document.createElement('script');
    js.src = "https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.4.1/swiper-bundle.min.js";
    document.getElementsByTagName('head')[0].appendChild(js);
    js.onload = function () {

        let optionsSwiperCatalog = {
            speed: 500,
            loop: true,
            pagination: {
                el: '.catalog__swiper .swiper-pagination-light',
            },

            navigation: {
                nextEl: '.catalog__swiper .swiper-button-next-dark',
                prevEl: '.catalog__swiper .swiper-button-prev-dark',
            },

            lazy: true,
        };

        if ($(".catalog__swiper .swiper-slide").length < 2) {
            $('.catalog__swiper .swiper-button-inner').hide()
            $('.catalog__swiper .swiper-pagination-light').hide()
            optionsSwiperCatalog.loop = false
            optionsSwiperCatalog.autoplay = false
        }

        const SwiperCatalog = new Swiper('.catalog__swiper', optionsSwiperCatalog);





        let optionsSwiperProduct = {
            speed: 500,
            loop: true,
            slidesPerView: 2,
            breakpoints: {

                991: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 3,
                },
                1400: {
                    slidesPerView: 4,
                },
            },
            navigation: {
                nextEl: '.product-slider .swiper-button-next-dark',
                prevEl: '.product-slider .swiper-button-prev-dark',
            },
        };

        if ($("#product-slider .swiper .swiper-slide").length < 4) {
            optionsSwiperProduct.loop = false;
            optionsSwiperProduct.autoplay = false;
            $('.swiper-button-product').hide();
        }

        const SwiperProduct = new Swiper('.product-swiper', optionsSwiperProduct);

        const SwiperReview = new Swiper('.swiper-review', {
            speed: 500,
            loop: true,
            spaceBetween: 20,
            navigation: {
                nextEl: '#swiper-review .swiper-button-next-dark',
                prevEl: '#swiper-review .swiper-button-prev-dark',
            },


        });

        const SwiperBenefits = new Swiper('.delivery-benefits__swiper', {
            speed: 500,
            slidesPerView: 1,
            spaceBetween: 20,
            breakpoints: {
                767: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },

                991: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },

            },

            navigation: {
                nextEl: '.delivery-benefits .swiper-button-next-dark',
                prevEl: '.delivery-benefits .swiper-button-prev-dark',
            },

        });

        const SwiperMainReviews = new Swiper('.main-reviews__swiper', {
            speed: 500,
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            breakpoints: {
                767: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },

                991: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },

            },

            navigation: {
                nextEl: '.main-reviews .swiper-button-next-dark',
                prevEl: '.main-reviews .swiper-button-prev-dark',
            },

        });

        /* Which media query */
        var swiper = Swiper;
        var init = false;
        let mobile = window.matchMedia('(min-width: 0px) and (max-width: 768px)');
        let tablet = window.matchMedia('(min-width: 769px) and (max-width: 1024px)');
        let desktop = window.matchMedia('(min-width: 1025px)');

        if (mobile.matches) {
            if (!init) {
                init = true;
                IndexBenefits = new Swiper('.index-benefits__swiper', {
                    speed: 500,
                    slidesPerView: 1,
                    spaceBetween: 20,
                    breakpoints: {
                        767: {
                            slidesPerView: 2,
                            spaceBetween: 30,
                        },

                        991: {
                            slidesPerView: 3,
                            slidesPerGroup: 3,
                            spaceBetween: 20,
                        },

                    },
                    navigation: {
                        nextEl: '.index-benefits .swiper-button-next-dark',
                        prevEl: '.index-benefits .swiper-button-prev-dark',
                    },

                });


                IndexCatalog = new Swiper('.index-catalog__swiper', {
                    speed: 500,
                    slidesPerView: 1,
                    spaceBetween: 20,
                    breakpoints: {
                        767: {
                            slidesPerView: 2,
                            spaceBetween: 30,
                        },

                        991: {
                            slidesPerView: 3,
                            slidesPerGroup: 3,
                            spaceBetween: 20,
                        },

                    },
                    navigation: {
                        nextEl: '.index-catalog .swiper-button-next-dark',
                        prevEl: '.index-catalog .swiper-button-prev-dark',
                    },

                });
            }

        }

        else if (tablet.matches) {
            // swiper.destroy();
            init = false;
        }
        else if (desktop.matches) {
            // swiper.destroy();
            init = false;
        }



        const sliderThumbs = new Swiper('.product-card__slider-thumbs .swiper', {
            direction: 'horizontal',
            slidesPerView: 4,
            spaceBetween: 10,
            freeMode: true,
            watchOverflow: true,
        });

        const sliderImages = new Swiper('.product-card__slider-images .swiper', {
            direction: 'horizontal',

            mousewheel: true,
            slidesPerView: 1,
            watchOverflow: true,
            grabCursor: true,
            thumbs: {
                swiper: sliderThumbs
            },
            navigation: {
                nextEl: '.product-card .swiper-button-next-dark',
                prevEl: '.product-card .swiper-button-prev-dark',
            },

        });

        if (sliderImages.slides.length < 2) {
            $('.product-card__slider-thumbs').hide()
        }

        let optionsCertificate = {
            grabCursor: true,
            loop: true,
            spaceBetween: 50,
            slidesPerView: 1,
            pagination: {
                el: '.swiper-pagination-certificate',
                clickable: true,
            },
            breakpoints: {

                575: {
                    slidesPerView: 2,
                    spaceBetween: 8,
                },
                720: {
                    slidesPerView: 3,
                    spaceBetween: 16,
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 24,
                },

            },

            navigation: {
                nextEl: '#certificate .swiper-button-next-dark',
                prevEl: '#certificate .swiper-button-prev-dark',
            },

            lazy: true,
        };

        if ($("#certificate .swiper .swiper-slide").length < 4) {
            optionsCertificate.loop = false;
            optionsCertificate.autoplay = false;
            $('.swiper-button-inner-v3').hide();
        }

        const CertificateSwiper = new Swiper('#certificate .swiper', optionsCertificate);

        let optionsSliderBlog = {

            speed: 500,
            loop: true,
            slidesPerView: 1,
            spaceBetween: 8,
            watchOverflow: true,

            breakpoints: {
                720: {
                    slidesPerView: 2,
                    spaceBetween: 16,
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },

            },

            navigation: {
                nextEl: '.blog-swiper .swiper-button-next-dark',
                prevEl: '.blog-swiper .swiper-button-prev-dark',
            },

        };
        if ($(".blog-swiper .swiper .swiper-slide").length < 4) {
            optionsSliderBlog.loop = false;
            $('.blog-swiper .swiper-button-inner-v2').hide();
        }
        const sliderBlog = new Swiper('.blog-swiper .swiper', optionsSliderBlog);

    };
}