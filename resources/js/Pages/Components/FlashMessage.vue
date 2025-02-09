<script setup>
    import {ref} from 'vue';

    const showFlash = ref(true)
    const closeFlash = () => showFlash.value = false
</script>

<template>

    <p class="p-4 bg-green-200 relative" v-if="$page.props.flash.message && showFlash">
        {{ $page.props.flash.message }}
        <button @click="closeFlash" class="absolute top-1 right-1 p-1 hover:bg-green-300 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </p>

</template>
