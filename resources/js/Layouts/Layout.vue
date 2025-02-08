<script setup>


</script>

<template>

    <Head>
        <meta head-key="desc" name="description" content="My App description">
    </Head>

    <div>
        <header>
            <nav>
                <div class="space-x-6">
                    <Link :href="route('home')" class="nav-link">Home</Link>
                </div>

                <div v-if="$page.props.auth.user" class="space-x-6">
                    <Link :href="route('dashboard')" class="nav-link">Dashboard</Link>
                    <Link :href="route('logout')" method="POST" as="button" type="button" class="nav-link">Logout</Link>
                </div>
                <div v-else class="space-x-6">
                    <Link :href="route('register')" class="nav-link">Register</Link>
                    <Link :href="route('login')" class="nav-link">Login</Link>
                </div>

            </nav>
        </header>

        <main class="p-4">
            <slot/>
        </main>
    </div>
</template>