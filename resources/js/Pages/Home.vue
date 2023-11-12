<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const products = [
    { name: "Pizza Margherita", image: "gallery-img1.jpg" },
    { name: "Pizza Pepperoni", image: "gallery-img2.jpg" },
    { name: "Pizza Hawajska", image: "gallery-img3.jpg" },
    { name: "Pizza Margherita", image: "gallery-img1.jpg" },
    { name: "Pizza Pepperoni", image: "gallery-img2.jpg" },
    { name: "Pizza Hawajska", image: "gallery-img3.jpg" },
];
</script>

<template>
    <MainLayout>

        <Head title="Strona główna" />

        <div class="banner">
            <div class="flex flex-col text-white ">
                <div class="text-5xl">PIZZERIA <span class="text-cyan-500">PIZZARELLA</span></div>
                <div class="text-3xl">Najwyższa forma smaku!</div>
            </div>
        </div>

        <div class="flex flex-col gap-8 items-center py-10">
            <h2 class="text-3xl">Nasze produkty</h2>
            <div class="grid grid-cols-3 gap-5">
                <template v-for="product in products">
                    <div class="flex flex-col gap-3">
                        <img :src="'/images/' + product.image" :alt="product.name" class="w-128 h-64" />
                        <div class="text-center font-bold text-xl">{{ product.name }}</div>
                        <div class="self-center bg-green-500 text-white text-center p-2">ZAMÓW</div>
                    </div>
                </template>
            </div>
        </div>

        <div class="flex flex-col gap-8 items-center py-10 bg-green-500 text-white">
            <h2 class="text-3xl">Kontakt</h2>
            <div class="flex gap-5 items-center justify-center w-full max-w-6xl px-6">
                <div class="contact-form">
                    <form action="#">
                        <div class="user-details">
                            <input type="text" name="name" placeholder="Imię" required>
                        </div>
                        <div class="user-details">
                            <input type="text" name="last-name" placeholder="Nazwisko" required>
                        </div>
                        <div class="user-details">
                            <input type="email" name="email" placeholder="E-mail" required>
                        </div>
                        <div class="user-details">
                            <input type="password" name="password" placeholder="Hasło" required>
                        </div>
                        <div class="button">
                            <button type="submit" value="Wyślij">Wyślij</button>
                        </div>
                    </form>
                </div>
                <div class="google-map">
                    <iframe
                        src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<style>
.banner {
    display: flex;
    align-items: center;
    font-weight: bold;
    background: url('../../images/pizza-banner.jpg') no-repeat center center;
    background-size: cover;
    min-height: 80vh;
    padding-left: 100px;
}

.contact-form,
.google-map {
    display: flex;
    justify-content: center;
    width: 100%
}

.contact-form form {
    display: flex;
    justify-content: center;
    flex-direction: column;
    width: 100%;
}

.contact-form form input {
    color: white;
    margin: 10px 0;
    width: 100%;
}

.contact-form form textarea {
    width: 100%;
}

.contact-form form a {
    text-decoration: none;
    color: #09053d;
    line-height: 30px;
}

.contact-form .user-details input {
    border: none;
    border-bottom: 2px solid #09053d;
    background: none;
    outline: none;
    font-size: 15px;
    width: 100%;
}

.contact-form .button {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 10px 0;
}

.contact-form .button button {
    width: 100%;
    border: none;
    outline: none;
    background-color: #09053d;
    color: #fff;
    font-size: 15px;
    height: 35px;
}

.contact-form .button button:hover {
    cursor: pointer;
    background-color: #1409a7;
}

.google-map iframe {
    width: 100%;
    height: 400px;
}
</style>
