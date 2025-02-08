<script setup>

</script>

<template>

    <Head>
        <title>Dashboard</title>
    </Head>

    <p class="p-4 bg-green-200" v-if="$page.props.flash.message">
        {{ $page.props.flash.message }}
    </p>

    <div>
        <h1>Welcome back {{ $page.props.auth.user ? $page.props.auth.user.name : 'Guest' }}</h1>
    </div>

</template>

