<?php
/**
 * @var \App\Models\Product $product
 * @var \App\Models\Attributes\Color $color
 * @var \App\Enums\Variation $variation
 * @var \App\Models\Product[] $productsFeatures
 */
?>
<x-app-layout>
    <!--Breadcrumb Area Start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Головна</a></li>
                            @foreach($product->categories()->get() as $category)
                                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('shop.categories', $category->slug) }}">{{ $category->name }}</a></li>
                            @endforeach
                            <li class="breadcrumb-item" aria-current="page">{{ $product->title }}</li>
                        </ol>
                    </nav>
                    <h5>Деталі: {{ $product->title }}</h5>
                </div>
            </div>
        </div>
    </section>
    <!--Breadcrumb Area End -->

    <!-- Product Details Area Start -->
    <section class="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5 col-12">
                    <div class="product-slider">
                        <div class="exzoom" id="exzoom">
                            <div class="exzoom_img_box">
                                <ul class='exzoom_img_ul'>
                                    <li><img src="{{ asset($product->thumbnailUrl) }}" alt="{{ $product->title }}"/></li>
                                    @if($product->images()->count())
                                        @foreach($product->images()->get() as $image)
                                            <li><img src="{{ asset($image->url) }}" alt="{{ $product->title }}"/></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="exzoom_nav"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 col-12">
                    <div class="product-pricelist">
                        <h2>{{ $product->title }}</h2>
                        <div class="product-pricelist-ratting">
                            <div class="price">
                                <span>${{ $variation->getEndPrice() }} ₴</span>
                                @if($variation->getPrice() !== $variation->getEndPrice())
                                    <del class="old-price">{{ $variation->getPrice() }} ₴</del>
                                @endif
                            </div>
                            <div class="star">
                                <ul>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star-half"></i></li>
                                    <li>5.0</li>
                                    <li class="point">({{ mt_rand(1, 255) }} Ретинг)</li>
                                </ul>
                            </div>
                        </div>
                        <p>{{ $product->description }}</p>
                        <div class="product-pricelist-selector">
                            @if(false)
                            <div class="product-pricelist-selector-size">
                                <h6>Sizes</h6>
                                <div class="sizes" id="sizes">
                                    <li class="sizes-all">S</li>
                                    <li class="sizes-all active">M</li>
                                    <li class="sizes-all">L</li>
                                    <li class="sizes-all">XL</li>
                                    <li class="sizes-all">XXL</li>
                                </div>
                            </div>
                            @endif
                            @if($product->colors()->count())
                            <div class="product-pricelist-selector-color">
                                <h6>Колір кружки</h6>
                                <div class="colors" id="colors">
                                    @foreach($product->colors()->get() as $colorProduct)
                                        <a href="{{ route('products.show', [$product, $colorProduct->slug]) }}">
                                            <li class="colorall @if($colorProduct->pivot->color_id === $color->id) active @endif" style="background-color: {{$colorProduct->hex}}" title="{{ $color->name }}"></li>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Accordion Item #1
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Accordion Item #2
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Accordion Item #3
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                                </div>
                            </div>
                        </div>
                        <div class="product-pricelist-selector-button">
                            <x-add-to-cart :variation="$variation"></x-add-to-cart>
                            <a class="btn bg-primary cart-hart" href="#">
                                <svg id="Heart" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="22" height="20"
                                     viewBox="0 0 22 20">
                                    <defs>
                                        <clipPath id="clip-path">
                                            <rect width="22" height="20" fill="none" />
                                        </clipPath>
                                    </defs>
                                    <g id="Repeat_Grid_1" data-name="Repeat Grid 1" clip-path="url(#clip-path)">
                                        <g transform="translate(1 1)">
                                            <path id="Heart-2" data-name="Heart"
                                                  d="M20.007,4.59a5.148,5.148,0,0,0-7.444,0L11.548,5.636,10.534,4.59a5.149,5.149,0,0,0-7.444,0,5.555,5.555,0,0,0,0,7.681L4.1,13.317,11.548,21l7.444-7.681,1.014-1.047a5.553,5.553,0,0,0,0-7.681Z"
                                                  transform="translate(-1.549 -2.998)" fill="#fff" stroke="#335aff"
                                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <div class="product-pricelist-selector-button-item">
                                <div class="delivery">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.5" height="17.5"
                                             viewBox="0 0 17.5 17.5">
                                            <g id="Icon" transform="translate(-2.25 -2.25)">
                                                <path id="Path_20" data-name="Path 20"
                                                      d="M19,11a8,8,0,1,1-8-8A8,8,0,0,1,19,11Z" fill="none"
                                                      stroke="#335aff" stroke-linecap="round" stroke-linejoin="round"
                                                      stroke-width="1.5" />
                                                <path id="Path_21" data-name="Path 21" d="M18,9v4.8l3.2,1.6"
                                                      transform="translate(-7 -2.8)" fill="none" stroke="#335aff"
                                                      stroke-linecap="round" stroke-linejoin="round"
                                                      stroke-width="1.5" />
                                            </g>
                                        </svg>
                                    </div>
                                    <p>Доставка від 3 дох 5-ти днів</p>
                                </div>
                                <div class="cash">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="16"
                                             viewBox="0 0 10 16">
                                            <path id="Icon"
                                                  d="M14.863,11.522c-2.23-.524-2.947-1.067-2.947-1.911,0-.969.992-1.644,2.652-1.644,1.749,0,2.4.756,2.456,1.867H19.2a3.655,3.655,0,0,0-3.153-3.387V4.5H13.095V6.42c-1.906.373-3.438,1.493-3.438,3.209,0,2.053,1.876,3.076,4.617,3.671,2.456.533,2.947,1.316,2.947,2.142,0,.613-.481,1.591-2.652,1.591-2.024,0-2.819-.818-2.927-1.867H9.48c.118,1.947,1.729,3.04,3.615,3.4V20.5h2.947V18.589c1.916-.329,3.438-1.333,3.438-3.156C19.48,12.909,17.093,12.047,14.863,11.522Z"
                                                  transform="translate(-9.48 -4.5)" fill="#335aff" />
                                        </svg>
                                    </div>
                                    <p>Наложений платіж</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12 mt-4">
                    <ul class="nav nav-pills mb-3 w-100" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Опис</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Доставка та оплата</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Коментарі</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            {{ $product->description }}
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Колір</td>
                                        <td>{{ $variation->getColor()->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Об'єм</td>
                                        <td>330 мл</td>
                                    </tr>
                                    <tr>
                                        <td>SKU</td>
                                        <td>{{ $product->SKU }}-{{ $variation->getColor()->slug }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <section class="gradient-custom">
                                    <div class="container my-5 py-5">
                                        @if(Auth::user())
                                            <form action="" class="mb-3">
                                                @csrf
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Залиште коментар тут" id="floatingTextarea2" style="height: 100px"></textarea>
                                                    <label for="floatingTextarea2">Ваш коментар</label>
                                                </div>
                                                <button type="submit" class="btn btn-success mt-3">Надіслати</button>
                                            </form>
                                        @endif
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                <div class="card">
                                                    <div class="card-body p-4">
                                                        <h4 class="mb-4 pb-2">Коментарі від покупців</h4>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="d-flex flex-start">
                                                                    <img class="rounded-circle shadow-1-strong me-3"
                                                                         src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar" width="65"
                                                                         height="65" />
                                                                    <div class="flex-grow-1 flex-shrink-1">
                                                                        <div>
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <p class="mb-1">
                                                                                    Maria Smantha <span class="small">- 2 hours ago</span>
                                                                                </p>
                                                                                <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="small"> reply</span></a>
                                                                            </div>
                                                                            <p class="small mb-0">
                                                                                It is a long established fact that a reader will be distracted by
                                                                                the readable content of a page.
                                                                            </p>
                                                                        </div>

                                                                        <div class="d-flex flex-start mt-4">
                                                                            <a class="me-3" href="#">
                                                                                <img class="rounded-circle shadow-1-strong"
                                                                                     src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(11).webp" alt="avatar"
                                                                                     width="65" height="65" />
                                                                            </a>
                                                                            <div class="flex-grow-1 flex-shrink-1">
                                                                                <div>
                                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                                        <p class="mb-1">
                                                                                            Simona Disa <span class="small">- 3 hours ago</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <p class="small mb-0">
                                                                                        letters, as opposed to using 'Content here, content here',
                                                                                        making it look like readable English.
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="d-flex flex-start mt-4">
                                                                            <a class="me-3" href="#">
                                                                                <img class="rounded-circle shadow-1-strong"
                                                                                     src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar"
                                                                                     width="65" height="65" />
                                                                            </a>
                                                                            <div class="flex-grow-1 flex-shrink-1">
                                                                                <div>
                                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                                        <p class="mb-1">
                                                                                            John Smith <span class="small">- 4 hours ago</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <p class="small mb-0">
                                                                                        the majority have suffered alteration in some form, by
                                                                                        injected humour, or randomised words.
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex flex-start mt-4">
                                                                    <img class="rounded-circle shadow-1-strong me-3"
                                                                         src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(12).webp" alt="avatar" width="65"
                                                                         height="65" />
                                                                    <div class="flex-grow-1 flex-shrink-1">
                                                                        <div>
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <p class="mb-1">
                                                                                    Natalie Smith <span class="small">- 2 hours ago</span>
                                                                                </p>
                                                                                <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="small"> reply</span></a>
                                                                            </div>
                                                                            <p class="small mb-0">
                                                                                The standard chunk of Lorem Ipsum used since the 1500s is
                                                                                reproduced below for those interested. Sections 1.10.32 and
                                                                                1.10.33.
                                                                            </p>
                                                                        </div>

                                                                        <div class="d-flex flex-start mt-4">
                                                                            <a class="me-3" href="#">
                                                                                <img class="rounded-circle shadow-1-strong"
                                                                                     src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(31).webp" alt="avatar"
                                                                                     width="65" height="65" />
                                                                            </a>
                                                                            <div class="flex-grow-1 flex-shrink-1">
                                                                                <div>
                                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                                        <p class="mb-1">
                                                                                            Lisa Cudrow <span class="small">- 4 hours ago</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <p class="small mb-0">
                                                                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus
                                                                                        scelerisque ante sollicitudin commodo. Cras purus odio,
                                                                                        vestibulum in vulputate at, tempus viverra turpis.
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="d-flex flex-start mt-4">
                                                                            <a class="me-3" href="#">
                                                                                <img class="rounded-circle shadow-1-strong"
                                                                                     src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(29).webp" alt="avatar"
                                                                                     width="65" height="65" />
                                                                            </a>
                                                                            <div class="flex-grow-1 flex-shrink-1">
                                                                                <div>
                                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                                        <p class="mb-1">
                                                                                            Maggie McLoan <span class="small">- 5 hours ago</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <p class="small mb-0">
                                                                                        a Latin professor at Hampden-Sydney College in Virginia,
                                                                                        looked up one of the more obscure Latin words, consectetur
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="d-flex flex-start mt-4">
                                                                            <a class="me-3" href="#">
                                                                                <img class="rounded-circle shadow-1-strong"
                                                                                     src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar"
                                                                                     width="65" height="65" />
                                                                            </a>
                                                                            <div class="flex-grow-1 flex-shrink-1">
                                                                                <div>
                                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                                        <p class="mb-1">
                                                                                            John Smith <span class="small">- 6 hours ago</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <p class="small mb-0">
                                                                                        Autem, totam debitis suscipit saepe sapiente magnam officiis
                                                                                        quaerat necessitatibus odio assumenda, perferendis quae iusto
                                                                                        labore laboriosam minima numquam impedit quam dolorem!
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Area End -->

    <!-- Features Section Start -->
    <section class="features bg-lightwhite">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>Схожі товари</h2>
                    </div>
                </div>
            </div>
            <div class="features-wrapper">
                <div class="features-active">
                    @foreach($productsFeatures as $productsFeature)
                        <div class="product-item">
                            <div class="product-item-image">
                                <a href="{{ route('products.show', $productsFeature) }}">
                                    <img src="{{ $productsFeature->thumbnailUrl }}" alt="{{ $productsFeature->title }}" class="img-fluid">
                                </a>
                                <div class="cart-icon">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75"
                                             viewBox="0 0 16.75 16.75">
                                            <g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                                                <g id="Icon" transform="translate(0 1)">
                                                    <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682" cy="0.714"
                                                             rx="0.682" ry="0.714" transform="translate(4.773 13.571)"
                                                             fill="none" stroke="#1a2224" stroke-linecap="round"
                                                             stroke-linejoin="round" stroke-width="1.5" />
                                                    <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682" cy="0.714"
                                                             rx="0.682" ry="0.714" transform="translate(12.273 13.571)"
                                                             fill="none" stroke="#1a2224" stroke-linecap="round"
                                                             stroke-linejoin="round" stroke-width="1.5" />
                                                    <path id="Path_3" data-name="Path 3"
                                                          d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                                                          transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                                                          stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="1.5" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="product-item-info">
                                <a href="{{ route('products.show', $productsFeature) }}">{{ $productsFeature->title }}</a>
                                <span>${{ $productsFeature->endPrice }} ₴</span>
                                @if($productsFeature->price !== $productsFeature->endPrice)
                                    <del class="old-price">{{$productsFeature->price}} ₴</del>
                                @endif
                            </div>
                        </div>
                    @endforeach
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
            <div class="row">
                <div class="col-sm-12">
                    <div class="features-morebutton text-center">
                        <a class="btn bt-glass" href="#">View All Products</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section End -->
</x-app-layout>
