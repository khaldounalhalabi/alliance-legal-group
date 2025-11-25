<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="ie6"> <![endif]-->
<!--[if IE 7]>
<html class="ie7"> <![endif]-->
<!--[if IE 8]>
<html class="ie8"> <![endif]-->
<!--[if IE 9]>
<html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html
    lang="{{ app()->getLocale() }}"
    dir="{{ app()->getLocale() == "ar" ? "rtl" : "ltr" }}"
>
    <!--<![endif]-->

    @include("includes.header")

    <body data-offset="200" data-spy="scroll" data-target=".ownavigation">
        <!-- Loader -->
        <div id="site-loader" class="load-complete">
            <div class="loader">
                <div class="loader-inner ball-clip-rotate">
                    <div></div>
                </div>
            </div>
        </div>

        @include("includes.navbar")

        <div class="main-container">
            @yield("content")
        </div>

        @include("includes.footer")
    </body>
</html>
