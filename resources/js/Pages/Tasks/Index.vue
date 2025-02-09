<script setup>
import { useForm } from '@inertiajs/vue3';
import FlashMessage from '../Components/FlashMessage.vue';
defineProps({
    tasks:Object,
})

const form = useForm({})

const deleteTask =(id)=>{
    if(confirm('Are you sure to delete?')){
        form.delete(route('tasks.destroy',id))
    }
}

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

    <FlashMessage/>

    <div class="my-3 flex justify-between">
        <h1>My Tasks</h1>
        <a :href="(route('tasks.create'))" class="primary-btn w-24">Add Task</a>
    </div>

    <table v-if="tasks.length">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registered Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(task, index) in tasks" :key="task.id">
                <td>{{ index + 1 }}</td>
                <td>{{ task.name }}</td>
                <td>{{ task.description }}</td>
                <td>{{ formateDate(task.created_at) }}</td>
                <td class="space-x-2">
                    <a :href="route('tasks.show', task.id)" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-800">Detail</a>
                    <a :href="route('tasks.edit', task.id)" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-800">Edit</a>
                    <button @click="deleteTask(task.id)" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-800">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

    <p v-else> No tasks found.</p>

</template>