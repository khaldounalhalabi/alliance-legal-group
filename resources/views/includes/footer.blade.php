<!-- Footer Main -->
<footer id="footer-main" class="footer-main">
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <aside class="widget widget_about">
                        <h3 class="widget-title">
                            {{ trans("site.company_name") }}
                        </h3>
                        <p class="about-text">
                            {{ $aboutFooter?->content }}
                        </p>
                        <div class="social-links">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </aside>
                </div>

                <div class="col-md-2 col-sm-6">
                    <aside class="widget widget_links">
                        <h3 class="widget-title">
                            {{ trans("site.services") }}
                        </h3>
                        <ul>
                            @foreach ($categories->random(min($categories->count(), 5)) as $cat)
                                <li>
                                    <a
                                        href="{{ route("categories.show", $cat->id) }}"
                                    >
                                        {{ $cat->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                </div>

                <div class="col-md-2 col-sm-6">
                    <aside class="widget widget_links">
                        <h3 class="widget-title">
                            {{ trans("site.quick_links") }}
                        </h3>
                        <ul>
                            <li>
                                <a href="{{ route("index") }}">
                                    {{ trans("site.home") }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("about") }}">
                                    {{ trans("site.about_us") }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("blog.posts") }}">
                                    {{ trans("site.blog") }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("client.portal") }}">
                                    {{ trans("site.client_portal") }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("contact") }}">
                                    {{ trans("site.contact") }}
                                </a>
                            </li>
                        </ul>
                    </aside>
                </div>

                <div class="col-md-4 col-sm-6">
                    <aside class="widget widget_contact">
                        <h3 class="widget-title">
                            {{ trans("site.contact_us") }}
                        </h3>
                        <div class="contact-info-item">
                            <i class="fa fa-envelope-o"></i>
                            <a href="mailto:{{ $email->value }}">
                                {{ $email->value }}
                            </a>
                        </div>
                        <div class="contact-info-item">
                            <i class="fa fa-phone"></i>
                            <a
                                target="_blank"
                                dir="ltr"
                                href="tel:{{ $phone->value }}"
                            >
                                {{ $phone->value }}
                            </a>
                        </div>
                        <div class="contact-info-item">
                            <i class="fa fa-map-marker"></i>
                            <a
                                href="{{ "https://www.google.com/maps/@{$lat->value},{$lng->value},15z" }}"
                                target="_blank"
                            >
                                {{ $address->value }}
                            </a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 rtl-text-right text-left">
                    <p>
                        &copy; {{ date("Y") }}
                        <strong>Alliance Legal Group</strong>
                        . {{ trans("site.all_rights_reserved") }}
                    </p>
                </div>
                <div class="col-md-6 rtl-text-left text-right">
                    <p class="licence-text">{{ trans("site.licence") }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .footer-main {
        background-color: #002147; /* Alliance Blue */
        color: #fff;
        font-family: 'Arial', sans-serif;
    }

    .top-footer {
        padding: 80px 0 50px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .widget-title {
        color: #c5a059; /* Alliance Gold */
        font-size: 18px;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 30px;
        letter-spacing: 1px;
        position: relative;
    }

    .widget-title:after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 30px;
        height: 2px;
        background: #c5a059;
    }

    html[dir='rtl'] .widget-title:after {
        left: auto;
        right: 0;
    }

    .about-text {
        color: #bdc3c7;
        line-height: 1.8;
        font-size: 14px;
        margin-bottom: 25px;
    }

    /* Links Styling */
    .widget_links ul {
        list-style: none;
        padding: 0;
    }

    .widget_links ul li {
        margin-bottom: 12px;
    }

    .widget_links ul li a {
        color: #bdc3c7;
        text-decoration: none;
        transition: 0.3s;
        font-size: 14px;
    }

    .widget_links ul li a:hover {
        color: #c5a059;
        padding-left: 5px;
    }

    html[dir='rtl'] .widget_links ul li a:hover {
        padding-left: 0;
        padding-right: 5px;
    }

    /* Contact Item Styling */
    .contact-info-item {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        align-items: flex-start;
    }

    .contact-info-item i {
        color: #c5a059;
        font-size: 18px;
        margin-top: 3px;
    }

    .contact-info-item p,
    .contact-info-item a {
        color: #bdc3c7;
        margin: 0;
        font-size: 14px;
        text-decoration: none;
    }

    /* Social Links */
    .social-links a {
        color: #fff;
        background: rgba(255, 255, 255, 0.1);
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin-right: 10px;
        transition: 0.3s;
    }

    .social-links a:hover {
        background: #c5a059;
        color: #002147;
    }

    /* Bottom Bar */
    .bottom-footer {
        padding: 25px 0;
        background: #001a38;
        font-size: 13px;
        color: #7f8c8d;
    }

    .licence-text {
        font-style: italic;
    }

    /* RTL Utilities */
    html[dir='rtl'] .text-left.rtl-text-right {
        text-align: right !important;
    }

    html[dir='rtl'] .text-right.rtl-text-left {
        text-align: left !important;
    }

    html[dir='rtl'] .col-md-4,
    html[dir='rtl'] .col-md-2 {
        float: right;
    }
</style>
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

<script type="module">
    $(document).ready(function () {
        $('#basic').flagStrap({
            countries: {
                GB: '{{ trans("site.uk") }}',
                SY: '{{ trans("site.syria") }}',
            },
        });

        $('#basic')
            .find('select')
            .change(function () {
                const value = $(this).val();
                let localeMap = {
                    GB: 'en',
                    SY: 'ar',
                };

                let selectedLocale = localeMap[value] || value.toLowerCase();

                fetch('{{ route("set-locale") }}', {
                    method: 'POST',
                    body: JSON.stringify({ lang: selectedLocale }),
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        Accept: 'application/json',
                    },
                }).then(() => {
                    window.location.reload();
                });
            });
    });
</script>

@stack("scripts")
