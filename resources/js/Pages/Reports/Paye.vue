<script setup>
import { ref, watch } from "vue";
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SectionBorder from "@/Components/SectionBorder.vue";

import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';
import jszip from 'jszip';
import pdfmake from 'pdfmake';

import 'datatables.net-buttons-dt';
import 'datatables.net-buttons/js/buttons.html5.mjs';
import 'datatables.net-buttons/js/buttons.print.mjs';
import 'datatables.net-select-dt'
import 'datatables.net-responsive-dt';
import 'datatables.net-buttons/js/buttons.colVis.mjs';

DataTable.use(DataTablesCore);
DataTablesCore.Buttons.jszip(jszip);
DataTablesCore.Buttons.pdfMake(pdfmake);




const props = defineProps({
  pays: Array,
  translations:Object,
  title: String,
});

const options = {
  dom: 'Bfrtip',
  select: true,
  responsive: true, 
};   


//Translation
const t = (key, params) => {
    return props.translations[key] || key;
}

                    

          
const columns = [      

  {
    data: 'tin',
    title: `${ t('tin') }`,
  },
  {
    data: 'name',
    title: `${ t('name') } `,
  },
  {
    data: 'pay_number',
    title: `${ t('payroll') } #`,
  },

  // {
  //   data: 'pay_number',
  //   title: `${ t('postal address') }`,
  // },
  // {
  //   data: 'pay_number',
  //   title: `${ t('postal city') } `,
  // },
  {
    data: 'basic_salary',
    title: `${ t('basic salary') }`,
  },


  {
    data: 'allowance',
    title: `${ t('housing') }`,
  },
  {
    data: 'gloss',
    title: `${ t('gross pay') }`,
  },

  {
    data: 'deduction',
    title: `${ t('deduction') }`,
  },
  {
    data: 'taxable',
    title: `${ t('taxable amount') }`,
  },

  {
    data: 'paye',
    title: `${ t('tax due') } #`,
  },



  


  ];




</script>
<template>
    <AuthenticatedLayout  :translations="translations">
        <template #header>
            <h1 class="mb-1  text-3xl font-bold">{{ title }}</h1>
        </template>

        <div class="mx-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                            <Head :title="`${ t('paye for ') + title} ` " />
                           
                        

                            <div class="bg-white rounded-md shadow overflow-x-auto text-sm">
                                <DataTable   
                                :data="pays" 
                                :columns="columns" 
                                :options="options"
                                class="display"
                                width="100%"
                                >
                                </DataTable>                            
                            </div>
                            <!-- <pagination class="mt-6" :links="pays.links" />  -->
                        </div>
                    <SectionBorder />

    

                 
                    


                  

                  
                
                </div>
    </AuthenticatedLayout>
</template>

<style>
@import 'datatables.net-dt';

@import 'datatables.net-buttons-dt';
@import 'datatables.net-select-dt';
</style>
