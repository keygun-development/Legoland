<template>
    <div class="w-full flex justify-end">
        <button @click="updateCart()" class="c-button c-button__default">
            Winkelmandje Updaten
        </button>
    </div>
</template>

<script>

export default {
    methods: {
        updateCart: function () {
            const products = document.getElementsByClassName('c-cart__single');
            const cookieObj = new URLSearchParams(document.cookie.replaceAll("; ","&"))
            let ticketList = JSON.parse(cookieObj.get("tickets")) || [];
            let productObject = [];

            for (let i = 0; i<products.length; i++) {
                if (ticketList[i].id === parseInt(document.getElementById(ticketList[i].id).id)) {
                    if(parseInt(document.getElementById(ticketList[i].id).value) !== 0) {
                        productObject.push({"id":ticketList[i].id,"amount":document.getElementById(ticketList[i].id).value})
                    }
                }
            }
            this.setCookie('tickets', JSON.stringify(productObject), 7);
            location.reload();
        },

        setCookie: function (name, value, days) {
            let expires = "";
            if (days) {
                let date = new Date();
                date.setTime(date.getTime() + (days*24*60*60*1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "")  + expires + "; path=/";
        }
    }
}
</script>
