<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import EditEmployeeForm from "@/Pages/Employees/Partials/EditEmployeeForm.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import { Head } from '@inertiajs/vue3';


const props = defineProps({
    user: Object,
    employee: Object,
    salary: Object,
    centers: Array,
    levels: Array,
    departments: Array,
    scales: Object,
    designations: Array,
    banks: Array,
    statutories: Array,
    translations: Object,
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
                {{ t('users') }}
            </h2>
        </template>

        <div>
            <Head :title="`${t('edit')} ${t('employee')}`" />
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div>
                    <EditEmployeeForm  
                    :user="user" 
                    :centers="centers"             
                    :designations="designations" 
                    :banks="banks"                   
                    :employee="employee"
                    :departments="departments"               
                    :translations="translations"
                    :salary="salary"
                    />

                    <SectionBorder />
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
