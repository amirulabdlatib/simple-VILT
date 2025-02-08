<script setup>
defineProps({
    users: Object,
})

function formateDate(date) {
    return new Date(date).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    })
}

</script>

<template>

    <Head>
        <title>{{ $page.component }}</title>
        <meta head-key="desc" name="description" content="Home page description">
    </Head>

    <h1 class="my-3">Home Page</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registered Date</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(user, index) in users" :key="user.id">
                <td>{{ index + 1 }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ formateDate(user.created_at) }}</td>
            </tr>
        </tbody>
    </table>

</template>