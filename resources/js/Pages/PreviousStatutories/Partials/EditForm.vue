<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const idInput = ref(null);

const props = defineProps({
  previous_statutory: Object,
  translations: Object,

});

//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}

const form = useForm({
  _method: "PUT",
    amount: props.previous_statutory.amount,
    start_date: props.previous_statutory.start_date, 
    end_date: props.previous_statutory.end_date,   
    employee_id: props.previous_statutory.employee_id,
    statutory_id: props.previous_statutory.statutory_id,
});

const updatePreviousStatutory = () => {
    form.post(route('previous_statutories.update', props.previous_statutory.id), {
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

        <form @submit.prevent="updatePreviousStatutory" class="mt-6 space-y-6">
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


            

    
            
          <!-- previous_statutory -->



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
