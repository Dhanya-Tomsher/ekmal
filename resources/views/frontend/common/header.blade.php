<header class="main-header">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-3 col-md-2 order-1 order-lg-1">
                  <!-- logo -->
                  <a href="{{ route('home') }}">
                     <img src="{{ asset('assets/images/logo.svg') }}" class="logo img-fluid" style="width: 85px;" alt="Ekmal Logo">
                  </a>
               </div>
               <div class="col-2 col-md-7 order-3 order-lg-2">
                  <!-- navigation -->
                  <nav id="navigation1" class="navigation">
                     <div class="nav-header">
                       <div class="nav-toggle"></div>
                     </div>
                     <div class="nav-menus-wrapper">
                       <ul class="nav-menu align-to-right">
            
                         <li>
                           <a href="{{ route('services') }}">Services</a>
                           <div class="megamenu-panel">
                           <div class="container">
                               <div class="row">
                                 <div class="col-md-6">
                                    <h3>Services</h3>
                                    <p>EKMAL can help you realize your ambitions by offering a radically different approach to connecting strategy, transactions, transformation and technology, where design and delivery inform each other at every step.</p>
                                    <a href="{{ route('services') }}" class="btn btn-primary-stroke mt-4 mb-5 mb-md-0">
                                       <span> Free Case Evaluation</span> 
                                       <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>
                                    </a>
                                 </div>
                                 <?php
                                 use App\Models\Services;
                                 $serv1 = Services::find(1);
                                 $serv2 = Services::find(2);
                                 $serv3 = Services::find(3);
                                 $serv4 = Services::find(4);
                                 $serv5 = Services::find(5);
                                 $serv6 = Services::find(6);
                                 $serv7 = Services::find(7);
                                 ?>
                                 <div class="col-md-3">
                                    <ul>
                                       <li>
                                          <a href="{{ route('service-details', ['slug' => $serv1->slug]) }}">{{ $serv1->name }}</a>
                                       </li>
                                       <li>
                                          <a href="{{ route('service-details', ['slug' => $serv2->slug]) }}">{{ $serv2->name }}</a>
                                       </li>
                                       <li>
                                          <a href="{{ route('service-details', ['slug' => $serv3->slug]) }}">{{ $serv3->name }}</a>
                                       </li>
                                       <li>
                                          <a href="{{ route('service-details', ['slug' => $serv4->slug]) }}">{{ $serv4->name }}</a>
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="col-md-3">
                                    <ul>
                                       <li>
                                          <a href="{{ route('service-details', ['slug' => $serv5->slug]) }}">{{ $serv5->name }}</a>
                                       </li>
                                       <li>
                                          <a href="{{ route('service-details', ['slug' => $serv6->slug]) }}">{{ $serv6->name }}</a>
                                       </li>
                                       <li>
                                          <a href="{{ route('service-details', ['slug' => $serv7->slug]) }}">{{ $serv7->name }}</a>
                                       </li>
                                    </ul>
                                 </div>
                               </div>
                           </div>
                           </div>
                         </li>
                         <li><a href="{{ route('blogs') }}">Insights</a></li>
                         <li><a href="{{ route('courses') }}">Courses</a></li>
                         <li><a href="{{ route('careers') }}">Careers </a></li>
                         <li>
                           <a href="#">About Us</a>
                           <div class="megamenu-panel">
                              <div class="container">
                                 <div class="row">
                                   <div class="col-md-6">
                                      <h3>About Us</h3>
                                      <p>EKMAL can help you realize your ambitions by offering a radically different approach to connecting strategy, transactions, transformation and technology, where design and delivery inform each other at every step.</p>
                                      <a href="{{ route('about') }}" class="btn btn-primary-stroke mt-4 mb-5 mb-md-0">
                                         <span> Free Case Evaluation</span> 
                                         <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                         </svg>
                                      </a>
                                   </div>
                                   <div class="col-md-3">
                                      <ul>
                                         <li class="mt-0 pt-0">
                                            <a href="{{ route('about') }}#vision">Vision</a>
                                         </li>
                                         <li>
                                            <a href="{{ route('about') }}#vision">Mission</a>
                                         </li>
                                         <li>
                                            <a href="{{ route('about') }}#values">Our Values</a>
                                         </li>
                                         <li>
                                            <a href="{{ route('about') }}#whoweare">Who we are</a>
                                         </li>
                                      </ul>
                                   </div>
                                   <div class="col-md-3 pt-4">
                                 <img src="{{ asset('assets/images/insights-img2.jpeg') }}" class="img-fluid" alt="">
                                   </div>
                                 </div>
                             </div>
                           </div>
                         </li>
                         <li><a href="{{ route('contact') }}">Contact Us</a></li>
                       </ul>
                     </div>
                   </nav>
     
               </div>
               <div class="col-7 col-md-3 order-2 order-lg-3">
                  <div class="header-action">
                     <!-- header right action -->
                     <ul class="align-items-sm-center">
                        <li>
                           <a href="#"> <i class="bi bi-search"></i></a>
                        </li>
                       
                           @if(Auth::check())
                              <li>
                                 <a href="{{ route('account') }}"> <i class="bi bi-person"></i></a>
                              </li>
                              <li>
                                 <a class="btn btn-primary-stroke login-btn head-btn" href="{{ route('signout') }}"> Logout</a>
                              </li>
                           @else
                              <li>
                                 <a class="btn btn-primary-stroke login-btn head-btn" href="{{ route('signin') }}"> Login</a>
                              </li>
                           @endif
                           
                        
                        <li>
                           <a href="#"> <i class="bi bi-globe"></i></a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </header>