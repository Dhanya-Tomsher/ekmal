@extends('layouts.app.main')
@section('content')
<section class="page-banner" style="background-image: url('{{ $banner->image }}');">
         <div class="container position-relative h-100">
            <div class="row">
               <div class="col-md-12">
                  <h3 class="page-banner-title">{{ $banner->title }}</h3>
               </div>
            </div>
         </div>
      </section>
      <section class="aboutpage-intro">
           <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <p>{{ $banner->description }}</p>
               </div>
            </div>
           </div>
      </section>

<section class="servicedetail-intro">
             <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <h3 class="innerpage-banner-title">{{ $service->name }}</h3>
                     <p>{{ $service->description }}</p>
                  </div>
               </div>
             </div>
      </section>

      <section class="service-category">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="service-category-list">
                     <h3>OUR Commitment to Your Success:</h3>
                     <p>Experience the EKMAL INNOVATION difference. With us, you gain a partner committed to your unique needs, offering strategic consultancy that ensures your ventures aren't just successful, they set industry benchmarks. </p>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="service-category-list">
                     <h3>The Science of Success: Testing and Certification:</h3>
                     <p>Trust our accredited laboratories for comprehensive testing services that lead to recognized ISO certifications. With EKMAL, quality isn't just a metric; it's a promise
                     </p>
                  </div>

         
               </div>
               <div class="col-md-6">
                  <div class="service-category-list">
                     <h3>Inspection and Certification:</h3>
                     <p>Ensure excellence and compliance with our thorough third-party inspections. Our expert team meticulously evaluates every detail of your Rides, Equipment and Machineries, safeguarding against risks and affirming adherence to all Local regulations and standards. Enjoy the confidence of impeccable quality and integrity.
                     
                     </p>
                  </div>

         
               </div>
               <div class="col-md-6">
                  <div class="service-category-list">
                     <h3>Engineering & Technical
                        Consultancy and Solutions:</h3>
                     <p>Whether you’re facing a
                        complex engineering
                        challenge or seeking to
                        optimize your operations, our
                        team of experienced
                        consultants is here to provide
                        tailored solutions that drive
                        success.
                        <br>
                        <br>
                        Trust EKMAL for quality,
integrity, and expertise.
Partner with us and
experience the difference of
working with a company
committed to excellence and
customer satisfaction.
                     
                     </p>
                  </div>

         
               </div>
               <div class="col-md-12 pb-4" id="formDiv">
               @if ($message = Session::get('status'))
                                            <div class="col-12">
                                                <div class="col-12">
                                                    <div
                                                        class="items-center justify-between bg-success-1 pl-30 pr-20 py-30 rounded-8">
                                                        <div class="text-success-2 lh-14 fw-300">
                                                            <div class="text-18 fw-700">
                                                                {!! $message !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                  <div class="form-warpper">
                     <form action="{{ route('store-serviceenquiry') }}" name="frm" method="POST">
                     @csrf
                        <div class="row g-3">
                           <div class="col-md-6">
                             <input type="text" name="name" required class="form-control" placeholder="Name" aria-label="Name">
                           </div>
                           <div class="col-md-6">
                             <input type="email" name="email" required class="form-control" placeholder="Email Address" aria-label="Email Address">
                           </div>
                           <div class="col-md-6">
                              <input type="text" name="phone" required class="form-control" placeholder="Phone Number" aria-label="Phone Number (optional)">
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="subject" required class="form-control" placeholder="Subject" aria-label="Subject">
                            </div>
                            <input type="hidden" name="service" value="{{ $service->name }}">
                            <div class="col-md-12">
                              <textarea class="form-control" name="message" required id="exampleFormControlTextarea1" placeholder="Your Message / Inquiry / Request" rows="3"></textarea>
                            </div>
                            <div class="col-md-12">
                              <button class="btn btn-primary-stroke">
                                 <span> Submit Now</span> 
                                 <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
</button>
                            </div>
                         </div>
                     </form>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="service-category-list">
                     <h3>Integrated Technology Solutions:</h3>
                     <p>At EKMAL, we're not just a service
                        provider; we're your partner in
                        navigating the digital landscape. 
                        <br> <br>
                        Our
                        comprehensive suite of Integrated
                        Technology Solutions is designed to
                        elevate your busines
                     
                     
                     </p>
                  </div>

         
               </div>

               <div class="col-md-6">
                  <div class="service-category-list">
                     <h3>then here replace with below:
                        Unified Building Expertise:
                        </h3>
                     <p>Experience seamless building inspection, surveying, and eco-consultancy with EKMAL INNOVATION. Our advanced inspections ensure complete adherence to regulations, employing state-of-the-art technology for in-depth evaluations. 
                        <br>
                        <br>
                        We provide precise property data for smart decision-making, pre-purchase assessments to secure your investments, and eco-friendly solutions for energy savings. Our consultancy extends to LEED certification, encompassing energy efficiency, water conservation, and sustainable material selection, all tailored to enhance your building's environmental quality and operational sustainability.
                     
                     
                     </p>
                  </div>

         
               </div>
               <div class="col-md-6">
                  <div class="service-category-list">
                     <h3>Safety Competency and Risk Management:</h3>
                     <p>At EKMAL, our expertise in anticipating and mitigating risks is unmatched. We provide in-depth Emergency Response Assessments, Risk Management strategies, and Professional Safety Competency with Certification to ensure the highest standards of safety and operational security.
                     
                     
                     </p>
                  </div>

         
               </div>
               <div class="col-md-6">
                  <div class="service-category-list">
                     <h3>Innovative Engineering and Transport Solutions:</h3>
                     <p>EKMAL delivers tailored engineering consultancy that encompasses transport planning, traffic management, and the development of sophisticated infrastructure systems. We optimize land, environmental, and water resources, incorporate cutting-edge electromechanical systems, and blend sustainability with structural design for resilient and lasting infrastructure.
                     
                     
                     </p>
                  </div>

         
               </div>
               <div class="col-md-12 pb-4">
                  <img src="assets/images/service-detail-img1.webp" class="img-fluid" alt="">
               </div>
            </div>
         </div>
      </section>

      <section class="related-services">
         <div class="container">
            <h3 class="innerpage-banner-title mb-4">Related Services</h3>

            <div class="row">
               <div class="col-md-12">
                  <div class="related-services-slider owl-carousel owl-theme">

                  @if($serv)
         @foreach ($serv as $servs)
         <div class="service-listing-warpper">
                        <div class="service-list-img">
                           <img src="{{ $servs->image }}" class="img-fluid" alt="">
                        </div>
                        <div class="service-listi-content">
                           <h3>{{ $servs->name }}</h3>
                              <a href="{{ route('service-details', ['slug' => $servs->slug]) }}" class="btn btn-primary-stroke">
                                 <span> Explore Now</span> 
                                 <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
                              </a>
                        </div>
                     </div>
               @endforeach
                @endif 

                  </div>
               </div>
            </div>

         </div>
      </section>
@endsection
@push('footer')
<script>
        var message = "{{ Session::get('status') }}";

        if (message != '') {
            $('html, body').animate({
                scrollTop: $("#formDiv").offset().top
            }, 1000);
        }
</script>
@endpush