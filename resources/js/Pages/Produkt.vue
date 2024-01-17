<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import { PLN } from '@/utils';
import MainLayout from '@/Layouts/MainLayout.vue';

const props = defineProps({
    product: Object,
    addons: Array
});

const product = ref(props.product);

const options = [
    { name: "Mała", price: product.value.small },
    { name: "Średnia", price: product.value.medium },
    { name: "Duża", price: product.value.big },
];

const popupOpen = ref(true);
const selectedOption = ref(options[0]);
const selectedAddons = ref([]);

const openPopup = () => {
    popupOpen.value = true;
    document.body.style.overflow = "hidden";
};

const closePopup = () => {
    popupOpen.value = false;
    document.body.style.overflow = "";
};

const calculateAddonsPrice = (addons) => {
    if (addons.length === 0) return 0;

    addons = JSON.parse(JSON.stringify(addons));
    return addons.reduce((p, c) => { return p + Number(c[0].price) }, 0);
};

const calculateAddons = (addons) => {
    const price = calculateAddonsPrice(addons);

    let text = "";
    if (addons.length === 1) {
        text = "dodatek"
    }
    else if (addons.length >= 2 && addons.length <= 4) {
        text = "dodatki";
    } else {
        text = "dodatków";
    }

    return `${addons.length} ${text} - ${PLN.format(price)}`;
};
</script>

<template>
    <MainLayout>

        <Head title="Pizza" />

        <div class="flex flex-col gap-8 items-center py-10">
            <div class="flex gap-4 w-full max-w-6xl bg-[#22c55e] p-8 text-white">
                <img :src="'/storage/products/' + product.id + '.png'" :alt="product.name" class="max-w-[600px]">
                <div class="flex flex-col flex-grow">
                    <h3 class="text-5xl mb-4 text-white text-center">{{ product.name }}</h3>
                    <div class="text-center mb-4">{{ product.description }}</div>

                    <div class="mb-1 ">Rozmiar</div>
                    <select v-model="selectedOption" name="rozmiar" id="rozmiar" class="text-black mb-6">
                        <option v-for="option in options" :value="option" @click="selectedOption = option">
                            {{ option.name }} - {{ PLN.format(option.price) }}
                        </option>
                    </select>

                    <div class="mb-1 ">Dodatki</div>
                    <div class="flex items-center justify-between mb-6 gap-2">
                        <div class="flex bg-white px-[12px] py-[8px] grow border border-black">
                            <div v-if="selectedAddons.length === 0" class="text-black">
                                Bez dodatków
                            </div>
                            <div v-if="selectedAddons.length > 0" class="text-black">
                                {{ calculateAddons(selectedAddons.map((id) => addons.filter(addon => addon.id === id))) }}
                            </div>
                        </div>
                        <div class="bg-white text-[#22c55e] px-[12px] py-[8px] cursor-pointer border border-black"
                            @click="openPopup">Wybierz</div>
                    </div>

                    <div class="text-4xl self-center">Cena: {{ PLN.format(Number(selectedOption.price) +
                        calculateAddonsPrice(selectedAddons.map((id) => addons.filter(addon => addon.id === id)))) }}</div>
                    <a href="/menu"
                        class="self-center bg-white text-[#22c55e] text-2xl text-center font-bold p-2 mt-6">ZAMÓW</a>
                </div>
            </div>
        </div>

        <div class="popup" :class="{ 'popup--active': popupOpen }" @click.self="closePopup">
            <div class="popup__inner">
                <div v-for="option in addons" class="flex items-center gap-2">
                    <input type="checkbox" :name="`addon_${option.id}`" :id="`addon_${option.id}`" :value="option.id"
                        v-model="selectedAddons">
                    <label :for="`addon_${option.id}`">{{ option.name }} {{ PLN.format(option.price) }}</label>
                </div>
                <div class="popup__close" @click="closePopup">X</div>
            </div>
        </div>
    </MainLayout>
</template>


<style>
.popup {
    display: none;
    position: fixed;
    align-items: center;
    justify-content: center;
    position: absolute;
    background: rgba(0, 0, 0, 0.6);
    top: 0;
    width: 100%;
    height: 100vh;
}

.popup--active {
    display: flex;
}

.popup__inner {
    position: relative;
    background: #22c55e;
    padding: 15px;
}

.popup__close {
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    background: red;
    color: white;
    top: 0;
    right: 0;
    height: 30px;
    width: 30px;
    cursor: pointer;
}
</style>