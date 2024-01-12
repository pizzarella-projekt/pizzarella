<script setup>
import { router, useForm } from '@inertiajs/vue3';

const form = useForm({
    contact_name: null,
    contact_email: null,
    contact_message: null,
});

function submit() {
    form.post('/kontakt');
};
</script>

<template>
    <div class="flex gap-4 w-full max-w-[1000px] bg-green-200 p-8">
        <div class="flex flex-col gap-2">
            <p>Marszałka Piłsudskiego 6</p>
            <p>46-200 Kluczbork</p>
            <p>kontakt@pizzarella.pl</p>
            <p>+48 751 921 321</p>
        </div>
        <form @submit.prevent="submit" class="flex flex-col gap-4 w-full">
            <div class="flex gap-4">
                <div class="flex flex-col">
                    <label for="contact_name">Imię i nazwisko</label>
                    <input type="text" id="contact_name" v-model="form.contact_name">
                    <div v-if="form.errors.contact_name" class="text-red-500">{{ form.errors.contact_name }}</div>
                </div>
                <div class="flex flex-col">
                    <label for="contact_email">Adres email</label>
                    <input type="text" id="contact_email" v-model="form.contact_email">
                    <div v-if="form.errors.contact_email" class="text-red-500">{{ form.errors.contact_email }}</div>
                </div>
            </div>
            <div class="flex flex-col">
                <label for="contact_message">Wiadomość</label>
                <textarea id="contact_message" v-model="form.contact_message"></textarea>
                <div v-if="form.errors.contact_message" class="text-red-500">{{ form.errors.contact_message }}</div>
            </div>
            <button type="submit" :disabled="form.processing" class="bg-green-500 text-white px-4 py-2 rounded">
                Wyślij wiadomość
            </button>
            <div v-if="$page.props.flash.contact_success" class="text-center">
                {{ $page.props.flash.contact_success }}
            </div>
        </form>
    </div>
</template>