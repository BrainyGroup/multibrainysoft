<script setup>
import { ref, watch } from "vue";
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import Icon from "@/Components/Icon.vue";
import Pagination from "@/Components/Pagination.vue";
import SearchFilter from "@/Components/SearchFilter.vue";
import DeleteButton from "@/Components/DeleteButton.vue";


const props = defineProps({
  pay_statutories: Object,
  can:Object,
  translations:Object,
  filters: Object,
});

const deletePayStatutory = (id) => {
    router.delete(route("pay_statutories.destroy", id));   

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
    router.get('/pay_statutories', queryParams, options)
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
            <h1 class="mb-1 ml-4 text-3xl font-bold">{{ t('pay statutories') }}</h1>
        </template>

        <div class="mx-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"> 
                            <Head :title="`${t('pay statutories')}`" />                           
                           
                           <div class="flex items-center justify-between mb-6">
                                <search-filter v-model="form.search" :transitions="translations" class="mr-4 w-full max-w-md" @reset="reset">
                                    <label class="block text-gray-700">{{ t('trashed:') }}</label>
                                    <select v-model="form.trashed" class="form-select mt-1 w-full">
                                    <option :value="null" />
                                    <option value="with">{{ t('with trashed') }}</option>
                                    <option value="only">{{ t('only trashed') }}</option>
                                    </select>
                                </search-filter>
                                <!-- <Link v-if="can.create_pay_statutory" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" href="/pay_statutories/create">
                                    <span>{{ t('create') }}</span>
                                    <span class="hidden md:inline">&nbsp;{{ t('pay_statutory') }}</span>
                                </Link> -->
                            </div>

                            <div class="bg-white rounded-md shadow overflow-x-auto">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                <tr class="text-left font-bold">
                                    <th class="pb-2 pt-2 px-6">{{ t('first name') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('last name') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('type') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('pay number') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('year') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('month') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('employer') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('employee') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('amount') }}</th>
                                    <th class="pb-2 pt-2 px-2">{{ t('delete') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="pay_statutory in pay_statutories.data" :key="pay_statutory.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pay_statutories/${pay_statutory.id}/edit`">
                                            {{ pay_statutory.first_name }}
                                            <icon v-if="pay_statutory.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pay_statutories/${pay_statutory.id}/edit`">
                                            {{ pay_statutory.last_name }}
                                            <icon v-if="pay_statutory.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pay_statutories/${pay_statutory.id}/edit`">
                                            {{ pay_statutory.allowance_name }}
                                            <icon v-if="pay_statutory.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pay_statutories/${pay_statutory.id}/edit`">
                                            {{ pay_statutory.pay_number }}
                                            <icon v-if="pay_statutory.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pay_statutories/${pay_statutory.id}/edit`">
                                            {{ pay_statutory.year }}
                                            <icon v-if="pay_statutory.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pay_statutories/${pay_statutory.id}/edit`">
                                            {{ pay_statutory.month }}
                                            <icon v-if="pay_statutory.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pay_statutories/${pay_statutory.id}/edit`">
                                            {{ pay_statutory.employee }}
                                            <icon v-if="pay_statutory.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pay_statutories/${pay_statutory.id}/edit`">
                                            {{ pay_statutory.employer }}
                                            <icon v-if="pay_statutory.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pay_statutories/${pay_statutory.id}/edit`">
                                            {{ pay_statutory.amount }}
                                            <icon v-if="pay_statutory.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>
                                
                                    <td class="border-t">
                                        <delete-button  @delete="deletePayllowance(`${pay_statutory.id}`)">{{ t('delete') }}</delete-button>                      
                                    </td>


                                </tr>
                                <tr v-if="pay_statutories.length === 0">
                                    <td class="px-6 py-4 border-t" colspan="4">No pay_statutories found.</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <pagination class="mt-6" :links="pay_statutories.links" /> 
                        </div>
                    <SectionBorder />
                </div>
    </AuthenticatedLayout>
</template>
