<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col items-center bg-gray-100">
        <header class="flex items-center justify-between w-full p-5 bg-green-500">
            <Link href="/">
            <img src="../../images/logo.svg" alt="Logo" />
            </Link>
            <div class="flex gap-4 text-white">
                <Link href="/">Strona główna</Link>
                <Link href="/aktualnosci">Aktualności</Link>
                <Link href="/menu">Menu</Link>
                <Link href="/galeria">Galeria</Link>
                <Link href="/kontakt">Kontakt</Link>
                <Link href="/koszyk">Koszyk</Link>
            </div>
        </header>
        <div class="w-full flex-grow">
            <slot />
        </div>
        <footer class="flex flex-col items-center justify-center w-full p-5 bg-green-500">
            <div class="flex flex-wrap gap-4 text-white mb-4">
                <Link href="/regulamin">Regulamin</Link>
                <Link href="/polityka-prywatnosci">Polityka Prywatności</Link>
                <Link href="/praca">Praca</Link>
            </div>
            <div class="text-white">
                © 2024 Pizzarella
            </div>
        </footer>
    </div>
</template>