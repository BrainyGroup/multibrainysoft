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

import EditButton from "@/Components/EditButton.vue";

// import SecondaryButton from "@/Components/SecondaryButton.vue";
// import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    pays: Array,
    month_gross: String,
    month_net: String,
    month_paye: String,
    month_gross: String,
    statutories: Array,
    pay_number: Number,
    deduction_sum: String,
    isPosted: Boolean,
    month_net_balance: String,
    month_paid: Number,
    month_paye_paid: Number,
    month_paye_balance: String,
    total: String,
    can:Object,
    translations: Object,
});


//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}

const form = useForm({
  _method: "PUT",
  pay_number: props.pay_number,

});

// const postPay1 = (id) => {
//     router.put(route("pays.destroy", id)); 
// };
// https://www.freecodecamp.org/news/how-to-format-number-as-currency-in-javascript-one-line-of-code/
// let USDollar = new Intl.NumberFormat('en-US', {
//     style: 'currency',
//     currency: 'TZS',
// })

const postPay = (id) => {
   
    form.post(route('pays.post', id), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.id) {              
                nameInput.value.focus();
            }
        },
    });
};




</script>
<template>
    
    <AuthenticatedLayout  :translations="translations">
        <template #header>
            <!-- <h1 class="mb-1 ml-4 text-3xl font-bold">{{ t('pay') }}</h1> -->
            <h1 class="mb-8 text-3xl font-bold">{{ t('payroll summary') }} {{ pay_number }}</h1>
        </template>

        <div class="mx-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <Head :title="`${t('payroll summary')}`" />
                           
                            <!-- <h3 class="mb-8 text-3xl font-bold">{{ t('payroll summary') }} {{ pay_number }}</h3> -->
                           <div class="flex items-center justify-between mb-6">

                                <Link v-if="can.create_pay" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-t  px-6 py-2 transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" href="/pays/create">
                                    <span>{{ t('New') }}</span>
                                    <span class="hidden md:inline">&nbsp;{{ t('Pay') }}</span>
                                </Link>

                                <Link class="inline-flex items-center px-6 py-2 bg-gray-800 border border-t  px-6 py-2 transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" href="/reports/monthly_create">
                                    <span>{{ t('Previous') }}</span>
                                    <span class="hidden md:inline">&nbsp;{{ t('Pay') }}</span>
                                </Link>
                            </div>

                            <div class="bg-white rounded-md shadow overflow-x-auto">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                    <tr v-if="isPosted" class="text-left font-bold bg-green-200 hover:bg-green-100 focus-within:bg-green-100">
                                        <th class="pb-4 pt-6 px-6">{{ t('name') }}</th>
                                        <th class="pb-4 pt-6 px-6">{{ t('amount') }}</th>
                                        <th class="pb-4 pt-6 px-6">{{ t('paid') }}</th>
                                        <th class="pb-4 pt-6 px-6">{{ t('balance') }}</th>
                                        <th class="pb-4 pt-6 px-6">{{ t('details') }}</th>                                                                        
                                    </tr>

                                    <tr v-else class="text-left font-bold bg-red-200 hover:bg-red-100 focus-within:bg-red-100">
                                        <th class="pb-4 pt-6 px-6">{{ t('name') }}</th>
                                        <th class="pb-4 pt-6 px-6">{{ t('amount') }}</th>
                                        <th class="pb-4 pt-6 px-6">{{ t('paid') }}</th>
                                        <th class="pb-4 pt-6 px-6">{{ t('balance') }}</th>
                                        <th class="pb-4 pt-6 px-6">{{ t('details') }}</th>                                                                        
                                    </tr>
                                </thead>
                                <tbody>

                                
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t px-6 py-2">                                       
                                        {{ t('total') }}     
                                    </td>
                                    <td class="border-t px-6 py-2">                                       
                                        {{ total }}      
                                    </td>
                                    <td class="border-t px-6 py-2">                                       
                                         
                                   </td>
                                   <td class="border-t px-6 py-2">                                       
                                         
                                   </td>
                                   <td class="border-t px-6 py-2">
                                    <Link :href="`/pays/pay_details?pay_number=${pay_number}`">{{ t('details') }}  </Link>                                       
                                         
                                   </td>
                                </tr> 
                                
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t px-6 py-2">                                       
                                        {{ t('gross') }}     
                                    </td>
                                    <td class="border-t px-6 py-2">                                       
                                        {{ month_gross }}      
                                    </td>
                                    <td class="border-t px-6 py-2">                                       
                                         
                                   </td>
                                   <td class="border-t px-6 py-2">                                       
                                         
                                   </td>
                                   <td class="border-t px-6 py-2">                                  
                                         
                                   </td>
                                </tr>  

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t px-6 py-2">                                       
                                        {{ t('paye') }}     
                                    </td>
                                    <td class="border-t px-6 py-2">                                       
                                        {{ month_paye }}      
                                    </td>
                                    <td class="border-t px-6 py-2"> 
                                        {{ month_paye_paid }}                                       
                                         
                                   </td>
                                   <td class="border-t px-6 py-2"> 
                                    <Link :href="`/statutory_payments/create?pay_number=${pay_number}&statutory_id=${9999}&statutory_balance=${month_paye_balance}`">{{ month_paye_balance }}</Link>                                      
                                         
                                   </td>
                                   
                                   <td class="border-t px-6 py-2">  
                                    <Link :href="`/reports/paye?pay_number=${pay_number}`">{{ t('details') }}</Link>                                
                                         
                                   </td>
                                </tr> 

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t px-6 py-2">                                       
                                        {{ t('deduction') }}     
                                    </td>
                                    <td class="border-t px-6 py-2">                                       
                                        {{ deduction_sum }}      
                                    </td>
                                    <td class="border-t px-6 py-2">                                       
                                         
                                   </td>
                                   <td class="border-t px-6 py-2"> 
                                   
                                         
                                   </td>
                                   <td class="border-t px-6 py-2">  
                                                              
                                         
                                   </td>
                                </tr> 

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t px-6 py-2">                                       
                                        
                                        <Link :href="`/pays/nets?pay_number=${ pay_number }`">{{ t('net') }} </Link>    
                                    </td>
                                    <td class="border-t px-6 py-2">                                       
                                        {{ month_net }}      
                                    </td>
                                    <td class="border-t px-6 py-2"> 
                                        {{ month_net - month_net_balance }}                                       
                                         
                                   </td>
                                   <td class="border-t px-6 py-2"> 
                                    <Link :href="`/pays/net_by_bank?pay_number=${ pay_number }`">{{ month_net_balance }}</Link>                                      
                                         
                                   </td>
                                   <td class="border-t px-6 py-2">  
                                    <Link :href="`/pays/net_by_bank?pay_number=${ pay_number }`">{{ t('net by bank') }} </Link>                                
                                         
                                   </td>
                                </tr> 

                                <tr v-for="statutory in statutories" :key="statutory.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t px-6 py-2">                                       
                                        {{ statutory.statutory_name }}     
                                    </td>
                                    <td class="border-t px-6 py-2">                                       
                                        {{ statutory.total_amount }}      
                                    </td>
                                    <td class="border-t px-6 py-2">
                                        
                                        {{ statutory.total_amount - statutory.balance  }} 
                                         
                                   </td>
                                   <td v-if="statutory.balance > 0" class="border-t px-6 py-2"> 
                                   
                                    <Link :href="`/statutory_payments/create?pay_number=${ pay_number }&statutory_id=${ statutory.statutory_id }&statutory_balance=${statutory.balance}`">{{ statutory.balance }}</Link>
                                   </td>

                                   <td v-else class="border-t px-6 py-2"> 
                                    {{ statutory.balance }}                                      
                                         
                                   </td>

                                   <td class="border-t px-6 py-2">  
                                    <Link :href="`/pays/statutory_list?pay_number=${ pay_number}&statutory_id=${statutory.statutory_id}`">{{ t('details') }}</Link>
                                                              
                                         
                                   </td>
                                </tr> 

                                
                                <tr v-if="isPosted" class="hover:bg-green-100 focus-within:bg-green-100 bg-green-200">
                                    <td class="border-t px-6 py-2" colspan="5">                                       
                                        {{ t('posted') }}     
                                    </td>
                                </tr> 
                                
                                <tr v-else class="hover:bg-red-100 focus-within:bg-red-100 bg-red-200">
                                    <td class="border-t px-6 py-2" colspan="5">                                       
                                        {{ t('do you want to post?') }}   
                                        <edit-button  @edit="postPay(`${ pay_number }`)">Yes Post Now</edit-button>  
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
