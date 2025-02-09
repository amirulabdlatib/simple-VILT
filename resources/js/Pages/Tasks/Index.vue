<script setup>
defineProps({
    tasks:Object,
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
        <title>Task</title>
    </Head>

    <div class="my-3">
        <h1>My Tasks</h1>
    </div>

    <table v-if="tasks,length">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registered Date</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(task, index) in tasks" :key="task.id">
                <td>{{ index + 1 }}</td>
                <td>{{ task.name }}</td>
                <td>{{ task.description }}</td>
                <td>{{ formateDate(task.created_at) }}</td>
            </tr>
        </tbody>
    </table>

    <p v-else> No tasks found.</p>
    
</template>