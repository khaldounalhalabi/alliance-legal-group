<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>New Submission from {{ $clientMessage->name }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <style type="text/css">
            /* Responsive Media Queries */
            @media only screen and (max-width: 620px) {
                .container {
                    width: 100% !important;
                }
                .content-padding {
                    padding: 20px 15px !important;
                }
                .stack-column {
                    display: block !important;
                    width: 100% !important;
                    box-sizing: border-box !important;
                    padding-right: 0 !important;
                }
                .mobile-padding-bottom {
                    padding-bottom: 5px !important;
                }
            }
        </style>
    </head>
    <body
        style="
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        "
    >
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td align="center" style="padding: 20px 0">
                    <table
                        class="container"
                        border="0"
                        cellpadding="0"
                        cellspacing="0"
                        width="600"
                        style="
                            background-color: #ffffff;
                            border: 1px solid #dddddd;
                            border-collapse: collapse;
                        "
                    >
                        <tr>
                            <td
                                align="center"
                                bgcolor="#002147"
                                style="
                                    padding: 40px 10px;
                                    border-bottom: 4px solid #c5a059;
                                "
                            >
                                <table
                                    border="0"
                                    cellpadding="0"
                                    cellspacing="0"
                                    width="100%"
                                >
                                    <tr>
                                        <td
                                            align="center"
                                            style="
                                                color: #ffffff;
                                                font-size: 24px;
                                                font-weight: bold;
                                                text-transform: uppercase;
                                                letter-spacing: 1px;
                                            "
                                        >
                                            Alliance Legal Group
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            align="center"
                                            style="
                                                font-size: 11px;
                                                color: #c5a059;
                                                padding-top: 5px;
                                                letter-spacing: 1px;
                                            "
                                        >
                                            NEW ENQUIRY RECEIVED
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td
                                class="content-padding"
                                style="padding: 40px 30px"
                            >
                                <table
                                    border="0"
                                    cellpadding="0"
                                    cellspacing="0"
                                    width="100%"
                                >
                                    <tr>
                                        <td
                                            style="
                                                color: #333333;
                                                font-size: 16px;
                                                line-height: 24px;
                                                padding-bottom: 25px;
                                            "
                                        >
                                            Hello Admin, a new contact form has
                                            been submitted:
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table
                                                border="0"
                                                cellpadding="0"
                                                cellspacing="0"
                                                width="100%"
                                                style="
                                                    background-color: #f9f9f9;
                                                    border-left: 4px solid
                                                        #002147;
                                                "
                                            >
                                                <tr>
                                                    <td
                                                        class="stack-column mobile-padding-bottom"
                                                        style="
                                                            padding: 15px;
                                                            font-size: 14px;
                                                            color: #555555;
                                                            width: 120px;
                                                        "
                                                    >
                                                        <strong>Name:</strong>
                                                    </td>
                                                    <td
                                                        class="stack-column"
                                                        style="
                                                            padding: 15px;
                                                            font-size: 14px;
                                                            color: #333333;
                                                        "
                                                    >
                                                        {{ $clientMessage->name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="stack-column mobile-padding-bottom"
                                                        style="
                                                            padding: 15px;
                                                            font-size: 14px;
                                                            color: #555555;
                                                        "
                                                    >
                                                        <strong>Email:</strong>
                                                    </td>
                                                    <td
                                                        class="stack-column"
                                                        style="
                                                            padding: 15px;
                                                            font-size: 14px;
                                                            color: #333333;
                                                        "
                                                    >
                                                        <a
                                                            href="mailto:{{ $clientMessage->email }}"
                                                            style="
                                                                color: #002147;
                                                                text-decoration: none;
                                                            "
                                                        >
                                                            {{ $clientMessage->email }}
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="stack-column mobile-padding-bottom"
                                                        style="
                                                            padding: 15px;
                                                            font-size: 14px;
                                                            color: #555555;
                                                        "
                                                    >
                                                        <strong>Phone:</strong>
                                                    </td>
                                                    <td
                                                        class="stack-column"
                                                        style="
                                                            padding: 15px;
                                                            font-size: 14px;
                                                            color: #333333;
                                                        "
                                                    >
                                                        {{ $clientMessage->phone }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 30px">
                                            <table
                                                border="0"
                                                cellpadding="0"
                                                cellspacing="0"
                                                width="100%"
                                            >
                                                <tr>
                                                    <td
                                                        style="
                                                            font-size: 13px;
                                                            font-weight: bold;
                                                            color: #002147;
                                                            border-bottom: 1px
                                                                solid #eeeeee;
                                                            padding-bottom: 5px;
                                                            text-transform: uppercase;
                                                        "
                                                    >
                                                        Message:
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="
                                                            padding: 15px;
                                                            font-size: 15px;
                                                            color: #444444;
                                                            border: 1px solid
                                                                #eeeeee;
                                                            background-color: #ffffff;
                                                            white-space: pre-wrap;
                                                            line-height: 24px;
                                                        "
                                                    >
                                                        {{ $clientMessage->message }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            align="center"
                                            style="padding: 40px 0 10px 0"
                                        >
                                            <table
                                                border="0"
                                                cellspacing="0"
                                                cellpadding="0"
                                            >
                                                <tr>
                                                    <td
                                                        align="center"
                                                        bgcolor="#c5a059"
                                                        style="
                                                            border-radius: 4px;
                                                        "
                                                    >
                                                        <a
                                                            href="{{ route("v1.web.protected.messages.show", $clientMessage->id) }}"
                                                            style="
                                                                font-size: 16px;
                                                                font-weight: bold;
                                                                color: #ffffff;
                                                                text-decoration: none;
                                                                padding: 15px
                                                                    25px;
                                                                border-radius: 4px;
                                                                display: block;
                                                                border: 1px
                                                                    solid
                                                                    #c5a059;
                                                            "
                                                        >
                                                            SHOW IN DASHBOARD
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td
                                bgcolor="#f8f8f8"
                                style="
                                    padding: 30px;
                                    border-top: 1px solid #eeeeee;
                                    text-align: center;
                                "
                            >
                                <span style="color: #999999; font-size: 12px">
                                    &copy; {{ date("Y") }} Alliance Legal
                                    Group.
                                </span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
