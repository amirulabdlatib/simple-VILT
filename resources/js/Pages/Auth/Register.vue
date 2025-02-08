<script setup>
import { reactive } from 'vue';
import { router,useForm } from '@inertiajs/vue3';
import TextInput from '../Components/TextInput.vue';

    // Solution 1

    // const form = reactive({
    //     name:null,
    //     email:null,
    //     password:null,
    //     password_confirmation:null,
    // });

    // const submit = () => {
    //     router.post('/register',form);
    // }

    // Solution 2

    const form = useForm({
        name:null,
        email:null,
        password:null,
        password_confirmation:null,
    });

    // const submit = () => {
    //     form.post('/register',{
    //         onError:() => form.reset('password','password_confirmation')
    //     })
    // }

    // other solution
    const submit = () => {
        form.post(route('register'),{
            onError:() => form.reset('password','password_confirmation')
        })
    }

</script>

<template>

    <Head title="Register" />


    <div class="w-2/4 mx-auto">
        <h1 class="mb-3">Register a new account</h1>

        <form @submit.prevent="submit">
            
            <TextInput name="name" v-model="form.name" :message="form.errors.name" />
            <TextInput name="email" type="email"  v-model="form.email" :message="form.errors.email" />
            <TextInput name="password" type="password"  v-model="form.password" :message="form.errors.password" />
            <TextInput name="confirm password" type="password"  v-model="form.password_confirmation"/>

            <div>
                <p class="">Already a user? <a :href="route('login')" class="text-link">Login</a></p>
                <button class="primary-btn" :disabled="form.processing">Register</button>
            </div>

        </form>
    </div>

</template>
