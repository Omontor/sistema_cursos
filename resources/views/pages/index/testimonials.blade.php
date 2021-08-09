<section class="slider testimonial-flexslider testimonial-style1 equalize sm-equalize-auto clearfix">        
        <div class="wrap-info themesflat-content-box" data-padding="0% 0% 0% 10%" data-sdesktoppadding="0% 0% 0% 0%" data-ssdesktoppadding="0% 0% 0% 0%" data-mobipadding="0% 0% 0% 0%" data-smobipadding="0% 0% 0% 0%">
            <div id="carousel-testimonial" class="flexslider">
                <ul class="slides translate-none"> 
                	@forelse($testimonials as $testimonial)
                    <li class="avatar">
                        <img src="{{$testimonial->user->avatar ? $testimonial->user->avatar->getUrl() : "/images/graduates.png"}}" alt="images">
                    </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="wrap-quote themesflat-content-box" data-padding="10.47% 14.1% 0% 0%" data-sdesktoppadding="10.47% 15px 0% 15px" data-ssdesktoppadding="16% 15px 0% 15px" data-mobipadding="100px 15px 85px 15px" data-smobipadding="100px 15px 85px 15px">
            <div id="slider-testimonial" class="flexslider">
                <ul class="slides client-info">
                	@forelse($testimonials as $testimonial)
                    <li>
                        <span class="icon-quote icon-icons8-get-quote-filled-100"></span>
                        <p class="speech" style="padding-right: 20px;">
                           " {{$testimonial->content}}"
                        </p>
                        <div class="name">
                            {{$testimonial->user->name}}
                        </div>
                    </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
    </section><!-- testimonial -->