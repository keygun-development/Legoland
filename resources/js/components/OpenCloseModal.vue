<template>
    <slot name="modal"></slot>
</template>
<script>
    export default {
        methods: {
            closeModal: function () {
                let url = new URL(window.location.href);

                url.searchParams.delete('edit')
                url.searchParams.delete('new')

                window.location = decodeURIComponent(url.href)
            }
        }
    }
</script>
