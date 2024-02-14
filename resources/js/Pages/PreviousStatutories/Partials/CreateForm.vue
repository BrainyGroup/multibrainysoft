<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const idInput = ref(null);

const form = useForm({
    amount: '',
    start_date: props.today_date, 
    end_date: props.today_date,   
    employee_id: props.employee_id,
    statutory_id: props.statutory_id,
});

const createPreviousStatutory = () => {
    form.post(route('previous_statutories.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.id) {              
                nameInput.value.focus();
            }
        },
    });
};

const props = defineProps({
  translations: Object,
  employee_id: String,
  statutory_id: String,
  today_date: Date,
});

//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">{{ t('create') }} {{ t('previous contribution') }}</h2>    
        </header>

        <form @submit.prevent="createPreviousStatutory" class="mt-6 space-y-6">
            <div>
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

            <div>
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


            

    
            
          <!-- previous_statutories -->




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
