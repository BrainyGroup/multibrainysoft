<script setup>
import WebProductDetailsLayout from '@/Layouts/WebProductDetailsLayout.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import LinkButton from '@/Components/LinkButton.vue';

import Vue3Autocounter from 'vue3-autocounter';

const props = defineProps({
  translations:Object,
});



</script>

<template>
    <Head title="Home" />

    <WebProductDetailsLayout :translations="translations">
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Home</h2>
        </template> -->

        <div>
            <div class="max-w-7xl mx-auto">
                <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> -->
                    



     <!-- ======= Services Section ======= -->
     <section id="services" class="services">
        <div class="container" data-aos="fade-up">



            <div class="row">
                <div class="col-lg-6 align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <h4><a href="#">Library Shelves</a></h4>
                        <img src="assets/img/shelves/library_shelves_mobile_electric_datahouse_tanzania_rwanda_datarwanda_kigali_kampala_daressalaam.jpg"
                            class="img-fluid" 
                            alt="Shelves Large Format Scanner WT36CL-600">

                          
                                <p class="py-1">Scanning Width 36"</p>
                            
                          
                                <p class="py-1">Resolution in dpi 1200</p>
                            
                          
                                <p class="py-1">Image Sensor CIS</p>
                            
                          
                                <p class="py-1">Color Speed 10 ips</p>
                            
                            
                                <p class="py-1">Built in PC Memory 8 GB</p>
                            
                          
                                <p class="py-1">Network Speed 1 Gbit/s</p>                         
                            
                          
                                <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                            
                       

                    </div>
                </div>

                <div class="col-lg-6  d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                    data-aos-delay="200">
                    <div class="icon-box">
                        <h4><a href="">Archive Shelves</a></h4>
                        <img src="assets/img/shelves/archive_shelves_datahouse_tanzania_rwanda_uganda_datarwanda_kigali_kampala_daressalaam.jpg" class="img-fluid" 
                        alt="Shelves Wide Format Scanner WT48CL-600">
                       
                        
                            <!-- <tr class="even:bg-gray-50 odd:bg-white">
                                <p>RICOH fi-8040 Fast Front Office Document, Receipt, Passport, ID Card Scanner with 50 Page Auto Feeder and PC-Less DirectScan Capability</p>
                             -->
                          
                             <p class="py-1">Scanning Width 48"</p>
                            
                          
                             <p class="py-1">Resolution in dpi 1200</p>
                         
                       
                             <p class="py-1">Image Sensor CIS</p>
                         
                       
                             <p class="py-1">Color Speed 10 ips</p>
                         
                         
                             <p class="py-1">Built in PC Memory 16 GB</p>
                         
                       
                             <p class="py-1">Network Speed 1 Gbit/s</p>                         
                         
                       
                             <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                            
                           
                    </div>
                </div>

                <div class="col-lg-6  d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
                    data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">Office Shelves</a></h4>

                        <img src="assets/img/shelves/office_shelves_datahouse_tanzania_uganda_rwanda_kigali_kampala_daressalaam_mobile_electronic.jpg" class="img-fluid"
                            alt="Shelves Wide Format Scanner WT60CL-600">
                        
                            
                            <p class="py-1">Scanning Width 60"</p>
                            
                          
                            <p class="py-1">Resolution in dpi 1200</p>
                        
                      
                            <p class="py-1">Image Sensor CIS</p>
                        
                      
                            <p class="py-1">Color Speed 8 ips</p>
                        
                        
                            <p class="py-1">Built in PC Memory 16 GB</p>
                        
                      
                            <p class="py-1">Network Speed 1 Gbit/s</p>                         
                        
                      
                            <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                                

                               
                    </div>
                </div>
                

                <div class="col-lg-6  d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <h4><a href="">Health Care Shelves</a></h4>
                        <img src="assets/img/shelves/health_care_shelves_datahouse_tanzania_uganda_rwanda_kigali_kampala_daressalaam_datarwanda.jpg" class="img-fluid" 
                        alt="Shelves Wide Format Scanner WT36-600">   
                        
                        
                            <!-- <p class="py-1">RICOH fi-8040 Fast Front Office Document, Receipt, Passport, ID Card Scanner with 50 Page Auto Feeder and PC-Less DirectScan Capability</p> -->
                             
                          
                            <p class="py-1">Scanning Width 36"</p>
                            
                          
                            <p class="py-1">Resolution in dpi 1200</p>
                        
                      
                            <p class="py-1">Image Sensor CCD</p>
                        
                      
                            <p class="py-1">Color Speed 15 ips</p>
                        
                        
                            <p class="py-1">Built in PC Memory 16 GB</p>
                        
                      
                            <p class="py-1">Network Speed 1 Gbit/s</p>                         
                        
                      
                            <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                            
                           

                    </div>
                </div>

                <div class="col-lg-6  d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <h4><a href="">ddfdfds</a></h4>
                        <img src="assets/img/shelves/WT44-600_wide_format_scanner.png" class="img-fluid" 
                        alt="Shelves Wide Format Scanner WT44-600">
                       
                        <p class="py-1">Scanning Width 44"</p>
                            
                          
                        <p class="py-1">Resolution in dpi 1200</p>
                    
                  
                        <p class="py-1">Image Sensor CCD</p>
                    
                  
                        <p class="py-1">Color Speed 11 ips</p>
                    
                    
                        <p class="py-1">Built in PC Memory 16 GB</p>
                    
                  
                        <p class="py-1">Network Speed 1 Gbit/s</p>                         
                    
                  
                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-6  d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">Shelves Scanner<br> WT48-600</a></h4>
                        <img src="assets/img/shelves/WT48-600_wide_format_scanner.png" class="img-fluid" 
                        alt="Shelves Wide Format Scanner WT48-600">                     
                        <p class="py-1">Scanning Width 48"</p>
                            
                          
                        <p class="py-1">Resolution in dpi 1200</p>
                    
                  
                        <p class="py-1">Image Sensor CCD</p>
                    
                  
                        <p class="py-1">Color Speed 11 ips</p>
                    
                    
                        <p class="py-1">Built in PC Memory 16 GB</p>
                    
                  
                        <p class="py-1">Network Speed 1 Gbit/s</p>                         
                    
                  
                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                          
                    
                  
               

            </div>

        </div>
    </section><!-- End Services Section -->


  



  



        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
    
                <div class="section-title">
                    <h2>Contact</h2>
                    <h3><span>Contact Us</span></h3>
                    <p>To get more information concerning our product and services please visit to our office or contact us by
                        filling the form below </p>
                </div>
   
            
   
    
                <div class="row" data-aos="fade-up" data-aos-delay="100">
    
                    <div class="col-lg-6 ">
                        <iframe class="mb-4 mb-lg-0"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15846.772305906772!2d39.2771316!3d-6.8071398!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x59112b8f7cee2607!2sDataHouse%20Tanzania%20Limited!5e0!3m2!1sen!2stz!4v1667885655061!5m2!1sen!2stz"
                            frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <!-- <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe> -->
                    </div>
    
                   
    
                </div>
    
            </div>
        </section><!-- End Contact Section -->

        
              
              

                    
                <!-- </div> -->
            </div>
        </div>
    </WebProductDetailsLayout>
</template>
