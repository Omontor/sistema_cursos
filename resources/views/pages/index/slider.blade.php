<!-- Slider -->
                    @forelse($sliders as $slider)

       
                    <li data-transition="random">
                        <!-- Main Image -->
                        <img src="{{$slider->image->getUrl()}}" alt="" data-bgposition="center center" data-no-retina>
                        <div class="overlay"></div>

                        <!-- Layers -->
                        <div class="tp-caption tp-resizeme education"
                        data-x="['left','left','left','center']" data-hoffset="['0','4','4','15']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['-113','-80','-70','-70']"
                        data-fontsize="['70','70','50','30']"
                        data-lineheight="['90','90','70','50']"
                        data-width="full"
                        data-height="none"
                        data-whitespace="normal"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                        data-mask_in="x:0px;y:[100%];" 
                        data-mask_out="x:inherit;y:inherit;" 
                        data-start="1000" 
                        data-splitin="none" 
                        data-splitout="none" 
                        data-responsive_offset="on"> <div class="education-text text-white">
                        {{$slider->hero_title}}</div> </div>

                        <div class="tp-caption tp-resizeme text-white complete text-edukin"
                        data-x="['left','left','left','center']" data-hoffset="['0','4','4','15']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['-22','-5','-10','-10']"
                        data-fontsize="['17','17','15','14']"
                        data-lineheight="['30','30','26','22']"
                        data-width="full"
                        data-height="none"
                        data-whitespace="normal"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                        data-mask_in="x:0px;y:[100%];" 
                        data-mask_out="x:inherit;y:inherit;" 
                        data-start="1000" 
                        data-splitin="none" 
                        data-splitout="none" 
                        data-responsive_offset="on" 
                        data-paddingright="['550','155','50','2']" >
                        {{$slider->hero_subtitle}}
                        </div>

                        <div class="tp-caption"
                        data-x="['left','left','left','center']" data-hoffset="['0','4','4','15']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['88','80','60','70']"
                        data-width="full"
                        data-height="none"
                        data-whitespace="normal"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                        data-mask_in="x:0px;y:[100%];" 
                        data-mask_out="x:inherit;y:inherit;" 
                        data-start="1000" 
                        data-splitin="none" 
                        data-splitout="none" 
                        data-responsive_offset="on" 
                        data-paddingtop= "['50','50','50','50']"
                        data-paddingbottom= "['50','50','50','50']"> <a href="{{$slider->button_url}}" class="btn btn-styl1">{{$slider->button_text}}</a></div>

                        <div class="tp-caption sl-address"
                        data-x="['left','left','left','center']" data-hoffset="['0','4','4','15']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['325','280','250','200']"
                        data-width="full"
                        data-height="none"
                        data-whitespace="normal"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                        data-mask_in="x:0px;y:[100%];" 
                        data-mask_out="x:inherit;y:inherit;" 
                        data-start="1000" 
                        data-splitin="none" 
                        data-splitout="none" 
                        data-responsive_offset="on" 
                        data-paddingtop= "['50','50','50','50']"
                        data-paddingbottom= "['50','50','50','50']"> 
                        @if(isset($slider->bottom_text))
                        <a href="#" class="text-white sl-phone">{{$slider->bottom_text}}</a></div>
                        @else
                        @endif
                    </li>

                    @empty
                    <li data-transition="random">
                        <!-- Main Image -->
                        <img src="images/header/03.png" alt="" data-bgposition="center center" data-no-retina>
                        <div class="overlay"></div>

                        <!-- Layers -->

                        <div class="tp-caption tp-resizeme education"
                        data-x="['left','left','left','center']" data-hoffset="['0','4','4','15']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['-113','-80','-70','-70']"
                        data-fontsize="['70','70','50','30']"
                        data-lineheight="['90','90','70','50']"
                        data-width="full"
                        data-height="none"
                        data-whitespace="normal"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                        data-mask_in="x:0px;y:[100%];" 
                        data-mask_out="x:inherit;y:inherit;" 
                        data-start="1000" 
                        data-splitin="none" 
                        data-splitout="none" 
                        data-responsive_offset="on"> <div class="education-text text-white">Education for all</div> </div>

                        <div class="tp-caption tp-resizeme text-white complete text-edukin"
                        data-x="['left','left','left','center']" data-hoffset="['0','4','4','15']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['-22','-5','-10','-10']"
                        data-fontsize="['17','17','15','14']"
                        data-lineheight="['30','30','26','22']"
                        data-width="full"
                        data-height="none"
                        data-whitespace="normal"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                        data-mask_in="x:0px;y:[100%];" 
                        data-mask_out="x:inherit;y:inherit;" 
                        data-start="1000" 
                        data-splitin="none" 
                        data-splitout="none" 
                        data-responsive_offset="on" 
                        data-paddingright="['550','155','50','2']" >Complete your educution record collection. Discover Educution's full discography. Education is not key to success in life.</div>

                        <div class="tp-caption"
                        data-x="['left','left','left','center']" data-hoffset="['0','4','4','15']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['88','80','60','70']"
                        data-width="full"
                        data-height="none"
                        data-whitespace="normal"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                        data-mask_in="x:0px;y:[100%];" 
                        data-mask_out="x:inherit;y:inherit;" 
                        data-start="1000" 
                        data-splitin="none" 
                        data-splitout="none" 
                        data-responsive_offset="on" 
                        data-paddingtop= "['50','50','50','50']"
                        data-paddingbottom= "['50','50','50','50']"> <a href="#" class="btn btn-styl1">Read More</a> <a href="#" class="btn btn-styl2"><i class="fa fa-play" aria-hidden="true"></i></a></div>

                        <div class="tp-caption sl-address"
                        data-x="['left','left','left','center']" data-hoffset="['0','4','4','15']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['325','280','250','200']"
                        data-width="full"
                        data-height="none"
                        data-whitespace="normal"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                        data-mask_in="x:0px;y:[100%];" 
                        data-mask_out="x:inherit;y:inherit;" 
                        data-start="1000" 
                        data-splitin="none" 
                        data-splitout="none" 
                        data-responsive_offset="on" 
                        data-paddingtop= "['50','50','50','50']"
                        data-paddingbottom= "['50','50','50','50']"> <a href="#" class="text-white sl-phone"><i class="fa fa-phone" aria-hidden="true"></i> +91 254 785 587</a><a href="#" class="text-white sl-email"><i class="fa fa-envelope" aria-hidden="true"></i> educate@info.com</a></div>
                    </li>
                    @endforelse

                    
                </ul>
            </div>
        </div> 
    </section>
<!-- Slider -->