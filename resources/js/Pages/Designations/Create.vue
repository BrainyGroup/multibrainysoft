<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CreateForm from "@/Pages/Designations/Partials/CreateForm.vue";
import { Head } from '@inertiajs/vue3';

const props = defineProps({
  translations: Object,
  levels: Array,
  scales: Array,
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
                {{ t('designations') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <Head :title="`${t('create')} ${t('designation')}`" />
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <CreateForm  class="max-w-xl" :translations="translations" :scales="scales" :levels="levels"/>                  
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
