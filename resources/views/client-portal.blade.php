@extends("layout")
@section("content")
    <style>
        /* 1. Bulletproof Centering */
        .gears-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 40px;
            width: 100%;
            /* Force LTR container just for the animation to stay stable */
            direction: ltr !important;
        }

        .site-main i.fa-gears {
            font-size: 80px;
            color: #c5a059;
            display: inline-block;
            /* Use transform-origin to ensure it rotates around its exact center */
            transform-origin: center center;
            animation: rotateGears 4s infinite linear;
        }

        @keyframes rotateGears {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        /* 2. Fix for Bootstrap offsets in RTL */
        html[dir='rtl'] .col-md-offset-2 {
            margin-right: 16.66666667% !important;
            margin-left: 0 !important;
            float: right !important;
        }

        /* 3. Text alignment for RTL */
        html[dir='rtl'] .text-center {
            text-align: center !important;
        }
    </style>
    <div class="container-fluid no-left-padding no-right-padding page-banner">
        <div class="container">
            <h3>{{ trans("site.client_portal") }}</h3>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route("index") }}">
                        {{ trans("site.home") }}
                    </a>
                </li>
                <li class="active">{{ trans("site.client_portal") }}</li>
            </ol>
        </div>
    </div>

    <main class="site-main" style="padding: 100px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="gears-container">
                        <i class="fa fa-gears"></i>
                    </div>
                    <h2
                        style="
                            color: #002147;
                            font-weight: bold;
                            text-transform: uppercase;
                            letter-spacing: 2px;
                        "
                    >
                        {{ trans("site.portal_under_construction") }}
                    </h2>

                    <p
                        style="
                            font-size: 18px;
                            color: #555;
                            margin-top: 20px;
                            line-height: 28px;
                        "
                    >
                        {{ trans("site.portal_notice") }}
                    </p>

                    <div
                        style="
                            width: 100%;
                            background: #eee;
                            height: 10px;
                            border-radius: 5px;
                            margin: 40px 0;
                            overflow: hidden;
                        "
                    >
                        <div
                            style="
                                width: 75%;
                                background: #c5a059;
                                height: 100%;
                            "
                        ></div>
                    </div>

                    <div
                        class="contact-info"
                        style="
                            margin-top: 40px;
                            padding: 30px;
                            border: 1px solid #eee;
                            background: #f9f9f9;
                        "
                    >
                        <h4 style="color: #002147">
                            {{ trans("site.need_immediate_help") }}
                        </h4>
                        <p>
                            {{ trans("site.contact_portal_support") }}
                        </p>

                        <div style="margin-top: 20px">
                            <a
                                href="{{ route("contact") }}"
                                class="btn"
                                style="
                                    background: #002147;
                                    color: #fff;
                                    padding: 12px 30px;
                                    border-radius: 0;
                                    text-transform: uppercase;
                                    font-weight: bold;
                                    letter-spacing: 1px;
                                "
                            >
                                {{ trans("site.contact_us") }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        /* Styling for the animated progress bar effect */
        .site-main i.fa-gears {
            animation: rotateGears 4s infinite linear;
        }

        @keyframes rotateGears {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        /* Ensure RTL consistency */
        html[dir='rtl'] .text-center {
            text-align: center;
        }

        html[dir='rtl'] .col-md-offset-2 {
            margin-right: 16.66666667%;
            margin-left: 0;
        }
    </style>
@endsection
