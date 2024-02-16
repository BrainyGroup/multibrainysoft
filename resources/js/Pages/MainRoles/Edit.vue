<script setup>
import AuthenticatedMainLayout from "@/Layouts/AuthenticatedMainLayout.vue";
import EditRoleForm from "@/Pages/Roles/Partials/EditRoleForm.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import { Head } from '@inertiajs/vue3';


const props = defineProps({
  //   sessions: Array,
  permissions: Array,
  rolePermissions: Object,
  role: Object,
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
                {{ t('roles') }}
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <Head :title="`${t('edit')} ${t('role')}`" />
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <EditRoleForm  :permissions="permissions" :role="role" :rolePermissions="rolePermissions" :translations="translations"  class="max-w-xl" />

                    <SectionBorder />
                </div>

            </div>
        </div>
    </AuthenticatedMainLayout>
</template>
