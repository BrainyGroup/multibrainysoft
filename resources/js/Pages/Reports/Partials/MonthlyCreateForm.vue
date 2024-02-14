<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const idInput = ref(null);

const form = useForm({
    month: '',
    year:'',  
    
});

const createMonthlyPay = () => {
    form.get(route('reports.monthly_summary'), {
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
  years: Array,
  months: Array,
});

//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">{{ t('create') }} {{ t('paye') }}</h2>    
        </header>

        <form @submit.prevent="createMonthlyPay" class="mt-6 space-y-6">

            <div>
                <select
                v-model="form.year"
                :error="form.errors.year"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Bank"
                required
                >
                     <option v-for="(year, index) in years" :key="index" :value="year">{{ year }}</option>
             </select>
            </div>

            <div>
                <select
                v-model="form.month"
                :error="form.errors.month"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Bank"
                required
                >
                     <option v-for="(month, index) in months" :key="index" :value="month.month">{{ month.month }}</option>
             </select>
            </div>
            
  

       

     

    

            

    
            
          <!-- payes -->




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
