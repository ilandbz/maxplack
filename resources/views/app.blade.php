<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>Edumate Education HTML Template</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="edumate/assets/images/favicon.webp" type="image/webp">


    <!-- CSS
    ============================================ -->

    <!--===== Vendor CSS (Bootstrap & Icon Font) =====-->
    <link rel="stylesheet" href="edumate/assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="edumate/assets/css/plugins/fontawesome.min.css">
    <link rel="stylesheet" href="edumate/assets/css/plugins/default.css">


    <!--===== Plugins CSS (All Plugins Files) =====-->
    <link rel="stylesheet" href="edumate/assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="edumate/assets/css/plugins/slick.css">
    <link rel="stylesheet" href="edumate/assets/css/plugins/magnific-popup.css">

    <!--====== Main Style CSS ======-->
    <!-- <link rel="stylesheet" href="edumate/assets/css/style.css"> -->
    <link rel="stylesheet" href="edumate/assets/css/style.min.css">

</head>

<body>

    <!--====== Header Start ======-->

    <header class="header-area">
        <div class="header-top">
            <div class="container">
                <div class="header-top-wrapper d-flex flex-wrap justify-content-sm-between">
                    <div class="header-top-left mt-10">
                        <ul class="header-meta">
                            <li><a href="mailto://infoedumate@example.com">infoedumate@example.com</a></li>
                        </ul>
                    </div>
                    <div class="header-top-right mt-10">
                        <div class="header-link">
                            <a class="notice" href="{{route('intranet')}}">Intranet</a>
                            <a class="login" href="login.html">Login</a>
                            <a class="register" href="register.html">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="navigation" class="navigation navigation-landscape">
            <div class="container position-relative">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="header-logo">
                            <a href="index.html"><img src="edumate/assets/images/logo.webp" width="135" height="88" alt="Logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-7 position-static">
                        <div class="nav-toggle"></div>
                        <nav class="nav-menus-wrapper">
                            <ul class="nav-menu">
                                @foreach($menus as $menuItem)
                                    <li>
                                        <a href="{{ $menuItem->slug }}">{{ $menuItem->nombre }}</a>
                                        @if($menuItem->children)
                                            @include('menu', ['menuItems' => $menuItem->children, 'class' => 'nav-dropdown nav-submenu'])
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 position-static">
                        <div class="header-search">
                            <form action="#">
                                <input type="text" placeholder="Search">
                                <button><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--====== Header Ends ======-->
    <!--====== Slider Start ======-->
    <section class="slider-area slider-active">
        <div class="single-slider d-flex align-items-center bg_cover" style="background-image: url(edumate/assets/images/slider-1.webp);">
            <div class="container">
                <div class="slider-content">
                    <h2 class="title" data-animation="fadeInLeft" data-delay="0.2s">Education is the most powerful Weapon</h2>
                    <ul class="slider-btn">
                        <li><a data-animation="fadeInUp" data-delay="0.6s" class="main-btn main-btn-2" href="our-courses-left-sidebar.html">View Courses</a></li>
                        <li><a data-animation="fadeInUp" data-delay="1s" class="main-btn" href="#">Learn more</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="single-slider d-flex align-items-center bg_cover" style="background-image: url(edumate/assets/images/slider-2.webp);">
            <div class="container">
                <div class="slider-content">
                    <h2 class="title" data-animation="fadeInLeft" data-delay="0.2s">Education is the most powerful Weapon</h2>
                    <ul class="slider-btn">
                        <li><a data-animation="fadeInUp" data-delay="0.6s" class="main-btn main-btn-2" href="our-courses-left-sidebar.html">View Courses</a></li>
                        <li><a data-animation="fadeInUp" data-delay="1s" class="main-btn" href="#">Learn more</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!--====== Slider Ends ======-->

    <!--====== Features Start ======-->

    <section class="features-area">
        <div class="container">
            <div class="features-wrapper">
                <div class="row justify-content-end">
                    <div class="col-lg-8">
                        <h2 class="features-title">Provide <span>best <br> Educational</span> Environment</h2>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-lg-11">
                        <div class="features-image">
                            <img src="edumate/assets/images/features.webp" width="1061" height="387" alt="features">
                        </div>
                    </div>
                </div>
                <div class="features-mask">
                    <div class="features-mask-image bg_cover" style="background-image: url(edumate/assets/images/features-bg.webp);">
                    </div>
                    <div class="features-mask-content">
                        <p>256 Courses</p>
                        <p>Expert Teachers</p>
                        <p>Online Education</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== Features Ends ======-->

    <!--====== Top Courses Start ======-->

    <section class="top-courses-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title mt-40">
                        <h2 class="title">Here is our <br> Top Courses</h2>
                        <p>Even slightly believable. If you are going use a passage of Lorem Ipsum need</p>
                    </div>
                </div>
            </div>
            <div class="courses-wrapper">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 courses-col">
                        <div class="single-courses mt-30 wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.2s">
                            <a href="#" class="category">#Science</a>
                            <h4 class="courses-title"><a href="courses-details.html">Computer Science & Engineering</a></h4>
                            <div class="duration-fee">
                                <p class="duration">Duration: <span> 4 year</span></p>
                                <p class="fee">Fee: <span> $540</span></p>
                            </div>
                            <div class="rating">
                                <span>Rating: </span>
                                <ul class="star">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="courses-link">
                                <a class="apply" href="#">Online Apply</a>
                                <a class="more" href="courses-details.html">Read more <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 courses-col">
                        <div class="single-courses mt-30 wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.4s">
                            <a href="#" class="category">#Science</a>
                            <h4 class="courses-title"><a href="courses-details.html">Applied <br> Mathematics</a></h4>
                            <div class="duration-fee">
                                <p class="duration">Duration: <span> 4 year</span></p>
                                <p class="fee">Fee: <span> $540</span></p>
                            </div>
                            <div class="rating">
                                <span>Rating: </span>
                                <ul class="star">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="courses-link">
                                <a class="apply" href="#">Online Apply</a>
                                <a class="more" href="courses-details.html">Read more <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 courses-col">
                        <div class="single-courses mt-30 wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.6s">
                            <a href="#" class="category">#Business</a>
                            <h4 class="courses-title"><a href="courses-details.html">Bachelor of Business Administration</a></h4>
                            <div class="duration-fee">
                                <p class="duration">Duration: <span> 4 year</span></p>
                                <p class="fee">Fee: <span> $540</span></p>
                            </div>
                            <div class="rating">
                                <span>Rating: </span>
                                <ul class="star">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="courses-link">
                                <a class="apply" href="#">Online Apply</a>
                                <a class="more" href="courses-details.html">Read more <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 courses-col">
                        <div class="single-courses mt-30 wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.8s">
                            <a href="#" class="category">#Marketing</a>
                            <h4 class="courses-title"><a href="courses-details.html">Social & Digital <br> Marketing</a></h4>
                            <div class="duration-fee">
                                <p class="duration">Duration: <span> 4 year</span></p>
                                <p class="fee">Fee: <span> $540</span></p>
                            </div>
                            <div class="rating">
                                <span>Rating: </span>
                                <ul class="star">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="courses-link">
                                <a class="apply" href="#">Online Apply</a>
                                <a class="more" href="courses-details.html">Read more <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 courses-col">
                        <div class="single-courses mt-30 wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="1s">
                            <a href="#" class="category">#Business</a>
                            <h4 class="courses-title"><a href="courses-details.html">Bachelor of Business Administration</a></h4>
                            <div class="duration-fee">
                                <p class="duration">Duration: <span> 4 year</span></p>
                                <p class="fee">Fee: <span> $540</span></p>
                            </div>
                            <div class="rating">
                                <span>Rating: </span>
                                <ul class="star">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="courses-link">
                                <a class="apply" href="#">Online Apply</a>
                                <a class="more" href="courses-details.html">Read more <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 courses-col">
                        <div class="single-courses mt-30 wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="1.2s">
                            <a href="#" class="category">#Marketing</a>
                            <h4 class="courses-title"><a href="courses-details.html">Social & Digital <br> Marketing</a></h4>
                            <div class="duration-fee">
                                <p class="duration">Duration: <span> 4 year</span></p>
                                <p class="fee">Fee: <span> $540</span></p>
                            </div>
                            <div class="rating">
                                <span>Rating: </span>
                                <ul class="star">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="courses-link">
                                <a class="apply" href="#">Online Apply</a>
                                <a class="more" href="courses-details.html">Read more <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 courses-col">
                        <div class="single-courses mt-30 wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="1.4s">
                            <a href="#" class="category">#Science</a>
                            <h4 class="courses-title"><a href="courses-details.html">Applied <br> Mathematics</a></h4>
                            <div class="duration-fee">
                                <p class="duration">Duration: <span> 4 year</span></p>
                                <p class="fee">Fee: <span> $540</span></p>
                            </div>
                            <div class="rating">
                                <span>Rating: </span>
                                <ul class="star">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="courses-link">
                                <a class="apply" href="#">Online Apply</a>
                                <a class="more" href="courses-details.html">Read more <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 courses-col">
                        <div class="single-courses mt-30 wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="1.6s">
                            <a href="#" class="category">#Science</a>
                            <h4 class="courses-title"><a href="courses-details.html">Computer Science & Engineering</a></h4>
                            <div class="duration-fee">
                                <p class="duration">Duration: <span> 4 year</span></p>
                                <p class="fee">Fee: <span> $540</span></p>
                            </div>
                            <div class="rating">
                                <span>Rating: </span>
                                <ul class="star">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="courses-link">
                                <a class="apply" href="#">Online Apply</a>
                                <a class="more" href="courses-details.html">Read more <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== Top Courses Ends ======-->

    <!--====== Specialty Start ======-->

    <div class="specialty-area">
        <div class="container">
            <div class="row no-gutters wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="col-sm-4">
                    <div class="single-specialty mt-30">
                        <div class="specialty-box">
                            <div class="box-icon">
                                <img src="edumate/assets/images/icon/icon-1.webp" width="70" height="70" alt="icon">
                            </div>
                            <div class="box-content">
                                <p>Skill Based Scholarships</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-specialty active mt-30">
                        <div class="specialty-box">
                            <div class="box-icon">
                                <img src="edumate/assets/images/icon/icon-2.webp" width="70" height="70" alt="icon">
                            </div>
                            <div class="box-content">
                                <p>Download Prospectus</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-specialty mt-30">
                        <div class="specialty-box">
                            <div class="box-icon">
                                <img src="edumate/assets/images/icon/icon-3.webp" width="70" height="70" alt="icon">
                            </div>
                            <div class="box-content">
                                <p>After Course Certification</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== Specialty Ends ======-->

    <!--====== Campus Visit Start ======-->

    <section class="campus-visit-area">
        <div class="container">
            <div class="campus-visit-wrapper">
                <div class="campus-image-col">
                    <div class="campus-image">
                        <div class=" single-campus">
                            <img src="edumate/assets/images/campus-1.webp" width="521" height="392" alt="Campus">
                        </div>
                        <div class="single-campus">
                            <img src="edumate/assets/images/campus-2.webp" width="521" height="392" alt="Campus">
                        </div>
                    </div>
                </div>
                <div class="campus-content-col">
                    <div class="campus-content">
                        <h2 class="campus-title">Visit our Campus with image gallery</h2>
                        <span class="line"></span>
                        <p>Even slightly believable. If you are going use a passage of Lorem Ipsum need</p>
                        <h3 class="video-title">or watch video</h3>
                        <a class="play video-popup" href="https://www.youtube.com/watch?v=0qHWub21h5c"><i class="fas fa-play"></i> <span>Play now</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== Campus Visit Ends ======-->

    <!--====== Event Start ======-->

    <section class="event-area">
        <div class="container">
            <div class="event-title-tab-menu">
                <div class="event-title mt-40">
                    <h2 class="title">Up Coming <br> Events</h2>
                </div>

                <div class="event-tab-menu mt-40">
                    <ul class="nav">
                        <li><a class="active" data-bs-toggle="tab" href="#courses">Courses</a></li>
                        <li><a data-bs-toggle="tab" href="#admission">Admission</a></li>
                        <li><a data-bs-toggle="tab" href="#training">Training</a></li>
                    </ul>
                </div>
            </div>
            <div class="tab-content event-tab-items wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="tab-pane fade show active" id="courses">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-event text-center mt-30">
                                <span class="time">10.35 am to 1.00 pm</span>
                                <span class="date">25 May, 2020</span>
                                <h4 class="event-title"><a href="event-details.html">Micro Biological Workshop</a></h4>
                                <p class="place">Place: Central Hall, New York</p>
                                <a href="#" class="more">Read more <i class="far fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-event text-center mt-30">
                                <span class="time">10.35 am to 1.00 pm</span>
                                <span class="date">25 May, 2020</span>
                                <h4 class="event-title"><a href="event-details.html">Micro Biological Workshop</a></h4>
                                <p class="place">Place: Central Hall, New York</p>
                                <a href="#" class="more">Read more <i class="far fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-event text-center mt-30">
                                <span class="time">10.35 am to 1.00 pm</span>
                                <span class="date">25 May, 2020</span>
                                <h4 class="event-title"><a href="event-details.html">Micro Biological Workshop</a></h4>
                                <p class="place">Place: Central Hall, New York</p>
                                <a href="#" class="more">Read more <i class="far fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-event text-center mt-30">
                                <span class="time">10.35 am to 1.00 pm</span>
                                <span class="date">25 May, 2020</span>
                                <h4 class="event-title"><a href="event-details.html">Micro Biological Workshop</a></h4>
                                <p class="place">Place: Central Hall, New York</p>
                                <a href="#" class="more">Read more <i class="far fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="admission">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-event text-center mt-30">
                                <span class="time">10.35 am to 1.00 pm</span>
                                <span class="date">25 May, 2020</span>
                                <h4 class="event-title"><a href="event-details.html">Micro Biological Workshop</a></h4>
                                <p class="place">Place: Central Hall, New York</p>
                                <a href="#" class="more">Read more <i class="far fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-event text-center mt-30">
                                <span class="time">10.35 am to 1.00 pm</span>
                                <span class="date">25 May, 2020</span>
                                <h4 class="event-title"><a href="event-details.html">Micro Biological Workshop</a></h4>
                                <p class="place">Place: Central Hall, New York</p>
                                <a href="#" class="more">Read more <i class="far fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-event text-center mt-30">
                                <span class="time">10.35 am to 1.00 pm</span>
                                <span class="date">25 May, 2020</span>
                                <h4 class="event-title"><a href="event-details.html">Micro Biological Workshop</a></h4>
                                <p class="place">Place: Central Hall, New York</p>
                                <a href="#" class="more">Read more <i class="far fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-event text-center mt-30">
                                <span class="time">10.35 am to 1.00 pm</span>
                                <span class="date">25 May, 2020</span>
                                <h4 class="event-title"><a href="event-details.html">Micro Biological Workshop</a></h4>
                                <p class="place">Place: Central Hall, New York</p>
                                <a href="#" class="more">Read more <i class="far fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="training">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-event text-center mt-30">
                                <span class="time">10.35 am to 1.00 pm</span>
                                <span class="date">25 May, 2020</span>
                                <h4 class="event-title"><a href="event-details.html">Micro Biological Workshop</a></h4>
                                <p class="place">Place: Central Hall, New York</p>
                                <a href="#" class="more">Read more <i class="far fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-event text-center mt-30">
                                <span class="time">10.35 am to 1.00 pm</span>
                                <span class="date">25 May, 2020</span>
                                <h4 class="event-title"><a href="event-details.html">Micro Biological Workshop</a></h4>
                                <p class="place">Place: Central Hall, New York</p>
                                <a href="#" class="more">Read more <i class="far fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-event text-center mt-30">
                                <span class="time">10.35 am to 1.00 pm</span>
                                <span class="date">25 May, 2020</span>
                                <h4 class="event-title"><a href="event-details.html">Micro Biological Workshop</a></h4>
                                <p class="place">Place: Central Hall, New York</p>
                                <a href="#" class="more">Read more <i class="far fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-event text-center mt-30">
                                <span class="time">10.35 am to 1.00 pm</span>
                                <span class="date">25 May, 2020</span>
                                <h4 class="event-title"><a href="event-details.html">Micro Biological Workshop</a></h4>
                                <p class="place">Place: Central Hall, New York</p>
                                <a href="#" class="more">Read more <i class="far fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="view-btn text-center">
                    <a href="#" class="view-more">View More <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!--====== Event Ends ======-->

    <!--====== Testimonials Start ======-->

    <section class="testimonials-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="testimonials-title">
                        <h2 class="title">Our Students Review</h2>
                        <span class="line"></span>
                        <p>Even slightly believable. If you are going use a passage of Lorem Ipsum need desire to obtain pain of itself, because it is pain de sires to obtain pain of itself occur</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="testimonials-wrapper">
                        <div class="testimonials-shape shape-1"></div>
                        <div class="testimonials-shape shape-2"></div>
                        <div class="testimonials-shape shape-3"></div>

                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-5">
                                <div class="testimonials-image">
                                    <div class="single-testimonial-image">
                                        <img src="edumate/assets/images/testimonials-1.webp" width="313" height="579" alt="testimonials">
                                    </div>
                                    <div class="single-testimonial-image">
                                        <img src="edumate/assets/images/testimonials-2.webp" width="313" height="579" alt="testimonials">
                                    </div>
                                    <div class="single-testimonial-image">
                                        <img src="edumate/assets/images/testimonials-3.webp" width="313" height="579" alt="testimonials">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-7">
                                <div class="testimonials-content">
                                    <div class="single-testimonial-content">
                                        <div class="content-text">
                                            <i class="fas fa-quote-right"></i>
                                            <p>Best pleasure rationally encounter consequences that are very nice a again is there anyone who loves or desires to obtain pain of itself</p>
                                        </div>
                                        <div class="content-meta">
                                            <p class="name">Alex Smith</p>
                                            <p class="designation">CEO, Xelopex Group</p>
                                        </div>
                                    </div>
                                    <div class="single-testimonial-content">
                                        <div class="content-text">
                                            <i class="fas fa-quote-right"></i>
                                            <p>Best pleasure rationally encounter consequences that are very nice a again is there anyone who loves or desires to obtain pain of itself</p>
                                        </div>
                                        <div class="content-meta">
                                            <p class="name">Alex Smith</p>
                                            <p class="designation">CEO, Xelopex Group</p>
                                        </div>
                                    </div>
                                    <div class="single-testimonial-content">
                                        <div class="content-text">
                                            <i class="fas fa-quote-right"></i>
                                            <p>Best pleasure rationally encounter consequences that are very nice a again is there anyone who loves or desires to obtain pain of itself</p>
                                        </div>
                                        <div class="content-meta">
                                            <p class="name">Alex Smith</p>
                                            <p class="designation">CEO, Xelopex Group</p>
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

    <!--====== Testimonials Ends ======-->

    <!--====== Counter Start ======-->

    <div class="counter-area">
        <div class="container">
            <div class="counter-wrapper bg_cover" style="background-image: url(edumate/assets/images/counter-bg.webp);">
                <div class="row">
                    <div class="col-sm-3 col-6 counter-col">
                        <div class="single-counter mt-30 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.2s">
                            <span class="counter-count"><span class="count" data-count="3652">0</span> +</span>
                            <p>Students</p>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6 counter-col">
                        <div class="single-counter mt-30 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.4s">
                            <span class="counter-count"><span class="count" data-count="105">0</span> +</span>
                            <p>Faculties</p>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6 counter-col">
                        <div class="single-counter mt-30 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.6s">
                            <span class="counter-count"><span class="count" data-count="120">0</span> +</span>
                            <p>Branches</p>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6 counter-col">
                        <div class="single-counter mt-30 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.8s">
                            <span class="counter-count"><span class="count" data-count="30">0</span> +</span>
                            <p>Awards win</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== Counter Ends ======-->

    <!--====== Blog Start ======-->

    <section class="blog-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-9">
                    <div class="section-title-2 text-center">
                        <h2 class="title">Latest Blog Post</h2>
                        <span class="line"></span>
                        <p>Even slightly believable. If you are going use a passage of Lorem Ipsum need some</p>
                    </div>
                </div>
            </div>
            <div class="blog-wrapper">
                <div class="row-wrapper blog-active">
                    <div class="custom-col">
                        <div class="single-blog mt-30">
                            <div class="blog-image">
                                <a href="blog-details.html">
                                    <img src="edumate/assets/images/blog-1.webp" width="370" height="250" alt="blog">
                                </a>
                            </div>
                            <div class="blog-content">
                                <ul class="meta">
                                    <li><a href="#">25 May, 2020</a></li>
                                    <li><a href="#">By: Alex</a></li>
                                    <li><a href="#">12 Comments</a></li>
                                </ul>
                                <h4 class="blog-title"><a href="blog-details.html">Latest Micro Biological basic Workshop for Research</a></h4>
                                <a href="blog-details.html" class="more">Read more <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col">
                        <div class="single-blog mt-30">
                            <div class="blog-image">
                                <a href="blog-details.html">
                                    <img src="edumate/assets/images/blog-2.webp" width="370" height="250" alt="blog">
                                </a>
                            </div>
                            <div class="blog-content">
                                <ul class="meta">
                                    <li><a href="#">25 May, 2020</a></li>
                                    <li><a href="#">By: Alex</a></li>
                                    <li><a href="#">12 Comments</a></li>
                                </ul>
                                <h4 class="blog-title"><a href="blog-details.html">Latest Micro Biological basic Workshop for Research</a></h4>
                                <a href="blog-details.html" class="more">Read more <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col">
                        <div class="single-blog mt-30">
                            <div class="blog-image">
                                <a href="blog-details.html">
                                    <img src="edumate/assets/images/blog-3.webp" width="370" height="250" alt="blog">
                                </a>
                            </div>
                            <div class="blog-content">
                                <ul class="meta">
                                    <li><a href="#">25 May, 2020</a></li>
                                    <li><a href="#">By: Alex</a></li>
                                    <li><a href="#">12 Comments</a></li>
                                </ul>
                                <h4 class="blog-title"><a href="blog-details.html">Latest Micro Biological basic Workshop for Research</a></h4>
                                <a href="blog-details.html" class="more">Read more <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== Blog Ends ======-->

    <!--====== Newsletter Start ======-->

    <section class="newsletter-area">
        <div class="container">
            <div class="newsletter-wrapper bg_cover wow zoomIn" data-wow-duration="1s" data-wow-delay="0.2s" style="background-image: url(edumate/assets/images/newsletter-bg-1.webp);">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="section-title-2 mt-25">
                            <h2 class="title">Subscribe our Newsletter</h2>
                            <span class="line"></span>
                            <p>Even slightly believable. If you are going use a passage of Lorem Ipsum need some</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="newsletter-form mt-30">
                            <form action="#">
                                <input type="text" placeholder="Enter your email here">
                                <button class="main-btn main-btn-2">Subscribe now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== Newsletter Ends ======-->

    <!--====== Footer Start ======-->

    <section class="footer-area bg_cover" style="background-image: url(edumate/assets/images/counter-bg.webp);">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-link mt-45">
                            <h4 class="footer-title">Our Campus</h4>
                            <ul class="link-list">
                                <li><a href="about-us.html">About us</a></li>
                                <li><a href="#">Campus map</a></li>
                                <li><a href="#">360O  view</a></li>
                                <li><a href="#">Notice board</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-link mt-45">
                            <h4 class="footer-title">Information</h4>
                            <ul class="link-list">
                                <li><a href="#">Admission</a></li>
                                <li><a href="#">Tuition fee</a></li>
                                <li><a href="#">Scholorship</a></li>
                                <li><a href="#">Coditions</a></li>
                                <li><a href="#">Facilities</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-link mt-45">
                            <h4 class="footer-title">Useful Link</h4>
                            <ul class="link-list">
                                <li><a href="our-courses-left-sidebar.html">All Courses</a></li>
                                <li><a href="teachers.html">Our Teachers</a></li>
                                <li><a href="event.html">Our Events</a></li>
                                <li><a href="blog-left-sidebar.html">Blog post</a></li>
                                <li><a href="faq.html">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-link mt-45">
                            <h4 class="footer-title">Contact Info</h4>
                            <ul class="link-list">
                                <li>
                                    <p>245, New Town, Marklen Street North City, New York, USA</p>
                                </li>
                                <li>
                                    <p><a href="tel:+01254659874">+01254 659 874 </a></p>
                                    <p><a href="tel:+32145857458">+32145 857 458</a></p>
                                </li>
                                <li>
                                    <p><a href="mailto://info@example.com">info@example.com</a></p>
                                    <p><a href="#">www.example.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="copyright text-center">
                    <p>&copy; 2023 <span> Edumate </span> Made with <i class="fa fa-heart"></i> by <a href="#">codecarnival</a></p>
                </div>
            </div>
        </div>
    </section>

    <!--====== Footer Ends ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->




    <!--====== Jquery js ======-->
    <script src="edumate/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="edumate/assets/js/vendor/modernizr-3.7.1.min.js"></script>

    <!--====== All Plugins js ======-->
    <script src="edumate/assets/js/plugins/popper.min.js"></script>
    <script src="edumate/assets/js/plugins/bootstrap.min.js"></script>
    <script src="edumate/assets/js/plugins/slick.min.js"></script>
    <script src="edumate/assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="edumate/assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <script src="edumate/assets/js/plugins/isotope.pkgd.min.js"></script>
    <script src="edumate/assets/js/plugins/wow.min.js"></script>
    <script src="edumate/assets/js/plugins/ajax-contact.js"></script>


    <!--====== Main Activation  js ======-->
    <script src="edumate/assets/js/main.js"></script>
    @routes
    @vite(['resources/js/app.js'])
</body>

</html>



