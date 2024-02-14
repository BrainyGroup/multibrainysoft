<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CreateForm from "@/Pages/PreviousStatutories/Partials/CreateForm.vue";
import { Head } from '@inertiajs/vue3';

const props = defineProps({
  translations: Object,
  employee_id: String,
  statutory_id: String,
  today_date: Date,
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
                {{ t('previous contribution') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <Head :title="`${t('create')} ${t('previous contribution')}`" />
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <CreateForm  class="max-w-xl" :translations="translations" :employee_id="employee_id" :statutory_id="statutory_id" :today_date="today_date" />                  
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
