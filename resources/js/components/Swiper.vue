<template>
    <div class="relative">
        <div class="swiper-container one">
            <div class="swiper-wrapper">
                <div class="swiper-slide text-center" :class="property, { 'free' : item.price == 0 }" v-for="item in slides">
                    <div class="absolute right-2 top-2 w-2/12" v-if="item.price == 0">
                        <img src="../../images/free.png" />
                    </div>
                    <p class="font-bold">
                        {{ item.name }}
                    </p>
                    <p class="swiper-no-overflow mt-4">
                        {{ item.description }}
                    </p>
                    <p class="my-4" :class="{'font-bold' : item.price == 0}">
                        €{{ item.price }}
                    </p>
                    <a :href="'/tickets/'+item.id" class="c-button c-button__default" href="#">
                        Meer informatie
                    </a>
                </div>
            </div>
        </div>
        <div class="swiper-pagination mt-8 flex justify-center w-full"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</template>
<script>
import Swiper, { Navigation, Pagination, Autoplay } from 'swiper'
import 'swiper/swiper-bundle.css'

Swiper.use([ Navigation, Pagination, Autoplay ])

export default {
    props: {
        slides: Array,
        property: String
    },

    mounted () {
        new Swiper('.one', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            slidesPerView: 3,
            spaceBetween: 15,
            pagination: {
                el: '.swiper-pagination',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        })

        const desc = document.getElementsByClassName('swiper-no-overflow')

        for (let i=0; i<desc.length; i++) {
            desc[i].innerText = desc[i].innerHTML.slice(0, 100)+'...';
        }
    },
};
</script>
