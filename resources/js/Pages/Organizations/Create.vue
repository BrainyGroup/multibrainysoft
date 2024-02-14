<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CreateForm from "@/Pages/Organizations/Partials/CreateForm.vue";
import { Head } from '@inertiajs/vue3';

const props = defineProps({
  translations: Object,
  banks: Array,
  statutory_types: Array,
});

//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}
</script>

<template>
    <AuthenticatedLayout  :translations="translations">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-4">
                {{ t('organizations') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <Head :title="`${t('create')} ${t('organization')}`" />
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <CreateForm  class="max-w-xl" :banks="banks" :statutory_types="statutory_types" :translations="translations"/>                  
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
