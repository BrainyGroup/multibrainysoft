<script setup>
import { ref, watch } from "vue";
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import Icon from "@/Components/Icon.vue";
import Pagination from "@/Components/Pagination.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SearchFilter from "@/Components/SearchFilter.vue";
import DeleteButton from "@/Components/DeleteButton.vue";


const props = defineProps({
  payes: Object,
  can:Object,
  translations:Object,
  filters: Object,
});

const deletePaye = (id) => {
    router.delete(route("payes.destroy", id));   

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
    router.get('/payes', queryParams, options)
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
            <h1 class="mb-1 ml-4 text-3xl font-bold">{{ t('payes') }}</h1>
        </template>

        <div class="mx-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <Head :title="`${t('payes')}`" />                            
                           
                           <div class="flex items-center justify-between mb-6">
                                <search-filter v-model="form.search" :transitions="translations" class="mr-4 w-full max-w-md" @reset="reset">
                                    <label class="block text-gray-700">{{ t('trashed:') }}</label>
                                    <select v-model="form.trashed" class="form-select mt-1 w-full">
                                    <option :value="null" />
                                    <option value="with">{{ t('with trashed') }}</option>
                                    <option value="only">{{ t('only trashed') }}</option>
                                    </select>
                                </search-filter>

                                <Link v-if="can.create_paye" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" href="/payes/create">
                                    <span>{{ t('create') }}</span>
                                    <span class="hidden md:inline">&nbsp;{{ t('paye') }}</span>
                                </Link>
                            </div>

                            <div class="bg-white rounded-md shadow overflow-x-auto">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                <tr class="text-left font-bold">
                                    <th class="pb-2 pt-2 px-6">{{ t('country') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('minimum') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('muximum') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('ratio') }}</th>
                                    <th class="pb-2 pt-2 px-6">{{ t('offset') }}</th>
                                    <th class="pb-2 pt-2 px-2">{{ t('delete') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="paye in payes.data" :key="paye.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/payes/${paye.id}/edit`">
                                            {{ paye.country_name }}
                                            <icon v-if="paye.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/payes/${paye.id}/edit`">
                                            {{ paye.minimum }}
                                            <icon v-if="paye.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/payes/${paye.id}/edit`">
                                            {{ paye.maximum }}
                                            <icon v-if="paye.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/payes/${paye.id}/edit`">
                                            {{ paye.ratio }}
                                            <icon v-if="paye.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500 text-sm" :href="`/payes/${paye.id}/edit`">
                                            {{ paye.offset }}
                                            <icon v-if="paye.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>
                                
                                    <td class="border-t">
                                        <delete-button  @delete="deletePaye(`${paye.id}`)">Delete</delete-button>                      
                                    </td>


                                </tr>
                                <tr v-if="payes.length === 0">
                                    <td class="px-6 py-4 border-t" colspan="4">No payes found.</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <pagination class="mt-6" :links="payes.links" /> 
                        </div>
                    <SectionBorder />
                </div>
    </AuthenticatedLayout>
</template>
