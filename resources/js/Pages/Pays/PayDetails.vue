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
  pays: Object,
  max_pay: Number,
  can:Object,
  translations:Object,
  filters: Object,
});

const deletePay = (id) => {
    router.delete(route("pays.destroy", id));   

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
    router.get('/pays', queryParams, options)
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
            <h1 class="mb-1 ml-4 text-3xl font-bold">{{ t('pay details for') }} {{ max_pay }}</h1>
        </template>

        <div class="mx-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                            <Head :title="`${t('pay details')}`" />
                           
                           <div class="flex items-center justify-between mb-6">
                                <search-filter v-model="form.search" :transitions="translations" class="mr-4 w-full max-w-md" @reset="reset">
                                    <label class="block text-gray-700">{{ t('trashed:') }}</label>
                                    <select v-model="form.trashed" class="form-select mt-1 w-full">
                                    <option :value="null" />
                                    <option value="with">{{ t('with trashed') }}</option>
                                    <option value="only">{{ t('only trashed') }}</option>
                                    </select>
                                </search-filter>
                                <Link v-if="can.create_pay" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" href="/pays/create">
                                    <span>{{ t('create') }}</span>
                                    <span class="hidden md:inline">&nbsp;{{ t('pay') }}</span>
                                </Link>
                            </div>

                            <div class="bg-white rounded-md shadow overflow-x-auto">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                <tr class="text-left font-bold">
                                    <th class="pb-2 pt-2 px-6">{{ t('first name') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('last name') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('run date') }}</th>
                                    <th class="pb-2 pt-2 px-2">{{ t('pay') }} #</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('basic salary') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('allowance') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('gross') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('taxable pay') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('paye') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('earning') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('deduction') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('net') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('paid') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('net balance') }}</th>
                                    <!-- <th class="pb-2 pt-2 px-6">{{ t('slip') }}</th> -->
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="pay in pays.data" :key="pay.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pays/${pay.id}/edit`">
                                            {{ pay.first_name }}
                                            <icon v-if="pay.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pays/${pay.id}/edit`">
                                            {{ pay.last_name }}
                                            <icon v-if="pay.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pays/${pay.id}/edit`">
                                            {{ pay.run_date }}
                                            <icon v-if="pay.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pays/${pay.id}/edit`">
                                            {{ pay.pay_number }}
                                            <icon v-if="pay.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pays/${pay.id}/edit`">
                                            {{ pay.basic_salary }}
                                            <icon v-if="pay.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pays/${pay.id}/edit`">
                                            {{ pay.allowance }}
                                            <icon v-if="pay.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pays/${pay.id}/edit`">
                                            {{ pay.gloss }}
                                            <icon v-if="pay.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pays/${pay.id}/edit`">
                                            {{ pay.taxable }}
                                            <icon v-if="pay.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pays/${pay.id}/edit`">
                                            {{ pay.paye }}
                                            <icon v-if="pay.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pays/${pay.id}/edit`">
                                            {{ pay.monthly_earning }}
                                            <icon v-if="pay.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pays/${pay.id}/edit`">
                                            {{ pay.deduction }}
                                            <icon v-if="pay.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pays/${pay.id}/edit`">
                                            {{ pay.net }}
                                            <icon v-if="pay.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pays/${pay.id}/edit`">
                                            {{ pay.net_paid }}
                                            <icon v-if="pay.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pays/${pay.id}/edit`">
                                            {{ pay.net_balance }}
                                            <icon v-if="pay.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <!-- <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/pays/pay_slip?pay_id = ${pay.id}`">
                                            slip
                                            <icon v-if="pay.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td> -->
                                



                                </tr>
                                <tr v-if="pays.length === 0">
                                    <td class="px-6 py-4 border-t" colspan="4">No pays found.</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <pagination class="mt-6" :links="pays.links" /> 
                        </div>
                    <SectionBorder />
                </div>
    </AuthenticatedLayout>
</template>
