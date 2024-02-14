<script setup>
import WebLayout from '@/Layouts/WebLayout.vue';
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

    <WebLayout :translations="translations">
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Home</h2>
        </template> -->

        <div>
            <div class="max-w-7xl mx-auto">
                <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> -->
                    

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Digitalization, Archive and <span>Business Process</span></h1>
            <h2>We are talented experties providing services in digitization, business processes and archive solution</h2>
            <div class="d-flex">
                <a href="#about" class="btn-get-started scrollto">Get Started</a>
                <a href="https://youtu.be/qyXb7Vz2TBE" class="glightbox btn-watch-video"><i
                        class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
        </div>
    </section><!-- End Hero --> 

   

                        <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">

            <div class="row">


                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><a href="/edms"><i class="bx bx-file"></i></a></div>
                        <h4 class="title"><a href="/edms">EDMS</a></h4>
                        <p class="description">Electronics Document Management System and Workflows</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4 class="title"><a href="/convene">Archive</a></h4>
                        <p class="description">Smart and Secure Inhouse Archive, Mobile Shelves, Racks, Archive Boxes and
                            Barcodes.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h2 class="title"><a href="/digitalization">Digitalization</a></h2>
                        <p class="description">Comprehensive Services for Conversion of Records and Process to Digital
                            Format</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4 class="title"><a href="/content_pro">ICT Consultation</a></h4>
                        <p class="description">Consultation in Document Management, Digital Business Process and
                            Digitalization </p>
                    </div>
                </div>

            </div>


        </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>About</h2>
                <h3>Find Out More <span>About Us</span></h3>
                <p>We strive to create an environment where people really want to come to work every day to collaborate,
                    innovate and solve their customers’ problems. We believe in leveraging technology to deliver immediate
                    savings by automating and accelerating your business processes..</p>
            </div>

            <div class="row">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <img src="assets/img/about.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up"
                    data-aos-delay="100">
                    <h3>Why Are We Different?</h3>
                    <p class="fst-italic">
                        DATAHOUSE has over 16 years' experience helping organisations unlock value by introducing
                        intelligent process efficiencies. We simplify your business processes using intelligent capture and
                        workflow technology to ensure your organisation is more successful today and in the future
                    </p>
                    <h4>Our clients tell us we are unique for a variety of important reasons including:</h4>
                    <ul>
                        <li>
                            <i class="bx bx-store-alt"></i>
                            <div>
                                <h5>Industry Specialization</h5>
                                <p>Our product and services target improving document, records and busines process
                                    management in digital and physical format </p>
                            </div>
                        </li>
                        <li>
                            <i class="bx bx-images"></i>
                            <div>
                                <h5>Extensive Product Knowledge and Deep Customization</h5>
                                <p>We tailor our product and service to meet your needs and business objectives</p>
                            </div>
                        </li>
                    </ul>
       
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
        <div class="container" data-aos="fade-up">

            <div class="row skills-content">

                <div class="col-lg-6">

                    <div class="progress">
                        <span class="skill">Digitalization <i class="val">81%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Archive Solution<i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Scanners <i class="val">75%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="progress">
                        <span class="skill">Consultancy <i class="val">80%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Training <i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Barcode solution <i class="val">55%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section><!-- End Skills Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-emoji-smile"></i>

                        
                        <span class="purecounter">
                            <vue3-autocounter ref='counter' :startAmount='0' :endAmount='2021' :duration='3'   :autoinit='true'/>
                        </span>
                        <p>Country offices</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                    <div class="count-box">
                        <i class="bi bi-journal-richtext"></i>
                        <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>country clients</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="bi bi-headset"></i>
                        <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Hours of Support</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="bi bi-people"></i>
                        <span data-purecounter-start="0" data-purecounter-end="26" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Workers</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients ">
        <div class="container" data-aos="zoom-in">
            <div class="section-title">
                <h2>Clients</h2>
                <h3>Some of our <span>Clients</span></h3>
                <p>We have clients in various industries such as banking, telecomunication, power and energy, and
                    governments </p>
            </div>

            <div class="row">

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/nbc.jpg" class="img-fluid"
                        alt="National Bank of Commerce (NBC) Limited Tanzania">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/standard-bank.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/crdb-1.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/tib-1.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/exim-bank.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/nmb.jpg" class="img-fluid" alt="">
                </div>

            </div>


            <div class="row">


                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/airtel-1-2.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/tigo-1.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/ttcl.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/voda-1.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/zantel-1.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/tcra-1.jpg" class="img-fluid" alt="">
                </div>

            </div>

            <div class="row">

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/aon.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/ardhi.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/costech-1.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/tra.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/eac.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/muhimbili.jpg" class="img-fluid" alt="">
                </div>

            </div>

            <div class="row">

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/nhif-1.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/nssf.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/oryx-1.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/ppf.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/rita.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/suza.jpg" class="img-fluid" alt="">
                </div>

            </div>


            <div class="row">

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/swissport.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/tanesco.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/tma.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/tpdc-1.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/tic.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="assets/img/clients/udsm.jpg" class="img-fluid" alt="">
                </div>

            </div>

        </div>
    </section><!-- End Clients Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Services</h2>
                <h3>Check our <span>Services</span></h3>
                <p>Our solution comes with various services such as helping customer in getting started by providing value
                    added services, training and support</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <img src="assets/img/services/scanning_data_capturing_datahouse_tanzania_rwanda_uganda_datarwanda_kigali_kampala_daressalaam.png"
                            class="img-fluid" alt="">
                        <h4><a href="/digitalization">Digitalization</a></h4>
                        <p>Document scanning allow moving business towards digitization and automation</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                    data-aos-delay="200">
                    <div class="icon-box">
                        <img src="assets/img/services/Inhouse_Archive_01.png" class="img-fluid" alt="">
                        <h4><a href="">Inhouse Archiving</a></h4>
                        <p>Documents Sorting, Registering, Boxing, Barcoding and Racking</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
                    data-aos-delay="300">
                    <div class="icon-box">

                        <img src="assets/img/services/datahouse_data_entry_and_validation.jpg" class="img-fluid"
                            alt="">
                        <h4><a href="">Data Entry and Validation</a></h4>
                        <p>Data Entry sercives and data validation, either one by one or in bulk by using softcated tool</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <img src="assets/img/services/datahouse_destruction.jpg" class="img-fluid" alt="">

                        <h4><a href="">Destruction</a></h4>
                        <p>Sucurely destroy documents in paper format which is source of confidential information and brand
                            risk</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <img src="assets/img/services/datahouse_training.jpg" class="img-fluid" alt="">
                        <h4><a href="">Training and consultation</a></h4>
                        <p>Customized training in digital business process, documents and records management</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <img src="assets/img/services/datahouse_support.jpg" class="img-fluid" alt="">
                        <h4><a href="">Support</a></h4>
                        <p>Servise and support for our products inluding hardwares and software during and after warrant
                            period</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->

    <div class="section-title">
        <h2>Testimonials</h2>
        <h3>Some of client's <span>Testimonials</span></h3>
        <p>Read yourself what our clients say.</p>
    </div>
    <section id="testimonials" class="testimonials">


        <div class="container" data-aos="zoom-in">

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/clients/kcb.png" class="testimonial-img" alt="">
                            <h3>Yusto Damas</h3>
                            <h4>Logistic Manager</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                The team conscientious and very attentive to the unique needs of our project. Datahouse
                                provided excellent service to the KCB Bank and their team was readily as available whenever
                                as available whenever needed.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/clients/softnet.png" class="testimonial-img" alt="">
                            <h3>Gilbert Herman</h3>
                            <h4>Directore</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                For entire period we have worked with them they have been delivering very good services with
                                high flexibility whenever required, particularly when we had very huge influx of documenrs.
                                they were able to introduce shifts that could work2417 at a very shorl notice
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/clients/crdb-1.jpg" class="testimonial-img" alt="">
                            <h3>Gothalm Mbele</h3>
                            <h4>For Managing Director</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                I am confident about the services of Datahouse and I can recommend their services to whoever
                                may require the same
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/clients/tcra-1.jpg" class="testimonial-img" alt="TCRA">
                            <h3>Imani Losindilo</h3>
                            <h4>For TCRA</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Throughout this time that Datahouse has worked with us they had demonstrated high level of
                                commitment towards the project and delivered excellent services in their undertaking.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/clients/oryx-1.jpg" class="testimonial-img" alt="">
                            <h3>Megan Chambury</h3>
                            <h4>Commercial Risk Manager</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                They were at all times professional and have a thorough knowledge of the software enabling
                                them to deliver the solution required.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Portfolio</h2>
                <h3>Check our <span>Portfolio</span></h3>
                <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque
                    vitae autem.</p>
            </div>



            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-6 col-md-6 portfolio-item filter-card">
                    <img src="assets/img/portfolio/fujitsu/fijistu_high_volume_scanner_image_scanner_datahouse_tanzania_uganda_rwanda_kigali_kampala_dar_es_salaam_datarwanda-e1609230003388.jpg"
                        class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>High volume fujitsu scanners</h4>
                        <p>High volume fujitsu scanners suitable for scanning document size from business card size to A3
                            with highest speep</p>
                        <a href="assets/img/portfolio/fujitsu/fijistu_high_volume_scanner_image_scanner_datahouse_tanzania_uganda_rwanda_kigali_kampala_dar_es_salaam_datarwanda-e1609230003388.jpg"
                            data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                            title="High volume fujitsu scanners suitable for scanning document size from business card size to A3 with highest speep"><i
                                class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>


                <div class="col-lg-6 col-md-6 portfolio-item filter-card">
                    <img src="assets/img/portfolio/barcode_scanner_datahouse_tanzania_uganda_rwanda.png" class="img-fluid"
                        alt="">
                    <div class="portfolio-info">
                        <h4>Barcodes Solutions</h4>
                        <p>Barcodes labels, barcode printers, barcodes printers ribbon </p>
                        <a href="assets/img/portfolio/barcode_scanner_datahouse_tanzania_uganda_rwanda.png"
                            data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                            title="Barcodes solutions"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>

            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-6 col-md-6 portfolio-item filter-card">
                    <img src="assets/img/portfolio/id_printers_smart_datahouse_tanzania_uganda_rwanda_datarwanda.png"
                        class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Identity cards printing solutions</h4>
                        <p>Identity cards printes, identity card printer ribbons, pvc cards</p>
                        <a href="assets/img/portfolio/id_printers_smart_datahouse_tanzania_uganda_rwanda_datarwanda.png"
                            data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                            title="High volume fujitsu scanners suitable for scanning document size from business card size to A3 with highest speep"><i
                                class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>


                <div class="col-lg-6 col-md-6 portfolio-item filter-card">
                    <img src="assets/img/portfolio/movable_shelves_electronic_mobile_datahouse_uganda_rwanda_datarwanda.png"
                        class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Movable shelves</h4>
                        <p>Electronics movable shelves</p>
                        <a href="assets/img/portfolio/movable_shelves_electronic_mobile_datahouse_uganda_rwanda_datarwanda.png.jpg"
                            data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                            title="Movable shelves"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>

            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-6 col-md-6 portfolio-item filter-card">
                    <img src="assets/img/portfolio/Large_format_WIDEFORMAT_scanner.png" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Large Format Scanners</h4>
                        <p>The WideTEK® wide format scanners are the fastest and most productive wide format scanners on the
                            market</p>
                        <a href="assets/img/portfolio/Large_format_WIDEFORMAT_scanner.png" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="Large format scanners"><i
                                class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>


                <div class="col-lg-6 col-md-6 portfolio-item filter-card">
                    <img src="assets/img/portfolio/book_scanner_datahouse.png" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Book Scanner</h4>
                        <p>Book Scanners</p>
                        <a href="assets/img/portfolio/book_scanner_datahouse.png" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="Book scanners"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>

            </div>


        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Team</h2>
                <h3>Secret of Our Success is Our <span>Team</span></h3>
                <p>Having the best products on the market certainly helps. But DATAHOUSE’s key advantage lies in its people
                </p>
            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Godfrey Woiso</h4>
                            <span>Managing Director</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Yahaya Frezier</h4>
                            <span>Business Development Manager</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Alex Makolo</h4>
                            <span>Administration and Financial Manager</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Bryton Kessy</h4>
                            <span>Computer Engineer</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Pricing</h2>
                <h3>Check our <span>Pricing</span></h3>
                <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque
                    vitae autem.</p>
            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="box">
                        <h3>Free</h3>
                        <h4><sup>$</sup>0<span> / month</span></h4>
                        <ul>
                            <li>Aida dere</li>
                            <li>Nec feugiat nisl</li>
                            <li>Nulla at volutpat dola</li>
                            <li class="na">Pharetra massa</li>
                            <li class="na">Massa ultricies mi</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="box featured">
                        <h3>Business</h3>
                        <h4><sup>$</sup>19<span> / month</span></h4>
                        <ul>
                            <li>Aida dere</li>
                            <li>Nec feugiat nisl</li>
                            <li>Nulla at volutpat dola</li>
                            <li>Pharetra massa</li>
                            <li class="na">Massa ultricies mi</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="box">
                        <h3>Developer</h3>
                        <h4><sup>$</sup>29<span> / month</span></h4>
                        <ul>
                            <li>Aida dere</li>
                            <li>Nec feugiat nisl</li>
                            <li>Nulla at volutpat dola</li>
                            <li>Pharetra massa</li>
                            <li>Massa ultricies mi</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                    <div class="box">
                        <span class="advanced">Advanced</span>
                        <h3>Ultimate</h3>
                        <h4><sup>$</sup>49<span> / month</span></h4>
                        <ul>
                            <li>Aida dere</li>
                            <li>Nec feugiat nisl</li>
                            <li>Nulla at volutpat dola</li>
                            <li>Pharetra massa</li>
                            <li>Massa ultricies mi</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>F.A.Q</h2>
                <h3>Frequently Asked <span>Questions</span></h3>
                <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque
                    vitae autem.</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <ul class="faq-list">

                        <li>
                            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Non consectetur a
                                erat nam at lectus urna duis? <i class="bi bi-chevron-down icon-show"></i><i
                                    class="bi bi-chevron-up icon-close"></i></div>
                            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non
                                    curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus
                                    non.
                                </p>
                            </div>
                        </li>

                        <li>
                            <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Feugiat scelerisque
                                varius morbi enim nunc faucibus a pellentesque? <i
                                    class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                            </div>
                            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum
                                    velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec
                                    pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus
                                    turpis massa tincidunt dui.
                                </p>
                            </div>
                        </li>

                        <li>
                            <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Dolor sit amet
                                consectetur adipiscing elit pellentesque habitant morbi? <i
                                    class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                            </div>
                            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus
                                    pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum
                                    tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna
                                    molestie at elementum eu facilisis sed odio morbi quis
                                </p>
                            </div>
                        </li>

                        <li>
                            <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Ac odio tempor orci
                                dapibus. Aliquam eleifend mi in nulla? <i class="bi bi-chevron-down icon-show"></i><i
                                    class="bi bi-chevron-up icon-close"></i></div>
                            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum
                                    velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec
                                    pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus
                                    turpis massa tincidunt dui.
                                </p>
                            </div>
                        </li>

                        <li>
                            <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Tempus quam
                                pellentesque nec nam aliquam sem et tortor consequat? <i
                                    class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                            </div>
                            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est
                                    ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit
                                    adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                                </p>
                            </div>
                        </li>

                        <li>
                            <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Tortor vitae purus
                                faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i
                                    class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                            </div>
                            <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo
                                    integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc
                                    eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                                    Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus.
                                    Nibh tellus molestie nunc non blandit massa enim nec.
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </section><!-- End Frequently Asked Questions Section -->

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
                    <div class="col-lg-6">
                        <div class="info-box mb-4">
                            <i class="bx bx-map"></i>
                            <h3>Our Address</h3>
                            <p>House No. 3, Isevya street, Upanga, Dar es salaam, Tanzania</p>
                        </div>
                    </div>
    
                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <p>sales@datahousetza.com</p>
                        </div>
                    </div>
    
                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <p>+255 22 2151915</p>
                        </div>
                    </div>
    
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
    </WebLayout>
</template>
