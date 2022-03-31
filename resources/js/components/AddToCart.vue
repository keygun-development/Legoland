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
      itemAmount: String
    },

    methods: {
        addItems: function () {
            this.error = ""
            this.success = ""
            const ticketList = JSON.parse(localStorage.getItem('ticket_object') || "[]");
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
                    localStorage.setItem('ticket_object',JSON.stringify(ticketList));
                } else {
                    localStorage.setItem('ticket_object',JSON.stringify(ticketList));
                }
                this.success = "Product toegevoegd!"
            }
        }
    }
}
</script>
