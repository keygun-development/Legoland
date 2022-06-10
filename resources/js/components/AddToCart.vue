<template>
    <div>
    <slot name="items"></slot>
        <p class="text-red-500">
            {{ error }}
        </p>
        <p class="text-lime-500">
            {{ success }}
        </p>
    </div>
</template>

<script>

export default {

    data() {
        return {
            error: '',
            success: ''
        }
    },

    props: {
        itemId: Number,
        itemAmount: String,
        itemType: String
    },

    methods: {
        addItems: function () {
            this.error = ""
            this.success = ""

            console.log(this.itemId);

            const cookieObj = new URLSearchParams(document.cookie.replaceAll("; ","&"))
            let ticketList = JSON.parse(cookieObj.get(this.itemType)) || [];
            let duplicate = false;
            const amount = document.getElementById(this.itemAmount)

            if (!amount.value || parseInt(amount.value) === 0) {
                this.error = "Geef een getal op tussen de 1 en 10"
            } else {
                if (ticketList.length > 0) {
                    for (let i=0; i<ticketList.length; i++) {
                        if(ticketList[i].id === this.itemId) {
                            ticketList[i].amount = (parseInt(ticketList[i].amount) + parseInt(amount.value))
                            duplicate = true
                        }
                    }
                }

                if (!duplicate) {
                    ticketList.push({"id":this.itemId,"amount":amount.value})
                    this.setCookie(this.itemType, JSON.stringify(ticketList), 7);
                } else {
                    this.setCookie(this.itemType, JSON.stringify(ticketList), 7);
                }

                this.success = "Product toegevoegd!"
            }
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
