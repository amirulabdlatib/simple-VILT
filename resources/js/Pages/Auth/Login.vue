<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../Components/TextInput.vue';

const form = useForm({
    email:null,
    password:null,
})

const submit = () => {
    form.post(route('login'),{
        onError : ()=> form.reset('password')
    })
}


</script>

<template>

    <Head>
        <title>Login</title>
    </Head>

    <div class="w-2/4 mx-auto">
        <h1 class="mb-3">Login</h1>

        <form @submit.prevent="submit">
            
            <TextInput name="email" type="email"  v-model="form.email" :message="form.errors.email" />
            <TextInput name="password" type="password"  v-model="form.password" :message="form.errors.password" />

            <div>
                <p class="">Dont have account? <a :href="route('register')" class="text-link">Register</a></p>
                <button class="primary-btn" :disabled="form.processing">Login</button>
            </div>

        </form>
    </div>
</template>