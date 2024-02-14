<script setup>
import { ref, watch } from "vue";
// import { Inertia } from "@inertiajs/inertia";

import { Head, Link, useForm, router} from '@inertiajs/vue3';
// import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import Icon from "@/Components/Icon.vue";
import Pagination from "@/Components/Pagination.vue";
import SearchFilter from "@/Components/SearchFilter.vue";
import DeleteButton from "@/Components/DeleteButton.vue";
// import Pagination from "@/Components/Pagination.vue";
// import ActionMessage from "@/Components/ActionMessage.vue";
// import FormSection from "@/Components/FormSection.vue";
// import InputError from "@/Components/InputError.vue";
// import InputLabel from "@/Components/InputLabel.vue";
// import PrimaryButton from "@/Components/PrimaryButton.vue";
// import SecondaryButton from "@/Components/SecondaryButton.vue";
// import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    filters: Object,
    can:Object,
    employees: Object,
    translations: Object,

});

const form = ref({   
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
    router.get('/employees', queryParams, options)
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

const deleteEmployee = (id) => {
    router.delete(route("employees.destroy", id));   

};
</script>
<template>
    
    <AuthenticatedLayout  :translations="translations">
        <template #header>
            <h1 class="mb-1 ml-4 text-3xl font-bold">{{ t('employees') }}</h1>
        </template>

        <div class="mx-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <Head :title="`${t('employees')}`" />
                            
                            <!-- <h1 class="mb-8 text-3xl font-bold">Employees</h1> -->
                           <div class="flex items-center justify-between mb-6">
                            <search-filter v-model="form.search" :transitions="translations" class="mr-4 w-full max-w-md" @reset="reset">
                                <label class="block text-gray-700">{{ t('trashed:') }}</label>
                                <select v-model="form.trashed" class="form-select mt-1 w-full">
                                <option :value="null" />
                                <option value="with">{{ t('with trashed') }}</option>
                                <option value="only">{{ t('only trashed') }}</option>
                                </select>
                            </search-filter>
                                <!-- <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" href="/employees/create">
                                    <span>{{ t('create') }}</span>
                                    <span class="hidden md:inline">&nbsp;{{ t('employee') }}</span>
                                </Link> -->
                            </div>

                            <div class="bg-white rounded-md shadow overflow-x-auto">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                <tr class="text-left font-bold">
                                    <th class="pb-4 pt-6 px-6">{{ t('identity') }}</th>
                                    <th class="pb-4 pt-6 px-6">{{ t('designation') }}</th>
                                    <th class="pb-4 pt-6 px-6">{{ t('user') }}</th>
                                    <th class="pb-4 pt-6 px-6">{{ t('center') }}</th>
                                    <th class="pb-4 pt-6 px-6">{{ t('department') }}</th> 
                                    <th class="pb-4 pt-6 px-6">{{ t('salary') }}</th>
                                    
                                    <th class="pb-4 pt-6 px-6">{{ t('tin') }}</th>
                                    <th class="pb-4 pt-6 px-6">{{ t('bank') }}</th>
                                    <th class="pb-4 pt-6 px-6">{{ t('account number') }}</th>
                                    
                                    <th class="pb-4 pt-6 px-6">{{ t('start date') }}</th>
                                    <th class="pb-4 pt-6 px-6">{{ t('expected retired date') }}</th> 

                                    <th class="pb-4 pt-6 px-6">{{ t('delete') }}</th>                                  
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="employee in employees.data" :key="employee.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500" :href="`/employees/${employee.id}`">
                                            {{ employee.identity }}
                                            <icon v-if="employee.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500" :href="`/employees/${employee.id}`">
                                            {{ employee.designation_name }}
                                            <icon v-if="employee.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500" :href="`/employees/${employee.id}`">
                                            {{ employee.full_name }}
                                            <icon v-if="employee.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500" :href="`/employees/${employee.id}`">
                                            {{ employee.center_name }}
                                            <icon v-if="employee.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500" :href="`/employees/${employee.id}`">
                                            {{ employee.department_name }}
                                            <icon v-if="employee.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500" :href="`/employees/${employee.id}`">
                                            {{ employee.salary_amount }}
                                            <icon v-if="employee.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500" :href="`/employees/${employee.id}`">
                                            {{ employee.tin }}
                                            <icon v-if="employee.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500" :href="`/employees/${employee.id}`">
                                            {{ employee.bank_name }}
                                            <icon v-if="employee.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500" :href="`/employees/${employee.id}`">
                                            {{ employee.account_number }}
                                            <icon v-if="employee.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>



                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500" :href="`/employees/${employee.id}`">
                                            {{ employee.start_date }}
                                            <icon v-if="employee.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500" :href="`/employees/${employee.id}`">
                                            {{ employee.end_date }}
                                            <icon v-if="employee.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <delete-button  @delete="deleteEmployee(`${employee.id}`)">Delete</delete-button>                      
                                    </td>

                                </tr>
                                <tr v-if="employees.length === 0">
                                    <td class="px-6 py-2 border-t" colspan="4">No employees found.</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <pagination class="mt-6" :links="employees.links" />
                        </div>
                    <SectionBorder />
                </div>
    </AuthenticatedLayout>
</template>
