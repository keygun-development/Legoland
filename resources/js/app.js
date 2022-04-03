import {createApp} from 'vue'
import Swiper from './components/Swiper'
import UpdateCart from './components/update-cart'
import AddToCart from './components/AddToCart'

const app = createApp({})
app.component('Swiper', Swiper)
app.component('AddToCart', AddToCart)
app.component('UpdateCart', UpdateCart)
app.mount('#main')
