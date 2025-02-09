<script setup>
import { useForm } from '@inertiajs/vue3';


const form = useForm({
    'name':null,
    'description':null,
})

const submit = () =>{
    form.post(route('tasks.store'))
}

</script>

<template>

    <Head>
        <title>Create Task</title>
    </Head>

    <h1 class="my-3">Create Task Form</h1>
    
    <form @submit.prevent="submit">
        
        <label for="name">Task Name</label>
        <input type="text" name="name" id="name" v-model="form.name">
        <small class="text-red-500">{{ form.errors.name }}</small>

        <label for="description">Task Description</label>
        <textarea name="description" id="description" rows="3" v-model="form.description"></textarea>
        <small class="text-red-500">{{ form.errors.description }}</small>

        <div class="my-5 flex justify-end">
            <button class="primary-btn w-24" :disabled="form.processing">Create</button>
        </div>

    </form>


</template>
