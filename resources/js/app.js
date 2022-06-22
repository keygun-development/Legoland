import {createApp} from 'vue'
import Swiper from './components/Swiper'
import UpdateCart from './components/update-cart'
import AddToCart from './components/AddToCart'
import Modal from './components/OpenCloseModal'

const app = createApp({})
app.component('Swiper', Swiper)
app.component('AddToCart', AddToCart)
app.component('UpdateCart', UpdateCart)
app.component('Modal', Modal)
app.mount('#main')

function closeModal() {
    document.querySelector('#interestModal').classList.add('invisible');
}

function openModal() {
    document.querySelector('#interestModal').classList.remove('invisible');
}