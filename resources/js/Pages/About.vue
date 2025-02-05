<script setup>
    
    defineProps({
        user: String
    })
</script>


<template>

    <Head>
        <title>About</title>
    </Head>

    <div>
        <h1>About page {{ user }}</h1>
    </div>
</template>