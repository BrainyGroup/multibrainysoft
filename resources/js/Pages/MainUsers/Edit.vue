<script setup>
import AuthenticatedMainLayout from "@/Layouts/AuthenticatedMainLayout.vue";
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
    <AuthenticatedMainLayout :translations="translations">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-4">
                {{ t('users') }}
            </h2>
        </template>

        <div>
            <Head :title="`${t('edit')} ${t('user')}`" />
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div>
                    <EditUserForm  :roles="roles" :user="user" :userRoles="userRoles" :translations="translations"/>

                    <SectionBorder />
                </div>

            </div>
        </div>
    </AuthenticatedMainLayout>
</template>
