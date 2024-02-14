<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const nameInput = ref(null);

const props = defineProps({
  permissions: Array,
  rolePermissions: Object,
  role: Object,
  translations: Object,
});

const form = useForm({
  _method: "PUT",
  name: props.role.name,
  permissionIds: Object.values(props.rolePermissions),
});

// const updateRole = () => {
//   form.post(route("roles.update", props.role.id), {
//     onFinish: () => form.reset(),
//   });
// };

const updateRole = () => {
    form.post(route('roles.update', props.role.id), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.name) {
                // form.reset('password', 'password_confirmation');
                console.log('error');
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
            <h2 class="text-lg font-medium text-gray-900">{{ t('edit') }} {{ t('role') }}</h2>


        </header>

        <form @submit.prevent="updateRole" class="mt-6 space-y-6">
            <div>
                <InputLabel for="name" :value="`${ t('roles') }`" />

                <TextInput
                    id="name"
                    ref="nameInput"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="names"
                />

                <InputError :message="form.errors.name" class="mt-2" />
            </div>

            
          <!-- Roles -->

          <div   v-for="permission in permissions" :key="permission.id" class="col-span-6 sm:col-span-4">
            <label  class="flex items-center">
                <Checkbox  v-model:checked="form.permissionIds" :id="permission.id" :value="permission.id" />
                <span class="ml-2 text-sm text-gray-600">{{ permission.name }}</span>
            </label>
        </div>


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
