<script setup>
import WebLayout from '@/Layouts/WebLayout.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import LinkButton from '@/Components/LinkButton.vue';
import AOS from 'aos'
import 'aos/dist/aos.css'






const props = defineProps({
  translations:Object,
});

AOS.init()

</script>

<template>
    <Head title="Home" />

    <WebLayout :translations="translations">
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Home</h2>
        </template> -->

        <div class="py-2">
            <div class="max-w-7xl mx-auto">
                <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex  flex-col py-4">

                     <section id="home">

                       <div class="relative" data-aos="zoom-out" data-aos-delay="100">
                        <div class="w-full bg-cover relative h-96" style="background-image: url('/img/hero-bg.jpg')" >
                           <div class="mb-8 pt-28" >
                                <h1 class="py-2 px-12 font-bold sm:text-3xl md:text-4xl lg:text-5xl">Digitalization, Archive and <span class="text-red-700">Business Process</span></h1>
                                <h2 class="py-2 px-12 font-bold text-gray-700 sm:text-lg md:text-xl lg:text-2xl">We are talented experties providing services in digitization, business processes and archive solution</h2>
                                

                            </div>

                           

                            <LinkButton :href="`https://youtu.be/mILsx_c-vXw`" class="ml-12">Get started</LinkButton>

                            <a href="https://youtu.be/mILsx_c-vXw" target="_self">Play videp</a>

                           

           
                        </div>

                       </div>
                    </section>
                    <section id="portfolio" class="sm:px-4 lg:px-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4  mt-4 mx-2 " data-aos="fade-up">
                            <div class="bg-gray-50 hover:bg-gray-150 overflow-hidden shadow-sm sm:rounded-lg p-2 " data-aos="fade-up" data-aos-delay="200">
                               
                                <img src="/images/vendor_logo/elo_ecmsuite_prolo_pos-555x95.png" class="py-5"/>
                                <h2 class="text-gray-500 text-xl font-bold p-2">
                                    <span class="text-gray-600 text-2xl">Efficient, flexible , and versatile </span> <br>
                                    ELO ECM Suite - Is the digitalization platform for your company
                                </h2> 
                                <p class="p-2">ELO ECM Suite Ensuring, Secure centralized storage of company data, Digital document management, Automated business processes,Fast access to information, Optimal team collaboration</p>
                             
                                <div class="flex flex-row p-2 space-x-2">
                                    <div class="pt-2"><a href="#">Benefit of Having ContentPro ></a></div>
                                    <LinkButton :href="route('home')">Get Started</LinkButton>
                                </div>   
                           
                            </div>

                            <div class="bg-gray-50 hover:bg-gray-150 overflow-hidden shadow-sm sm:rounded-lg p-2" data-aos="fade-up" data-aos-delay="200">
                                <img src="/images/vendor_logo/content_pro.jpg" class="py-5" />
                                <h2 class="text-gray-500 text-xl font-bold p-2">
                                    <span class="text-gray-600 text-2xl">Quick, Reliable and Secure</span> <br>
                                    ContentPro Content and Record Management software which put your company to the 
                                </h2>                            

                                <p class="p-2">Manage entire content lifecircle in digital and physical form; from creation, during business process, centralize storage and smooth destruction.</p>

                                <div class="flex flex-row p-2 space-x-2">
                                    <div class="pt-2"><a href="#">Benefit of Having ContentPro ></a></div>
                                    <LinkButton>Get Started</LinkButton>
                                </div>      
                         
                            </div>

                            <div class="bg-gray-50 hover:bg-gray-150 overflow-hidden shadow-sm sm:rounded-lg p-2" data-aos="fade-up" data-aos-delay="200">
                               <img src="/images/vendor_logo/convene_board_meating_management.png" />
                                <h2 class="text-gray-500 text-xl font-bold p-2">
                                    <span class="text-gray-600 text-2xl">Smart, Simple, and Secure</span> <br>
                                    Board Meeting Management Software
                                </h2>                            

                                <p class="p-2">Successful boards start with effective meetings. Convene provides a perfect suite of tools to improve collaboration, quick decision-making, and empower governance.</p>

                                <div class="flex flex-row p-2 space-x-2">
                                    <div class="pt-2"><p>See Why Convene is #1 for Users ></p></div>
                                    <LinkButton>Get Started</LinkButton>
                                </div>                     
                            </div>



                        </div>
                    </section>

                        <div class="flex flex-row justify-between space-x-2 mt-4 mx-2" data-aos="fade-up">

                            <div class="bg-gray-50 hover:bg-gray-150 overflow-hidden shadow-sm sm:rounded-lg p-2 w-1/4" data-aos="fade-up" data-aos-delay="200">
                                
                                <h2 class="text-gray-600 text-xl font-bold p-2">
                                    Digitalization 
                                </h2>
                                <p class="p-2">Electronics Document Management System and Workflows</p>
                             
                                <a href="#"><p class="p-2">See Why Convene is #1 for Users</p>

                                
                            

                            </a>

                            </div>
                            <div class="bg-gray-50 hover:bg-gray-150 overflow-hidden shadow-sm sm:rounded-lg p-2" data-aos="fade-up" data-aos-delay="200">
                                <a href="#">
                                <h2 class="text-gray-600 text-xl font-bold p-2">
                                    Data Entry
                                </h2>
                                <p class="p-2">Electronics Document Management System and Workflows</p>
                             
                                <p class="p-2">Learn More</p>
                            </a>
                            </div>

                            <div class="bg-gray-50 hover:bg-gray-150 overflow-hidden shadow-sm sm:rounded-lg p-2" data-aos="fade-up" data-aos-delay="200">
                                <a href="#">
                                <h2 class="text-gray-600 text-xl font-bold p-2">
                                     Physical Archive
                                </h2>
                                <p class="p-2">Electronics Document Management System and Workflows</p>
                             
                                <p class="p-2">Learn More</p>
                            </a>
                            </div>

                            <div class="bg-gray-50 hover:bg-gray-150 overflow-hidden shadow-sm sm:rounded-lg p-2" data-aos="fade-up" data-aos-delay="200">
                                <a href="#">
                                <h2 class="text-gray-600 text-xl font-bold p-2">
                                    Ricoh High Volume Scanner
                                </h2>
                                <p class="p-2">Electronics Document Management System and Workflows</p>
                             
                                <p class="p-2">Learn More</p>
                            </a>
                            </div>

                            <div class="bg-gray-50 hover:bg-gray-150 overflow-hidden shadow-sm sm:rounded-lg p-2" data-aos="fade-up" data-aos-delay="200">
                                <a href="#">
                                <h2 class="text-gray-600 text-xl font-bold p-2">
                                    Large Format Scanners
                                </h2>
                                <p class="p-2">Electronics Document Management System and Workflows</p>
                             
                                <p class="p-2">Learn More</p>
                            </a>
                            </div>

                        </div>
              

                        <div class="flex flex-row justify-between space-x-2 mt-4 mx-2" data-aos="fade-up">
                            <div class="bg-gray-50 hover:bg-gray-150 overflow-hidden shadow-sm sm:rounded-lg p-2" data-aos="fade-up" data-aos-delay="200">
                                <a href="#">
                                <h2 class="text-gray-600 text-xl font-bold p-2">
                                    Book Scanners
                                </h2>
                                <p class="p-2">Electronics Document Management System and Workflows</p>
                             
                                <p class="p-2">Learn More</p>
                            </a>
                            </div>

                            <div class="bg-gray-50 hover:bg-gray-150 overflow-hidden shadow-sm sm:rounded-lg p-2" data-aos="fade-up" data-aos-delay="200">
                                <a href="#">
                                <h2 class="text-gray-600 text-xl font-bold p-2">
                                    Shelves
                                </h2>
                                <p class="p-2">Electronics Document Management System and Workflows</p>
                             
                                <p class="p-2">Learn More</p>
                            </a>
                            </div>

                            <div class="bg-gray-50 hover:bg-gray-150 overflow-hidden shadow-sm sm:rounded-lg p-2" data-aos="fade-up" data-aos-delay="200">
                                <a href="#">
                                <h2 class="text-gray-600 text-xl font-bold p-2">
                                    Racks
                                </h2>
                                <p class="p-2">Electronics Document Management System and Workflows</p>
                             
                                <p class="p-2">Learn More</p>
                            </a>
                            </div>

                            <div class="bg-gray-50 hover:bg-gray-150 overflow-hidden shadow-sm sm:rounded-lg p-2" data-aos="fade-up" data-aos-delay="200">
                                <a href="#">
                                <h2 class="text-gray-600 text-xl font-bold p-2">
                                    Boxes
                                </h2>
                                <p class="p-2">Electronics Document Management System and Workflows</p>
                             
                                <p class="p-2">Learn More</p>
                            </a>
                            </div>

                        </div>
              
              

                    </div>
                </div>
            </div>
        </div>
    </WebLayout>
</template>
