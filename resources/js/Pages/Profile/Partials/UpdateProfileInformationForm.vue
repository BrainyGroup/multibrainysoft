<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
    national_id: user.national_id,
    title: user.title,
    first_name: user.first_name,
    middle_name: user.middle_name,
    last_name: user.last_name,
    initials: user.initials,
    designation: user.designation,
    profile_photo_path: user.profile_photo_path,
    dod: user.dod,
    mobile: user.mobile,
    storage_limit: user.storage_limit,    
});

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Profile Information</h2>

            <p class="mt-1 text-sm text-gray-600">
                Update your account's profile information and email address.
            </p>
        </header>

        <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div v-if="mustVerifyEmail && user.email_verified_at === null">
                <p class="text-sm mt-2 text-gray-800">
                    Your email address is unverified.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Click here to re-send the verification email.
                    </Link>
                </p>

                <div
                    v-show="status === 'verification-link-sent'"
                    class="mt-2 font-medium text-sm text-green-600"
                >
                    A new verification link has been sent to your email address.
                </div>
            </div>

            <div>
                <InputLabel for="national_id" value="National ID" />

                <TextInput
                    id="national_id"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.national_id"                
                    autofocus
                    autocomplete="national_id"
                />

                <InputError class="mt-2" :message="form.errors.national_id" />
            </div>
            
            <div>
                <InputLabel for="title" value="Title" />

                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"                
                    autofocus
                    autocomplete="title"
                />

                <InputError class="mt-2" :message="form.errors.title" />
            </div>

            
            <div>
                <InputLabel for="first_name" value="First Name" />

                <TextInput
                    id="first_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.first_name"                 
                    autofocus
                    autocomplete="first_name"
                />

                <InputError class="mt-2" :message="form.errors.first_name" />
            </div>

            
            <div>
                <InputLabel for="middle_name" value="Middle Name" />

                <TextInput
                    id="middle_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.middle_name"                   
                    autofocus
                    autocomplete="middle_name"
                />

                <InputError class="mt-2" :message="form.errors.middle_name" />
            </div>

            
            <div>
                <InputLabel for="last_name" value="Last Name" />

                <TextInput
                    id="last_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.last_name"                    
                    autofocus
                    autocomplete="last_name"
                />

                <InputError class="mt-2" :message="form.errors.last_name" />
            </div>

            
            <div>
                <InputLabel for="initials" value="Initials" />

                <TextInput
                    id="initials"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.initials"                    
                    autofocus
                    autocomplete="initials"
                />

                <InputError class="mt-2" :message="form.errors.initials" />
            </div>

            
            <div>
                <InputLabel for="designation" value="Designation" />

                <TextInput
                    id="designation"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.designation"                    
                    autofocus
                    autocomplete="designation"
                />

                <InputError class="mt-2" :message="form.errors.designation" />
            </div>

            
            <div>
                <InputLabel for="organization_id" value="Organization ID" />

                <TextInput
                    id="organization_id"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.organization_id"                    
                    autofocus
                    autocomplete="organization_id"
                />

                <InputError class="mt-2" :message="form.errors.organization_id" />
            </div>

            
            <div>
                <InputLabel for="profile_photo_path" value="Photo" />

                <TextInput
                    id="profile_photo_path"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.profile_photo_path"                    
                    autofocus
                    autocomplete="profile_photo_path"
                />

                <InputError class="mt-2" :message="form.errors.profile_photo_path" />
            </div>

            
            <div>
                <InputLabel for="dod" value="Date of Birth" />

                <TextInput
                    id="dod"
                    type="date"
                    class="mt-1 block w-full"
                    v-model="form.dod"                    
                    autofocus
                    autocomplete="dod"
                />

                <InputError class="mt-2" :message="form.errors.dod" />
            </div>

            
            <div>
                <InputLabel for="mobile" value="Mobile Phone" />

                <TextInput
                    id="mobile"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.mobile"                    
                    autofocus
                    autocomplete="mobile"
                />

                <InputError class="mt-2" :message="form.errors.mobile" />
            </div>

            
            <div>
                <InputLabel for="storage_limit" value="Storage Limit" />

                <TextInput
                    id="storage_limit"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.storage_limit"                    
                    autofocus
                    autocomplete="storage_limit"
                />

                <InputError class="mt-2" :message="form.errors.storage_limit" />
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
