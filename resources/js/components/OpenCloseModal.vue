<template></template>
<script>
    export default {
        mounted () {
            document.querySelector('.openModal').addEventListener('click', function(e){
                document.querySelector('#interestModal').classList.remove('invisible');
            });

            document.querySelector('.openModal1').addEventListener('click', function(e){
                document.querySelector('#interestModal').classList.remove('invisible');
            });

            document.querySelector('.openModal2').addEventListener('click', function(e){
                document.querySelector('#interestModal').classList.remove('invisible');
            });

            document.querySelector('.closeModal').addEventListener('click', function(e){
                document.querySelector('#interestModal').classList.add('invisible');
            });
        }
    }
</script>
