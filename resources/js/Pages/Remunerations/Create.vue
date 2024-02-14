<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CreateForm from "@/Pages/Remunerations/Partials/CreateForm.vue";
import { Head } from '@inertiajs/vue3';

const props = defineProps({
  translations: Object,
  employee_id: String,
  remuneration_types: String,
  today_date: Date,
  end_date: Date,
  last_name: String,
  first_name: String, 
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
                {{ t('remunerations') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <Head :title="`${t('create')} ${t('remuneration')}`" />
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <CreateForm  class="max-w-xl" :translations="translations" :today_date="today_date" :end_date="end_date" :first_name="first_name" :last_name="last_name" :remuneration_types="remuneration_types" :employee_id="employee_id"/>                  
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
