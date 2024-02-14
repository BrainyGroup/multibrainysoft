<script setup>
import { ref, watch } from "vue";
// import { Inertia } from "@inertiajs/inertia";

import { Head, Link, useForm, router} from '@inertiajs/vue3';
// import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
// import Icon from "@/Components/Icon.vue";
// import DeleteButton from "@/Components/DeleteButton.vue";
// import Pagination from "@/Components/Pagination.vue";
// import ActionMessage from "@/Components/ActionMessage.vue";
// import FormSection from "@/Components/FormSection.vue";
// import InputError from "@/Components/InputError.vue";
// import InputLabel from "@/Components/InputLabel.vue";
// import PrimaryButton from "@/Components/PrimaryButton.vue";
// import SecondaryButton from "@/Components/SecondaryButton.vue";
// import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    pay: Object,
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
            <h1 class="mb-1 ml-4 text-3xl font-bold">{{ t('pay') }}</h1>
        </template>

        <div class="mx-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                            <Head :title="`${t('pay')}`" />
                            <h1 class="mb-8 text-3xl font-bold">Pay</h1>
                           <div class="flex items-center justify-between mb-6">

                                <Link v-if="can.create_pay" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-t  px-4 py-2ransparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" href="/pays/create">
                                    <span>{{ t('New') }}</span>
                                    <span class="hidden md:inline">&nbsp;{{ t('Pay') }}</span>
                                </Link>

                                <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-t  px-4 py-2ransparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" href="/pays/create">
                                    <span>{{ t('Previous') }}</span>
                                    <span class="hidden md:inline">&nbsp;{{ t('Pay') }}</span>
                                </Link>
                            </div>

                            <div class="bg-white rounded-md shadow overflow-x-auto">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                    <tr class="text-left font-bold">
                                        <th class="pb-4 pt-6 px-6">{{ t('name') }}</th>
                                        <th class="pb-4 pt-6 px-6">{{ t('amount') }}</th>
                                        <th class="pb-4 pt-6 px-6">{{ t('paid') }}</th>
                                        <th class="pb-4 pt-6 px-6">{{ t('balance') }}</th>
                                        <th class="pb-4 pt-6 px-6">{{ t('details') }}</th>                                                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('total') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ pay.total }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                   <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                   <td class="border-t  px-4 py-2">
                                    <a href="/reports/pay_details?max_pay=`${$max_pay}`">{{ t('details') }}  </a>                                       
                                         
                                   </td>
                                </tr>                       
                             
                                </tbody>
                            </table>
                            </div>
                           
                        </div>
                    <SectionBorder />
                </div>
    </AuthenticatedLayout>
</template>
