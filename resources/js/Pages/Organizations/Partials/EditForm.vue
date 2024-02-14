<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const idInput = ref(null);

const props = defineProps({
  organization: Object,
  translations:Object,
  banks: Array,
  statutory_types: Array,

});

//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}

const form = useForm({
  _method: "PUT",
  name: props.organization.name,
  description: props.organization.description, 
  bank_id: props.organization.bank_id, 
  statutory_type_id: props.organization.statutory_type_id, 
  account_number: props.organization.account_number,    
});

const updateOrganization = () => {
    form.post(route('organizations.update', props.organization.id), {
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
            <h2 class="text-lg font-medium text-gray-900">{{ t('edit') }} {{ t('organization') }}</h2>

        </header>

        <form @submit.prevent="updateOrganization" class="mt-6 space-y-6">
            <div>
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

            <div>
                <select
                v-model="form.bank_id"
                :error="form.errors.bank_id"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Bank"
                required
                >


                     <option v-for="bank in banks" :key="bank.id" :value="bank.id">{{ bank.name }}</option>
             </select>
            </div>

            <div>
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
                <InputLabel for="account_number" :value="`${ t('account number') }`" />

                <TextInput
                    id="account_number"
                    ref="accountNumberInput"
                    v-model="form.account_number"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="account_number"
                />

                <InputError :message="form.errors.account_number" class="mt-2" />
            </div>

            <div>
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

            
          <!-- organization -->



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
