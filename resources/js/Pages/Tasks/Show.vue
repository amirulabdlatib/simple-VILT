<script setup>
defineProps({
    task:Object,
})
</script>

<template>
    <Head>
        <title>Show Task details</title>
    </Head>

        <div class="space-y-3 mt-2">
            <h1>Task - {{ task.id }}</h1>

            <div>
                <label for="">Task name:</label>
                <p class="text-gray-500">{{ task.name }}</p>
            </div>

            <div>
                <label for="">Description:</label>
                <p class="text-gray-500">{{ task.description }}</p>
            </div>
        </div>


        <div class="my-5 flex justify-end">
            <a class="primary-btn w-24" :href="route('tasks.index') ">Back</a>
        </div>

</template>