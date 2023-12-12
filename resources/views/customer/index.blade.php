@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()


@section('body')

        <!-- Hero Section Start -->
        <div class="hero-slider hero-slider-one">
            <?php foreach ($banner as $key => $value): ?>
                <!-- Single Slide Start -->
                <div class="single-slide" style="background-image: url('{{ $value->image  }}')">
                    <!-- Hero Content One Start -->
                    <div class="hero-content-one container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="slider-content-text text-left">
                                    <h5>Exclusive  Off This Week</h5>
                                    <h1>{{ $value->name  }}</h1>
                                    <p>Starting At <strong>${{ $value->prices  }}</strong></p>
                                    <div class="slide-btn-group">
                                        <a href="/product/{{ $value->slug  }}" class="btn btn-bordered btn-style-1">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Hero Content One End -->
                </div>
                <!-- Single Slide End -->
             <?php endforeach ?>  

        </div>
        <!-- Hero Section End -->
        
        <!-- Banner Area Start -->
        <div class="banner-area section-pt">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner mb-30">
                            <a href="#"><img src="{{ asset("assets/images/banner/banner-01.jpg") }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6  col-md-6">
                        <div class="single-banner mb-30">
                            <a href="#"><img src="{{ asset("assets/images/banner/banner-02.jpg") }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End -->
       
        <!-- Product Area Start -->
        <div class="product-area section-pb section-pt-30">
            <div class="container">
               
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h4>Best seller products</h4>
                        </div>
                    </div>
                </div>
                <div class="row product-active-lg-4 data-list">

                </div>
            </div>
        </div>
        <!-- Product Area End -->
        
        <!-- Banner Area Start -->
        <div class="banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner mb-30">
                            <a href="#"><img src="{{ asset("assets/images/banner/banner-03.jpg") }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6  col-md-6">
                        <div class="single-banner mb-30">
                            <a href="#"><img src="{{ asset("assets/images/banner/banner-04.jpg") }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End -->
        
        
        <!-- Product Area Start -->
        <div class="product-area section-pb section-pt-30">
            <div class="container">
               
                <div class="row">
                    <div class="col-12 text-center">
                        <ul class="nav product-tab-menu" role="tablist"> 
                            <li class="product-tab__item nav-item active">
                                <a class="product-tab__link active" id="nav-new-tab" data-bs-toggle="tab" href="#nav-new" role="tab" aria-selected="false">New Arrivals</a>
                            </li>
                            {{-- <li class="product-tab__item nav-item">
                                <a class="product-tab__link " id="nav-new-tab" data-bs-toggle="tab" href="#nav-discount" role="tab" aria-selected="false">Discount</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                
                
                <div class="tab-content product-tab__content" id="product-tabContent">
                    <div class="tab-pane fade show active" id="nav-new" role="tabpanel">
                        <div class="product-carousel-group">
                            <div class="row product-active-row-4 new-products">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-discount" role="tabpanel">
                        <div class="product-carousel-group">
                            <div class="row product-active-row-4 discount-products">
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- Product Area End -->
        
        <!-- letast blog area Start -->
        <div class="letast-blog-area section-pb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h4>Blog sharing</h4>
                        </div>
                    </div>
                </div>
                <div class="row blog-list">

                </div>
            </div>
        </div>
        <!-- letast blog area End -->
         
       

@endsection()

@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('assets/js/page/index.js') }}"></script>
@endsection()
        
