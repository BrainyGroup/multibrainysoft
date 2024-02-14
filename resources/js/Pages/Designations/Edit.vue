<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import EditForm from "@/Pages/Designations/Partials/EditForm.vue";
import { Head } from '@inertiajs/vue3';

const props = defineProps({
  designation: Object,
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
                {{ t('designation') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <Head :title="`${t('edit')} ${t('designation')}`" />
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <EditForm :designation="designation" :translations="translations" :scales="scales" :levels="levels" class="max-w-xl" />                   
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
