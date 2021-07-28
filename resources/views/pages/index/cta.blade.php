<section class="quick-link quick-link-style1 parallax parallax2">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrap-link-left">
                        <div class="caption lt-sp275">
                            {{$ctas->tagline}}
                        </div>
                        <div class="heading-lf lt-sp03">
                            {{$ctas->title}}
                        </div>
                        <p>
                          {!!$ctas->content!!}
                        </p>
                        <div class="btn-apply-link">
                            <ul>
                                <li>
                                    <a class="btn btn-apply bg-clff5f60" href="{{$ctas->btn_url}}">{{$ctas->btn_text}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- quick-link -->