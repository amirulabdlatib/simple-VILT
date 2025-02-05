<script setup>
import {Link,Head} from "@inertiajs/vue3";
</script>

<template>

    <Head>
        <title>My App</title>
        <meta name="description" content="My App description">
    </Head>

    <div>
        <header class="bg-indigo-500 text-white">
            <nav class="flex items-center justify-between p-4 max-w-screen-lg mx-auto">
                <div class="space-x-6">
                    <Link href="/">Home</Link>
                    <Link href="/about">About</Link>
                    <Link href="/test">Test</Link>
                </div>
            </nav>
        </header>

        <main class="p-4">
            <slot/>
        </main>
    </div>
</template>