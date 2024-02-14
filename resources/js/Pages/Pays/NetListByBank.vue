<script setup>
import { ref, watch } from "vue";
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import Icon from "@/Components/Icon.vue";
// import Pagination from "@/Components/Pagination.vue";
// import SearchFilter from "@/Components/SearchFilter.vue";
// import DeleteButton from "@/Components/DeleteButton.vue";


const props = defineProps({
  net_list_by_banks: Object,
  max_pay: String,
  net_total: String,
  net_balance: String,
  net_paid: String,
  bank_name: String,

  employee_id: Number,
  pay_number: Number,  
  balance: Number,
  translations:Object,
  filters: Object,
});



const form = ref({
    id: null,
    search: props.filters.search,
    trashed: props.filters.trashed,
})

let timerId = null

watch(form, function (newForm) {
  clearTimeout(timerId)
  timerId = setTimeout(() => {
    const queryParams = {}
    for (const key in newForm) {
      if (newForm[key] !== null) {
        queryParams[key] = newForm[key]
      }
    }
    const options = { preserveState: true }
    router.get('/pays/net_list_by_bank', queryParams, options)
  }, 150)
}, { deep: true })

const reset = () => {
  for (const key in form.value) {
    form.value[key] = null
  }
}

//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}

</script>
<template>
    <AuthenticatedLayout :translations="translations">
        <template #header>
            <h1 class="mb-1 ml-4 text-3xl font-bold">{{ t('net pays for ')  + bank_name + t(' for ') +  + max_pay }}</h1>
        </template>

        <div class="mx-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                            <Head :title="`${t('net by bank')}`" />
                           
                           <div class="flex items-center justify-between mb-6">
                                <!-- <search-filter v-model="form.search" :transitions="translations" class="mr-4 w-full max-w-md" @reset="reset">
                                    <label class="block text-gray-700">{{ t('trashed:') }}</label>
                                    <select v-model="form.trashed" class="form-select mt-1 w-full">
                                    <option :value="null" />
                                    <option value="with">{{ t('with trashed') }}</option>
                                    <option value="only">{{ t('only trashed') }}</option>
                                    </select>
                                </search-filter> -->

                            </div>

                            <div class="bg-white rounded-md shadow overflow-x-auto">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                <tr class="text-left font-bold">
                                    <th class="pb-2 pt-2 px-6">{{ t('first name') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('last name') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('account') }}#</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('amount') }}</th>
                            
                                    <th class="pb-2 pt-2 px-2">{{ t('paid') }} #</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('balance') }}</th>

                                    <!-- <th class="pb-2 pt-2 px-6">{{ t('paid') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('balance') }}</th>                                 -->
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="net_list_by_bank in net_list_by_banks.data" :key="net_list_by_bank.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t px-6 py-2 text-sm">                                       
                                            {{ net_list_by_bank.first_name }}
                                            <icon v-if="net_list_by_bank.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />                                      
                                    </td>

                                    <td class="border-t px-6 py-2 text-sm">                                       
                                        {{ net_list_by_bank.last_name }}
                                        <icon v-if="net_list_by_bank.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />                                      
                                    </td>

                                    <td class="border-t px-6 py-2 text-sm">
                                        
                                            {{ net_list_by_bank.account_number }}
                                            <icon v-if="net_list_by_bank.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                      
                                    </td>  

                                    <td class="border-t px-6 py-2 text-sm">
                                            {{ net_list_by_bank.amount }}
                                            <icon v-if="net_list_by_bank.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />                                      
                                    </td>

                                    <td class="border-t px-6 py-2 text-sm">                                        
                                            {{ net_list_by_bank.paid }}
                                            <icon v-if="net_list_by_bank.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />                                       
                                    </td>

                                    <td class="border-t"> 
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/employee_payments/create?employee_id=${net_list_by_bank.employee_id}&pay_number=${net_list_by_bank.pay_number}&employee_balance=${net_list_by_bank.balance}`">                                     
                                            {{ net_list_by_bank.balance}}
                                            <icon v-if="net_list_by_bank.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />  
                                        </Link>

                                    </td>

                    

                                   
                                



                                </tr>
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t px-6 py-2 ">
                                        {{ t('total') }}
                                    </td>
                                    <td class="border-t px-6 py-2">
                                      
                                    </td>
                                    <td class="border-t px-6 py-2">
                                      
                                    </td>
                                    <td class="border-t px-6 py-2">
                                        {{ net_total}}
                                    </td>
                                    <td class="border-t px-6 py-2">
                                        {{ net_paid}}
                                    </td>
                              
                                    <td class="border-t px-6 py-2 text-sm">
                                        {{ net_balance }}
                                    </td>
                                </tr>
                                <tr v-if="net_list_by_banks.length === 0">
                                    <td class="px-6 py-4 border-t" colspan="4">No pays found.</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <!-- <pagination class="mt-6" :links="net_list_by_banks.links" />  -->
                        </div>
                    <SectionBorder />
                </div>
    </AuthenticatedLayout>
</template>
