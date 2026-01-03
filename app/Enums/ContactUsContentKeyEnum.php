<?php

namespace App\Enums;

enum ContactUsContentKeyEnum: string
{
    case ADDRESS = 'address';
    case EMAIL = 'email';
    case PHONE = 'phone';
    case LOCATION_LNG = 'location_lng';
    case LOCATION_LAT = 'location_lat';
    case WHATSAPP = 'whatsapp';
}
