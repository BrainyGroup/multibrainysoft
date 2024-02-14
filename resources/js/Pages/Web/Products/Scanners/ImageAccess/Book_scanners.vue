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
                <div class="col-lg-3 col-md-4 col-sm-6 align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <h4><a href="#">Bookeye BE5-V3 <br> Basic</a></h4>
                        <img src="assets/img/book_scanners/BE5-V3_Basic_book_scanner.png"
                            class="img-fluid" alt="Bookeye BE5-V3 Basic book scanner">
                          
                                <p class="py-1">Scanning Area DIN A3+</p>

                                <p class="py-1">Resolution in dpi 400</p>

                                <p class="py-1">V-Mode Scanning YES</p>

                                <p class="py-1">Book Cradle YES</p>

                                <p class="py-1">WiFi Hotspot OPTION</p>
                                              
                                <p class="py-1">Monitor &amp; Touch 21"</p>           

                                <p class="py-1">Interface Ethernet</p>
     
                                <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                            
                       

                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                    data-aos-delay="200">
                    <div class="icon-box">
                        <h4><a href="">Bookeye BE5-V3 <br> Kiosk</a></h4>
                        <img src="assets/img/book_scanners/BE5-V3_Kiosk__book_scanner.png" class="img-fluid" 
                        alt="Bookeye BE5-V3 Kiosk book scanner">
                       
                        
                            <!-- <tr class="even:bg-gray-50 odd:bg-white">
                                <p>RICOH fi-8040 Fast Front Office Document, Receipt, Passport, ID Card Scanner with 50 Page Auto Feeder and PC-Less DirectScan Capability</p>
                             -->
                             <p class="py-1">Scanning Area DIN A3+</p>

                             <p class="py-1">Resolution in dpi 400</p>

                             <p class="py-1">V-Mode Scanning YES</p>

                             <p class="py-1">Book Cradle YES</p>

                             <p class="py-1">WiFi Hotspot YES</p>
                                           
                             <p class="py-1">Monitor &amp; Touch 21"</p>           

                             <p class="py-1">Interface Ethernet</p>
  
                             <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                            
                           
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
                    data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">Bookeye BE5-V3 <br> Professional</a></h4>

                        <img src="assets/img/book_scanners/BE5-V3_Professional__book_scanner.png" class="img-fluid"
                            alt="Bookeye BE5-V3 Proffessional book scanner">
                        
                            
                                <!-- <tr class="even:bg-gray-50 odd:bg-white">
                                    <p class="py-1">RICOH fi-8040 Fast Front Office Document, Receipt, Passport, ID Card Scanner with 50 Page Auto Feeder and PC-Less DirectScan Capability</p>
                                         -->
                                         <p class="py-1">Scanning Area DIN A3+</p>

                                         <p class="py-1">Resolution in dpi 600</p>
            
                                         <p class="py-1">V-Mode Scanning YES</p>

                                         <p class="py-1">Book Cradle YES</p>
            
                                         <p class="py-1">WiFi Hotspot OPTION</p>
                                                       
                                         <p class="py-1">Monitor &amp; Touch 21"</p>           
            
                                         <p class="py-1">Interface Ethernet</p>
              
                                         <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                               
                    </div>
                </div>
                

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <h4><a href="">Bookeye BE5-V3A <br> Automatic</a></h4>
                        <img src="assets/img/book_scanners/BE5-V3A__book_scanner.png" class="img-fluid" 
                        alt="Bookeye BE5-V3 Automatic book scanner">   
                        
                        
                            <!-- <p class="py-1">RICOH fi-8040 Fast Front Office Document, Receipt, Passport, ID Card Scanner with 50 Page Auto Feeder and PC-Less DirectScan Capability</p> -->
                             
                          
                                                                    
                                        <p class="py-1">Scanning Area DIN A3+</p>

                                        <p class="py-1">Resolution in dpi 600</p>

                                        <p class="py-1">V-Mode Scanning YES</p>

                                        <p class="py-1">Book Cradle V-GLASS</p>

                                        <p class="py-1">WiFi Hotspot OPTION</p>
                                                    
                                        <p class="py-1">Monitor &amp; Touch 21"</p>           

                                        <p class="py-1">Interface Ethernet</p>

                                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>                           

                                    </div>
                                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <h4><a href="">Bookeye BE5-V2 <br> Basic</a></h4>
                        <img src="assets/img/book_scanners/BE5-V2_Basic__book_scanner.png" class="img-fluid" 
                        alt="Bookeye BE5-V2 Basic book scanner">
                       
                                    <!-- <p class="py-1">RICOH fi-8040 Fast Front Office Document, Receipt, Passport, ID Card Scanner with 50 Page Auto Feeder and PC-Less DirectScan Capability</p> -->
                
                                    <p class="py-1">Scanning Area DIN A2+</p>

                                    <p class="py-1">Resolution in dpi 400</p>
        
                                    <p class="py-1">V-Mode Scanning YES</p>

                                    <p class="py-1">Book Cradle YES</p>
        
                                    <p class="py-1">WiFi Hotspot YES</p>
                                                    
                                    <p class="py-1">Monitor &amp; Touch 21"</p>           
        
                                    <p class="py-1">Interface Ethernet</p>
        
                                    <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">Bookeye BE5-V2 <br> Kiosk</a></h4>
                        <img src="assets/img/book_scanners/BE5-V2_Kiosk__book_scanner.png" class="img-fluid" 
                        alt="Bookeye BE5-V2 Kiosk book scanner">                     
                            <!-- <p class="py-1">RICOH fi-8040 Fast Front Office Document, Receipt, Passport, ID Card Scanner with 50 Page Auto Feeder and PC-Less DirectScan Capability</p> -->
                             
                          
                            <p class="py-1">Scanning Area DIN A2+</p>

                            <p class="py-1">Resolution in dpi 400</p>

                            <p class="py-1">V-Mode Scanning YES</p>

                            <p class="py-1">Book Cradle YES</p>

                            <p class="py-1">WiFi Hotspot YES</p>
                                          
                            <p class="py-1">Monitor &amp; Touch 21"</p>           

                            <p class="py-1">Interface Ethernet</p>
 
                            <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">Bookeye BE5-V2 <br> Professional</a></h4>
                        <img src="assets/img/book_scanners/BE5-V2_Professional__book_scanner.png" class="img-fluid" 
                        alt="Bookeye BE5-V2 Proffessional book scanner">  

                        <p class="py-1">Scanning Area DIN A2+</p>

                        <p class="py-1">Resolution in dpi 600</p>

                        <p class="py-1">V-Mode Scanning YES</p>

                        <p class="py-1">Book Cradle YES</p>

                        <p class="py-1">WiFi Hotspot OPTION</p>
                                      
                        <p class="py-1">Monitor &amp; Touch 21"</p>           

                        <p class="py-1">Interface Ethernet</p>

                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">Bookeye BE5-V2A <br> Automatic</a></h4>
                        <img src="assets/img/book_scanners/BE5-V2A__book_scanner.png" class="img-fluid" 
                        alt="Bookeye BE5-V2A Automatic book scanner">                     
                                                                    
                        <p class="py-1">Scanning Area DIN A2+</p>

                        <p class="py-1">Resolution in dpi 600</p>

                        <p class="py-1">V-Mode Scanning YES</p>

                        <p class="py-1">Book Cradle V-GLASS</p>

                        <p class="py-1">WiFi Hotspot OPTION</p>
                                    
                        <p class="py-1">Monitor &amp; Touch 21"</p>           

                        <p class="py-1">Interface Ethernet</p>

                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">Bookeye BE5-V2 <br> Archive</a></h4>
                        <img src="assets/img/book_scanners/BE5-V2-Archive_Bookeye_V_altes_Buch__book_scanner.png" class="img-fluid" 
                        alt="Bookeye BE5-V2 Archive book scanner">
                      
                        <p class="py-1">Scanning Area DIN A2+</p>

                        <p class="py-1">Resolution in dpi 600</p>

                        <p class="py-1">V-Mode Scanning YES</p>

                        <p class="py-1">Book Cradle V-GLASS</p>

                        <p class="py-1">WiFi Hotspot OPTION</p>
                                    
                        <p class="py-1">Monitor &amp; Touch 21"</p>           

                        <p class="py-1">Interface Ethernet</p>

                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">Bookeye BE5-V2S <br> Semiautomatic</a></h4>
                        <img src="assets/img/book_scanners/BE5-V2S_V-Buch_Wippe_unten_Frontal__book_scanner.png" class="img-fluid" 
                        alt="Bookeye BE5-V2S Semiautomatic book scanner">
                    
                        <p class="py-1">Scanning Area DIN A2+</p>

                        <p class="py-1">Resolution in dpi 600</p>

                        <p class="py-1">V-Mode Scanning YES</p>

                        <p class="py-1">Book Cradle V-GLASS</p>

                        <p class="py-1">WiFi Hotspot OPTION</p>
                                    
                        <p class="py-1">Monitor &amp; Touch 21"</p>           

                        <p class="py-1">Interface Ethernet</p>

                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">Bookeye BE5-V1A <br> Professional</a></h4>
                        <img src="assets/img/book_scanners/BE5-V1A__book_scanner.png" class="img-fluid" 
                        alt="Bookeye BE5-V1A Proffessional book scanner">
                    
                        <p class="py-1">Scanning Area DIN A1+</p>

                        <p class="py-1">Resolution in dpi Max. 600</p>

                        <p class="py-1">V-Mode Scanning YES</p>

                        <p class="py-1">Book Cradle MFGLASS</p>

                        <p class="py-1">WiFi Hotspot NO</p>
                                    
                        <p class="py-1">Monitor &amp; Touch 27"</p>           

                        <p class="py-1">Interface Ethernet</p>

                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">Bookeye<br> BE5-V1A-C50</a></h4>
                        
                        <img src="assets/img/book_scanners/BE5-V1A-C50_90_V_Wippe_dickes_Buch__book_scanner.png" class="img-fluid" 
                        alt="Bookeye BE5-V1A Automatic book scanner">
                        <p class="py-1">Scanning Area DIN A1+</p>

                        <p class="py-1">Resolution in dpi Max. 600</p>

                        <p class="py-1">V-Mode Scanning YES</p>

                        <p class="py-1">Book Cradle MFGLASS</p>

                        <p class="py-1">WiFi Hotspot NO</p>
                                    
                        <p class="py-1">Monitor &amp; Touch 27"</p>           

                        <p class="py-1">Interface Ethernet</p>

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
