<section class="rev_slider_wrapper text-center heading_space">
    <div id="rev_slider" class="rev_slider" data-version="5.0">

        <ul>
            @foreach($sliders as $slider)
                <li data-transition="fade">
                    <img src="{{ image_url($slider->image) }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgparallax="10" class="rev-slidebg">

                    <div class="tp-caption tp-resizeme slider__title"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['326','270','270','150']" data-voffset="['0','0','0','0']"
                         data-responsive_offset="on"
                         data-visibility="['on','on','on','on']"
                         data-transform_idle="o:1;"
                         data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                         data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                         data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                         data-start="800"
                    >
                        <h1>{{ $slider->title }}</h1>
                    </div>

                    <div class="tp-caption tp-resizeme slider__description"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['380','340','300','350']" data-voffset="['0','0','0','0']"
                         data-responsive_offset="on"
                         data-visibility="['on','on','off','off']"
                         data-transform_idle="o:1;"
                         data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;"
                         data-transform_out="opacity:0;s:1000;s:1000;"
                         data-start="1500"
                    >
                        <p>{{ $slider->description }}</p>
                    </div>

                    <div class="tp-caption  tp-resizeme slider__link"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['450','390','350','250']" data-voffset="['0','0','0','0']"
                         data-responsive_offset="on"
                         data-visibility="['on','on','on','on']"
                         data-transform_idle="o:1;"
                         data-transform_in="y:[-200%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                         data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
                         data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                         data-mask_out="x:0;y:0;s:inherit;e:inherit;"
                         data-start="2000"
                    >
                        <a href="{{ $slider->link }}" class="border_radius btn_common white_border" target="_blank">مشاهده</a>
                    </div>

                </li>
            @endforeach
        </ul>
    </div>
</section>
