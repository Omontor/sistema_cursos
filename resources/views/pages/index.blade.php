<section class="flat-slider style1 clearfix">
        <div class="rev_slider_wrapper fullwidthbanner-container" >
            <div id="rev-slider1" class="rev_slider fullwidthabanner">
                <ul>
                    <!--Slider -->
                    @include('pages.index.slider')
                    @include('pages.index.newsletter')
            <!-- Si no hay registrados featured courses no mostramos este bloque -->
                    @if($featured->count() > 0)
                    @include('pages.index.featured')
                    @endif
            <!-- Si no hay registrados bullets no mostramos este bloque -->
                    @if($bullets->count() > 0)
                    @include('pages.index.bullets')
                    @endif
            <!-- Si no hay Acerca de no mostramos este bloque -->
                    @if($about != null)
                    @include('pages.index.about')
                    @else
                    @endif
            <!-- Si no hay razones registradas no mostramos este bloque -->
                    @if($reasons->count() > 0)
                    @include('pages.index.reasons')
                    @endif
            <!-- Si no hay eventos registrados no mostramos este bloque -->
                    @if($classes->count() > 0)
                    @include('pages.index.classes')
                    @endif
            <!-- Si no hay testimonios registrados no mostramos este bloque -->
                    @if($testimonials->count() > 0)
                    @include('pages.index.testimonials')
                    @endif


    <section class="latest-blog cl-dots1 latest-blog-type1 latest-blog-style1">
        <div class="container">
            <div class="title-section">
                <div class="flat-title small heading-type4">
                    Latest Blog
                </div>
            </div>
            <div class="flat-carousel-box data-effect clearfix" data-gap="30" data-column="2" data-column2="2" data-column3="1" data-column4="1" data-dots="true" data-auto="false" data-nav="false">
                <div class="owl-carousel">
                    <article class="post post-style1 post-bg">
                        <div class="bg clearfix">
                            <div class="position cl-fe5e5f lt-sp4">
                                DESIGN
                            </div>
                            <div class="featured-post">
                                <img src="images/home1/34.png" alt="images">
                            </div>
                        </div>
                        <div class="post-content clearfix">
                            <div class="entry-info cleafix">
                                <div class="avatar">
                                    <img src="images/home1/36.png" alt="images">
                                </div>
                                <div class="post-title">
                                    <h5>
                                        <a href="#" class="lt-sp04">Design Milk is a design blog featuring...</a>
                                    </h5>
                                </div>
                            </div>
                            
                            <div class="post-link">
                                <a href="#">Read Now</a>
                            </div>
                        </div>
                    </article>
                    <article class="post post-style1 post-bg">
                        <div class="bg clearfix">
                            <div class="position cl-fe5e5f lt-sp4">
                                DESIGN
                            </div>
                            <div class="featured-post">
                                <img src="images/home1/35.png" alt="images">
                            </div>
                        </div>
                        <div class="post-content clearfix">
                            <div class="entry-info cleafix">
                                <div class="avatar">
                                    <img src="images/home1/36.png" alt="images">
                                </div>
                                <div class="post-title">
                                    <h5>
                                        <a href="#" class="lt-sp04">Design Milk is a design blog featuring...</a>
                                    </h5>
                                </div>
                            </div>
                            
                            <div class="post-link">
                                <a href="#">Read Now</a>
                            </div>
                        </div>
                    </article>
                    <article class="post post-style1 post-bg">
                        <div class="bg clearfix">
                            <div class="position cl-fe5e5f lt-sp4">
                                DESIGN
                            </div>
                            <div class="featured-post">
                                <img src="images/home1/34.png" alt="images">
                            </div>
                        </div>
                        <div class="post-content clearfix">
                            <div class="entry-info cleafix">
                                <div class="avatar">
                                    <img src="images/home1/36.png" alt="images">
                                </div>
                                <div class="post-title">
                                    <h5>
                                        <a href="#" class="lt-sp04">Design Milk is a design blog featuring...</a>
                                    </h5>
                                </div>
                            </div>
                            
                            <div class="post-link">
                                <a href="#">Read Now</a>
                            </div>
                        </div>
                    </article>
                    <article class="post post-style1 post-bg">
                        <div class="bg clearfix">
                            <div class="position cl-fe5e5f lt-sp4">
                                DESIGN
                            </div>
                            <div class="featured-post">
                                <img src="images/home1/35.png" alt="images">
                            </div>
                        </div>
                        <div class="post-content clearfix">
                            <div class="entry-info cleafix">
                                <div class="avatar">
                                    <img src="images/home1/36.png" alt="images">
                                </div>
                                <div class="post-title">
                                    <h5>
                                        <a href="#" class="lt-sp04">Design Milk is a design blog featuring...</a>
                                    </h5>
                                </div>
                            </div>
                            
                            <div class="post-link">
                                <a href="#">Read Now</a>
                            </div>
                        </div>
                    </article>
                    <article class="post post-style1 post-bg">
                        <div class="bg clearfix">
                            <div class="position cl-fe5e5f lt-sp4">
                                DESIGN
                            </div>
                            <div class="featured-post">
                                <img src="images/home1/34.png" alt="images">
                            </div>
                        </div>
                        <div class="post-content clearfix">
                            <div class="entry-info cleafix">
                                <div class="avatar">
                                    <img src="images/home1/36.png" alt="images">
                                </div>
                                <div class="post-title">
                                    <h5>
                                        <a href="#" class="lt-sp04">Design Milk is a design blog featuring...</a>
                                    </h5>
                                </div>
                            </div>
                            
                            <div class="post-link">
                                <a href="#">Read Now</a>
                            </div>
                        </div>
                    </article>
                    <article class="post post-style1 post-bg">
                        <div class="bg clearfix">
                            <div class="position cl-fe5e5f lt-sp4">
                                DESIGN
                            </div>
                            <div class="featured-post">
                                <img src="images/home1/35.png" alt="images">
                            </div>
                        </div>
                        <div class="post-content clearfix">
                            <div class="entry-info cleafix">
                                <div class="avatar">
                                    <img src="images/home1/36.png" alt="images">
                                </div>
                                <div class="post-title">
                                    <h5>
                                        <a href="#" class="lt-sp04">Design Milk is a design blog featuring...</a>
                                    </h5>
                                </div>
                            </div>
                            
                            <div class="post-link">
                                <a href="#">Read Now</a>
                            </div>
                        </div>
                    </article>
                    <article class="post post-style1 post-bg">
                        <div class="bg clearfix">
                            <div class="position cl-fe5e5f lt-sp4">
                                DESIGN
                            </div>
                            <div class="featured-post">
                                <img src="images/home1/34.png" alt="images">
                            </div>
                        </div>
                        <div class="post-content clearfix">
                            <div class="entry-info cleafix">
                                <div class="avatar">
                                    <img src="images/home1/36.png" alt="images">
                                </div>
                                <div class="post-title">
                                    <h5>
                                        <a href="#" class="lt-sp04">Design Milk is a design blog featuring...</a>
                                    </h5>
                                </div>
                            </div>
                            
                            <div class="post-link">
                                <a href="#">Read Now</a>
                            </div>
                        </div>
                    </article>
                    <article class="post post-style1 post-bg">
                        <div class="bg clearfix">
                            <div class="position cl-fe5e5f lt-sp4">
                                DESIGN
                            </div>
                            <div class="featured-post">
                                <img src="images/home1/35.png" alt="images">
                            </div>
                        </div>
                        <div class="post-content clearfix">
                            <div class="entry-info cleafix">
                                <div class="avatar">
                                    <img src="images/home1/36.png" alt="images">
                                </div>
                                <div class="post-title">
                                    <h5>
                                        <a href="#" class="lt-sp04">Design Milk is a design blog featuring...</a>
                                    </h5>
                                </div>
                            </div>
                            
                            <div class="post-link">
                                <a href="#">Read Now</a>
                            </div>
                        </div>
                    </article>
                    <article class="post post-style1 post-bg">
                        <div class="bg clearfix">
                            <div class="position cl-fe5e5f lt-sp4">
                                DESIGN
                            </div>
                            <div class="featured-post">
                                <img src="images/home1/34.png" alt="images">
                            </div>
                        </div>
                        <div class="post-content clearfix">
                            <div class="entry-info cleafix">
                                <div class="avatar">
                                    <img src="images/home1/36.png" alt="images">
                                </div>
                                <div class="post-title">
                                    <h5>
                                        <a href="#" class="lt-sp04">Design Milk is a design blog featuring...</a>
                                    </h5>
                                </div>
                            </div>
                            
                            <div class="post-link">
                                <a href="#">Read Now</a>
                            </div>
                        </div>
                    </article>
                    <article class="post post-style1 post-bg">
                        <div class="bg clearfix">
                            <div class="position cl-fe5e5f lt-sp4">
                                DESIGN
                            </div>
                            <div class="featured-post">
                                <img src="images/home1/35.png" alt="images">
                            </div>
                        </div>
                        <div class="post-content clearfix">
                            <div class="entry-info cleafix">
                                <div class="avatar">
                                    <img src="images/home1/36.png" alt="images">
                                </div>
                                <div class="post-title">
                                    <h5>
                                        <a href="#" class="lt-sp04">Design Milk is a design blog featuring...</a>
                                    </h5>
                                </div>
                            </div>
                            
                            <div class="post-link">
                                <a href="#">Read Now</a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section><!-- latest-blog -->
    <section class="quick-link quick-link-style1 parallax parallax2">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="wrap-link-left">
                        <div class="caption lt-sp275">
                            It’s fast, free and very easy!
                        </div>
                        <div class="heading-lf lt-sp03">
                            Ready to get started?
                        </div>
                        <p>
                            Education is the process of acquiring the body of knowledge and skills that people are expected have in your society. A education develops a critical thought process in addition to learning .
                        </p>
                        <div class="btn-apply-link">
                            <ul>
                                <li>
                                    <a class="btn btn-apply bg-clff5f60">Apply now</a>
                                </li>
                                <li>
                                    <a class="btn btn-request lt-sp06">Request Service</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="wrap-link-right">
                        <div class="heading-rg">
                            <span>Quick Link</span>
                        </div>
                        <ul class="info-quick-link">
                            <li>
                                <img src="images/home1/38.png" alt="images">
                                <a href="#">Tution And Fees</a>
                            </li>
                            <li>
                                <img src="images/home1/39.png" alt="images">
                                <a href="#">University Facilities</a>
                            </li>
                            <li>
                                <img src="images/home1/40.png" alt="images">
                                <a href="#">Review & Rating</a>
                            </li>
                            <li>
                                <img src="images/home1/41.png" alt="images">
                                <a href="#">Community Q&A</a>
                            </li>
                        </ul> 
                    </div>
                </div>
            </div>
        </div>
    </section><!-- quick-link -->