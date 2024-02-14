<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import EditUserForm from "@/Pages/Users/Partials/EditUserForm.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import { Head } from '@inertiajs/vue3';



const props = defineProps({
  //   sessions: Array,
  roles: Array,
  userRoles: Object,
  user: Object,
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
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <Head :title="`${t('edit')} ${t('user')}`" />
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <EditUserForm  :roles="roles" :user="user" :userRoles="userRoles" :translations="translations"  class="max-w-xl"/>

                    <SectionBorder />
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
