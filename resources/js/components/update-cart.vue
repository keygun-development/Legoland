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
            const cookieObj = new URLSearchParams(document.cookie.replaceAll("; ", "&"))
            let productList = JSON.parse(cookieObj.get("producten")) || [];
            let productObject = [];
            const elements = document.getElementsByClassName('product-amount')

            for (let i = 0; i < productList.length; i++) {
                if (productList[i].id === parseInt(document.getElementById(productList[i].id).id) &&
                    elements[i].getAttribute('data-type') === productList[i].type
                ) {
                    if (parseInt(document.getElementById(productList[i].id).value) !== 0) {
                        productObject.push({
                            "id": productList[i].id,
                            "amount": elements[i].value,
                            "type": productList[i].type
                        })
                    }
                }
            }
            this.setCookie('producten', JSON.stringify(productObject), 7);
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
