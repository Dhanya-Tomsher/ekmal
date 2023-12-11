<?php
use App\Models\Services;
?>
<footer>
         <div class="footer-inner">
            <div class="container">
               <div class="footer-top">
                  <div class="row g-0">
                     <div class="col-md-6">
                        <img src="{{ asset('assets/images/logo.svg') }}" class="img-fluid" alt="EKMAL Logo">
                        <ul class="footer-menu">
                           <li>
                              <a href="{{ route('services') }}"> Services</a>
                           </li>
                           <li>
                              <a href="{{ route('blogs') }}"> Insights</a>
                           </li>
                           <li>
                              <a href="{{ route('courses') }}"> Courses</a>
                           </li>
                           <li>
                              <a href="{{ route('careers') }}">  Careers</a>
                           </li>
                           <li>
                              <a href="{{ route('about') }}">  About Us</a>
                           </li>
                        </ul>
                     </div>
                     <div class="col-md-6 align-self-end text-end">
                        <ul class="social-links">
                           <li>
                              <a href="#"><i class="bi bi-instagram"></i></a>
                           </li>
                           <li>
                              <a href="#"><i class="bi bi-facebook"></i></a>
                           </li>
                           <li>
                              <a href="#"><i class="bi bi-twitter-x"></i></a>
                           </li>
                           <li>
                              <a href="#"><i class="bi bi-youtube"></i></a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <hr class="footer-hr">
               <div class="footer-bottom">
                  <div class="row">
                     <h5>What we do</h5>
                     <?php
                     $serv1 = Services::find(1);
                     $serv2 = Services::find(2);
                     $serv3 = Services::find(3);
                     $serv4 = Services::find(4);
                     $serv5 = Services::find(5);
                     $serv6 = Services::find(6);
                     $serv7 = Services::find(7);
                     ?>    
                     <div class="col-md-4">
                        <ul class="services-link">
                           <li>
                              <a href="{{ route('service-details', ['slug' => $serv1->slug]) }}">{{ $serv1->name }}       
                              </a>
                           </li>
                           <li>
                              <a href="{{ route('service-details', ['slug' => $serv2->slug]) }}">{{ $serv2->name }}      
                              </a>
                           </li>
                           <li>
                              <a href="{{ route('service-details', ['slug' => $serv3->slug]) }}">{{ $serv3->name }}    
                              </a>
                           </li>
                        </ul>
                     </div>
                     <div class="col-md-4">
                        <ul class="services-link">
                           <li>
                              <a href="{{ route('service-details', ['slug' => $serv4->slug]) }}">{{ $serv4->name }}      
                              </a>
                           </li>
                           <li>
                              <a href="{{ route('service-details', ['slug' => $serv5->slug]) }}">{{ $serv5->name }}
                              </a>
                           </li>
                        </ul>
                     </div>

                     <div class="col-md-4">
                        <ul class="services-link">
                           <li>
                              <a href="{{ route('service-details', ['slug' => $serv6->slug]) }}">{{ $serv6->name }}     
                              </a>
                           </li>
                           <li>
                              <a href="{{ route('service-details', ['slug' => $serv7->slug]) }}">{{ $serv7->name }}
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <hr class="footer-hr">
               <div class="footer-copyright">
                     <div class="row g-0">
                        <div class="col-md-6">
                           <P>© <?= date('Y'); ?> EKMAL. All rights reserved.</P>
                        </div>
                        <div class="col-md-6 d-none d-lg-block">
                           <ul class="footer-bottom-links">
                              <li>
                                 <a href="{{ route('privacy') }}">Privacy Policy</a>
                              </li>
                              <li>
                                 <a href="{{ route('terms') }}">Terms and Conditions</a>
                              </li>
                              <li>
                                 <a href="{{ route('faq') }}">FAQ</a>
                              </li>
                           </ul>
                        </div>
                     </div>
               </div>
            </div>
         </div>

      </footer>