<script setup>
import AuthenticatedMainLayout from "@/Layouts/AuthenticatedMainLayout.vue";
import EditTenantForm from "@/Pages/Tenants/Partials/EditTenantForm.vue";

import SectionBorder from "@/Components/SectionBorder.vue";
import { Head } from '@inertiajs/vue3';


const props = defineProps({
  tenant: Object,
  translations: Object,
});

//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}
</script>



<template>
    <AuthenticatedMainLayout  :translations="translations">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tenant
            </h2>
        </template>

        <div>
            <Head :title="`${t('edit')} ${t('tenant')}`" />
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <EditTenantForm :tenant="tenant"  />

                    <SectionBorder />
                </div>

            </div>
        </div>
    </AuthenticatedMainLayout>
</template>
