<section id="home">

<!-- Slider Revolution Start -->
<div class="rev_slider_wrapper">
  <div class="rev_slider" data-version="5.0">
    <ul>
      <?php 
      $i=0; 
      foreach($sliders as $slider): 
        $i++; 
        $sliderImage = frontend_assets_url('images/slide/c1.jpg');
        if($slide['image']!=''){
          $sliderImage = frontend_uploads_url('sliders/images/'.$slide['image']);
        }
      ?>
      <!-- SLIDE 1 -->
      <li data-index="rs-<?php echo $i; ?>" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="<?php echo $slide['title']; ?>" data-description="">
           <!-- MAIN IMAGE -->
           <img src="<?php echo $sliderImage; ?>"  alt="<?php echo $slide['title']; ?>"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
           <!-- LAYERS -->

           <!-- LAYER NR. 1 -->
           <div class="tp-caption tp-resizeme text-uppercase  bg-theme-colored-transparent text-white font-raleway border-left-theme-color-2-6px border-right-theme-color-2-6px pl-30 pr-30"
              id="rs-<?php echo $i; ?>-layer-1"

              data-x="['center']"
              data-hoffset="['0']"
              data-y="['middle']"
              data-voffset="['-90']"
              data-fontsize="['28']"
              data-lineheight="['54']"
              data-width="none"
              data-height="none"
              data-whitespace="nowrap"
              data-transform_idle="o:1;s:500"
              data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
              data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
              data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
              data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
              data-start="1000"
              data-splitin="none"
              data-splitout="none"
              data-responsive_offset="on"
              style="z-index: 7; white-space: nowrap; font-weight:400; border-radius: 30px;"><?php echo $slide['subtitle']; ?>
           </div>

           <!-- LAYER NR. 2 -->
           <div class="tp-caption tp-resizeme text-uppercase bg-theme-colored-transparent text-white font-raleway pl-30 pr-30"
              id="rs-<?php echo $i; ?>-layer-2"

              data-x="['center']"
              data-hoffset="['0']"
              data-y="['middle']"
              data-voffset="['-20']"
              data-fontsize="['48']"
              data-lineheight="['70']"
              data-width="none"
              data-height="none"
              data-whitespace="nowrap"
              data-transform_idle="o:1;s:500"
              data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
              data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
              data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
              data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
              data-start="1000"
              data-splitin="none"
              data-splitout="none"
              data-responsive_offset="on"
              style="z-index: 7; white-space: nowrap; font-weight:700; border-radius: 30px;"><?php echo $slide['title']; ?>
           </div>

           <!-- LAYER NR. 3 -->
           <div class="tp-caption tp-resizeme text-white text-center bc-op"
              id="rs-<?php echo $i; ?>-layer-3"

              data-x="['center']"
              data-hoffset="['0']"
              data-y="['middle']"
              data-voffset="['50']"
              data-fontsize="['16']"
              data-lineheight="['28']"
              data-width="none"
              data-height="none"
              data-whitespace="nowrap"
              data-transform_idle="o:1;s:500"
              data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
              data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
              data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
              data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
              data-start="1400"
              data-splitin="none"
              data-splitout="none"
              data-responsive_offset="on"
              style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:600;"><?php echo $slide['body']; ?>
           </div>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <!-- end .rev_slider -->
</div>
<!-- end .rev_slider_wrapper -->
<script>
  $(document).ready(function(e) {
    $(".rev_slider").revolution({
      sliderType:"standard",
      sliderLayout: "auto",
      dottedOverlay: "none",
      delay: 5000,
      navigation: {
          keyboardNavigation: "off",
          keyboard_direction: "horizontal",
          mouseScrollNavigation: "off",
          onHoverStop: "off",
          touch: {
              touchenabled: "on",
              swipe_threshold: 75,
              swipe_min_touches: 1,
              swipe_direction: "horizontal",
              drag_block_vertical: false
          },
        arrows: {
          style:"zeus",
          enable:true,
          hide_onmobile:true,
          hide_under:600,
          hide_onleave:true,
          hide_delay:200,
          hide_delay_mobile:1200,
          tmp:'',
          left: {
            h_align:"left",
            v_align:"center",
            h_offset:30,
            v_offset:0
          },
          right: {
            h_align:"right",
            v_align:"center",
            h_offset:30,
            v_offset:0
          }
        },
        bullets: {
          enable:false,
          hide_onmobile:true,
          hide_under:600,
          style:"metis",
          hide_onleave:true,
          hide_delay:200,
          hide_delay_mobile:1200,
          direction:"horizontal",
          h_align:"center",
          v_align:"bottom",
          h_offset:0,
          v_offset:30,
          space:5
        }
      },
      responsiveLevels: [1240, 1024, 778],
      visibilityLevels: [1240, 1024, 778],
      gridwidth: [1170, 1024, 778, 480],
      gridheight: [650, 768, 960, 720],
      lazyType: "none",
      parallax: {
          origo: "slidercenter",
          speed: 1000,
          levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
          type: "scroll"
      },
      shadow: 0,
      spinner: "off",
      stopLoop: "on",
      stopAfterLoops: 0,
      stopAtSlide: -1,
      shuffle: "off",
      autoHeight: "off",
      fullScreenAutoWidth: "off",
      fullScreenAlignForce: "off",
      fullScreenOffsetContainer: "",
      fullScreenOffset: "0",
      hideThumbsOnMobile: "off",
      hideSliderAtLimit: 0,
      hideCaptionAtLimit: 0,
      hideAllCaptionAtLilmit: 0,
      debugMode: false,
      fallbacks: {
          simplifyAll: "off",
          nextSlideOnWindowFocus: "off",
          disableFocusListener: false,
      }
    });
  });
</script>
<!-- Slider Revolution Ends -->
</section>