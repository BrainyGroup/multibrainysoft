<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CreateEmployeeForm from "@/Pages/Employees/Partials/CreateEmployeeForm.vue";
import { Head } from '@inertiajs/vue3';

// import SectionBorder from "@/Components/SectionBorder.vue";

// import UpdatePasswordForm from "@/Pages/Profile/Partials/UpdatePasswordForm.vue";
// import UpdateProfileInformationForm from "@/Pages/Profile/Partials/UpdateProfileInformationForm.vue";

const props = defineProps({
  user: Object,
  centers: Array,
  levels: Array,
  departments: Array,
  scales: Array,
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
    <AuthenticatedLayout :translations="translations">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-4">
                {{ t('employees') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <Head :title="`${t('create')} ${t('employee')}`" />
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <CreateEmployeeForm  
                    :user="user" 
                    :centers="centers"              
                    :designations="designations" 
                    :banks="banks"                
                    :departments="departments"  
                    :translations="translations"
                    />                    
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>




