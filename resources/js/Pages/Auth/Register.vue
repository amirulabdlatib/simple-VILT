<script setup>
import { reactive } from 'vue';
import { router,useForm } from '@inertiajs/vue3';

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
            <div class="mb-6">
                <label>Name</label>
                <input type="text" v-model="form.name">
                <small class="text-red-500">{{ form.errors.name }}</small>
            </div>
            <div class="mb-6">
                <label>Email</label>
                <input type="text" v-model="form.email">
                <small class="text-red-500">{{ form.errors.email }}</small>
            </div>
            <div class="mb-6">
                <label>Password</label>
                <input type="password" v-model="form.password">
                <small class="text-red-500">{{ form.errors.password }}</small>
            </div>
            <div class="mb-6">
                <label>Confirm Password</label>
                <input type="password" v-model="form.password_confirmation">
            </div>

            <div>
                <p class="">Already a user? <a href="#" class="text-link">Login</a></p>
                <button class="primary-btn" :disabled="form.processing">Register</button>
            </div>

        </form>
    </div>

</template>
