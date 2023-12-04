<?php
/**
 * @var \App\Models\Product[] $products
 */
?>
<x-app-layout>
    <!-- BreadCrumb Start-->
    <section class="wrapper bg-gray">
        <div class="container py-12 py-md-16 text-center">
            <div class="row">
                <div class="col-lg-10 col-xxl-8 mx-auto">
                    <h1 class="display-1 mb-3">Каталог</h1>
                    <p class="lead mb-1">Оберіть чашку на будь-який смак</p>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- BreadCrumb Start-->
    <section class="wrapper bg-gray mt-4">
        <div class="container py-3 py-md-5">
            <nav class="d-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Головна</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Каталог</li>
                </ol>
            </nav>
            <!-- /nav -->
        </div>
        <!-- /.container -->
    </section>
    <section class="wrapper bg-light">
        <div class="container pb-14 pb-md-16 pt-12">
            <div class="row gy-10">
                <div class="col-lg-9 order-lg-2">
                    <div class="row align-items-center mb-10 position-relative zindex-1">
                        <div class="col-md-7 col-xl-8 pe-xl-20">
                            <h2 class="display-6 mb-1">New Arrivals</h2>
                            <p class="mb-0 text-muted">Showing 1–9 of 30 results</p>
                        </div>
                        <!--/column -->
                        <div class="col-md-5 col-xl-4 ms-md-auto text-md-end mt-5 mt-md-0">
                            <div class="form-select-wrapper">
                                <select class="form-select js-sort-by">
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="newness">Sort by newness</option>
                                    <option value="price: low to high">Sort by price: low to high</option>
                                    <option value="price: high to low">Sort by price: high to low</option>
                                </select>
                            </div>
                            <!--/.form-select-wrapper -->
                        </div>
                        <!--/column -->
                    </div>
                    <!--/.row -->
                    <div class="grid grid-view projects-masonry shop mb-13">
                        <div class="row gx-md-8 gy-10 gy-md-13 isotope">
                            <x-gallery-product :products="$products"/>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.grid -->
                    <nav class="d-flex" aria-label="pagination">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="uil uil-arrow-left"></i></span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="uil uil-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                        <!-- /.pagination -->
                    </nav>
                    <!-- /nav -->
                </div>
                <!-- /column -->
                <aside class="col-lg-3 sidebar">
                    <div class="widget mt-1">
                        <h4 class="widget-title mb-3">Категорії</h4>
                        <ul class="list-unstyled ps-0">
                            @foreach(\App\Models\Category::all() as $category)
                                <li class="mb-1">
                                    <a href="{{ route('shop.categories', $category->slug) }}" class="align-items-center rounded link-body" data-bs-toggle="collapse" data-bs-target="#clothing-collapse" aria-expanded="true"> {{ $category->name }} <span class="fs-sm text-muted ms-1">({{ $category->products()->count() }})</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.widget -->
                    <div class="widget">
                        <h4 class="widget-title mb-3">Rating</h4>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="rating" id="rating5" checked="">
                            <label class="form-check-label" for="rating5">
                                <span class="ratings five"></span>
                            </label>
                        </div>
                        <!-- /.form-check -->
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="rating" id="rating4">
                            <label class="form-check-label" for="rating4">
                                <span class="ratings four"></span>
                            </label>
                        </div>
                        <!-- /.form-check -->
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="rating" id="rating3">
                            <label class="form-check-label" for="rating3">
                                <span class="ratings three"></span>
                            </label>
                        </div>
                        <!-- /.form-check -->
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="rating" id="rating2">
                            <label class="form-check-label" for="rating2">
                                <span class="ratings two"></span>
                            </label>
                        </div>
                        <!-- /.form-check -->
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="rating" id="rating1">
                            <label class="form-check-label" for="rating1">
                                <span class="ratings one"></span>
                            </label>
                        </div>
                        <!-- /.form-check -->
                    </div>
                    <!-- /.widget -->
                    <div class="widget">
                        <h4 class="widget-title mb-3">Size</h4>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" id="xs" checked="">
                            <label class="form-check-label" for="xs">XS <span class="fs-sm text-muted ms-1">(23)</span></label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" id="s">
                            <label class="form-check-label" for="s">S <span class="fs-sm text-muted ms-1">(253)</span></label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" id="m">
                            <label class="form-check-label" for="m">M <span class="fs-sm text-muted ms-1">(65)</span></label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" id="l">
                            <label class="form-check-label" for="l">L <span class="fs-sm text-muted ms-1">(156)</span></label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" id="xl">
                            <label class="form-check-label" for="xl">XL <span class="fs-sm text-muted ms-1">(74)</span></label>
                        </div>
                    </div>
                    <!-- /.widget -->
                    <div class="widget">
                        <h4 class="widget-title mb-3">Price</h4>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="price" id="price1" checked="">
                            <label class="form-check-label" for="price1"> $0.00 - $50.00 </label>
                        </div>
                        <!-- /.form-check -->
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="price" id="price2">
                            <label class="form-check-label" for="price2"> $0.00 - $50.00 </label>
                        </div>
                        <!-- /.form-check -->
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="price" id="price3">
                            <label class="form-check-label" for="price3"> $50.00 - $100.00 </label>
                        </div>
                        <!-- /.form-check -->
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="price" id="price4">
                            <label class="form-check-label" for="price4"> $150.00 - $200.00 </label>
                        </div>
                        <!-- /.form-check -->
                        <div class="row">
                            <div class="col-7 col-md-5 col-lg-12 col-xl-10 col-xxl-10">
                                <div class="d-flex align-items-center mt-4">
                                    <input type="number" class="form-control form-control-sm" placeholder="$0.00" min="0">
                                    <div class="text-muted mx-2">‒</div>
                                    <input type="number" class="form-control form-control-sm" placeholder="$50.00" max="50">
                                </div>
                            </div>
                            <!-- /column -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.widget -->
                </aside>
                <!-- /column .sidebar -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

</x-app-layout>
