<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const idInput = ref(null);

const props = defineProps({
  translations: Object,
});




const form = useForm({
    id: '',
    email:'', 
    company_name:'',  
});

const createTenant = () => {
    form.post(route('tenants.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.id) {
                // form.reset('password', 'password_confirmation');
                console.log('error');
                idInput.value.focus();
            }

        },
    });
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Create New Tenant</h2>    
        </header>

        <form @submit.prevent="createTenant" class="mt-6 space-y-6">
            <div>
                <InputLabel for="id" value="Tenant Name" />

                <TextInput
                    id="id"
                    ref="idInput"
                    v-model="form.id"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="id"
                />

                <InputError :message="form.errors.id" class="mt-2" />
            </div>

            <div>
                <InputLabel for="company_name" value="Company Name" />

                <TextInput
                    id="company_name"
                    ref="company_nameInput"
                    v-model="form.company_name"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="company_name"
                />

                <InputError :message="form.errors.id" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="email"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            
          <!-- tenants -->




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
