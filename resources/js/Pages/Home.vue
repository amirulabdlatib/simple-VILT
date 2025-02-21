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

    <div class="flex justify-end mb-4">
        <div class="w-1/4">
            <input type="search" placeholder="Search...">
        </div>
    </div>

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
            <tr v-for="(user, index) in users.data" :key="user.id">
                <td>{{ users.from + index }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ formateDate(user.created_at) }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Pagination -->
    <div>
        <Link v-for="link in users.links" 
        :key="link.label" 
        v-html="link.label"
        :href="link.url || '#'" 
        class="p-1"
        :class="{'text-slate-300 cursor-not-allowed pointer-events-none': !link.url, 'text-blue-500':link.active}" 
      >
        </Link>

        <p class="text-slate-600 text-sm">
            Showing {{ users.from }} to {{ users.to }} of {{ users.total }}
        </p>

    </div>

</template>