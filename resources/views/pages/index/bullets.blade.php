    <section class="flat-services style1 parallax parallax1 clearfix">
        <div class="section-overlay"></div>
        <div class="container-fluid">
            <div class="row">
                @forelse($bullets as $bullet)
                <div class="col-lg-4">
                    <div class="services-content-box themesflat-content-box" data-padding="0% 30% 0% 0%" data-mobipadding="0% 0% 0% 0%" data-smobipadding="0% 0% 0% 0%">
                        <div class="flat-imagebox imagebox-services style1">
                            <div class="imagebox-content">
                                <i class="{{$bullet->icon}} fa-7x"  style="color:white;"></i>
                                <h5 class="text-one text-white">{{$bullet->title}}</h5>
                                <p class="text-white">
                                    {{$bullet->content}}
                                </p>
                                @if(isset($bullet->url))
                                <div class="read-more">
                                    <a href="#">Read More</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </section><!-- flat-services -->