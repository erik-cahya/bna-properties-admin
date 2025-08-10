@extends('landing.layouts.landing-master')
@section('content')
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area bg-overlay-white-30 bg-image text-left" data-bs-bg="img/bg/14.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">Contact Us</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.html"><span class="ltn__secondary-color"><i
                                                class="fas fa-home"></i></span> Home</a></li>
                                <li>Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- CONTACT MESSAGE AREA START -->
    <div class="ltn__contact-message-area mb-120 mb--100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                                <div class="ltn__contact-address-icon">
                                    <img src="{{ asset('landing') }}/img/icons/10.png" alt="Icon Image">
                                </div>
                                <h3>Email Address</h3>
                                <p>admin@bnaproperty.com</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                                <div class="ltn__contact-address-icon">
                                    <img src="{{ asset('landing') }}/img/icons/11.png" alt="Icon Image">
                                </div>
                                <h3>Phone Number</h3>
                                <p>+62-852-1756-0982</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                                <div class="ltn__contact-address-icon">
                                    <img src="{{ asset('landing') }}/img/icons/12.png" alt="Icon Image">
                                </div>
                                <h3>Office Address</h3>
                                <p>
                                    Jl. Pd. Tegal Sari Indah II No.A28, Padangsambian Klod, Kec. Denpasar Bar., <br> Kota Denpasar, Bali 80117, Indonesia
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="ltn__form-box contact-form-box box-shadow white-bg">
                        <h4 class="title-2">Get A Quote</h4>
                        <form id="contact-form" action="mail.php" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="hidden" name="service_type" value="rental">
                                    <div class="input-item input-item-name ltn__custom-icon">
                                        <input type="text" name="name" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-item input-item-email ltn__custom-icon">
                                        <input type="email" name="email" placeholder="Enter email address">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="input-item input-item-phone ltn__custom-icon">
                                        <input type="text" name="phone" placeholder="Enter phone number">
                                    </div>
                                </div>
                            </div>
                            <div class="input-item input-item-textarea ltn__custom-icon">
                                <textarea name="message" placeholder="Enter message"></textarea>
                            </div>

                            <div class="btn-wrapper mt-0">
                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Contact Us</button>
                            </div>
                            <p class="form-messege mb-0 mt-20"></p>
                        </form>
                    </div>
                    <div class="google-map mt-40">

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9334.271551495209!2d-73.97198251485975!3d40.668170674982946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25b0456b5a2e7%3A0x68bdf865dda0b669!2sBrooklyn%20Botanic%20Garden%20Shop!5e0!3m2!1sen!2sbd!4v1590597267201!5m2!1sen!2sbd"
                            width="100%" height="500px" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- CONTACT MESSAGE AREA END -->

    <!-- GOOGLE MAP AREA START -->

    <!-- GOOGLE MAP AREA END -->
@endsection
