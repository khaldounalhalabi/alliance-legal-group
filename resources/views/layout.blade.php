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

    <style>
        .tiptap-content-viewer {
            /* Code and preformatted text styles */

            code {
                background-color: var(--secondary);
                border-radius: 0.4rem;
                color: var(--primary);
                font-size: 0.85rem;
                padding: 0.25em 0.3em;
            }

            /* Image styles */

            img {
                display: block;
                height: auto;
                margin: 1.5rem 0;
                max-width: 100%;

                &.ProseMirror-selectednode {
                    outline: 3px solid var(--primary);
                }
            }

            /* List styles */

            ul,
            ol {
                padding: 0 1rem;
                margin: 1.25rem 1rem 1.25rem 0.4rem;

                li p {
                    margin-top: 0.25em;
                    margin-bottom: 0.25em;
                }
            }

            ul {
                list-style-type: circle;
            }

            ol {
                list-style-type: decimal;
            }

            /** Horizontal rule */

            hr {
                border: none;
                border-top: 1px solid var(--secondary);
                cursor: pointer;
                margin: 2rem 0;

                &.ProseMirror-selectednode {
                    border-top: 1px solid var(--primary);
                }
            }

            /* Table-specific styling */

            table {
                border-collapse: collapse;
                margin: 0;
                overflow: hidden;
                table-layout: fixed;
                width: 100%;

                td,
                th {
                    border: 1px solid var(--foreground);
                    box-sizing: border-box;
                    min-width: 1em;
                    padding: 6px 8px;
                    position: relative;
                    vertical-align: top;

                    > * {
                        margin-bottom: 0;
                    }
                }

                th {
                    background-color: var(--secondary);
                    font-weight: bold;
                    text-align: left;
                }

                .selectedCell:after {
                    background: var(--secondary);
                    content: '';
                    left: 0;
                    right: 0;
                    top: 0;
                    bottom: 0;
                    pointer-events: none;
                    position: absolute;
                    z-index: 2;
                }

                .column-resize-handle {
                    background-color: var(--secondary);
                    bottom: -2px;
                    pointer-events: none;
                    position: absolute;
                    right: -2px;
                    top: 0;
                    width: 4px;
                }
            }

            .tableWrapper {
                margin: 1.5rem 0;
                overflow-x: auto;
            }

            &.resize-cursor {
                cursor: ew-resize;
                cursor: col-resize;
            }

            /* Youtube embed */
            div[data-youtube-video] {
                cursor: move;
                padding-right: 1.5rem;

                iframe {
                    border: 0.5rem solid var(--secondary);
                    display: block;
                    min-height: 200px;
                    min-width: 200px;
                    outline: 0px solid transparent;
                }

                &.ProseMirror-selectednode iframe {
                    outline: 3px solid var(--secondary);
                    transition: outline 0.15s;
                }
            }
        }
    </style>

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
