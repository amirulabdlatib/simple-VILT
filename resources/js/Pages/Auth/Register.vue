<script setup></script>

<template>

    <Head title="Register" />


    <div class="w-2/4 mx-auto">
        <h1 class="mb-3">Register a new account</h1>

        <form>
            <div class="mb-6">
                <label>Name</label>
                <input type="text">
            </div>
            <div class="mb-6">
                <label>Email</label>
                <input type="text">
            </div>
            <div class="mb-6">
                <label>Password</label>
                <input type="password">
            </div>
            <div class="mb-6">
                <label>Confirm Password</label>
                <input type="password">
            </div>

            <div>
                <p class="">Already a user? <a href="#" class="text-link">Login</a></p>
                <button class="primary-btn">Register</button>
            </div>

        </form>
    </div>

</template>
