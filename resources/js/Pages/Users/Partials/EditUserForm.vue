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
  roles: Array,
  userRoles: Object,
  user: Object,
  translations: Object,
});

//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}

const form = useForm({
  _method: "PUT",
    name: props.user.name,
    email: props.user.email,
    password: '',
    password_confirmation: '',
    national_id: props.user.national_id,
    terms: props.user.terms,
    gender: props.user.sex,
    marital_status: props.user.marital_status,
    title: props.user.title,
    first_name: props.user.first_name,
    middle_name: props.user.middle_name,
    last_name: props.user.last_name,
    initials: props.user.initials,
    photo_path: props.user.photo_path,
    dob: props.user.dob,
    organization_id: props.user.organization_id,
    mobile: props.user.mobile,
    designation: props.user.designation,       
    storage_limit:props.user.storage_limit,
    pa_email:props.user.pa_email,
    send_welcome_email:props.user.send_welcome_email,
    send_start_guide: props.user.send_start_guide,
    roleIds: Object.values(props.userRoles),   
});



const updateUser = () => {
    form.post(route('users.update', props.user.id), {
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



</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">{{ t('edit')}} {{ t('user')}}</h2>

        </header>

        <form @submit.prevent="updateUser" class="mt-6 space-y-6">
            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="name" :value="`${ t('name')}`" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="name"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="email" :value="`${ t('email')}`" />
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

            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="password" :value="`${ t('password')}`" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"                   
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="password_confirmation" :value="`${ t('confirm password')}`" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"                    
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>


            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="title" :value="`${ t('title')}`" />
                <TextInput
                    id="title"
                    v-model="form.title"
                    type="text"
                    class="mt-1 block w-full"                  
                    autofocus
                    autocomplete="title"
                />
                <InputError class="mt-2" :message="form.errors.title" />
            </div>


            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="first_name" :value="`${ t('first name')}`" />
                <TextInput
                    id="first_name"
                    v-model="form.first_name"
                    type="text"
                    class="mt-1 block w-full"               
                    autofocus
                    autocomplete="first_name"
                />
                <InputError class="mt-2" :message="form.errors.first_name" />
            </div>



            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="middle_name" :value="`${ t('middle name')}`" />
                <TextInput
                    id="middle_name"
                    v-model="form.middle_name"
                    type="text"
                    class="mt-1 block w-full"                   
                    autofocus
                    autocomplete="middle_name"
                />
                <InputError class="mt-2" :message="form.errors.middle_name" />
            </div>


            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="last_name" :value="`${ t('last name')}`" />
                <TextInput
                    id="last_name"
                    v-model="form.last_name"
                    type="text"
                    class="mt-1 block w-full"                 
                    autofocus
                    autocomplete="last_name"
                />
                <InputError class="mt-2" :message="form.errors.last_name" />
            </div>

            <div>
                <InputLabel for="genders" :value="`${ t('gender')}`" />
                <select
                id="sex"
                v-model="form.gender"
                :error="form.errors.genders"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Gender"
                required
                >
                     <option value="Male">{{ t('male') }}</option>
                     <option value="Female">{{ t('female') }}</option>
             </select>
            </div>


            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="initials" :value="`${ t('initials')}`" />
                <TextInput
                    id="initials"
                    v-model="form.initials"
                    type="text"
                    class="mt-1 block w-full"                   
                    autofocus
                    autocomplete="initials"
                />
                <InputError class="mt-2" :message="form.errors.initials" />
            </div>

            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="mobile" :value="`${ t('mobile')}`" />
                <TextInput
                    id="mobile"
                    v-model="form.mobile"
                    type="text"
                    class="mt-1 block w-full"                   
                    autofocus
                    autocomplete="mobile"
                />
                <InputError class="mt-2" :message="form.errors.mobile" />
            </div>

            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="organization_id" :value="`${ t('organization')}`"/>
                <TextInput
                    id="organization_id"
                    v-model="form.organization_id"
                    type="text"
                    class="mt-1 block w-full"                    
                    autofocus
                    autocomplete="organization_id"
                />
                <InputError class="mt-2" :message="form.errors.organization_id" />
            </div>

            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="national_id" :value="`${ t('national id')}`" />
                <TextInput
                    id="national_id"
                    v-model="form.national_id"
                    type="text"
                    class="mt-1 block w-full"                  
                    autofocus
                    autocomplete="national_id"
                />
                <InputError class="mt-2" :message="form.errors.national_id" />
            </div>

            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="dob" :value="`${ t('date of birth')}`" />
                <TextInput
                    id="dob"
                    v-model="form.dob"
                    type="date"
                    class="mt-1 block w-full"                    
                    autofocus
                    autocomplete="dob"
                />
                <InputError class="mt-2" :message="form.errors.dob" />
            </div>


            <div class="col-span-6 sm:col-span-4">

            <InputLabel for="name" :value="`${ t('role name')}`" />

                <div   v-for="role in roles" :key="role.id" class="col-span-6 sm:col-span-4">
                    <label  class="flex items-center">
                        <Checkbox v-model:checked="form.roleIds" :id="role.id" :value="role.id" />
                        <span class="ml-2 text-sm text-gray-600">{{ role.name }}</span>
                    </label>
                </div>

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
