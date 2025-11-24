<!-- Footer Main -->
<footer
    id="footer-main"
    class="container-fluid no-left-padding no-right-padding footer-main"
>
    <!-- Top Footer -->
    <div class="container-fluid no-left-padding no-right-padding top-footer">
        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <!-- Widget About -->
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <aside class="widget widget_about">
                        <img
                            src="{{ asset("assets/images/ftr-abt-img.jpg") }}"
                            alt="Image"
                        />
                    </aside>
                </div>
                <!-- Widget About /- -->

                <!-- Widget Links -->
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <aside class="widget widget_categories">
                        <h3 class="widget-title">
                            {{ trans("site.quick_links") }}
                        </h3>
                        <ul>
                            <li>
                                <a
                                    href="{{ route("index") }}"
                                    title="Homepage"
                                >
                                    {{ trans("site.home") }}
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route("about") }}"
                                    title="{{ trans("site.about_us") }}"
                                >
                                    {{ trans("site.about_us") }}
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route("services.index") }}"
                                    title="{{ trans("site.services") }}"
                                >
                                    {{ trans("site.services") }}
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route("blog.posts") }}"
                                    title="{{ trans("site.blog") }}"
                                >
                                    {{ trans("site.blog") }}
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route("contact") }}"
                                    title="{{ trans("site.contact") }}"
                                >
                                    {{ trans("site.contact") }}
                                </a>
                            </li>
                        </ul>
                    </aside>
                </div>
                <!-- Widget Links /- -->
            </div>
            <!-- Row /- -->
        </div>
        <!-- Container /- -->
    </div>
    <!-- Top Footer -->
    <!-- Bottom Footer -->
    <div class="container-fluid bottom-footer no-left-padding no-right-padding">
        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <div class="col-md-4">
                    <p>{{ trans("site.licence") }}</p>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <!-- Ownavigation -->
                    <nav class="navbar ownavigation">
                        <div class="navbar-header">
                            <button
                                type="button"
                                class="navbar-toggle collapsed"
                                data-toggle="collapse"
                                data-target="#navbar-ftr"
                                aria-expanded="false"
                                aria-controls="navbar"
                            >
                                <span class="sr-only">
                                    {{ trans("site.toggle_navigation") }}
                                </span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="navbar-ftr" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a
                                        href="{{ route("index") }}"
                                        title="{{ trans("site.home") }}"
                                    >
                                        {{ trans("site.home") }}
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route("about") }}"
                                        title="{{ trans("site.about_us") }}"
                                    >
                                        {{ trans("site.about_us") }}
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route("services.index") }}"
                                        title="{{ trans("site.services") }}"
                                    >
                                        {{ trans("site.services") }}
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route("blog.posts") }}"
                                        title="{{ trans("site.blog") }}"
                                    >
                                        {{ trans("site.blog") }}
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route("contact") }}"
                                        title="{{ trans("site.contact") }}"
                                    >
                                        {{ trans("site.contact") }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Ownavigation /- -->
                </div>
            </div>
            <!-- Row -->
        </div>
        <!-- Container -->
    </div>
    <!-- Bottom Footer /- -->
</footer>
<!-- Footer Main /- -->

<!-- JQuery v1.12.4 -->
<script src="{{ asset("assets/js/jquery-1.12.4.min.js") }}"></script>

<!-- Library - Js -->
<script src="{{ asset("assets/js/lib.js") }}"></script>
<script src="{{ asset("assets/js/jquery.flagstrap.min.js") }}"></script>
<script src="{{ asset("assets/js/jquery.knob.js") }}"></script>

<!-- RS5.3`````` Core JS Files -->
<script
    type="text/javascript"
    src="{{ asset("assets/revolution/js/jquery.themepunch.tools.min.js") }}?rev=5.0"
></script>
<script
    type="text/javascript"
    src="{{ asset("assets/revolution/js/jquery.themepunch.revolution.min.js") }}?rev=5.0"
></script>
<script
    type="text/javascript"
    src="{{ asset("assets/revolution/js/extensions/revolution.extension.video.min.js") }}"
></script>
<script
    type="text/javascript"
    src="{{ asset("assets/revolution/js/extensions/revolution.extension.slideanims.min.js") }}"
></script>
<script
    type="text/javascript"
    src="{{ asset("assets/revolution/js/extensions/revolution.extension.layeranimation.min.js") }}"
></script>
<script
    type="text/javascript"
    src="{{ asset("assets/revolution/js/extensions/revolution.extension.navigation.min.js") }}"
></script>

<!-- Library - Theme JS -->
<script src="{{ asset("assets/js/functions.js") }}"></script>

@stack("scripts")
