<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { PLN } from '@/utils';
import MainLayout from '@/Layouts/MainLayout.vue';

const props = defineProps({
    cart: Array,
});

const cart = ref(props.cart);

const getFinalPrice = () => {
    let price = 0

    cart.value.forEach(item => {
        price += (item.price * item.amount)
    });

    return price;
}

const deleteCartItem = async (index) => {
    router.delete(route('koszyk.destroy', index), {
        onFinish: () => {
            location.reload()
        }
    })
};
</script>

<template>
    <MainLayout>

        <Head title="Koszyk" />

        <div class="w-full flex justify-center">
            <div class="flex items-start justify-center gap-8 w-full max-w-6xl py-10">
                <div class="w-full">
                    <div class="flex gap-4 w-full bg-[#22c55e] p-8 text-white">
                        <div class="flex-grow">Nazwa</div>
                        <div class="w-1/12 text-center">Ilość</div>
                        <div class="w-1/12 text-center">Cena</div>
                        <div class="w-1/12 text-center">Usuń</div>
                    </div>
                    <div v-for="(item, index) in cart" :key="index"
                        class="flex gap-4 items-center gap-4 w-full max-w-6xl bg-green-200 px-8 py-4">
                        <div class="flex-grow max-w-[70%]">{{ item.name }}</div>
                        <div class="w-1/12 text-center">{{ item.amount }}</div>
                        <div class="w-1/12 text-center">{{ PLN.format(item.price * item.amount) }}</div>
                        <div class="flex items-center justify-center w-1/12">
                            <button @click="deleteCartItem(index)" class="bg-red-500 text-white px-4 py-2 rounded">
                                Usuń
                            </button>
                        </div>
                    </div>
                    <div v-if="cart.length === 0"
                        class="flex items-center justify-center gap-4 w-full max-w-6xl bg-green-200 px-8 py-4">
                        Koszyk jest pusty
                    </div>
                </div>
                <div v-if="cart.length > 0" class="flex flex-col gap-8 w-1/4 bg-[#22c55e] text-white px-4 pt-8 pb-4">
                    <div class="flex justify-between">
                        <div>Suma</div>
                        <div>{{ PLN.format(getFinalPrice()) }}</div>
                    </div>
                    <Link href="/kasa" class="bg-blue-500 text-center px-4 py-2 rounded">
                    Przejdź do kasy
                    </Link>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
