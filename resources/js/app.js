import {createApp} from 'vue'
import Swiper from './components/Swiper'
import UpdateCart from './components/update-cart'
import AddToCart from './components/AddToCart'
import OpenCloseModal from './components/OpenCloseModal'
import AdminTable from './components/AdminTable'

const app = createApp({})
app.component('Swiper', Swiper)
app.component('AddToCart', AddToCart)
app.component('UpdateCart', UpdateCart)
app.component('OpenCloseModal', OpenCloseModal)
app.component('AdminTable', AdminTable)
app.mount('#main')
