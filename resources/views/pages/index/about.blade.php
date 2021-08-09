<section class="flat-introduce flat-introduce-style1 clearfix">
        <div class="container">
            <div class="col-left">
                <div class="videobox">
                    <a class="fancybox" data-type="iframe" href="{{$about->video_url}}">
                        <img src="/images/cohete.png" alt="images">
                    </a>
                    <div class="elip-top">
                        <img src="images/home1/42.png" alt="images">
                    </div>
                    <div class="elip-bottom">
                        <img src="images/home1/42.png" alt="images">
                    </div>
                </div>
            </div>
            <div class="col-right">
                <div class="content-introduce content-introduce-style1">
                    <div class="title-section">
                        <p class="sub-title lt-sp25">{{env('APP_NAME')}}</p>
                        <div class="flat-title larger heading-type1">{{$about->title}}</div>
                    </div>
                    <div class="content-introduce-inner">
    					{!!$about->content!!}
                    </div>
                </div>
            </div>
        </div>
    </section><!-- flat-introduce -->