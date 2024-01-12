<script setup>
import { Head } from '@inertiajs/vue3';
import { fakerPL as faker } from '@faker-js/faker';
import MainLayout from '@/Layouts/MainLayout.vue';
import ContactForm from '@/Components/ContactForm.vue';
</script>

<template>
    <MainLayout>

        <Head title="Kontakt" />


        <div class="flex flex-col gap-4 items-center py-10">
            <h2 class="text-3xl">Kontakt</h2>

            <ContactForm />

            <section class="contact">
                <div class="content-container">
                    <div class="content">
                        <div class="content-box">
                            
                        </div>
                    </div>

                    <div class="google-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d543.625584112978!2d18.21277875620221!3d50.97332807244608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47106120189b1b87%3A0x22389cc67939dcb4!2sMarsza%C5%82ka%20Pi%C5%82sudskiego%2C%2046-200%20Kluczbork!5e0!3m2!1spl!2spl!4v1700144210738!5m2!1spl!2spl"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </section>
        </div>
    </MainLayout>
</template>



<style>
.contact .google-map iframe {
    width: 100%;
    height: 400px;
}


.contact .content-container .content {
    display: flex;
    justify-content: center;
    margin: 30px 0;
    width: 1000px;
}

@media (min-width: 992px) {
    .contact .content-container .content {
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: wrap;
        margin: 50px 0;
    }
}

.contact .content-container .content .content-photo img {
    display: block;
}

.contact .content-container .content .content-box {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    background-color: #22c55e;
}

@media (min-width: 992px) {
    .contact .content-container .content .content-box {
        width: 100%;
        text-align: left;
    }
}

.contact .content-container .content .content-box .text-box {
    padding: 58px;
    color: #fff;
}

.contact .content-container .content .content-box .text-box p {
    margin-top: 20px;
    font-size: 17px;
}
</style>