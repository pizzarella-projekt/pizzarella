<script setup>
import { Head } from '@inertiajs/vue3';
import { fakerPL as faker } from '@faker-js/faker';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const orders = () => {
    return Array.from({ length: 6 }, (_, i) => ({
        id: i + 1,
        date: faker.date.anytime().toLocaleDateString("pl-PL"),
        fullName: faker.person.firstName() + " " + faker.person.lastName(),
        price: faker.finance.amount(20, 200, 2),
        status: "Zrealizowane",
    }));
};
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
                <div v-for="order in orders()" :key="order.id" class="flex gap-8 w-full bg-white p-8">
                    <div class="">{{ order.id }}</div>
                    <div class="min-w-[150px]">{{ order.date }}</div>
                    <div class="flex-grow">{{ order.fullName }}</div>
                    <div class="min-w-[150px]">{{ order.price }} zł</div>
                    <div class="min-w-[150px]">{{ order.status }}</div>
                    <div class="flex gap-2 min-w-[200px]">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded">Szczegóły</button>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
