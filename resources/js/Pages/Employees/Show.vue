<script setup>
import { ref, watch } from "vue";
// import { Inertia } from "@inertiajs/inertia";

import { Head, Link, useForm, router} from '@inertiajs/vue3';
// import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
// import Icon from "@/Components/Icon.vue";
// import Pagination from "@/Components/Pagination.vue";
// import SearchFilter from "@/Components/SearchFilter.vue";
import DeleteButton from "@/Components/DeleteButton.vue";
// import Pagination from "@/Components/Pagination.vue";
// import ActionMessage from "@/Components/ActionMessage.vue";
// import FormSection from "@/Components/FormSection.vue";
// import InputError from "@/Components/InputError.vue";
// import InputLabel from "@/Components/InputLabel.vue";
// import PrimaryButton from "@/Components/PrimaryButton.vue";
// import SecondaryButton from "@/Components/SecondaryButton.vue";
// import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    employee: Object,
    statutories: Array,
    deduction_types: Array,
    allowance_types: Array,
    remuneration_types: Array,
    can:Object,
    kins: Array,
    translations: Object,
});






//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}

const deleteEmployee = (id) => {
    router.delete(route("employees.destroy", id));   

};

const deleteAllowance = (id, emp_id) => {
    console.log(id,emp_id);
    router.delete(route("allowances.destroy", [id, emp_id]));   

};

const deleteRemuneration = (id, emp_id) => {
    console.log(id);
    router.delete(route("remunerations.destroy", id, emp_id));   

};


