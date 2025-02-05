<script setup>
import { Link,Head } from '@inertiajs/vue3';
</script>

<template>

    <Head>
        <title>Home Page</title>
        <meta head-key="desc" name="description" content="Home page description">
    </Head>

    <h1>Home Page</h1>
    <p> Welcome to {{ $page.component }} page: {{ $page.props.user }}</p>
    

</template>