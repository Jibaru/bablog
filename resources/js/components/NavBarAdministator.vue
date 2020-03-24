<template>

    <div class="p-3 bg-success shadow-sm">
        <button type="button" class="btn btn-light" @click="handleMenu">MENU</button>
        <a type="button" class="btn btn-primary" href="/">PAGINA WEB</a>
    </div>

</template>

<script>

    export default {

        methods: {

            handleMenu(){
                this.$emit('on-click-icon', true);
            }

        }

    }

</script>
