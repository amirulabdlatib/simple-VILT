<script setup>
    import Demo from "../Layouts/Demo.vue";
    import {Head} from "@inertiajs/vue3";
    defineOptions({ layout:Demo});
</script>

<template>

    <Head>
        <title>Test</title>
    </Head>

    <div>
        <h1>Test different layout</h1>
    </div>
</template>