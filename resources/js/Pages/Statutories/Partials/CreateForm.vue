<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const idInput = ref(null);

const props = defineProps({
  translations: Object, 
  statutory_types: Array,
  organizations: Array,
  salary_bases: Array,

});

const form = useForm({
    name: '',
    description: '',   
    statutory_type_id:'', 
    organization_id:'', 
    base_id:'', 
    before_paye: 'yes',
    selection: '',
    mandatory: '',
    employee:'',
    employer: '',
    date_required:'',   
});

const createStatutory = () => {
    form.post(route('statutories.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.id) {              
                nameInput.value.focus();
            }
        },
    });
};



//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">{{ t('add') }} {{ t('statutory') }} </h2>    
        </header>

        <form @submit.prevent="createStatutory" class="mt-6 space-y-6">

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" :value="`${ t('name') }`" />

                <TextInput
                    id="name"
                    ref="nameInput"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="name"
                />

                <InputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="description" :value="`${ t('description') }`" />

                <TextInput
                    id="description"
                    ref="descriptionInput"
                    v-model="form.description"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="description"
                />

                <InputError :message="form.errors.description" class="mt-2" />
            </div>

            <div>
                <InputLabel for="organization_id" :value="`${ t('organization') }`" />
                <select
                v-model="form.organization_id"
                :error="form.errors.organization_id"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Bank"
                required
                >
                     <option v-for="organization in organizations" :key="organization.id" :value="organization.id">{{ organization.name }}</option>
             </select>
            </div>

            <div>
                <InputLabel for="base_id" :value="`${ t('salary base') }`" />
                <select
                v-model="form.base_id"
                :error="form.errors.base_id"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Bank"
                required
                >
                     <option v-for="salary_base in salary_bases" :key="salary_base.id" :value="salary_base.id">{{ salary_base.name }}</option>
             </select>
            </div>

            <div>
                <InputLabel for="statutory_type_id" :value="`${ t('statutory type') }`" />
                <select
                v-model="form.statutory_type_id"
                :error="form.errors.statutory_type_id"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Bank"
                required
                >
                     <option v-for="statutory_type in statutory_types" :key="statutory_type.id" :value="statutory_type.id">{{ statutory_type.name }}</option>
             </select>
            </div>

            <div>
                <InputLabel for="selection" :value="`${ t('selection') }`" />
                <select
                v-model="form.selection"
                :error="form.errors.selection"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Bank"
                required
                >
                     <option value="1">{{ t('yes') }}</option>
                     <option value="0">{{ t('no') }}</option>
             </select>
            </div>

            <div>
                <InputLabel for="mandatory" :value="`${ t('mandatory') }`" />
                <select
                v-model="form.mandatory"
                :error="form.errors.mandatory"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Bank"
                required
                >
                     <option value="1">{{ t('yes') }}</option>
                     <option value="0">{{ t('no') }}</option>
             </select>
            </div>


            <div>
                <InputLabel for="before_paye" :value="`${ t('before paye') }`" />
                <select
                v-model="form.before_paye"
                :error="form.errors.before_paye"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Bank"
                required
                >
                     <option value="1">{{ t('yes') }}</option>
                     <option value="0">{{ t('no') }}</option>
             </select>
            </div>
   

  
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="employee_ratio" :value="`${ t('employee ratio') }`" />

                <TextInput
                    id="employee_ratio"
                    ref="employee_ratioInput"
                    v-model="form.employee"
                    type="number"
                    min=0 
                    max=0.9999999999 
                    step="any"
                    class="mt-1 block w-full"
                    autocomplete="employee_ratio"
                />

                <InputError :message="form.errors.employee_ratio" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="employer_ratio" :value="`${ t('employer ratio') }`" />

                <TextInput
                    id="employer_ratio"
                    ref="employer_ratioInput"
                    v-model="form.employer"
                    type="number" 
                    min=0 
                    max=0.9999999999 
                    step="any"
                    class="mt-1 block w-full"
                    autocomplete="employer_ratio"
                />

                <InputError :message="form.errors.employer_ratio" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="due_date" :value="`${ t('due date') }`" />

                <TextInput
                    id="due_date"
                    ref="due_dateInput"
                    v-model="form.date_required"
                    type="date"
                    class="mt-1 block w-full"
                    autocomplete="due_date"
                />

                <InputError :message="form.errors.due_date" class="mt-2" />
            </div>

    
            
          <!-- statutory_types -->




            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">{{ t('save') }}</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">{{ t('save') }}.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
