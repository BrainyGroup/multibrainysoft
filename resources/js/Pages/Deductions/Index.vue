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
  deductions: Object,
  can:Object,
  translations:Object,
  filters: Object,
});

const deleteDeduction = (id) => {
    router.delete(route("deductions.destroy", id));   

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
    router.get('/deductions', queryParams, options)
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
            <h1 class="mb-1 ml-4 text-3xl font-bold">{{ t('deductions') }}</h1>
        </template>

        <div class="mx-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <Head :title="`${t('deductions')}`" />
                            
                           
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
                                    <th class="pb-2 pt-2 px-6">{{ t('#') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('first name') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('last name') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('deduction type') }}</th> 
                                    <th class="pb-2 pt-2 px-6">{{ t('start date') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('end date') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('amount') }}</th>                                  
                                    <th class="pb-2 pt-2 px-6">{{ t('delete') }}</th>  
                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="(deduction, index) in deductions.data" :key="deduction.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t">
                                        <div class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" >
                                            {{ index + 1 }}
                                            <icon v-if="deduction.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </div>
                                    </td>

                                    <td class="border-t">
                                        <div class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" >
                                            {{ deduction.first_name }}
                                            <icon v-if="deduction.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </div>
                                    </td>

                                    <td class="border-t">
                                        <div class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" >
                                            {{ deduction.last_name }}
                                            <icon v-if="deduction.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </div>
                                    </td>

                                    <td class="border-t">
                                        <div class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" >
                                            {{ deduction.deduction_name }}
                                            <icon v-if="deduction.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </div>
                                    </td>

                                    <td class="border-t">
                                        <div class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" >
                                            {{ deduction.start_date}}
                                            <icon v-if="deduction.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </div>
                                    </td>

                                    <td class="border-t">
                                        <div class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" >
                                            {{ deduction.end_date}}
                                            <icon v-if="deduction.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </div>
                                    </td>

                                    <td class="border-t">
                                        <div class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" >
                                            {{ deduction.amount}}
                                            <icon v-if="deduction.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </div>
                                    </td>
                                
                                
                                
                                    <td class="border-t">
                                        <delete-button  @delete="deleteDeduction(`${deduction.id}`)">Delete</delete-button>                      
                                    </td>


                                </tr>
                                <tr v-if="deductions.length === 0">
                                    <td class="px-6 py-4 border-t" colspan="4">No deduction found.</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <pagination class="mt-6" :links="deductions.links" /> 
                        </div>
                    <SectionBorder />
                </div>
    </AuthenticatedLayout>
</template>
