<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const idInput = ref(null);



const createStatutoryPayment = () => {
    form.post(route('statutory_payments.store'), {
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
  statutory_id: Number,
  statutory_name:String,
  max_pay: Number,
  statutory_balance: Number
});

const form = useForm({
    statutory_id: props.statutory_id,
    pay_number: props.max_pay, 
    balance: props.statutory_balance,  
    paid: props.statutory_balance,     
});

//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">{{ t('create payment for ') }} {{ statutory_name }} - {{ max_pay }}</h2>    
        </header>

        <form @submit.prevent="createStatutoryPayment" class="mt-6 space-y-6">

            <div>
                <InputLabel for="balance" :value="`${ t('balance') }`" />

                <TextInput
                    id="balance"
                    ref="balanceInput"
                    v-model="form.balance"
                    type="text"
                    class="mt-1 block w-full"
                    readonly
                />

                <InputError :message="form.errors.balance" class="mt-2" />
            </div>

            <div>
                <InputLabel for="paid" :value="`${ t('paid') }`" />

                <TextInput
                    id="paid"
                    ref="paidInput"
                    v-model="form.paid"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="paid"
                />

                <InputError :message="form.errors.paid" class="mt-2" />
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
