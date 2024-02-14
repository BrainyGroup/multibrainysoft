<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const idInput = ref(null);

const props = defineProps({
  remuneration: Object,
  remuneration_types: Object,
  remuneration_type_id:Number,
  translations: Object,
});

//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}

const form = useForm({
  _method: "PUT",
     amount: props.remuneration.amount,
    start_date: props.remuneration.start_date, 
    end_date: props.remuneration.end_date,   
    employee_id: props.remuneration.employee_id,   
    remuneration_type_id:props.remuneration.statutory_id
});

const updateRemuneration = () => {
    form.post(route('remunerations.update', props.remuneration.id), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.id) {                 
                idInput.value.focus();
            }
        },
    });
};

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">{{ t('edit') }} {{ t('remuneration type') }}</h2>

        </header>

        <form @submit.prevent="updateRemuneration" class="mt-6 space-y-6">
            <div>
                <InputLabel for="remuneration_type_id" :value="`${ t('allowance type') }`" />
                <select
                v-model="form.remuneration_type_id"
                :error="form.errors.remuneration_type_id"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Bank"
                required
                >
                     <option v-for="remuneration_type in remuneration_types" :key="remuneration_type.id" :value="remuneration_type.id">{{ remuneration_type.name }}</option>
             </select>
            </div>
            <div>
                <InputLabel for="start_date" :value="`${ t('start_date') }`" />

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

            <div>
                <InputLabel for="end_date" :value="`${ t('end_date') }`" />

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
            
          <!-- remuneration -->



            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">{{ t('save') }}</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">{{ t('saved') }}.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
