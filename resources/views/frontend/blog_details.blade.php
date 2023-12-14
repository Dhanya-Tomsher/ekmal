@extends('layouts.app.main')
@section('content')
<section class="page-banner" style="background-image: url('{{ $blog->image }}');">
         <div class="container position-relative h-100">
            <div class="row">
               <div class="col-md-12">
                  <h3 class="page-banner-title">News Details</h3>
               </div>
            </div>
         </div>
      </section>
      <section class="servicepage-intro">
           <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <p></p>
               </div>
            </div>
           </div>
      </section>
<section class="servicedetail-intro">
             <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <h3 class="innerpage-banner-title">{{ $blog->title }}</h3>
                     <p>{{ date('d M Y',strtotime($blog->blog_date)) }}</p>
                     <p>{{ $blog->description }}</p>
                  </div>
               </div>
             </div>
      </section>
 
@endsection