<script setup>
import { Head } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'

defineProps({
    order: Object,
})
</script>

<template>
    <MainLayout>

        <Head title="Praca" />

        <div class="w-full text-center py-16">
            <h1 class="text-4xl mb-4">Praca w Pizzarelli</h1>
            <p class="mb-4">
                Witamy na stronie poświęconej ofertom pracy w naszej renomowanej pizzerii Pizzarella! Jesteśmy dumni z
                naszej
                pasji do tworzenia doskonałych pizz i dostarczania niezapomnianych doznań kulinaranych naszym klientom.
                Jeżeli
                podzielasz naszą miłość do dobrej kuchni i chcesz dołączyć do zespołu, to świetnie trafiłeś!
                Dlaczego warto pracować w Pizzarelli?
            </p>

            <h2>1. Rodzinna atmosfera</h2>
            <p>Nasza pizzeria to nie tylko miejsce pracy, ale także rodzina. Doceniamy każdego pracownika i dbamy o przyjazną
            atmosferę, która sprzyja efektywnej współpracy.</p>

            <h2>2. Pasja do kulinariów</h2>
            <p>Jeśli uwielbiasz gotować i chcesz rozwijać swoje umiejętności kulinarne, to Pizzarella to idealne miejsce dla
            Ciebie. Nasza kuchnia to miejsce, gdzie tworzymy prawdziwe dzieła sztuki kulinarniej.</p>

            <h2>3. Elastyczne godziny</h2>
            <p>Zależy nam na tym, aby nasi pracownicy mieli możliwość dostosowania godzin pracy do swoich potrzeb. Dbamy o
            równowagę między pracą a życiem prywatnym.</p>

            <h2>4. Możliwość rozwoju zawodowego</h2>
            <p>Oferujemy szereg szkoleń i programów rozwojowych, które pomagają naszym pracownikom zdobywać nowe umiejętności i
            rozwijać się zawodowo.</p>

            <h2 class="text-4xl pt-8 pb-4">Aktualne oferty pracy</h2>

            <h2>1. Kucharz/Kucharka</h2>
            <p>Poszukujemy osoby z doświadczeniem w przygotowywaniu pizzy i potraw kuchni włoskiej. Jeżeli masz smykałkę do
            kulinariów i chciałbyś dołączyć do naszego zespołu, czekamy na Twoje zgłoszenie.</p>

            <h2>2. Obsługa klienta</h2>
            <p>Jeśli masz charyzmę, lubisz pracować z ludźmi i masz doświadczenie w obszarze obsługi klienta, to może to być
            praca właśnie dla Ciebie! Oferujemy szkolenia w zakresie obsługi kasy i dbania o satysfakcję klienta.</p>

            <h2 class="text-4xl pt-8 pb-4">Jak aplikować?</h2>
            <p>Jeśli jesteś zainteresowany/a jedną z naszych ofert pracy, prześlij swoje CV wraz z krótkim listem motywacyjnym
            na adres e-mail: praca@pizzarella.pl.</p>
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
}</style>