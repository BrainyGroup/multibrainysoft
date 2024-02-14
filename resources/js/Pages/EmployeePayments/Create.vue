<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CreateForm from "@/Pages/EmployeePayments/Partials/CreateForm.vue";
import { Head } from '@inertiajs/vue3';
// import YearlyCreateForm from "./Partials/YearlyCreateForm.vue";

const props = defineProps({
    translations: Object,
    employee_id: Number,
    bank_id: Number,
    pay_number: Number,
    first_name: String,
    last_name: String,
    employee_balance: Number
    
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
                {{ t('create payment for ') + first_name + ' ' + last_name}} 
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <Head :title="`${t('create')} ${t('employment type')}`" />
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <CreateForm  class="max-w-xl" :employee_balance="employee_balance" :employee_id="employee_id" :pay_number="pay_number" :bank_id="bank_id" :first_name="first_name" :last_name="last_name" :translations="translations"/>                  
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
