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
  tenant: Object,
  translations: Object,
});

const form = useForm({
  _method: "PUT",
  id: props.tenant.id,
});

// const updateRole = () => {
//   form.post(route("tenant.update", props.role.id), {
//     onFinish: () => form.reset(),
//   });
// };

const updateTenant = () => {
    form.post(route('tenants.update', props.tenant.id), {
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
            <h2 class="text-lg font-medium text-gray-900">Edit Tenant</h2>

        </header>

        <form @submit.prevent="updateTenant" class="mt-6 space-y-6">
            <div>
                <InputLabel for="id" value="Name" />

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

            
          <!-- tenant -->



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
