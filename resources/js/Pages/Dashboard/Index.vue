<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';



const props = defineProps({
  translations:Object,
  can:Object,
});

//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}

</script>

<template>
    
   

    <AuthenticatedLayout  :translations="translations">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ t('dashboard') }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Head :title="`${t('dashboard')}`" />
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="text-gray-900">
                        <div class="flex flex-row items-center gap-2   flex-wrap">
                            <div class="w-48 h-20 bg-white shadow hover:shadow-lg border-solid border-l-8 border-red-600 p-4 text-center">
                                01
                            </div>
                            <div class="w-48 h-20 bg-white shadow hover:shadow-lg border-solid border-l-8 border-red-600 p-4 text-center ">
                                023
                            </div>
                            <div class="w-48 h-20 bg-white shadow hover:shadow-lg border-solid border-l-8 border-red-600 p-4 text-center">
                                03
                            </div>
                            <div class="w-48 h-20 bg-white shadow hover:shadow-lg border-solid border-l-8 border-red-600 p-4 text-center">
                                03
                            </div>
                            <div class="w-48 h-20 bg-white shadow hover:shadow-lg border-solid border-l-8 border-red-600 p-4 text-center">
                                03
                            </div>
                            <div class="w-48 h-20 bg-white shadow hover:shadow-lg border-solid border-l-8 border-red-600 p-4 text-center">
                                03
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
