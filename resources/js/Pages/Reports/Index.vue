<script setup>
import { ref, watch } from "vue";
// import { Inertia } from "@inertiajs/inertia";

import { Head, Link, useForm, router} from '@inertiajs/vue3';
// import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
// import Icon from "@/Components/Icon.vue";
// import Pagination from "@/Components/Pagination.vue";
// import SearchFilter from "@/Components/SearchFilter.vue";
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
    max_pay: Number,
    employee_id: Number,
    can:Object,
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
            <h1 class="mb-1 ml-4 text-3xl font-bold">{{ t('reports') }}</h1>
        </template>

        <div class="mx-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                            <Head :title="`${t('reports')}`" />
                            <!-- <h1 class="mb-8 text-3xl font-bold">Employees</h1> -->
                           <div class="flex items-center justify-between mb-6">
<!-- 
                               <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-t  px-4 py-2ransparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" href="/employees">
                                    <span>{{ t('employee') }}</span>
                                    <span class="hidden md:inline">&nbsp;{{ t('list') }}</span>
                                </Link> -->
                            </div>

                            <div class="bg-white rounded-md shadow overflow-x-auto">
                                <div class="flex items-center justify-between">

                                    <div class="p-4  rounded">

                                        <table class="w-full whitespace-nowrap">
                                            <thead>
                                            <tr class="text-left font-bold">
                                                <th class="pb-4 pt-6 px-6">{{ t('Personal') }}</th>                                           
                                                                                 
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
            
                                              <td class="border-t  px-4 py-2"> 
                                                <Link :href="`/reports/pay_details?max_pay=${ max_pay }`" >
                                                    <span>{{ t('pay') }}</span>
                                                    <span class="hidden md:inline">&nbsp;{{ t('details') }}</span>
                                              </Link>  
                                                    
            
                                              </td>                                               
                                            </tr>
            
                                            <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                                <td class="border-t  px-4 py-2">                                       
                                                    <Link :href="`/reports/pay_details?max_pay=${ max_pay }`" >
                                                        <span>{{ t('previous') }}</span>
                                                        <span class="hidden md:inline">&nbsp;{{ t('month') }}</span>
                                                  </Link>    
                                                </td>                                               
                                            </tr>  
                                            
                                            <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                                <td class="border-t  px-4 py-2">                                       
                                                    <Link :href="`/reports/pay_details?max_pay=${ max_pay }`" >
                                                        <span>{{ t('previous') }}</span>
                                                        <span class="hidden md:inline">&nbsp;{{ t('month') }}</span>
                                                  </Link>    
                                                </td>                                               
                                            </tr>  
            
            
                                            <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                                <td class="border-t  px-4 py-2">                                       
                                                    {{ t('allowances') }}     
                                                </td>                                         
                                            </tr>                  
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="p-4  rounded">

                                        <table class="w-full whitespace-nowrap">
                                            <thead>
                                            <tr class="text-left font-bold">
                                                <th class="pb-4 pt-6 px-6">{{ t('Monthly') }}</th>                                                                                 
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
            
                       
                                                <td class="border-t  px-4 py-2"> 
                                                  <Link :href="`/reports/pay_details?max_pay=${ max_pay }`" >
                                                        <span>{{ t('current') }}</span>
                                                        <span class="hidden md:inline">&nbsp;{{ t('month') }}</span>
                                                  </Link>                                                                       
                                                
                                                </td>
                            
                                            </tr>
            
                                            <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                              
                                                <td class="border-t  px-4 py-2"> 
                                                   <Link href="/reports/monthly_create" >
                                                        <span>{{ t('previous') }}</span>
                                                        <span class="hidden md:inline">&nbsp;{{ t('month') }}</span>
                                                </Link>                                   
                                                 
                                                </td>
                                           
                                            </tr>              
            
            
                                            <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                                <td class="border-t  px-4 py-2">                                       
                                                    {{ t('allowances') }}     
                                                </td>
                                                <td class="border-t  px-4 py-2">                                       
                                                         
                                                </td>
                                                <td class="border-t  px-4 py-2"> 
            
                                               </td>
                                            </tr>                              
            
                                            
            
            
                                         
            
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="p-4  rounded">
                                        <table class="w-full whitespace-nowrap">
                                            <thead>
                                            <tr class="text-left font-bold">
                                             
                                                <th class="pb-4 pt-6 px-6">{{ t('Yearly') }}</th>
                                                                                 
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                                    <td class="border-t  px-4 py-2">                                       
                                                        <Link :href="`/reports/pay_details?max_pay=${ max_pay }`" >
                                                            <span>{{ t('current') }}</span>
                                                            <span class="hidden md:inline">&nbsp;{{ t('year') }}</span>
                                                      </Link>    
                                                    </td>                                               
                                                </tr>  
            
                                            <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                               
                                                <td class="border-t  px-4 py-2"> 
                                                    <Link :href="`/reports/pay_details?max_pay=${ max_pay }`" >
                                                        <span>{{ t('previous') }}</span>
                                                        <span class="hidden md:inline">&nbsp;{{ t('year') }}</span>
                                                  </Link>                                       
                                                     
                                               </td>
                                            </tr>              
            
            
                                            <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                               
                                                <td class="border-t  px-4 py-2"> 
                                                    <Link :href="`/reports/pay_details?max_pay=${ max_pay }`" >
                                                        <span>{{ t('statutory') }}</span>
                                                        <span class="hidden md:inline">&nbsp;{{ t('yearly') }}</span>
                                                  </Link> 
            
                                               </td>
                                            </tr>                              
            
                                            
            
            
                                         
            
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                           
                        </div>
                    <SectionBorder />
                </div>
    </AuthenticatedLayout>
</template>
