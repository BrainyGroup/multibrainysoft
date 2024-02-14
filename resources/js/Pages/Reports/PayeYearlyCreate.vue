<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import YearlyCreateForm from "@/Pages/Reports/Partials/YearlyCreateForm.vue";
import { Head } from '@inertiajs/vue3';
// import YearlyCreateForm from "./Partials/YearlyCreateForm.vue";

const props = defineProps({
  translations: Object,
  years: Array,
  months: Array,
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
                {{ t('monthly pay') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <Head :title="`${t('paye yearly create')}`" />
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <YearlyCreateForm  class="max-w-xl" :years="years"   :translations="translations"/>                  
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
