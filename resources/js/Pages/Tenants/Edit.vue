<script setup>
import AuthenticatedMainLayout from "@/Layouts/AuthenticatedMainLayout.vue";
import EditTenantForm from "@/Pages/Tenants/Partials/EditTenantForm.vue";

import SectionBorder from "@/Components/SectionBorder.vue";
import { Head } from '@inertiajs/vue3';


defineProps({
  tenant: Object,
  translations: Object,
});
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
                <div>
                    <EditTenantForm :tenant="tenant"  />

                    <SectionBorder />
                </div>

            </div>
        </div>
    </AuthenticatedMainLayout>
</template>
