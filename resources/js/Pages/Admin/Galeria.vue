<script setup>
import { ref, toRefs, onMounted } from 'vue';
import { useForm, Head, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({ images: Array });

const input = ref(null);

const form = useForm({
    image: null,
});

const addImage = () => {
    input.value.click();
};

const removeImage = (image) => {
    console.log(image);
    router.delete(`/photos/${image}`);
};

const onImageFileChanged = () => {
    form.post('/photos', {
        accept: 'application/json',
    });
};
</script>

<template>
    <AdminLayout>

        <Head title="Galeria" />

        <div class="flex flex-col gap-8 items-center py-10">
            <div class="w-full max-w-7xl">

                <form @submit.prevent="submit">
                    <input type="file" ref="input" @input="form.image = $event.target.files[0]"
                        @change="onImageFileChanged($event)" accept="image/*" style="display:none" />
                    <!-- <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                    </progress> -->
                </form>

                <div class="flex gap-2 mb-4">
                    <button class="bg-green-500 text-white px-4 py-2 rounded" @click="addImage"
                        :disabled="form.processing">Dodaj zdjęcie</button>
                </div>
                <div class="text-center w-full bg-blue-500 p-4 text-white font-bold text-2xl">
                    Galeria
                </div>
                <div class="flex flex-wrap justify-center gap-5 w-full bg-white p-8">
                    <div v-for="image in images" class="flex flex-col items-center gap-2 border border-gray-700 p-2">
                        <img :src="'/storage/' + image" alt="Zdjęcie" class="max-w-[200px]">
                        <button class="bg-red-500 text-white px-4 py-2 rounded" @click="removeImage(image)">Usuń</button>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
