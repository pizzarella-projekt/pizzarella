<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col items-center bg-gray-100">
        <header class="flex items-center justify-between w-full p-5 bg-blue-500">
            <Link href="/">
            <span class="text-3xl font-bold text-white">Panel administratora</span>
            </Link>
            <div class="flex items-center gap-4 text-white">
                <Link href="/admin/menu">Menu</Link>
                <Link href="/admin/aktualnosci">Aktualności</Link>
                <Link href="/admin/zamowienia">Zamówienia</Link>
                <Link href="/admin/galeria">Galeria</Link>
                <Link :href="route('logout')" method="post" as="button" class="bg-red-500 text-white px-4 py-2 rounded">
                Wyloguj się
                </Link>
            </div>
        </header>
        <div class="w-full flex-grow">
            <slot />
        </div>
        <footer class="flex items-center justify-center w-full p-5 bg-blue-500">
            <div class="text-white">
                © 2024 Pizzarella
            </div>
        </footer>
    </div>
</template>