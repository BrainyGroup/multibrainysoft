<script setup>
import { ref, computed, onMounted } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link, usePage} from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);

const showMessage = ref(true)

const props = defineProps({
  translations:Object,
});

setTimeout(() => {
      showMessage.value = false; 
}, 2000)


//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}

</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100"> 

            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo
                                        class="block h-9 w-auto fill-current text-gray-800"
                                    />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    {{ t('dashboard') }}
                                </NavLink>

                                <NavLink :href="route('roles.index')" :active="route().current('roles.index')">
                                    {{ t('roles') }}
                                </NavLink>

                                <NavLink :href="route('users.index')" :active="route().current('users.index')">
                                    {{ t('users') }}
                                </NavLink>

                                
                                <NavLink :href="route('employees.index')" :active="route().current('employees.index')">
                                    {{ t('employees') }}
                                </NavLink>

                                <NavLink :href="route('pays.index')" :active="route().current('pays.index')">
                                    {{ t('earning') }}
                                </NavLink>

                                <NavLink :href="route('reports.index')" :active="route().current('reports.index')">
                                    {{ t('reports') }}
                                </NavLink>

                                <NavLink :href="route('help.index')" :active="route().current('help.index')">
                                    {{ t('help') }}
                                </NavLink>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                            {{ t('settings') }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('allowances.index')"> {{ t('allowances') }} </DropdownLink>
                                        <DropdownLink :href="route('allowance_types.index')"> {{ t('allowance types') }} </DropdownLink>
                                        
                                        <DropdownLink :href="route('banks.index')">  {{ t('banks') }} </DropdownLink>
                                        <DropdownLink :href="route('centers.index')"> {{ t('centers') }} </DropdownLink>
                                        <!-- <DropdownLink :href="route('companies.index')"> {{ t('companies') }} </DropdownLink>
                                        <DropdownLink :href="route('countries.index')"> {{ t('countries') }} </DropdownLink> -->
                                        <DropdownLink :href="route('deductions.index')"> {{ t('deductions') }} </DropdownLink>
                                        <DropdownLink :href="route('deduction_types.index')"> {{ t('deduction types') }} </DropdownLink>
                                        <DropdownLink :href="route('departments.index')"> {{ t('departments') }} </DropdownLink>
                                        <DropdownLink :href="route('designations.index')"> {{ t('designations') }} </DropdownLink>                                        
                                        <DropdownLink :href="route('employment_types.index')"> {{ t('employment types') }} </DropdownLink>
                                        <DropdownLink :href="route('kin_types.index')"> {{ t('kin types') }} </DropdownLink>
                                        <DropdownLink :href="route('levels.index')"> {{ t('levels') }} </DropdownLink>
                                        <DropdownLink :href="route('organizations.index')"> {{ t('organizations') }} </DropdownLink>
                                        <DropdownLink :href="route('payes.index')"> {{ t('payes') }} </DropdownLink>
                                        <DropdownLink :href="route('pay_bases.index')"> {{ t('pay bases') }} </DropdownLink>
                                        <DropdownLink :href="route('previous_statutories.index')"> {{ t('previous statutories') }} </DropdownLink>
                                        <DropdownLink :href="route('remunerations.index')"> {{ t('remunerations') }} </DropdownLink>
                                        <DropdownLink :href="route('remuneration_types.index')"> {{ t('remuneration types') }} </DropdownLink>
                                        
                                        <DropdownLink :href="route('scales.index')"> {{ t('scales') }} </DropdownLink>  
                                        <DropdownLink :href="route('statutories.index')"> {{ t('statutories') }} </DropdownLink>                                     
                                        <DropdownLink :href="route('statutory_types.index')"> {{ t('statutory types') }} </DropdownLink>
                                        <DropdownLink :href="route('salary_bases.index')"> {{ t('salary bases') }} </DropdownLink>

                                        <DropdownLink :href="route('pay_remunerations.index')"> {{ t('pay remunerations') }} </DropdownLink>
                                        <DropdownLink :href="route('pay_deductions.index')"> {{ t('pay deductions') }} </DropdownLink>
                                        <DropdownLink :href="route('pay_allowances.index')"> {{ t('pay allowances') }} </DropdownLink>
                                        <DropdownLink :href="route('pay_statutories.index')"> {{ t('pay statutories') }} </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                            >
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div v-if="$page.props.flash.success && showMessage" 
                    class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                    role="alert">
                        {{ $page.props.flash.success }}
                      
                    </div>

                    <div v-if="$page.props.flash.error"
                    class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" 
                    role="alert">
                        {{ $page.props.flash.error }}
                       
                    </div>
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
