<script setup>
import { ref, watch } from "vue";
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import Icon from "@/Components/Icon.vue";
import Pagination from "@/Components/Pagination.vue";
import SearchFilter from "@/Components/SearchFilter.vue";
// import DeleteButton from "@/Components/DeleteButton.vue";


const props = defineProps({
  nets: Object,
  max_pay: Number,
  net_total: Number,
  net_balance: Number,
  net_paid: Number,
  translations:Object,
  filters: Object,
});

const deleteNet = (id) => {
    router.delete(route("nets.destroy", id));   

};

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
    router.get('/nets', queryParams, options)
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
    
    <AuthenticatedLayout  :translations="translations">
        <template #header>
            <h1 class="mb-1 ml-4 text-3xl font-bold">{{ t('net pays for') }} {{ max_pay }}</h1>
        </template>

        <div class="mx-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <Head :title="`${t('nets')}`" />                          
                           
                           <div class="flex items-center justify-between mb-6">
                                <search-filter v-model="form.search" :transitions="translations" class="mr-4 w-full max-w-md" @reset="reset">
                                    <label class="block text-gray-700">{{ t('trashed:') }}</label>
                                    <select v-model="form.trashed" class="form-select mt-1 w-full">
                                    <option :value="null" />
                                    <option value="with">{{ t('with trashed') }}</option>
                                    <option value="only">{{ t('only trashed') }}</option>
                                    </select>
                                </search-filter>

                            </div>

                            <div class="bg-white rounded-md shadow overflow-x-auto">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                <tr class="text-left font-bold">
                                    <th class="pb-2 pt-2 px-6">{{ t('pay') }}#</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('first name') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('last name') }}</th>
                            
                                    <th class="pb-2 pt-2 px-2">{{ t('bank') }} #</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('account') }} #</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('net') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('paid') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('balance') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('slip') }}</th>                                 </tr>
                                </thead>
                                <tbody>
                                <tr v-for="net in nets.data" :key="net.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/nets/${net.id}/edit`">
                                            {{ net.id }}
                                            <icon v-if="net.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/nets/${net.id}/edit`">
                                            {{ net.first_name }}
                                            <icon v-if="net.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/nets/${net.id}/edit`">
                                            {{ net.last_name }}
                                            <icon v-if="net.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/nets/${net.id}/edit`">
                                            {{ net.bank_name }}
                                            <icon v-if="net.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/nets/${net.id}/edit`">
                                            {{ net.account_number }}
                                            <icon v-if="net.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/nets/${net.id}/edit`">
                                            {{ net.net}}
                                            <icon v-if="net.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>                      

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/nets/${net.id}/edit`">
                                            {{ net.net_paid }}
                                            <icon v-if="net.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/employee_payments/create?employee_id=${net.employee_id}&pay_number=${net.pay_number}&employee_balance=${net.net_balance}`">
                                            {{ net.net_balance }}
                                            <icon v-if="net.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pays/slip_download?pay_id=${net.id}`">
                                            slip
                                            <icon v-if="net.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    
                                                   



                                </tr>
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t px-6 py-2 ">
                                        {{ t('total') }}
                                    </td>
                                    <td class="border-t">
                                    </td>
                                    <td class="border-t">
                                    </td>
                                    <td class="border-t">
                                    </td>
                                    <td class="border-t">
                                        {{ net_total }}
                                    </td>
                                    <td class="border-t px-6 py-2">
                                        {{ net_paid }}
                                    </td>
                                    <td class="border-t px-6 py-2 text-sm">
                                        {{ net_balance }}
                                    </td>

                                </tr>
                                <tr v-if="nets.length === 0">
                                    <td class="px-6 py-4 border-t" colspan="4">No pays found.</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <pagination class="mt-6" :links="nets.links" /> 
                        </div>
                    <SectionBorder />
                </div>
    </AuthenticatedLayout>
</template>
