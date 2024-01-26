<script setup>
import { Head } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'

defineProps({
    order: Object,
})
</script>

<template>
    <MainLayout>

        <Head title="Regulamin" />

        <div class="w-full text-center py-16">
            <h1 class="text-4xl mb-4">Regulamin Strony Internetowej Pizzerii Pizzarella.pl</h1>

            <h2>§ 1 Postanowienia ogólne</h2>

            <p>1.1. Niniejszy regulamin określa zasady korzystania z witryny internetowej Pizzerii Pizzarella.pl, dostępnej
                pod
                adresem www.pizzarella.pl.</p>

            <p>1.2. Korzystanie z witryny jest równoznaczne z akceptacją postanowień niniejszego regulaminu.</p>

            <h2>§ 2 Definicje</h2>

            <p>2.1. Pizzeria Pizzarella.pl – właściciel strony internetowej, świadczący usługi gastronomiczne,
                zarejestrowany
                pod adresem [adres firmy] oraz posiadający NIP [numer NIP] i REGON [numer REGON].</p>

            <p>2.2. Użytkownik – osoba fizyczna lub prawna korzystająca z witryny internetowej Pizzerii Pizzarella.pl.</p>

            <p>2.3. Strona internetowa – witryna dostępna pod adresem www.pizzarella.pl.</p>

            <h2>§ 3 Zasady korzystania</h2>

            <p>3.1. Użytkownik zobowiązuje się do korzystania z witryny zgodnie z obowiązującym prawem, zasadami moralności
            oraz postanowieniami niniejszego regulaminu.</p>

            <p>3.2. Zakazane jest dostarczanie treści o charakterze nielegalnym, obraźliwym, naruszającym prawa autorskie,
            propagującym przemoc, nienawiść lub dyskryminację.</p>

            <p>3.3. Pizzeria Pizzarella.pl zastrzega sobie prawo do monitorowania treści zamieszczanych na stronie oraz
            usuwania ich w przypadku naruszenia postanowień regulaminu.</p>

            <h2>§ 4 Zamówienia online</h2>

            <p>4.1. Witryna umożliwia składanie zamówień online.</p>

            <p>4.2. Użytkownik zobowiązuje się do podawania prawdziwych danych kontaktowych oraz dostarczania rzetelnych
            informacji przy składaniu zamówienia.</p>

            <p>4.3. Pizzeria Pizzarella.pl zastrzega sobie prawo do odmowy realizacji zamówienia w przypadku braku dostępności
            produktów, błędów systemowych lub innych nieprzewidzianych okoliczności.</p>

            <h2>§ 5 Reklamacje</h2>

            <p>5.1. Wszelkie reklamacje dotyczące zamówień online lub korzystania z witryny internetowej należy składać na
            adres e-mailowy [adres e-mail] w terminie 14 dni od daty wystąpienia problemu.</p>

            <p>5.2. Pizzeria Pizzarella.pl zobowiązuje się do rozpatrzenia reklamacji w terminie 30 dni od daty jej otrzymania.</p>

            <h2>§ 6 Postanowienia końcowe</h2>

            <p>6.1. Pizzeria Pizzarella.pl zastrzega sobie prawo do zmiany niniejszego regulaminu.</p>

            <p>6.2. Zmiany w regulaminie wchodzą w życie z chwilą opublikowania ich na stronie internetowej.</p>

            <p>6.3. W sprawach nieuregulowanych niniejszym regulaminem zastosowanie mają przepisy prawa polskiego.</p>
        </div>

    </MainLayout>
</template>

<style>
h1,
h2 {
    color: #333;
}

p {
    color: #555;
}
</style>