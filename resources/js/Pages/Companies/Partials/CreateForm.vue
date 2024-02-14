<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const idInput = ref(null);

const form = useForm({
    name: '',   
    description:'', 
    employees:'',  

    balance: '',
    trial:'',
    country_id:'', 

    logo: '',
    website:'',
    tin:'', 

    vrn: '',
    regno:'',
    slogan:'', 

    mission: '',
    vision:'',   

});

const createCompany = () => {
    form.post(route('companies.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.name) {              
                nameInput.value.focus();
            }
        },
    });
};

const props = defineProps({
  translations: Object,
});

//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">{{ t('create') }} {{ t('company') }}</h2>    
        </header>

        <form @submit.prevent="createCompany" class="mt-6 space-y-6">
            

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
                <InputLabel for="employees" :value="`${ t('employees') }`" />

                <TextInput
                    id="employees"
                    ref="employeesInput"
                    v-model="form.employees"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="employees"
                />

                <InputError :message="form.errors.employees" class="mt-2" />
            </div>


            
            <div>
                <InputLabel for="balance" :value="`${ t('balance') }`" />

                <TextInput
                    id="balance"
                    ref="balanceInput"
                    v-model="form.balance"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="balance"
                />

                <InputError :message="form.errors.balance" class="mt-2" />
            </div>

            <div>
                <InputLabel for="trial" :value="`${ t('trial') }`" />

                <TextInput
                    id="trial"
                    ref="trialInput"
                    v-model="form.trial"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="trial"
                />

                <InputError :message="form.errors.trial" class="mt-2" />
            </div>

            <div>
                <InputLabel for="country_id" :value="`${ t('country_id') }`" />

                <TextInput
                    id="country_id"
                    ref="country_idInput"
                    v-model="form.country_id"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="country_id"
                />

                <InputError :message="form.errors.country_id" class="mt-2" />
            </div>


            
            <div>
                <InputLabel for="logo" :value="`${ t('logo') }`" />

                <TextInput
                    id="logo"
                    ref="logoInput"
                    v-model="form.logo"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="logo"
                />

                <InputError :message="form.errors.logo" class="mt-2" />
            </div>

            <div>
                <InputLabel for="website" :value="`${ t('website') }`" />

                <TextInput
                    id="website"
                    ref="websiteInput"
                    v-model="form.website"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="website"
                />

                <InputError :message="form.errors.website" class="mt-2" />
            </div>

            <div>
                <InputLabel for="tin" :value="`${ t('tin') }`" />

                <TextInput
                    id="tin"
                    ref="tinInput"
                    v-model="form.tin"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="tin"
                />

                <InputError :message="form.errors.tin" class="mt-2" />
            </div>


            
            <div>
                <InputLabel for="vrn" :value="`${ t('vrn') }`" />

                <TextInput
                    id="vrn"
                    ref="vrnInput"
                    v-model="form.vrn"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="vrn"
                />

                <InputError :message="form.errors.vrn" class="mt-2" />
            </div>

            <div>
                <InputLabel for="regno" :value="`${ t('regno') }`" />

                <TextInput
                    id="regno"
                    ref="regnoInput"
                    v-model="form.regno"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="regno"
                />

                <InputError :message="form.errors.regno" class="mt-2" />
            </div>

            <div>
                <InputLabel for="slogan" :value="`${ t('slogan') }`" />

                <TextInput
                    id="slogan"
                    ref="sloganInput"
                    v-model="form.slogan"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="slogan"
                />

                <InputError :message="form.errors.slogan" class="mt-2" />
            </div>

            <div>
                <InputLabel for="mission" :value="`${ t('mission') }`" />

                <TextInput
                    id="mission"
                    ref="missionInput"
                    v-model="form.mission"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="mission"
                />

                <InputError :message="form.errors.mission" class="mt-2" />
            </div>


            <div>
                <InputLabel for="vision" :value="`${ t('vision') }`" />

                <TextInput
                    id="vision"
                    ref="visionInput"
                    v-model="form.vision"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="vision"
                />

                <InputError :message="form.errors.vision" class="mt-2" />
            </div>


    
            
          <!-- centers -->




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
