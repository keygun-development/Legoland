import {createApp} from 'vue'
import Swiper from './components/Swiper'
import AddToCart from './components/AddToCart'

const app = createApp({})
app.component('Swiper', Swiper)
app.component('AddToCart', AddToCart)
app.mount('#main')
