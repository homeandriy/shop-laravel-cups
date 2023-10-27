<x-app-layout>
    <!-- BreadCrumb Start-->
    <section class="breadcrumb-area mt-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Головна</a></li>
                            <li class="breadcrumb-item" aria-current="page">Оформлення замовлення</li>
                        </ol>
                    </nav>
                    <h5>Крок 1</h5>
                </div>
            </div>
        </div>
    </section>
    <!-- BreadCrumb Start-->
    <main>
        <!-- Billing Info Area Start -->
        <section class="billing-info-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Dashboard-Nav  Start-->
                        <div class="dashboard-nav">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="{{ route('checkout') }}" class="active">Дані отримувача</a>
                                    <i class="fas fa-angle-right"></i></li>
                                <li class="list-inline-item"><a href="shipping.html">Доставка</a> <i
                                        class="fas fa-angle-right"></i></li>
                                <li class="list-inline-item"><a href="payment.html" class="mr-0">Оплата</a></li>
                            </ul>
                        </div>
                        <!-- Dashboard-Nav  End-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7 order-2 order-lg-1">
                        <div class="deliver-info-form">
                            <h6>Вкажіть дані отримувача</h6>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form__div">
                                            <input type="text" class="form__input" placeholder="
                                            ">
                                            <label for="" class="form__label">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form__div">
                                            <input type="text" class="form__input" placeholder="
                                            ">
                                            <label for="" class="form__label">Last Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form__div">
                                            <input type="text" class="form__input" placeholder="">
                                            <label for="" class="form__label">Phone</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form__div">
                                            <input type="email" class="form__input" placeholder="">
                                            <label for="" class="form__label">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div
                                        class="col-12 d-flex align-items-center justify-content-between bottom flex-wrap">
                                        <a href="{{ route('cart.index') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                            Повернутись</a>
                                        <button class="btn bg-primary mt-0" type="submit">Наступний крок</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2">
                        <div class="card-price">
                            <h6>Замовлення</h6>
                            <div class="card-price-list d-flex justify-content-between align-items-center">
                                <div class="item">
                                    <p>{{ Cart::instance('cart')->countItems() }} товари</p>
                                </div>
                                <div class="price">
                                    <p>{{ Cart::instance('cart')->total() }} грн.</p>
                                </div>
                            </div>
                            <div class="card-price-list d-flex justify-content-between align-items-center">
                                <div class="item">
                                    <p>Shipping Cast</p>
                                </div>
                                <div class="price">
                                    <p>$55</p>
                                </div>
                            </div>
                            <div class="card-price-list d-flex justify-content-between align-items-center">
                                <div class="item">
                                    <p>Discount</p>
                                </div>
                                <div class="price">
                                    <p>8%</p>
                                </div>
                            </div>
                            <div class="card-price-list d-flex justify-content-between align-items-center">
                                <div class="item">
                                    <p>Taxes</p>
                                </div>
                                <div class="price">
                                    <p>$5.49</p>
                                </div>
                            </div>
                            <div class="card-price-subtotal d-flex justify-content-between align-items-center">
                                <div class="total-text">
                                    <p>Всього до оплати</p>
                                </div>
                                <div class="total-price">
                                    <p>{{ Cart::instance('cart')->total() }} грн.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Billing Info Area End -->
    </main>
</x-app-layout>
