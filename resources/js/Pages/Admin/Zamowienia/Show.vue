<script setup>
import moment from 'moment';
import { Head, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { PLN } from '@/utils'

defineProps({
    order: Object,
});
</script>

<template>
    <AdminLayout>

        <Head title="Zamówienia" />

        <div class="flex flex-col gap-8 items-center py-10">
            <div class="w-full max-w-7xl">
                <div class="flex gap-8 w-full bg-blue-500 p-8 text-white font-bold">
                    <div class="">Zamówienie nr {{ order.id }}</div>
                </div>
                <div class="flex flex-col gap-8 w-full bg-white p-8">
                    <div class="flex gap-8">
                        <div class="flex flex-col">
                            <div class="font-bold">
                                Rachunek na:
                            </div>
                            <div>{{ order.name }}</div>
                            <div>{{ order.street }}</div>
                            <div>{{ order.postal_code }} {{ order.city }}</div>
                        </div>
                        <div>
                            <div class="font-bold">
                                Data zakupu:
                            </div>
                            {{ moment(order.created_at).format('DD.MM.YYYY') }}
                        </div>
                        <div>
                            <div class="font-bold">
                                Łączna suma:
                            </div>
                            {{ PLN.format(order.total) }}
                        </div>
                        <div>
                            <div class="font-bold">
                                Status:
                            </div>
                            {{ order.status }}
                        </div>
                    </div>

                    <div class="flex flex-col w-full">
                        <div class="flex w-full bg-blue-500 px-8 py-4 text-white">
                            <div class="flex-grow">Nazwa</div>
                            <div class="w-1/12 text-center">Ilość</div>
                            <div class="w-1/12 text-center">Cena</div>
                        </div>
                        <div v-for="(item, index) in order.items" :key="index"
                            class="flex items-center w-full bg-blue-200 px-8 py-4">
                            <div class="w-5/6">{{ item.name }}</div>
                            <div class="w-1/12 text-center">{{ item.amount }}</div>
                            <div class="w-1/12 text-center">{{ PLN.format(item.price * item.amount) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
