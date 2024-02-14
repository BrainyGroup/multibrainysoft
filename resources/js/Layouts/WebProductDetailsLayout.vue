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
        <div class="min-h-screen ">         
    

            <section id="topbar" class="d-flex align-items-center">
                <div class="container d-flex justify-content-center justify-content-md-between">
                    <div class="contact-info d-flex align-items-center">
                        <i class="bi bi-envelope d-flex align-items-center"><a
                                href="mailto:sales@datahousetza.com">sales@datahousetza.com.com</a></i>
                        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+255754307151</span></i>
                    </div>
                    <div class="social-links d-none d-md-flex align-items-center">
                        <a href="https://twitter.com/datahousetz" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="https://www.facebook.com/datahousetza/" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </section>

                    <!-- ======= Header ======= -->

        <header id="header" class="d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">

                <!-- <h1 class="logo"><a href="index.html">Datahouse<span>.</span></a></h1> -->
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="/" class="logo"><img src="/img/logo.png" class="mt-4"
                        alt="Datahouse Logo"></a>

    <!-- <svg width="400" height="100">
        <circle cx="14" cy="50" r="12" stroke="#808080" stroke-width="4" fill="#808080" />
        <circle cx="44" cy="50" r="12" stroke="#545454" stroke-width="4" fill="#545454" />
        <circle cx="74" cy="50" r="12" stroke="#000000" stroke-width="4" fill="#000000" />
        <text x="92" y="64" style="font-size: 3em">data<tspan fill="red">house</tspan></text>
        Sorry, your browser does not support inline SVG.
     </svg> -->

                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto active" href="/#hero">Home</a></li>
                        <li><a class="nav-link scrollto" href="/#about">About</a></li>
                        <li><a class="nav-link scrollto" href="/#services">Services</a></li>
                        <li><a class="nav-link scrollto " href="/#portfolio">Portfolio</a></li>
                        <li><a class="nav-link scrollto" href="/#team">Team</a></li>
                        <li><a class="nav-link scrollto" href="/login">Clients</a></li>
                        <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="#">Drop Down 1</a></li>
                                <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                            class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="#">Deep Drop Down 1</a></li>
                                        <li><a href="#">Deep Drop Down 2</a></li>
                                        <li><a href="#">Deep Drop Down 3</a></li>
                                        <li><a href="#">Deep Drop Down 4</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Drop Down 2</a></li>
                                <li><a href="#">Drop Down 3</a></li>
                                <li><a href="#">Drop Down 4</a></li>
                            </ul>
                        </li>

                        <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->

            


                                
                          


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
            <main id="main">
                <slot />
            </main>

                <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h4>Join Our Newsletter</h4>
                        <p>For weekly news and update about our product and services</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Datahouse<span>.</span></h3>
                        <p>
                            House No. 3, Isevya Street <br>
                            Upanga, Dar es salaam<br>
                            Tanzania <br><br>
                            <strong>Phone:</strong> +255 22 2151915<br>
                            <strong>Email:</strong> sales@datahousetza.com<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="/#hero">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/#about">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/#service">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Datahouse</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/Datahouse-bootstrap-business-template/ -->
                Designed and created by <a href="https://datahousetza.com.com/">Datahouse</a>
            </div>
        </div>
    </footer><!-- End Footer -->




        </div>
    </div>
</template>


