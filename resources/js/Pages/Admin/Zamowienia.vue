<script setup>
import moment from 'moment';
import { Head, Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { PLN } from '@/utils'

defineProps({
    orders: Array,
});

const deleteOrder = (id) => {
    router.delete(route('zamowienia.destroy', id));
}
</script>

<template>
    <AdminLayout>

        <Head title="Zamówienia" />

        <div class="flex flex-col gap-8 items-center py-10">
            <div class="w-full max-w-7xl">
                <div class="flex gap-8 w-full bg-blue-500 p-8 text-white font-bold">
                    <div class="">Id</div>
                    <div class="min-w-[150px]">Data zakupu</div>
                    <div class="flex-grow">Rachunek na</div>
                    <div class="min-w-[150px]">Łączna suma</div>
                    <div class="min-w-[150px]">Status</div>
                    <div class="min-w-[200px]">Akcje</div>
                </div>
                <div v-for="order in orders" :key="order.id" class="flex gap-8 w-full bg-white p-8">
                    <div class="">{{ order.id }}</div>
                    <div class="min-w-[150px]">{{ moment(order.created_at).format('DD.MM.YYYY') }}</div>
                    <div class="flex-grow">{{ order.name }}</div>
                    <div class="min-w-[150px]">{{ PLN.format(order.total) }}</div>
                    <div class="min-w-[150px]">{{ order.status }}</div>
                    <div class="flex gap-2 min-w-[200px]">
                        <Link :href="route('zamowienia.show', order.id)" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Szczegóły
                        </Link>
                        <button @click="deleteOrder(order.id)" class="bg-red-500 text-white px-4 py-2 rounded">
                            Usuń
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
