<?php
/**
 * @var \App\Models\Product[] $productsFeatures
 * @var \App\Models\Product[] $products
 */
?>
@section('title', 'Головна сторінка - '. Config::get('app.name'))
@section('description', 'Головна сторінка - '. Config::get('app.name'))
@section('keywords', 'Кружки, футболки')
<x-app-layout>
    <!--Banner Area Start -->
    <section class="wrapper bg-light position-relative min-vh-70 d-lg-flex align-items-center">
        <div class="rounded-4-lg-start col-lg-6 order-lg-2 position-lg-absolute top-0 end-0 image-wrapper bg-image bg-cover h-100 min-vh-50" data-image-src="./assets/img/photos/about16.jpg" style="background-image: url('./assets/img/photos/about16.jpg');">
        </div>
        <!--/column -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mt-10 mt-md-11 mt-lg-n10 px-10 px-md-11 ps-lg-0 pe-lg-13 text-center text-lg-start" data-cues="slideInDown" data-group="page-title" data-delay="600" data-disabled="true">
                        <h1 class="display-1 mb-5" data-cue="slideInDown" data-group="page-title" data-delay="600" data-show="true" style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 600ms; animation-direction: normal; animation-fill-mode: both;">Just sit &amp; relax while we take care of your business needs.</h1>
                        <p class="lead fs-25 lh-sm mb-7 pe-md-10" data-cue="slideInDown" data-group="page-title" data-delay="600" data-show="true" style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 900ms; animation-direction: normal; animation-fill-mode: both;">We make your spending stress-free for you to have the perfect control.</p>
                        <div class="d-flex justify-content-center justify-content-lg-start" data-cues="slideInDown" data-group="page-title-buttons" data-delay="900" data-cue="slideInDown" data-disabled="true" data-show="true" style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 900ms; animation-direction: normal; animation-fill-mode: both;">
                            <span data-cue="slideInDown" data-group="page-title-buttons" data-delay="900" data-show="true" style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 1200ms; animation-direction: normal; animation-fill-mode: both;"><a href="#" class="btn btn-lg btn-primary rounded-pill me-2">Explore Now</a></span>
                            <span data-cue="slideInDown" data-group="page-title-buttons" data-delay="900" data-show="true" style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 1500ms; animation-direction: normal; animation-fill-mode: both;"><a href="#" class="btn btn-lg btn-outline-primary rounded-pill">Contact Us</a></span>
                        </div>
                    </div>
                    <!--/div -->
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </section>
    <!--Banner Area End -->

    <!-- Features Section Start -->
    <section class="wrapper bg-light">
        <div class="container py-14 py-md-16">
            <div class="row align-items-center mb-10 position-relative zindex-1">
                <div class="col-md-8 col-lg-9 col-xl-8 col-xxl-7 pe-xl-20">
                    <h2 class="display-6">Останні надходження</h2>
                </div>
            </div>
            <div class="grid grid-view projects-masonry shop mb-13">
                <div class="row gx-md-8 gy-10 gy-md-13 isotope">
                    <x-gallery-product :products="$productsFeatures"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="features-morebutton text-center">
                        <a class="btn bt-glass" href="{{ route('shop') }}">Переглянути всі товари</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section End -->
    <!-- Categorys Section Start -->
    <section class="categorys">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>Shop with top categorys</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="productcategory text-center">
                        <div class="productcategory-img">
                            <a href="#"><img src="{{ asset('storage/dist/images/categorys/tree dasher.jpg') }}" alt="images"></a>
                        </div>
                        <div class="productcategory-text">
                            <a href="#">
                                <h6>Tree Dasher</h6>
                                <span>480 Products</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="productcategory text-center">
                        <div class="productcategory-img">
                            <a href="#"><img src="{{ asset('storage/dist/images/categorys/wool-shoe.jpg') }}" alt="images"> </a>
                        </div>
                        <div class="productcategory-text">
                            <a href="#">
                                <h6>Wool Runner Shoes</h6>
                                <span>40 Products</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="productcategory text-center">
                        <div class="productcategory-img">
                            <a href="#"><img src="{{ asset('storage/dist/images/categorys/jumper.jpg') }}" alt="images"></a>
                        </div>
                        <div class="productcategory-text">
                            <a href="#">
                                <h6>Jumper</h6>
                                <span>75 Products</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="productcategory text-center">
                        <div class="productcategory-img">
                            <a href="#"><img src="{{ asset('storage/dist/images/categorys/iphone.jpg') }}" alt="images"></a>
                        </div>
                        <div class="productcategory-text">
                            <a href="#">
                                <h6>Apple</h6>
                                <span>12 Products</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="productcategory text-center">
                        <div class="productcategory-img">
                            <a href="#"><img src="{{ asset('storage/dist/images/categorys/iphone.jpg') }}" alt="images"></a>
                        </div>
                        <div class="productcategory-text">
                            <a href="#">
                                <h6>Electronic</h6>
                                <span>50 Products</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="productcategory text-center">
                        <div class="productcategory-img">
                            <a href="#"><img src="{{ asset('storage/dist/images/categorys/drone.jpg') }}" alt="images"></a>
                        </div>
                        <div class="productcategory-text">
                            <a href="#">
                                <h6>Drone</h6>
                                <span>20 Products</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="productcategory text-center">
                        <div class="productcategory-img">
                            <a href="#"><img src="{{ asset('storage/dist/images/categorys/headphone.jpg') }}" alt="images"></a>
                        </div>
                        <div class="productcategory-text">
                            <a href="#">
                                <h6>Headphone</h6>
                                <span>10 Products</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="productcategory text-center">
                        <div class="productcategory-img">
                            <a href="#"><img src="{{ asset('storage/dist/images/categorys/chosma.jpg') }}" alt="images"></a>
                        </div>
                        <div class="productcategory-text">
                            <a href="#">
                                <h6>Sunglass</h6>
                                <span>25 Products</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="features-morebutton text-center">
                        <a class="btn bt-glass" href="#">View All Categorys</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categorys Section End -->

    <!-- Features Section Start -->
    <section class="customersreview">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>What Our Customers Says</h2>
                    </div>
                </div>
            </div>
            <div class="customersreview-wrapper">
                <div class="customersreview-active">
                    <div class="customersreview-item">
                        <p>It is a long established fact that a reader will be distracted by the readable
                            content of a page when looking at its layout.</p>
                        <div class="name">
                            <h6>Ryan Ford</h6>
                            <span>Content Writer</span>
                        </div>
                    </div>
                    <div class="customersreview-item">
                        <p>It is a long established fact that a reader will be distracted by the readable
                            content of a page when looking at its layout.</p>
                        <div class="name">
                            <h6>Tyler Wood</h6>
                            <span>Fashion Designer</span>
                        </div>
                    </div>
                    <div class="customersreview-item">
                        <p>It is a long established fact that a reader will be distracted by the readable
                            content of a page when looking at its layout.</p>
                        <div class="name">
                            <h6>Ryan Ford</h6>
                            <span>Content Writer</span>
                        </div>
                    </div>
                    <div class="customersreview-item">
                        <p>It is a long established fact that a reader will be distracted by the readable
                            content of a page when looking at its layout.</p>
                        <div class="name">
                            <h6>Tyler Wood</h6>
                            <span>Fashion Designer</span>
                        </div>
                    </div>
                    <div class="customersreview-item">
                        <p>It is a long established fact that a reader will be distracted by the readable
                            content of a page when looking at its layout.</p>
                        <div class="name">
                            <h6>Ryan Ford</h6>
                            <span>Content Writer</span>
                        </div>
                    </div>
                    <div class="customersreview-item">
                        <p>It is a long established fact that a reader will be distracted by the readable
                            content of a page when looking at its layout.</p>
                        <div class="name">
                            <h6>Tyler Wood</h6>
                            <span>Fashion Designer</span>
                        </div>
                    </div>
                </div>
                <div class="slider-arrows">
                    <div class="prev-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                             viewBox="0 0 9.414 16.828">
                            <path id="Icon_feather-chevron-left" data-name="Icon feather-chevron-left"
                                  d="M20.5,23l-7-7,7-7" transform="translate(-12.5 -7.586)" fill="none"
                                  stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </div>
                    <div class="next-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                             viewBox="0 0 9.414 16.828">
                            <path id="Icon_feather-chevron-right" data-name="Icon feather-chevron-right"
                                  d="M13.5,23l5.25-5.25.438-.437L20.5,16l-7-7" transform="translate(-12.086 -7.586)"
                                  fill="none" stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section End -->
</x-app-layout>
