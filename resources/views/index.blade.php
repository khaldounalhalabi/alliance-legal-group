@extends("layout")
@section("content")
    <main class="site-main">
        <!-- Slider Section -->
        <div
            id="home-revslider"
            class="slider-section container-fluid no-padding"
        >
            <!-- START REVOLUTION SLIDER 5.3 -->
            <div class="rev_slider_wrapper">
                <div id="home-slider1" class="rev_slider" data-version="5.3">
                    <ul>
                        <li>
                            <img
                                src="{{ asset("assets/images/profound.jpg") }}"
                                alt="slider"
                                data-bgposition="center center"
                                data-bgfit="cover"
                                data-bgrepeat="no-repeat"
                                data-bgparallax="10"
                                class="rev-slidebg"
                                data-no-retina
                            />
                            <div
                                class="tp-caption tp-shape tp-shapewrapper"
                                id="slide-1-layer-0"
                                data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-basealign="slide"
                                data-height="full"
                                data-hoffset="['0','0','0','0']"
                                data-responsive="off"
                                data-responsive_offset="off"
                                data-start="0"
                                data-transform_idle="o:1;"
                                data-transform_in="opacity:0;s:2000;e:Power2.easeInOut;"
                                data-transform_out="opacity:0;s:500;s:500;"
                                data-voffset="['0','0','0','0']"
                                data-whitespace="nowrap"
                                data-width="full"
                                style="
                                    z-index: 5;
                                    background-color: rgba(0, 0, 0, 0.75);
                                "
                            ></div>
                            <div
                                class="tp-caption tp-resizeme men-img"
                                id="slide-1-layer-1"
                                data-x="['right','right','right','right']"
                                data-hoffset="['372','15','15','15']"
                                data-y="['bottom','bottom','bottom','bottom']"
                                data-voffset="['0','0','0','0']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-transform_idle="o:1;"
                                data-transform_in="x:right;s:1500;e:Power3.easeOut;"
                                data-transform_out="opacity:0;s:1500;e:Power4.easeIn;s:1500;e:Power4.easeIn;"
                                data-start="900"
                                data-responsive_offset="on"
                                style="z-index: 7"
                            ></div>
                            <div
                                class="tp-caption tp-resizeme horse-img"
                                id="slide-1-layer-3"
                                data-x="['center','center','center','center']"
                                data-hoffset="['-60','-60','-130','0']"
                                data-y="['top','top','top','top']"
                                data-voffset="['223','173','143','90']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-transform_idle="o:1;"
                                data-transform_in="x:right;s:1500;e:Power3.easeOut;"
                                data-transform_out="opacity:0;s:1500;e:Power4.easeIn;s:1500;e:Power4.easeIn;"
                                data-start="900"
                                data-responsive_offset="on"
                                style="z-index: 7"
                            >
                                <img
                                    src="{{ asset("assets/images/slide-icon.png") }}"
                                    alt=""
                                    width="399"
                                    height="33"
                                    data-ww="['399px','399px','399px','300px']"
                                    data-hh="['33px','33px','33px','33px']"
                                    data-no-retina
                                />
                            </div>
                            <div
                                class="tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-0"
                                id="slide-1-layer-4"
                                data-x="['center','center','center','center']"
                                data-hoffset="['-60','-60','-130','0']"
                                data-y="['top','top','top','top']"
                                data-voffset="['275','225','190','120']"
                                data-fontsize="['50','50','50','36']"
                                data-lineheight="['50','50','50','50']"
                                data-whitespace="wrap"
                                data-transform_idle="o:1;"
                                data-transform_in="x:[-105%];s:1000;e:Power4.slideInRight;"
                                data-transform_out="y:[100%];s:1000;s:1000;e:Power2.slideInRight;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                data-start="1000"
                                data-splitin="none"
                                data-splitout="none"
                                data-responsive_offset="on"
                                data-elementdelay="0.05"
                                data-paddingbottom="[30,30,30,20]"
                                data-textAlign="['center','center','center','center']"
                                style="
                                    z-index: 5;
                                    letter-spacing: 2.75px;
                                    color: #fff;
                                    text-transform: uppercase;
                                    border-bottom: 3px solid #fff;
                                    font-weight: bold;
                                    font-family: 'Vollkorn', serif;
                                "
                            >
                                Profound international expertise
                            </div>
                            <div
                                class="tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-0"
                                id="slide-1-layer-6"
                                data-x="['center','center','center','center']"
                                data-hoffset="['-60','-60','-130','0']"
                                data-y="['top','top','top','top']"
                                data-voffset="['500','350','310','320']"
                                data-fontsize="['15','15','15','15']"
                                data-lineheight="['26','26','26','26']"
                                data-width="['406','406','406','406']"
                                data-whitespace="normal"
                                data-transform_idle="o:1;"
                                data-transform_in="x:[105%];s:1000;e:Power4.slideInLeft;"
                                data-transform_out="y:[100%];s:1000;s:1000;e:Power2.slideInLeft;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                data-start="1000"
                                data-responsive_offset="on"
                                data-elementdelay="0.05"
                                data-textAlign="['center','center','center','center']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                style="
                                    z-index: 5;
                                    white-space: nowrap;
                                    font-weight: 400;
                                    font-family: 'Catamaran', sans-serif;
                                    letter-spacing: 0.6px;
                                    color: #cfcfcf;
                                "
                            >
                                Profound international expertise built on years
                                of advising clients across jurisdictions,
                                industries, and regulatory systems.
                            </div>
                        </li>

                        <li>
                            <img
                                src="{{ asset("assets/images/tailored.jpg") }}"
                                alt="slider"
                                data-bgposition="center center"
                                data-bgfit="cover"
                                data-bgrepeat="no-repeat"
                                data-bgparallax="10"
                                class="rev-slidebg"
                                data-no-retina
                            />
                            <div
                                class="tp-caption tp-shape tp-shapewrapper"
                                id="slide-2-layer-0"
                                data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-basealign="slide"
                                data-height="full"
                                data-hoffset="['0','0','0','0']"
                                data-responsive="off"
                                data-responsive_offset="off"
                                data-start="0"
                                data-transform_idle="o:1;"
                                data-transform_in="opacity:0;s:2000;e:Power2.easeInOut;"
                                data-transform_out="opacity:0;s:500;s:500;"
                                data-voffset="['0','0','0','0']"
                                data-whitespace="nowrap"
                                data-width="full"
                                style="
                                    z-index: 5;
                                    background-color: rgba(0, 0, 0, 0.2);
                                "
                            ></div>

                            <div
                                class="tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-0"
                                id="slide-2-layer-3"
                                data-x="['left','left','left','left']"
                                data-hoffset="['845','100','20','15']"
                                data-y="['middle','middle','middle','middle']"
                                data-voffset="['-56','-56','-56','-56']"
                                data-fontsize="['36','36','36','30']"
                                data-lineheight="['26','26','42','42']"
                                data-width="['700','700','670','400']"
                                data-whitespace="normal"
                                data-transform_idle="o:1;"
                                data-transform_in="x:[-105%];s:1000;e:Power4.slideInRight;"
                                data-transform_out="y:[100%];s:1000;s:1000;e:Power2.slideInRight;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                data-start="1000"
                                data-splitin="none"
                                data-splitout="none"
                                data-responsive_offset="on"
                                data-elementdelay="0.05"
                                data-paddingbottom="[0,0,0,0]"
                                data-textAlign="['left','left','left','left']"
                                style="
                                    z-index: 5;
                                    letter-spacing: 2.75px;
                                    color: #fff;
                                    text-transform: uppercase;
                                    word-wrap: break-word;
                                    font-weight: bold;
                                    font-family: 'Vollkorn', serif;
                                "
                            >
                                Tailored legal solutions
                            </div>
                            <div
                                class="tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-0"
                                id="slide-2-layer-4"
                                data-x="['left','left','left','left']"
                                data-hoffset="['845','100','20','15']"
                                data-y="['middle','middle','middle','middle']"
                                data-voffset="['15','15','15','25']"
                                data-fontsize="['16','16','16','16']"
                                data-lineheight="['26','26','26','26']"
                                data-width="['670','670','600','400']"
                                data-whitespace="normal"
                                data-transform_idle="o:1;"
                                data-transform_in="x:[105%];s:1000;e:Power4.slideInLeft;"
                                data-transform_out="y:[100%];s:1000;s:1000;e:Power2.slideInLeft;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                data-start="1000"
                                data-responsive_offset="on"
                                data-elementdelay="0.05"
                                data-textAlign="['left','left','left','left']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                style="
                                    z-index: 5;
                                    white-space: normal;
                                    word-wrap: break-word;
                                    font-weight: 400;
                                    font-family: 'Catamaran', sans-serif;
                                    letter-spacing: 0.6px;
                                    color: #cfcfcf;
                                "
                            >
                                Strategic, personalised legal solutions designed
                                to align with your business goals and deliver
                                measurable results.
                            </div>
                        </li>

                        <li>
                            <img
                                src="{{ asset("assets/images/compliance.jpg") }}"
                                alt="slider"
                                data-bgposition="center center"
                                data-bgfit="cover"
                                data-bgrepeat="no-repeat"
                                data-bgparallax="10"
                                class="rev-slidebg"
                                data-no-retina
                            />
                            <div
                                class="tp-caption tp-shape tp-shapewrapper"
                                id="slide-3-layer-0"
                                data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-basealign="slide"
                                data-height="full"
                                data-hoffset="['0','0','0','0']"
                                data-responsive="off"
                                data-responsive_offset="off"
                                data-start="0"
                                data-transform_idle="o:1;"
                                data-transform_in="opacity:0;s:2000;e:Power2.easeInOut;"
                                data-transform_out="opacity:0;s:500;s:500;"
                                data-voffset="['0','0','0','0']"
                                data-whitespace="nowrap"
                                data-width="full"
                                style="
                                    z-index: 5;
                                    background-color: rgba(0, 0, 0, 0.6);
                                "
                            ></div>
                            <div
                                class="tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-0"
                                id="slide-3-layer-1"
                                data-x="['left','left','left','left']"
                                data-hoffset="['388','100','20','15']"
                                data-y="['middle','middle','middle','middle']"
                                data-voffset="['-79','-79','-79','-100']"
                                data-fontsize="['36','36','36','30']"
                                data-lineheight="['40','26','42','42']"
                                data-width="['700','700','670','400']"
                                data-whitespace="normal"
                                data-transform_idle="o:1;"
                                data-transform_in="x:[-105%];s:1000;e:Power4.slideInRight;"
                                data-transform_out="y:[100%];s:1000;s:1000;e:Power2.slideInRight;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                data-start="1000"
                                data-splitin="none"
                                data-splitout="none"
                                data-responsive_offset="on"
                                data-elementdelay="0.05"
                                data-paddingbottom="[0,0,0,0]"
                                data-textAlign="['left','left','left','left']"
                                style="
                                    z-index: 5;
                                    letter-spacing: 2.75px;
                                    color: #fff;
                                    text-transform: uppercase;
                                    word-wrap: break-word;
                                    font-weight: bold;
                                    font-family: 'Vollkorn', serif;
                                    line-height: 10px;
                                "
                            >
                                Comprehensive transition and compliance support
                            </div>
                            <div
                                class="tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-0"
                                id="slide-3-layer-2"
                                data-x="['left','left','left','left']"
                                data-hoffset="['388','100','20','15']"
                                data-y="['middle','middle','middle','middle']"
                                data-voffset="['-12','-12','-12','10']"
                                data-fontsize="['16','16','16','16']"
                                data-lineheight="['26','26','26','26']"
                                data-width="['670','670','600','400']"
                                data-whitespace="normal"
                                data-transform_idle="o:1;"
                                data-transform_in="x:[105%];s:1000;e:Power4.slideInLeft;"
                                data-transform_out="y:[100%];s:1000;s:1000;e:Power2.slideInLeft;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                data-start="1000"
                                data-responsive_offset="on"
                                data-elementdelay="0.05"
                                data-textAlign="['left','left','left','left']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                style="
                                    z-index: 5;
                                    white-space: normal;
                                    word-wrap: break-word;
                                    font-weight: 400;
                                    font-family: 'Catamaran', sans-serif;
                                    letter-spacing: 0.6px;
                                    color: #cfcfcf;
                                "
                            >
                                End-to-end legal guidance to support corporate
                                transitions, regulatory change, and full
                                compliance with local and international
                                standards.
                            </div>
                        </li>

                        <li>
                            <img
                                src="{{ asset("assets/images/proactive.jpg") }}"
                                alt="slider"
                                data-bgposition="center center"
                                data-bgfit="cover"
                                data-bgrepeat="no-repeat"
                                data-bgparallax="10"
                                class="rev-slidebg"
                                data-no-retina
                            />
                            <div
                                class="tp-caption tp-shape tp-shapewrapper"
                                id="slide-4-layer-0"
                                data-x="['center','center','center','center']"
                                data-y="['middle','middle','middle','middle']"
                                data-basealign="slide"
                                data-height="full"
                                data-hoffset="['0','0','0','0']"
                                data-responsive="off"
                                data-responsive_offset="off"
                                data-start="0"
                                data-transform_idle="o:1;"
                                data-transform_in="opacity:0;s:2000;e:Power2.easeInOut;"
                                data-transform_out="opacity:0;s:500;s:500;"
                                data-voffset="['0','0','0','0']"
                                data-whitespace="nowrap"
                                data-width="full"
                                style="
                                    z-index: 5;
                                    background-color: rgba(0, 0, 0, 0.6);
                                "
                            ></div>
                            <div
                                class="tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-0"
                                id="slide-4-layer-1"
                                data-x="['left','left','left','left']"
                                data-hoffset="['388','100','20','15']"
                                data-y="['middle','middle','middle','middle']"
                                data-voffset="['-147','-147','-147','-147']"
                                data-fontsize="['36','30','30','26']"
                                data-lineheight="['40','36','52','36']"
                                data-width="['700','700','710','400']"
                                data-whitespace="normal"
                                data-transform_idle="o:1;"
                                data-transform_in="x:[-105%];s:1000;e:Power4.slideInRight;"
                                data-transform_out="y:[100%];s:1000;s:1000;e:Power2.slideInRight;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                data-start="1000"
                                data-splitin="none"
                                data-splitout="none"
                                data-responsive_offset="on"
                                data-elementdelay="0.05"
                                data-paddingbottom="[0,0,0,0]"
                                data-textAlign="['left','left','left','left']"
                                style="
                                    z-index: 5;
                                    letter-spacing: 2.75px;
                                    color: #fff;
                                    text-transform: uppercase;
                                    word-wrap: break-word;
                                    font-weight: bold;
                                    font-family: 'Vollkorn', serif;
                                "
                            >
                                Proactive and practical legal advice
                            </div>
                            <div
                                class="tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-0"
                                id="slide-4-layer-2"
                                data-x="['left','left','left','left']"
                                data-hoffset="['388','100','20','15']"
                                data-y="['middle','middle','middle','middle']"
                                data-voffset="['-80','-80','-80','-60']"
                                data-fontsize="['16','16','16','14']"
                                data-lineheight="['26','26','26','24']"
                                data-width="['670','670','600','400']"
                                data-whitespace="normal"
                                data-transform_idle="o:1;"
                                data-transform_in="x:[105%];s:1000;e:Power4.slideInLeft;"
                                data-transform_out="y:[100%];s:1000;s:1000;e:Power2.slideInLeft;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                data-start="1000"
                                data-responsive_offset="on"
                                data-elementdelay="0.05"
                                data-textAlign="['left','left','left','left']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                style="
                                    z-index: 5;
                                    white-space: normal;
                                    word-wrap: break-word;
                                    font-weight: 400;
                                    font-family: 'Catamaran', sans-serif;
                                    letter-spacing: 0.6px;
                                    color: #cfcfcf;
                                "
                            >
                                Forward-thinking legal advice that turns complex
                                challenges into clear, actionable strategies for
                                your business.
                            </div>
                            <div
                                class="tp-caption tp-resizeme"
                                id="slide-4-layer-3"
                                data-x="['left','left','left','left']"
                                data-hoffset="['388','100','20','15']"
                                data-y="['middle','middle','middle','middle']"
                                data-voffset="['31','31','31','31']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-transform_idle="o:1;"
                                data-transform_in="x:right;s:1500;e:Power3.easeOut;"
                                data-transform_out="opacity:0;s:1500;e:Power4.easeIn;s:1500;e:Power4.easeIn;"
                                data-start="900"
                                data-responsive_offset="on"
                                style="z-index: 7"
                            >
                                <img
                                    src="{{ asset("assets/images/slide-thumb-1.jpg") }}"
                                    alt=""
                                    width="98"
                                    height="98"
                                    data-ww="['98px','98px','78px','78px']"
                                    data-hh="['98px','98px','78px','78px']"
                                    style="margin-right: 20px"
                                    data-no-retina
                                />
                                <img
                                    src="{{ asset("assets/images/slide-thumb-2.jpg") }}"
                                    alt=""
                                    width="98"
                                    height="98"
                                    data-ww="['98px','98px','78px','78px']"
                                    data-hh="['98px','98px','78px','78px']"
                                    style="margin-right: 20px"
                                    data-no-retina
                                />
                                <img
                                    src="{{ asset("assets/images/slide-thumb-3.jpg") }}"
                                    alt=""
                                    width="98"
                                    height="98"
                                    data-ww="['98px','98px','78px','78px']"
                                    data-hh="['98px','98px','78px','78px']"
                                    data-no-retina
                                />
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Slider Section 1 /- -->

        <!-- About Section -->
        <div
            class="container-fluid no-left-padding no-right-padding about-section d-flex flex-column align-items-center"
            id="about-us-container"
        >
            <div
                class="about-img-block col-md-6 col-xs-12 no-left-padding no-right-padding"
                data-image="assets/images/about-image.jpg"
            ></div>
            <!-- Container -->
            <div class="container">
                <div class="col-md-offset-6 col-md-6 col-xs-12 about-content">
                    <!-- Section Header -->
                    <div class="section-header">
                        <h3>ABOUT US</h3>
                    </div>
                    <!-- Section Header /- -->
                    <div class="about-details">
                        <div class="about-details-box">
                            <i>
                                <img
                                    src="{{ asset("assets/images/about-cnt-icon-1.png") }}"
                                    alt="Icon"
                                />
                            </i>
                            <h4>Our History</h4>
                            <p>{{ $ourHistory->content }}</p>
                        </div>
                        <div class="about-details-box">
                            <i>
                                <img
                                    src="{{ asset("assets/images/about-cnt-icon-2.png") }}"
                                    alt="Icon"
                                />
                            </i>
                            <h4>Our Mission</h4>
                            <p>{{ $ourMission->content }}</p>
                        </div>
                        <div class="about-details-box">
                            <i>
                                <img
                                    src="{{ asset("assets/images/about-cnt-icon-3.png") }}"
                                    alt="Icon"
                                />
                            </i>
                            <h4>Our Vision</h4>
                            <p>{{ $ourVision->content }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container /- -->
        </div>
        <!-- About Section /- -->

        <!-- Services Section -->
        <div
            class="container-fluid no-left-padding no-right-padding team-section"
        >
            <!-- Container -->
            <div class="container">
                <!-- Section Header -->
                <div class="section-header text-center">
                    <h3>Our Services</h3>
                </div>
                <!-- Section Header /- -->
                <!-- Row -->
                <div class="team-carousel">
                    <div class="col-md-12">
                        <div class="practice-box">
                            <a href="corporate.html">
                                <i>
                                    <img
                                        src="{{ asset("assets/images/corporate.jpg") }}"
                                        alt="Practice"
                                        style="height: 24rem"
                                    />
                                </i>
                                <div class="content-box">
                                    <i>
                                        <img
                                            src="{{ asset("assets/images/practice-icon-1.png") }}"
                                            alt="Icon"
                                        />
                                    </i>
                                    <h4>Corporate & Commercial Law</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="practice-box">
                            <a href="dispute.html">
                                <i>
                                    <img
                                        src="{{ asset("assets/images/dispute.jpg") }}"
                                        alt="Practice"
                                        style="height: 24rem"
                                    />
                                </i>
                                <div class="content-box">
                                    <i>
                                        <img
                                            src="{{ asset("assets/images/practice-icon-2.png") }}"
                                            alt="Icon"
                                        />
                                    </i>
                                    <h4>Dispute Resolution & Litigation</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="practice-box">
                            <a href="regulatory.html">
                                <i>
                                    <img
                                        src="{{ asset("assets/images/regulatory.jpg") }}"
                                        alt="Practice"
                                        style="height: 24rem"
                                    />
                                </i>
                                <div class="content-box">
                                    <i>
                                        <img
                                            src="{{ asset("assets/images/practice-icon-3.png") }}"
                                            alt="Icon"
                                        />
                                    </i>
                                    <h4>Regulatory & Compliance</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="practice-box">
                            <a href="international-projects.html">
                                <i>
                                    <img
                                        src="{{ asset("assets/images/international.jpg") }}"
                                        alt="Practice"
                                        style="height: 24rem"
                                    />
                                </i>
                                <div class="content-box">
                                    <i>
                                        <img
                                            src="{{ asset("assets/images/practice-icon-4.png") }}"
                                            alt="Icon"
                                        />
                                    </i>
                                    <h4>International & Projects</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="practice-box">
                            <a href="technology.html">
                                <i>
                                    <img
                                        src="{{ asset("assets/images/technology.jpg") }}"
                                        alt="Practice"
                                        style="height: 24rem"
                                    />
                                </i>
                                <div class="content-box">
                                    <i>
                                        <img
                                            src="{{ asset("assets/images/practice-icon-5.png") }}"
                                            alt="Icon"
                                        />
                                    </i>
                                    <h4>Technology & Cyber Law</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="practice-box">
                            <a href="immigration.html">
                                <img
                                    src="{{ asset("assets/images/immigrations.jpg") }}"
                                    alt="Practice"
                                    style="height: 24rem"
                                    class="img-fluid"
                                />
                                <div class="content-box">
                                    <i>
                                        <img
                                            src="{{ asset("assets/images/practice-icon-6.png") }}"
                                            alt="Icon"
                                        />
                                    </i>
                                    <h4>Private Client & Immigration</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Row /- -->
            </div>
            <!-- Container /- -->
        </div>
        <!-- Services Section /- -->

        <x-team-members :team-members="$teamMembers" />

        <x-testimonials :testimonials="$testimonials" />
    </main>
@endsection
