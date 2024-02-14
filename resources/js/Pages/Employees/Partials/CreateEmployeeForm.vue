<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const nameInput = ref(null);

const props = defineProps({
    user: Object,
    centers: Array,   
    departments: Array,    
    designations: Array,
    banks: Array,
    statutories: Array,
    translations: Object,
});

//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}

const form = useForm({
    user_id: props.user.id,
    full_name: props.user.first_name + ' ' +  props.user.last_name,
    start_date: '2023-11-02',
    salary_amount: '100000',
    center_id: null,   
    account_number: '33333',
    tin: '1111',
    bank_id: null,
    designation_id: null,       
    department_id: null,
});

const createEmployee = () => {
    form.post(route('employees.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.name) {
                // form.reset('password', 'password_confirmation');
                console.log('error');
                nameInput.value.focus();
            }

        },
    });
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">{{ t('create')}} {{ t('employee')}}</h2>        
        </header>

        <form @submit.prevent="createEmployee" class="mt-6 space-y-6">

            <div>
                <InputLabel for="full_name" :value="`${ t('full name')}`" />
                <TextInput
                    id="full_name"
                    v-model="form.full_name"
                    type="text"
                    class="mt-1 block w-full"
                    disabled              
                  
                />
                <InputError class="mt-2" :message="form.errors.full_name" />
            </div>

            <div>
                <InputLabel for="tin" :value="`${ t('tin')}`" />
                <TextInput
                    id="tin"
                    v-model="form.tin"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="tin"
                />
                <InputError class="mt-2" :message="form.errors.tin" />
            </div>

            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="start_date" :value="`${ t('start date')}`" />
                <TextInput
                    id="start_date"
                    v-model="form.start_date"
                    type="date"
                    class="mt-1 block w-full"
                    required
                    autocomplete="start_date"
                />
                <InputError class="mt-2" :message="form.errors.start_date" />
            </div>

            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="salary_amount" :value="`${ t('salary amount')}`" />
                <TextInput
                    id="salary_amount"
                    v-model="form.salary_amount"
                    type="number"
                    class="mt-1 block w-full"
                    required
                    autocomplete="salary_amount"
                />
                <InputError class="mt-2" :message="form.errors.salary_amount" />
            </div>

            <div>
                <InputLabel for="bank" :value="`${ t('bank')}`" />
                <select
                v-model="form.bank_id"
                :error="form.errors.bank_id"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Bank"
                required
                > 
                     <option v-for="bank in banks" :key="bank.id" :value="bank.id">{{ bank.name }}</option>
             </select>
            </div>

            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="account_number" :value="`${ t('account number')}`" />
                <TextInput
                    id="account_number"
                    v-model="form.account_number"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="account_number"
                />
                <InputError class="mt-2" :message="form.errors.account_number" />
            </div> 
            
            <div>
                <InputLabel for="department" :value="`${ t('department')}`" />
                <select
                v-model="form.department_id"
                :error="form.errors.department_id"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Department"
                required
                >
                     <option v-for="department in departments" :key="department.id" :value="department.id">{{ department.name }}</option>
             </select>
            </div>

            <div>
                <InputLabel for="designation" :value="`${ t('designation')}`" />
                <select
                v-model="form.designation_id"
                :error="form.errors.designation_id"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Bank"
                required
                >
                     <option v-for="designation in designations" :key="designation.id" :value="designation.id">{{ designation.name }}</option>
             </select>
            </div>

            <div>
                <InputLabel for="center" :value="`${ t('center')}`" />
                <select
                v-model="form.center_id"
                :error="form.errors.center_id"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Bank"
                required
           
               
                >
               
                     <option v-for="center in centers" :key="center.id" :value="center.id">{{ center.name }}</option>
             </select>
            </div>





           


            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
