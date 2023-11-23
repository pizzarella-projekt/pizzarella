<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col items-center bg-gray-100">
        <header class="flex items-center justify-between w-full p-5 bg-blue-500">
            <Link href="/">
            <span class="text-3xl font-bold text-white">Panel administratora</span>
            </Link>
            <div class="flex gap-4 text-white">
                <Link href="/admin">Menu</Link>
            </div>
        </header>
        <div class="w-full flex-grow">
            <slot />
        </div>
        <footer class="flex items-center justify-center w-full p-5 bg-blue-500">
            <div class="text-white">
                © 2023 Pizzarella
            </div>
        </footer>
    </div>
</template>