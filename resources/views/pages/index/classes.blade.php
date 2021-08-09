<section class="flat-event flat-event-style1 clearfix">
        <div class="container-fluid">
            <div class="col-left">
                <div class="content-event-style1 themesflat-content-box" data-padding="13.7% 1.2% 0% 0%" data-sdesktoppadding="0% 0% 0% 0%" data-ssdesktoppadding="0% 0% 0% 0%" data-mobipadding="0% 0% 0% 0%" data-smobipadding="0% 0% 0% 0%">
                    <div class="title-section">
                        <div class="flat-title larger heading-type3">Próximas Clases en Vivo</div>
                    </div>



                    @forelse($classes as $class)
       
                     <div class="content-event">
                        <div class="entry-info clearfix">


                        @if($loop->index == 0)
                            <div class="entry-title">
                                <a href="#" class="cl-7ecc88">
                                    {{$class->title}}
                                </a>
                            </div>
                            @php
                            $image1 = $class->course->thumbnail->first()->getUrl();
                            @endphp
                        @elseif($loop->index == 1)
                            <div class="entry-title">
                                <a href="#" class="cl-3f4c99">
                                    {{$class->title}}
                                </a>
                            </div>
                            @php
                            $image2 = $class->course->thumbnail->first()->getUrl();
                            @endphp
                        @elseif($loop->index == 2)
                            <div class="entry-title">
                                <a href="#" class="cl-ff5f60">
                                    {{$class->title}}
                                </a>
                            </div>
                            @php
                            $image3 = $class->course->thumbnail->first()->getUrl();
                            @endphp                            
                        @elseif($loop->index == 3)
                            <div class="entry-title">
                                <a href="#" class="cl-7ecc88">
                                    {{$class->title}}
                                </a>
                            </div>
                             @php
                            $image4 = $class->course->thumbnail->first()->getUrl();
                            @endphp                           
                        @endif

                            <div class="entry-meta">
                                <ul>
                                    <li class="date clearfix">
                                       
                                        <span class="detail-event">{{ Carbon\Carbon::parse($class->start)->diffForHumans()}} </span>
                                    </li>
                                    <li class="date clearfix">
                                        <span class="icon-event icon-icons8-planner-100"></span>
                                        <span class="detail-event">{{ Carbon\Carbon::parse($class->start)->format('l j F')}} </span>
                                    </li>
                                    <li class="time clearfix">
                                        <span class="icon-event icon-icons8-stopwatch-100"></span>
                                        <span class="detail-event">{{ Carbon\Carbon::parse($class->start)->format('H:i')}}</span>
                                    </li>
                                    <li class="location clearfix">
                                        <span class="detail-event"><strong>{{$class->course->title}}</strong></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @if($loop->index == 0)
                        <div class="entry-number number-one">
                            <span class="cl-7ecc88">{{$loop->index +1}}</span>
                        </div>
                        @elseif($loop->index == 1)
						<div class="entry-number number-two">
                            <span class="cl-3f4c99">{{$loop->index +1}}</span>
                        </div>
                        @elseif($loop->index == 2)
						<div class="entry-number number-three">
                            <span class="cl-ff5f60">{{$loop->index +1}}</span>
                        </div>
                        @endif
                    </div>
                   	
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="col-right">
                <div class="images-list themesflat-content-box" data-padding="0% 0% 0% 15.1%" data-sdesktoppadding="0% 0% 0% 5%" data-ssdesktoppadding="0% 0% 0% 0%" data-mobipadding="0% 0% 0% 0%" data-smobipadding="0% 0% 0% 0%">
                    <div class="images-list-1">
                        @if($classes->count() > 0)
                        <div class="img-event">
                            <img src="" alt="images" style="max-width: 250px;">
                            <span class="number bg-cl7ecc88">1</span>
                        </div>
                        @endif
                        @if($classes->count() > 1)
                        <div class="img-event">
                            <img src="" alt="images" style="max-width: 250px;">
                            <span class="number bg-cl3f4c99">2</span>
                        </div>
                        @endif
                    </div>
                    <div class="images-list-2">
                        @if($classes->count() > 0)
                        <div class="img-event">
                            <img src="" alt="images" style="max-width: 250px;">
                            <span class="number bg-clff5f60">3</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section><!-- flat-event -->