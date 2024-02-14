<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const idInput = ref(null);

const props = defineProps({
  paye: Object,
  translations:Object,
  countries: Array,
});

//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}

const form = useForm({
  _method: "PUT",
  country_id: props.paye.country_id,
  minimum: props.paye.minimum, 
  maximum: props.paye.maximum,
  ratio: props.paye.ratio, 
  offset: props.paye.offset, 
});

const updatePaye = () => {
    form.post(route('payes.update', props.paye.id), {
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
            <h2 class="text-lg font-medium text-gray-900">{{ t('edit') }} {{ t('paye') }}</h2>

        </header>

        <form @submit.prevent="updatePaye" class="mt-6 space-y-6">

            <div>
                <select
                v-model="form.country_id"
                :error="form.errors.country_id"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Bank"
                required
                >
                     <option v-for="country in countries" :key="country.id" :value="country.id">{{ country.name }}</option>
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

            <div>
                <InputLabel for="ratio" :value="`${ t('ratio') }`" />

                <TextInput
                    id="ratio"
                    ref="ratioInput"
                    v-model="form.ratio"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="ratio"
                />

                <InputError :message="form.errors.ratio" class="mt-2" />
            </div>

            <div>
                <InputLabel for="offset" :value="`${ t('offset') }`" />

                <TextInput
                    id="offset"
                    ref="offsetInput"
                    v-model="form.offset"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="offset"
                />

                <InputError :message="form.errors.offset" class="mt-2" />
            </div>

            
          <!-- paye -->



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
