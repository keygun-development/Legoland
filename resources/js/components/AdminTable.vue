<template>
    <table class="c-admin__table border-gray-200 shadow mt-4">
        <slot name="tablehead"></slot>
        <slot name="tablebody"></slot>
    </table>
</template>

<script>

export default {
    mounted() {
        const items = document.getElementsByClassName('admin-table-item')

        for (let i = 0; i<items.length; i++)
        {
            if (items[i].textContent.length > 50) {
                items[i].textContent = items[i].textContent.slice(0, 50) + '...';
            }
        }
    },

    methods: {
        EditRow: function(id) {
            let url = new URL(window.location.href);

            url.searchParams.set("edit", id)

            window.location = decodeURIComponent(url.href)
        },

        DeleteRow: function (id) {
            if (window.confirm("Weet u zeker dat u dit item wilt verwijderen?")) {
                window.location.href = '/admin/tickets/'+id+'/delete'
            } else {
                window.location.href = '/admin/tickets'
            }
        }
    }
}
</script>
