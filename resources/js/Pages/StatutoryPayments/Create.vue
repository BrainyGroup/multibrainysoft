<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CreateForm from "@/Pages/StatutoryPayments/Partials/CreateForm.vue";
import { Head } from '@inertiajs/vue3';
// import YearlyCreateForm from "./Partials/YearlyCreateForm.vue";

const props = defineProps({
  translations: Object,
  statutory_balance: Number,
  statutory_id: Number,
  statutory_name:String,
  max_pay: Number,
  statutory_balance: Number
//   months: Array,
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
                {{ t('create payment') }} 
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <Head :title="`${t('create')} ${t('statutory payment')}`" />
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <CreateForm  class="max-w-xl" :statutory_balance="statutory_balance" :statutory_id="statutory_id" :statutory_name="statutory_name" :max_pay="max_pay" :translations="translations"/>                  
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
