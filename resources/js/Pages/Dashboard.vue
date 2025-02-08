<script setup>

</script>

<template>

    <Head>
        <title>Dashboard</title>
    </Head>

    <div>
        <h1>Welcome back {{ $page.props.auth.user ? $page.props.auth.user.name : 'Guest' }}</h1>
    </div>

</template>

