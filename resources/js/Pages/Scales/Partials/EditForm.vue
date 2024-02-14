<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const idInput = ref(null);

const props = defineProps({
  scale: Object,
  translations:Object,
  payroll_groups: Array,
  employment_types: Array,
  pay_bases: Array,
});

//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}

const form = useForm({
  _method: "PUT",
  name: props.scale.name,
  description: props.scale.description,
  minimum: props.scale.minimum, 
  maximum: props.scale.maximum,
  payroll_group_id: props.scale.payroll_group_id, 
  employment_type_id: props.scale.employment_type_id, 
  pay_base_id: props.scale.pay_base_id,
});

const updateScale = () => {
    form.post(route('scales.update', props.scale.id), {
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
            <h2 class="text-lg font-medium text-gray-900">{{ t('edit') }} {{ t('scale') }}</h2>

        </header>

        <form @submit.prevent="updateScale" class="mt-6 space-y-6">

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

            <div>
                <select
                v-model="form.payroll_group_id"
                :error="form.errors.payroll_group_id"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Bank"
                required
                >
                     <option v-for="payroll_group in payroll_groups" :key="payroll_group.id" :value="payroll_group.id">{{ payroll_group.name }}</option>
             </select>
            </div>

            <div>
                <select
                v-model="form.employment_type_id"
                :error="form.errors.employment_type_id"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Bank"
                required
                >
                     <option v-for="employment_type in employment_types" :key="employment_type.id" :value="employment_type.id">{{ employment_type.name }}</option>
             </select>
            </div>

            <div>
                <select
                v-model="form.pay_base_id"
                :error="form.errors.pay_base_id"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Bank"
                required
                >
                     <option v-for="pay_base in pay_bases" :key="pay_base.id" :value="pay_base.id">{{ pay_base.name }}</option>
             </select>
            </div>
            
            <div>
                <InputLabel for="minimum" :value="`${ t('minimum') }`" />

                <TextInput
                    id="minimum"
                    ref="minimumInput"
                    v-model="form.minimum"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="minimum"
                />

                <InputError :message="form.errors.minimum" class="mt-2" />
            </div>

            <div>
                <InputLabel for="maximum" :value="`${ t('maximum') }`" />

                <TextInput
                    id="maximum"
                    ref="maximumInput"
                    v-model="form.maximum"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="maximum"
                />

                <InputError :message="form.errors.maximum" class="mt-2" />
            </div>          

    
            
          <!-- scale -->



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
