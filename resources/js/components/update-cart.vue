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
            let ticketList = JSON.parse(cookieObj.get("tickets")) || [];
            let accommodationList = JSON.parse(cookieObj.get("accommodations")) || [];
            let ticketObject = [];
            let accommodationObject = [];

            for (let i = 0; i < ticketList.length; i++) {
                if (ticketList[i].id === parseInt(document.getElementById(ticketList[i].id).id)) {
                    if (parseInt(document.getElementById(ticketList[i].id).value) !== 0) {
                        ticketObject.push({
                            "id": ticketList[i].id,
                            "amount": document.getElementById(ticketList[i].id).value
                        })
                    }
                }
            }
            for (let i = 0; i < accommodationList.length; i++) {
                if (accommodationList[i].id === parseInt(document.getElementById(accommodationList[i].id).id)) {
                    if (parseInt(document.getElementById(accommodationList[i].id).value) !== 0) {
                        accommodationObject.push({
                            "id": accommodationList[i].id,
                            "amount": document.getElementById(accommodationList[i].id).value
                        })
                    }
                }
            }
            this.setCookie('tickets', JSON.stringify(ticketObject), 7);
            this.setCookie('accommodations', JSON.stringify(accommodationObject), 7);
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
