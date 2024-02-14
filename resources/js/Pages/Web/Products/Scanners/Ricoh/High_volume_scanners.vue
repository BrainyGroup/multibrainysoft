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
                        <h4><a href="#">fi-8040</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujitsu_ricoh_fi-8040.jpg"
                            class="img-fluid" alt="Image Scanner Ricoh fi-8040">

                        
                       
                    
                      
                            <!-- <tr class="even:bg-gray-50 odd:bg-white">
                                <p>RICOH fi-8040 Fast Front Office Document, Receipt, Passport, ID Card Scanner with 50 Page Auto Feeder and PC-Less DirectScan Capability</p>
                             -->
                          
                                <p class="py-1">Duplex, ADF Capaciy 50 Sheets</p>
                            
                          
                                <p class="py-1">Scanning Speed 40ppm/ 80ipm</p>
                            
                          
                                <p class="py-1">Optical Resolution 600dpi</p>
                            
                          
                                <p class="py-1">Daily Volume 6,000</p>
                            
                            
                                <p class="py-1">Document Size Up To A4</p>
                            
                          
                                <p class="py-1">Long Page - Up To 5.5M</p>

                                <p class="py-1">Interface USB, Ethernet</p>
                            
                          
                                <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                            
                       

                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                    data-aos-delay="200">
                    <div class="icon-box">
                        <h4><a href="">fi-8170</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujitsu_ricoh_fi-8170.jpg" class="img-fluid" 
                        alt="Image Scanner Ricoh fi-8170">
                       
                        
                            <!-- <tr class="even:bg-gray-50 odd:bg-white">
                                <p>RICOH fi-8040 Fast Front Office Document, Receipt, Passport, ID Card Scanner with 50 Page Auto Feeder and PC-Less DirectScan Capability</p>
                             -->
                          
                                <p class="py-1">Duplex, ADF Capaciy 100 Sheets</p>
                            
                          
                                <p class="py-1">Scanning Speed 70ppm/ 140ipm</p>
                            
                          
                                <p class="py-1">Optical Resolution 600dpi</p>
                            
                          
                                <p class="py-1">Daily Volume 10,000</p>
                            
                            
                                <p class="py-1">Document Size Up To A4</p>
                            
                          
                                <p class="py-1">Long Page - Up To 6M</p>

                                <p class="py-1">Interface USB, Ethernet</p>
                            
                          
                                <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                            
                           
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
                    data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">fi-8270</a></h4>

                        <img src="assets/img/ricoh_fujitsu/fujitsu_ricoh_fi-8270.jpg" class="img-fluid"
                            alt="Image Scanner Ricoh fi-8270">
                        
                            
                                <!-- <tr class="even:bg-gray-50 odd:bg-white">
                                    <p class="py-1">RICOH fi-8040 Fast Front Office Document, Receipt, Passport, ID Card Scanner with 50 Page Auto Feeder and PC-Less DirectScan Capability</p>
                                 -->
                              
                                    <p class="py-1">Flatbed/Duplex, ADF Capaciy 100 Sheets</p>
                                
                              
                                    <p class="py-1">Scanning Speed 70ppm/ 140ipm</p>
                                
                              
                                    <p class="py-1">Optical Resolution 600dpi</p>
                                
                              
                                    <p class="py-1">Daily Volume 10,000</p>
                                
                                
                                    <p class="py-1">Document Size Up To A4</p>
                                
                              
                                    <p class="py-1">Long Page - Up To 6M</p>

                                    <p class="py-1">Interface USB, Ethernet</p>
                                
                              
                                    <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                                

                               
                    </div>
                </div>
                

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <h4><a href="">fi-8150</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujitsu_ricoh_fi-8150.jpg" class="img-fluid" 
                        alt="Image Scanner Ricoh fi-8150">   
                        
                        
                            <!-- <p class="py-1">RICOH fi-8040 Fast Front Office Document, Receipt, Passport, ID Card Scanner with 50 Page Auto Feeder and PC-Less DirectScan Capability</p> -->
                             
                          
                                <p class="py-1">Duplex, ADF Capaciy 100 Sheets</p>
                            
                          
                                <p class="py-1">Scanning Speed 50ppm/ 100ipm</p>
                            
                          
                                <p class="py-1">Optical Resolution 600dpi</p>
                            
                          
                                <p class="py-1">Daily Volume 8,000</p>
                            
                            
                                <p class="py-1">Document Size Up To A4</p>
                            
                          
                                <p class="py-1">Long Page - Up To 6M</p>

                                <p class="py-1">Interface USB, Ethernet</p>
                            
                          
                                <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                            
                           

                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <h4><a href="">fi-8250</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujitsu_ricoh_fi-8250.jpg" class="img-fluid" 
                        alt="Image Scanner Ricoh fi-8250">
                       
                                                   <!-- <p class="py-1">RICOH fi-8040 Fast Front Office Document, Receipt, Passport, ID Card Scanner with 50 Page Auto Feeder and PC-Less DirectScan Capability</p> -->
                             
                          
                                                   <p class="py-1">Flatbed/ Duplex, ADF Capaciy 100 Sheets</p>
                            
                          
                                                   <p class="py-1">Scanning Speed 50ppm/ 100ipm</p>
                                               
                                             
                                                   <p class="py-1">Optical Resolution 600dpi</p>
                                               
                                             
                                                   <p class="py-1">Daily Volume 8,000</p>
                                               
                                               
                                                   <p class="py-1">Document Size Up To A4</p>
                                               
                                             
                                                   <p class="py-1">Long Page - Up To 6M</p>

                                                   <p class="py-1">Interface USB, Ethernet</p>
                                               
                                             
                                                   <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">fi-7300NX</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujitsu_ricoh_fi-7300.jpg" class="img-fluid" 
                        alt="Image Scanner Ricoh fi-7300NX">                     
                            <!-- <p class="py-1">RICOH fi-8040 Fast Front Office Document, Receipt, Passport, ID Card Scanner with 50 Page Auto Feeder and PC-Less DirectScan Capability</p> -->
                             
                          
                            <p class="py-1">Duplex, ADF Capaciy 80 Sheets</p>
                            
                          
                            <p class="py-1">Scanning Speed 60ppm/ 120ipm</p>
                        
                      
                            <p class="py-1">Optical Resolution 600dpi</p>
                        
                      
                            <p class="py-1">Daily Volume 9,000</p>
                        
                        
                            <p class="py-1">Document Size Up To A4</p>
                        
                      
                            <p class="py-1">Long Page - Up To 5.5M</p>

                            <p class="py-1">Interface USB, Ethernet, Wi-Fi</p>
                        
                      
                            <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">fi-800R</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujitsu_ricoh_fi-800.jpg" class="img-fluid" 
                        alt="Image Scanner Ricoh fi-800R">                       
                        <p class="py-1">Duplex, ADF Capaciy 30 Sheets</p>
                            
                          
                        <p class="py-1">Scanning Speed 40ppm/ 80ipm</p>
                    
                  
                        <p class="py-1">Optical Resolution 600dpi</p>
                    
                  
                        <p class="py-1">Daily Volume 4,500</p>
                    
                    
                        <p class="py-1">Document Size Up To A4</p>
                    
                  
                        <p class="py-1">Long Page - Up To 5.5M</p>

                        <p class="py-1">Interface USB</p>
                    
                  
                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">fi-70F</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujitsu_ricoh_fi-70f.png" class="img-fluid" 
                        alt="Image Scanner Ricoh fi-70F">                     
                        <p class="py-1">Flatbed, Simplex</p>
                            
                          
                        <p class="py-1">Scanning 1.3ips</p>
                    
                  
                        <p class="py-1">Optical Resolution 600dpi</p>
                    
                  
                        <p class="py-1">Daily Volume NA</p>
                    
                    
                        <p class="py-1">Document Size Max 105 x 148 mm</p>
                    
                  
                        <p class="py-1">Long Page - NA</p>

                        <p class="py-1">Interface USB</p>
                    
                  
                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">fi-8190</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujitsu_ricoh_fi-8190.jpg" class="img-fluid" 
                        alt="Image Scanner Ricoh fi-8190">
                      
                        <p class="py-1">Duplex, ADF Capaciy 100 Sheets</p>
                            
                          
                        <p class="py-1">Scanning Speed 90ppm/ 180ipm</p>
                    
                  
                        <p class="py-1">Optical Resolution 600dpi</p>
                    
                  
                        <p class="py-1">Daily Volume 13,500</p>
                    
                    
                        <p class="py-1">Document Size Up To A4</p>
                    
                  
                        <p class="py-1">Long Page - Up To 6M</p>

                        <p class="py-1">Interface USB, Ethernet</p>
                    
                  
                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">fi-8290</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujitsu_ricoh_fi-8290.jpg" class="img-fluid" 
                        alt="Image Scanner Ricoh fi-8290">
                    
                        <p class="py-1">Duplex, Flatbed/ADF -100 Sheets</p>
                            
                          
                        <p class="py-1">Scanning Speed 90ppm/ 180ipm</p>
                    
                  
                        <p class="py-1">Optical Resolution 600dpi</p>
                    
                  
                        <p class="py-1">Daily Volume 13,000</p>
                    
                    
                        <p class="py-1">Document Size Up To A4</p>
                    
                  
                        <p class="py-1">Long Page - Up To 6M</p>

                        <p class="py-1">Interface USB, Ethernet</p>
                    
                  
                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">fi-7480</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujitsu_ricoh_fi-7480.jpg" class="img-fluid" 
                        alt="Image Scanner Ricoh fi-7480">
                    
                        <p class="py-1">Duplex, ADF Capaciy 100 Sheets</p>
                            
                          
                        <p class="py-1">Scanning Speed 80ppm/ 160ipm</p>
                    
                  
                        <p class="py-1">Optical Resolution 600dpi</p>
                    
                  
                        <p class="py-1">Daily Volume 24,500</p>
                    
                    
                        <p class="py-1">Document Size Up To A3</p>
                    
                  
                        <p class="py-1">Long Page - Up To 5.5M</p>

                        <p class="py-1">Interface USB</p>
                    
                  
                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        
                        <img src="assets/img/ricoh_fujitsu/fujitsu_ricoh_fi-7460.jpg" class="img-fluid" 
                        alt="Image Scanner Ricoh fi-7460">
                        <p class="py-1">Duplex, ADF Capaciy 100 Sheets</p>
                            
                          
                        <p class="py-1">Scanning Speed 60ppm/ 120ipm</p>
                    
                  
                        <p class="py-1">Optical Resolution 600dpi</p>
                    
                  
                        <p class="py-1">Daily Volume 18,000</p>
                    
                    
                        <p class="py-1">Document Size Up To A3</p>
                    
                  
                        <p class="py-1">Long Page - Up To 5.5M</p>

                        <p class="py-1">Interface USB</p>
                    
                  
                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">fi-7900</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujitsu_ricoh_fi-7900.jpg" class="img-fluid" 
                        alt="Image Scanner Ricoh fi-7900">
                       
                        <p class="py-1">Duplex, ADF Capaciy 500 Sheets</p>
                            
                          
                        <p class="py-1">Scanning Speed 140ppm/ 280ipm</p>
                    
                  
                        <p class="py-1">Optical Resolution 600dpi</p>
                    
                  
                        <p class="py-1">Daily Volume 120,000</p>
                    
                    
                        <p class="py-1">Document Size Up To A3</p>
                    
                  
                        <p class="py-1">Long Page - Up To 5.5M</p>

                        <p class="py-1">Interface USB</p>
                    
                  
                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">fi-7800</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujitsu_ricoh_fi-7800.jpg" class="img-fluid" 
                        alt="Image Scanner Ricoh fi-7800">
                      
                        <p class="py-1">Duplex, ADF Capaciy 500 Sheets</p>
                            
                          
                        <p class="py-1">Scanning Speed 110ppm/ 220ipm</p>
                    
                  
                        <p class="py-1">Optical Resolution 600dpi</p>
                    
                  
                        <p class="py-1">Daily Volume 100,000</p>
                    
                    
                        <p class="py-1">Document Size Up To A3</p>
                    
                  
                        <p class="py-1">Long Page - Up To 5.5M</p>

                        <p class="py-1">Interface USB</p>
                    
                  
                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">fi-7700</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujitsu_ricoh_fi-7700.jpg" class="img-fluid" 
                        alt="Image Scanner Ricoh fi-7700">
                        
                        <p class="py-1">Duplex, Flatbed/ADF- 300 Sheets</p>
                            
                          
                        <p class="py-1">Scanning Speed 100ppm/ 200ipm</p>
                    
                  
                        <p class="py-1">Optical Resolution 600dpi</p>
                    
                  
                        <p class="py-1">Daily Volume 44,000</p>
                    
                    
                        <p class="py-1">Document Size Up To A3</p>
                    
                  
                        <p class="py-1">Long Page - Up To 5.5M</p>

                        <p class="py-1">Interface USB</p>
                    
                  
                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">fi-7700S</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujitsu_ricoh_fi-7700s.jpg" class="img-fluid" 
                        alt="Image Scanner Ricoh fi-7700s">
                        <h4><a href="">Support</a></h4>
                        <p class="py-1">Simplex, Flatbed/ADF- Sheets</p>
                            
                          
                        <p class="py-1">Scanning Speed 75ppm</p>
                    
                  
                        <p class="py-1">Optical Resolution 600dpi</p>
                    
                  
                        <p class="py-1">Daily Volume 33,000</p>
                    
                    
                        <p class="py-1">Document Size Up To A3</p>
                    
                  
                        <p class="py-1">Long Page - Up To 5.5M</p>

                        <p class="py-1">Interface USB</p>
                    
                  
                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>


                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">fi-7600</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujitsu_ricoh_fi-7600.jpg" class="img-fluid" 
                        alt="Image Scanner Ricoh fi-7600">
                       
                        <p class="py-1">Duplex, ADF Capaciy 300 Sheets</p>
                            
                          
                        <p class="py-1">Scanning Speed 100ppm/ 200ipm</p>
                    
                  
                        <p class="py-1">Optical Resolution 600dpi</p>
                    
                  
                        <p class="py-1">Daily Volume 44,000</p>
                    
                    
                        <p class="py-1">Document Size Up To A3</p>
                    
                  
                        <p class="py-1">Long Page - Up To 5.5M</p>

                        <p class="py-1">Interface USB</p>
                    
                  
                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">ScanSnap iX1600</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujistu_ricoh_scansnap_ix1600.png" class="img-fluid" 
                        alt="Image Scanner Ricoh ScanSnap iX1600">
                   
                        <p class="py-1">Duplex, ADF Capaciy 50 Sheets</p>
                            
                          
                        <p class="py-1">Scanning Speed 40ppm/80ipm</p>
                    
                  
                        <p class="py-1">Optical Resolution 600dpi</p>
                    
                  
                        <p class="py-1">Daily Volume NA</p>
                    
                    
                        <p class="py-1">Document Size Up To A3</p>
                    
                  
                        <p class="py-1">Long Page - Up To 3M</p>

                        <p class="py-1">Interface USB, Wi-Fi</p>
                    
                  
                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">ScanSnap iX1400</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujistu_ricoh_scansnap_ix1400.png" class="img-fluid" 
                        alt="Image Scanner Ricoh ScanSnap iX1400">
                       
                        <p class="py-1">Duplex, ADF Capaciy 50 Sheets</p>
                            
                          
                        <p class="py-1">Scanning Speed 40ppm/80ipm</p>
                    
                  
                        <p class="py-1">Optical Resolution 600dpi</p>
                    
                  
                        <p class="py-1">Daily Volume NA</p>
                    
                    
                        <p class="py-1">Document Size Up To A4</p>
                    
                  
                        <p class="py-1">Long Page - Up To 3M</p>

                        <p class="py-1">Interface USB, Wi-Fi</p>
                    
                  
                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">ScanSnap iX1300</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujistu_ricoh_scansnap_ix1300.png" class="img-fluid" 
                        alt="Image Scanner Ricoh ScanSnap iX1300">
                        
                        <p class="py-1">Duplex, ADF Capaciy 20 Sheets</p>
                            
                          
                        <p class="py-1">Scanning Speed 30ppm/60ipm</p>
                    
                  
                        <p class="py-1">Optical Resolution 600dpi</p>
                    
                  
                        <p class="py-1">Daily Volume NA</p>
                    
                    
                        <p class="py-1">Document Size Up To A4</p>
                    
                  
                        <p class="py-1">Long Page - Up To 3M</p>

                        <p class="py-1">Interface USB, Wi-Fi</p>
                    
                  
                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">ScanSnap iX100</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujistu_ricoh_scansnap_ix100.png" class="img-fluid" 
                        alt="Image Scanner Ricoh ScanSnap iX100">
                       
                        <p class="py-1">Simplex, Single Fed</p>
                            
                          
                        <p class="py-1">Scanning Speed 5.2spp</p>
                    
                  
                        <p class="py-1">Optical Resolution 600dpi</p>
                    
                  
                        <p class="py-1">Daily Volume NA</p>
                    
                    
                        <p class="py-1">Document Size Up To A4</p>
                    
                  
                        <p class="py-1">Long Page - Up To 0.86M</p>

                        <p class="py-1">Interface USB</p>
                    
                  
                        <p class="py-1"><Strong>Get More Info or Quote >></Strong></p>
                    </div>
                </div>


                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <h4><a href="">ScanSnap SV600</a></h4>
                        <img src="assets/img/ricoh_fujitsu/fujistu_ricoh_scansnap_sv600.png" class="img-fluid" 
                        alt="Image Scanner Ricoh ScanSnap SV600">
                       
                        <p class="py-1">Overhead, Simplex</p>
                            
                          
                        <p class="py-1">Scanning Speed 3spp</p>
                    
                  
                        <p class="py-1">Optical Resolution 600dpi</p>
                    
                  
                        <p class="py-1">Daily Volume NA</p>
                    
                    
                        <p class="py-1">Document Size 432 x 300 mm</p>
                    
                  
                        <p class="py-1">Long Page - NA</p>

                        <p class="py-1">Interface USB</p>
                    
                  
                        <p class="py-1"><Strong><a href="https://hustling-leader-6286.ck.page/d10b553aa0">Get More Info or Quote >></a></Strong></p>
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
