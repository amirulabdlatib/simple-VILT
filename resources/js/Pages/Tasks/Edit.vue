<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    task: Object,
});

const form = useForm({
    name: props.task.name,
    description: props.task.description,
});

const updateTask = () => {
    form.put(route('tasks.update', props.task.id))
};
</script>

<template>
    <Head>
        <title>Edit Task</title>
    </Head>

    <div class="max-w-lg mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="text-xl font-semibold mb-4">Edit Task</h1>

        <form @submit.prevent="updateTask">
            <div class="mb-4">
                <label for="name" class="block font-medium">Task Name</label>
                <input
                    v-model="form.name"
                    type="text"
                    id="name"
                    class="w-full border rounded px-3 py-2"
                />
            </div>

            <div class="mb-4">
                <label for="description" class="block font-medium">Description</label>
                <textarea
                    v-model="form.description"
                    id="description"
                    class="w-full border rounded px-3 py-2"
                    rows="4"
                ></textarea>
            </div>

            <div class="flex justify-between">
                <a :href="route('tasks.index')" class="text-blue-500 hover:underline">Cancel</a>
                <button
                    type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded"
                    :disabled="form.processing"
                >
                    Update
                </button>
            </div>
        </form>
    </div>
</template>
