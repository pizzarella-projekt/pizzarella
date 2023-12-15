<script setup>
import moment from 'moment';
import { Head, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

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
                    <div>
                        <div class="font-bold">
                            Rachunek na:
                        </div>
                        {{ order.buyer }}
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
                        {{ order.total }}
                    </div>
                    <div>
                        <div class="font-bold">
                            Status:
                        </div>
                        {{ order.status }}
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
