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
// import EmployeeAddButton from "@/Components/EmployeeAddButton.vue";
// import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    filters: Object,
    can:Object,
    users: Object,
    translations: Object,

});

const form = ref({   
    search: props.filters.search,
    trashed: props.filters.trashed,
})

const deleteUser = (id) => {
    router.delete(route("users.destroy", id));   

};

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
    router.get('/users', queryParams, options)
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

const addEmployee = (id) => {
    //add form show
    router.get(route("employees.create", id));   

};
</script>
<template>
    <AuthenticatedLayout  :translations="translations">
        <template #header>
            <h1 class="mb-1 ml-4 text-3xl font-bold">{{ t('users') }}</h1>
        </template>

        <div class="mx-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                            <Head :title="`${t('users')}`" />
                            <!-- <h1 class="mb-8 text-3xl font-bold">Users</h1> -->
                           <div class="flex items-center justify-between mb-6">
                            <search-filter v-model="form.search" :transitions="translations" class="mr-4 w-full max-w-md" @reset="reset">
                                <label class="block text-gray-700">{{ t('trashed:') }}</label>
                                <select v-model="form.trashed" class="form-select mt-1 w-full">
                                <option :value="null" />
                                <option value="with">{{ t('with trashed') }}</option>
                                <option value="only">{{ t('only trashed') }}</option>
                                </select>
                            </search-filter>

                                <Link v-if="can.create_user" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" href="/users/create">
                                    <span>{{ t('create') }}</span>
                                    <span class="hidden md:inline">&nbsp;{{ t('user') }}</span>
                                </Link>
                            </div>

                            <div class="bg-white rounded-md shadow overflow-x-auto">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                <tr class="text-left font-bold">
                                    <th class="pb-4 pt-6 px-6">{{ t('name') }}</th>
                                    <th class="pb-4 pt-6 px-6">{{ t('email') }}</th>
                                    <th class="pb-4 pt-6 px-6">{{ t('Gender') }}</th>
                                    <th class="pb-4 pt-6 px-6">{{ t('marital status') }}</th>
                                    <th class="pb-4 pt-6 px-6">{{ t('mobile') }}</th>
                                    <th v-if="can.create_employee" class="pb-4 pt-6 px-6">+{{ t('employee') }}</th>    
                                    <th class="pb-4 pt-6 px-6">{{ t('delete') }}</th>                                  
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="user in users.data" :key="user.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500" :href="`/users/${user.id}/edit`">
                                            {{ user.name }}
                                            <icon v-if="user.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500" :href="`/users/${user.id}/edit`">
                                            {{ user.email }}
                                            <icon v-if="user.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500" :href="`/users/${user.id}/edit`">
                                            {{ user.gender }}
                                            <icon v-if="user.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500" :href="`/users/${user.id}/edit`">
                                            {{ user.marital_status }}
                                            <icon v-if="user.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-2 focus:text-indigo-500" :href="`/users/${user.id}/edit`">
                                            {{ user.mobile }}
                                            <icon v-if="user.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>

                                    <td v-if="can.create_employee" class="border-t">
                                        
                                        <span v-show="!user.is_employee">
                                            <!-- <employee-add-button  @add="addEmployee(`${user.id}`)">Add to employee</employee-add-button>                       -->
                                            <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" :href="`/employees/create?user_id=${user.id}`">
                                                <span>{{ t('create') }}</span>
                                                <span class="hidden md:inline">&nbsp;{{ t('employee') }}</span>
                                            </Link>
                                        </span>

                                       
                                        
                                    </td>

                                    <td class="border-t">
                                        <delete-button  @delete="deleteUser(`${user.id}`)">Delete</delete-button>                      
                                    </td>

                            

                                </tr>
                                <tr v-if="users.length === 0">
                                    <td class="px-6 py-2 border-t" colspan="4">No users found.</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <pagination class="mt-6" :links="users.links" />
                        </div>
                    <SectionBorder />
                </div>
    </AuthenticatedLayout>
</template>
