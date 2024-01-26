<script setup>
import { Head } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'

defineProps({
    order: Object,
})
</script>

<template>
    <MainLayout>

        <Head title="Polityka Prywatności" />

        <div class="w-full text-center py-16">
            <h1 class="text-4xl mb-4">Polityka prywatności strony internetowej Pizzeria Pizzarella.pl</h1>
            <p class="mb-4">
                Dziękujemy za odwiedzenie naszej strony internetowej. W Pizzerii Pizzarella.pl dbamy o prywatność naszych
                klientów i użytkowników. Niniejsza Polityka Prywatności ma na celu wyjaśnienie, jak gromadzimy, używamy,
                udostępniamy i chronimy informacje osobiste zbierane podczas korzystania z naszej strony.
            </p>

            <h2>1. Zbierane informacje osobiste:</h2>
            <p>a. Podczas składania zamówienia: Aby zrealizować zamówienie, możemy prosić o podanie pewnych informacji
            osobistych, takich jak imię, nazwisko, adres e-mail, numer telefonu oraz adres dostawy.</p>

            <p>b. Podczas korzystania z witryny: Automatycznie zbieramy pewne informacje, takie jak adres IP, przeglądarka
            internetowa, system operacyjny, czas dostępu oraz strony, na których użytkownik spędza najwięcej czasu.</p>

            <h2>2. Cel zbierania informacji:</h2>
            <p>a. Dostarczanie usług: Informacje zbierane podczas składania zamówienia są wykorzystywane do obsługi i
            realizacji zamówień.</p>

            <p>b. Udoskonalanie witryny: Informacje zbierane automatycznie pomagają nam zrozumieć, jak użytkownicy korzystają z
            naszej strony i umożliwiają nam wprowadzanie ulepszeń.</p>

            <p>c. Marketing i komunikacja: Możemy używać adresu e-mail do przesyłania informacji marketingowych, promocji lub
            aktualności dotyczących naszych produktów i usług. Użytkownik może zrezygnować z otrzymywania tych powiadomień w
            każdej chwili.</p>

            <h2>3. Udostępnianie informacji osobistych:</h2>
            <p>a. Ochrona danych: Zapewniamy, że informacje osobiste naszych klientów są chronione i nie udostępniamy ich
            stronom trzecim bez wyraźnej zgody.</p>

            <p>b. Partnerzy biznesowi: W niektórych przypadkach możemy udostępniać informacje niezbędne do realizacji
            zamówienia partnerom biznesowym, takim jak dostawcy.</p>

            <h2>4. Bezpieczeństwo:</h2>
            <p>Stosujemy odpowiednie środki techniczne i organizacyjne, aby chronić informacje osobiste przed nieuprawnionym
            dostępem, utratą, zmianą lub zniszczeniem.</p>

            <h2>5. Pliki cookie:</h2>
            <p>Używamy plików cookie w celu śledzenia preferencji użytkowników i dostosowywania zawartości strony do ich
            potrzeb. Użytkownik może zarządzać ustawieniami plików cookie w swojej przeglądarce.</p>

            <h2>6. Zmiany w polityce prywatności:</h2>
            <p>Niniejsza Polityka Prywatności może być okresowo aktualizowana. Wprowadzone zmiany będą publikowane na stronie,
            a data ostatniej aktualizacji zostanie zaktualizowana.</p>

            <p>Korzystając z naszej strony internetowej, wyrażasz zgodę na postanowienia zawarte w niniejszej Polityce
            Prywatności. Jeśli masz pytania lub wątpliwości, skontaktuj się z nami pod adresem [adres e-mail kontaktowy].</p>
        </div>

    </MainLayout>
</template>

<style>h1,
h2 {
    color: #333;
}

p {
    color: #555;
}</style>