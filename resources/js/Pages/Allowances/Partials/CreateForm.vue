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
  employee: Object,
  allowance_types: Array,
  today_date: Date,
  end_date: Date,
  last_name: String,
  first_name: String, 
});

const form = useForm({
    name: props.first_name + ' ' + props.last_name,
    employee_id: props.employee.id,
    amount:'',
    allowance_type_id:'', 
    start_date: props.today_date,
    end_date: props.end_date,    
});

const createAllowance = () => {
    form.post(route('allowances.store'), {
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
            <h2 class="text-lg font-medium text-gray-900">{{ t('add') }} {{ t('allowance') }} for {{ first_name}} {{ last_name}}</h2>    
        </header>

        <form @submit.prevent="createAllowance" class="mt-6 space-y-6">

            <div>
                <InputLabel for="allowance_type_id" :value="`${ t('allowance type') }`" />
                <select
                v-model="form.allowance_type_id"
                :error="form.errors.allowance_type_id"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Bank"
                required
                >
                     <option v-for="allowance_type in allowance_types" :key="allowance_type.id" :value="allowance_type.id">{{ allowance_type.name }}</option>
             </select>
            </div>
   

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="amount" :value="`${ t('amount') }`" />

                <TextInput
                    id="amount"
                    ref="amountInput"
                    v-model="form.amount"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="amount"
                />

                <InputError :message="form.errors.amount" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="start_date" :value="`${ t('start date') }`" />

                <TextInput
                    id="start_date"
                    ref="start_dateInput"
                    v-model="form.start_date"
                    type="date"
                    class="mt-1 block w-full"
                    autocomplete="start_date"
                />

                <InputError :message="form.errors.start_date" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="end_date" :value="`${ t('end date') }`" />

                <TextInput
                    id="end_date"
                    ref="end_dateInput"
                    v-model="form.end_date"
                    type="date"
                    class="mt-1 block w-full"
                    autocomplete="end_date"
                />

                <InputError :message="form.errors.end_date" class="mt-2" />
            </div>

    
            
          <!-- allowance_types -->




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