</script>
<template>
    
    <AuthenticatedLayout  :translations="translations">
        <template #header>
            <h1 class="mb-1 ml-4 text-3xl font-bold">{{ t('employee') }}</h1>
        </template>

        <div class="mx-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <Head :title="`${t('employee')}`" />
                            
                            <!-- <h1 class="mb-8 text-3xl font-bold">Employees</h1> -->
                           <div class="flex items-center justify-between mb-6">

                                <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-t  px-4 py-2ransparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" href="/employees">
                                    <span>{{ t('employee') }}</span>
                                    <span class="hidden md:inline">&nbsp;{{ t('list') }}</span>
                                </Link>
                            </div>

                            <div class="bg-white rounded-md shadow overflow-x-auto">
                            <table class="w-full whitespace-nowrap">
                                <!-- <thead>
                                <tr class="text-left font-bold">
                                    <th class="pb-4 pt-6 px-6">{{ t('Item') }}</th>
                                                                     
                                </tr>
                                </thead> -->
                                <tbody>
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('full name') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.first_name + ' ' + employee.middle_name + ' ' + employee.last_name }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('designation') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.designation_name }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('national id') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.national_id }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('employee id') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.identity }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('tin') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.tin }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('age') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.age }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('email') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.email }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('employment type') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.employment_type_name }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('start date') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.start_date }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('expected retired date') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.end_date }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('payroll group') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.payroll_group_name }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('salary circle') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.pay_base_name }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('full name') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.tin }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('pay center') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.center_name }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('structure level') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.level_description }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('salary scale') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.scale_name }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('department') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.department_name }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('account number') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.account_number }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('mobile') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.mobile }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('salary') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.salary }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                    

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('remunerations') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                             
                                    </td>
                                    <td class="border-t  px-4 py-2"> 
                                        <Link v-if="can.create_remuneration" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" :href="`/remunerations/create?employee_id=${employee.id}`">
                                            <span>{{ t('add') }}</span>
                                            <span class="hidden md:inline">&nbsp;{{ t('remuneration') }}</span>
                                        </Link>                                        
                                         
                                   </td>
                                </tr>
                                
                                <tr v-for="remuneration_type in remuneration_types" :key="remuneration_type.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                           
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                             {{ remuneration_type.remuneration_name }}
                                    </td>
                                    <td class="border-t  px-4 py-2">  
                                        {{ remuneration_type.remuneration_amount }}
                                        
                                        <delete-button  @delete="deleteRemuneration(`${ remuneration_type.remuneration_type_id }, ${remuneration_type.employee_id }`)">Delete</delete-button>
                                         
                                   </td>

                            

                                </tr>


                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('allowances') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                             
                                    </td>
                                    <td class="border-t  px-4 py-2"> 
                                        <Link v-if="can.create_allowance" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" :href="`/allowances/create?employee_id=${employee.id}`">
                                            <span>{{ t('add') }}</span>
                                            <span class="hidden md:inline">&nbsp;{{ t('allowance') }}</span>
                                        </Link>                                        
                                         
                                   </td>
                                </tr>  
                                
                                <tr v-for="allowance_type in allowance_types" :key="allowance_type.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                           
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                             {{ allowance_type.allowance_name }}
                                    </td>
                                    <td class="border-t  px-4 py-2">  
                                        {{ allowance_type.allowance_amount }}
                                        
                                        <delete-button  @delete="deleteAllowance(`${ allowance_type.allowance_type_id }, ${ allowance_type.employee_id }`)">Delete</delete-button>
                                         
                                   </td>

                            

                                </tr> 
                                
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('deductions') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                          
                                    </td>
                                    <td class="border-t  px-4 py-2">
                                        <Link v-if="can.create_deduction" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" :href="`/deductions/create?employee_id=${employee.id}`">
                                            <span>{{ t('add') }}</span>
                                            <span class="hidden md:inline">&nbsp;{{ t('deduction') }}</span>
                                        </Link>                                         
                                         
                                   </td>
                                </tr>

                                <tr v-for="deduction_type in deduction_types" :key="deduction_type.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                           
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                             {{ deduction_type.deduction_name }}
                                    </td>
                                    <td class="border-t  px-4 py-2"> 
                                        {{ deduction_type.deduction_amount }}                                      
                                         
                                   </td>
                                </tr> 

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('kins') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">   
                                        Name and Relation                                    
                                             
                                    </td>
                                    <td class="border-t  px-4 py-2">  
                                        <Link v-if="can.create_next_of_kin" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" :href="`/kins/create?employee_id=${employee.id}`">
                                            <span>{{ t('add') }}</span>
                                            <span class="hidden md:inline">&nbsp;{{ t('next of kin') }}</span>
                                        </Link>                                     
                                         
                                   </td>
                                </tr>

                                
                                <tr v-for="kin in kins" :key="kin.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                           
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                             {{ kin.name }} ( {{ kin.kin_type_name }} )
                                    </td>
                                    <td class="border-t  px-4 py-2"> 
                                        
                                        {{ kin.mobile }}
                                         
                                   </td>
                                </tr> 

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('statutories') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                            
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                <tr v-for="statutory in statutories" :key="statutory.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">   
                                        <div v-if="can.create_previous_contribution">
                                        <Link v-show="statutory.statutory_type_id == 1" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" :href="`/previous_statutories/create?employee_id=${employee.id}&statutory_id=${statutory.statutory_id}`">
                                            <span>{{ t('add') }}</span>
                                            <span class="hidden md:inline">&nbsp;{{ t('previous contribution') }}</span>
                                        </Link> 
                                        </div>                                    
                                           
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                             {{ statutory.name }}


                                    </td>
                                    <td class="border-t  px-4 py-2"> 
                                        
                                        {{ statutory.description }}
                                         
                                   </td>
                                </tr> 
                                
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('status') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.mobiles }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('created') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.created_at }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ t('updated') }}     
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                        {{ employee.updated_at }}      
                                    </td>
                                    <td class="border-t  px-4 py-2">                                       
                                         
                                   </td>
                                </tr>

                                </tbody>
                            </table>
                            </div>
                           
                        </div>
                    <SectionBorder />
                </div>
    </AuthenticatedLayout>
</template>
