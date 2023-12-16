<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
    products: Array,
});

const deleteProduct = (id) => {
    router.delete(route('menu.destroy', id));
}
</script>

<template>
    <AdminLayout>

        <Head title="Menu" />

        <div class="flex flex-col gap-8 items-center py-10">
            <div class="w-full max-w-7xl">
                <div class="flex gap-2 mb-4">
                    <Link :href="route('menu.create')" class="bg-green-500 text-white px-4 py-2 rounded">
                    Dodaj produkt
                    </Link>
                </div>
                <div class="flex gap-8 w-full bg-blue-500 p-8 text-white font-bold">
                    <div class="">Id</div>
                    <div class="flex-grow">Nazwa produktu</div>
                    <div class="min-w-[100px]">Mała</div>
                    <div class="min-w-[100px]">Średnia</div>
                    <div class="min-w-[100px]">Duża</div>
                    <div class="min-w-[200px]">Akcje</div>
                </div>
                <div v-for="product in products" :key="product.id" class="flex gap-8 w-full bg-white p-8">
                    <div class="">{{ product.id }}</div>
                    <div class="flex-grow">{{ product.name }}</div>
                    <div class="min-w-[100px]">{{ product.small }}</div>
                    <div class="min-w-[100px]">{{ product.medium }}</div>
                    <div class="min-w-[100px]">{{ product.big }}</div>
                    <div class="flex gap-2 min-w-[200px]">
                        <Link :href="route('menu.edit', product.id)" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Edytuj
                        </Link>
                        <button @click="deleteProduct(product.id)" class="bg-red-500 text-white px-4 py-2 rounded">
                            Usuń
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
