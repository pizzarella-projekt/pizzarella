<script setup>
import { ref } from 'vue'
import { Head, Link, router, useForm } from '@inertiajs/vue3'
import { PLN } from '@/utils'
import MainLayout from '@/Layouts/MainLayout.vue'

const props = defineProps({
    cart: Array,
})

const cart = ref(props.cart)

const form = useForm({
    name: null,
    email: null,
    phone: null,
    street: null,
    postal_code: null,
    city: null,
})

function submit() {
    form.post('/kasa')
}

const getFinalPrice = () => {
    let price = 0

    cart.value.forEach(item => {
        price += (item.price * item.amount)
    })

    return price
}
</script>

<template>
    <MainLayout>

        <Head title="Kasa" />

        <div v-if="$page.props.flash.ordered" class="w-full text-center py-16">
            {{ $page.props.flash.ordered }}
        </div>

        <div v-if="!$page.props.flash.ordered" class="w-full flex justify-center">
            <div class="flex items-start justify-center gap-8 w-full max-w-6xl py-10">
                <div class="w-full">
                    <div class="flex gap-4 w-full bg-[#22c55e] px-8 py-4 text-white">
                        <div>Dane odbiorcy</div>
                    </div>
                    <div class="flex gap-4 items-center gap-4 w-full max-w-6xl bg-green-200 px-8 py-4 mb-8">
                        <form @submit.prevent="submit" class="flex flex-col gap-4 w-full">
                            <div class="flex gap-4">
                                <div class="flex flex-col">
                                    <label for="name">Imię i nazwisko</label>
                                    <input type="text" id="name" v-model="form.name">
                                    <div v-if="form.errors.name" class="text-red-500">{{ form.errors.name }}
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <label for="email">Adres email</label>
                                    <input type="text" id="email" v-model="form.email">
                                    <div v-if="form.errors.email" class="text-red-500">
                                        {{ form.errors.email }}
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <label for="phone">Numer telefonu</label>
                                    <input type="text" id="phone" v-model="form.phone">
                                    <div v-if="form.errors.phone" class="text-red-500">
                                        {{ form.errors.phone }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="flex flex-col">
                                    <label for="street">Ulica</label>
                                    <input type="text" id="street" v-model="form.street">
                                    <div v-if="form.errors.street" class="text-red-500">{{ form.errors.street }}
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <label for="postal_code">Kod pocztowy</label>
                                    <input type="text" id="postal_code" v-model="form.postal_code">
                                    <div v-if="form.errors.postal_code" class="text-red-500">
                                        {{ form.errors.postal_code }}
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <label for="city">Miejscowość</label>
                                    <input type="text" id="city" v-model="form.city">
                                    <div v-if="form.errors.city" class="text-red-500">
                                        {{ form.errors.city }}
                                    </div>
                                </div>
                            </div>
                            <div v-if="$page.props.flash.contact_success" class="text-center">
                                {{ $page.props.flash.contact_success }}
                            </div>
                        </form>
                    </div>

                    <div class="flex w-full bg-[#22c55e] px-8 py-4 text-white">
                        <div class="flex-grow">Nazwa</div>
                        <div class="w-1/12 text-center">Ilość</div>
                        <div class="w-1/12 text-center">Cena</div>
                    </div>
                    <div v-for="(item, index) in cart" :key="index"
                        class="flex items-center w-full max-w-6xl bg-green-200 px-8 py-4">
                        <div class="w-5/6">{{ item.name }}</div>
                        <div class="w-1/12 text-center">{{ item.amount }}</div>
                        <div class="w-1/12 text-center">{{ PLN.format(item.price * item.amount) }}</div>
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
                    <Link @click="submit" class="bg-blue-500 text-center px-4 py-2 rounded">
                    Złóż zamówienie
                    </Link>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
