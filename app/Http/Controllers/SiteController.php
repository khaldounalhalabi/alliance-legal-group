<?php

namespace App\Http\Controllers;

use App\AboutUsKeyEnum;
use App\Models\AboutUsContent;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $about = AboutUsContent::all();
        $ourHistory = $about->firstWhere('type', AboutUsKeyEnum::OUR_VISION->value);
        $ourMission = $about->firstWhere('type', AboutUsKeyEnum::OUR_MISSION->value);
        $ourVision = $about->firstWhere('type', AboutUsKeyEnum::OUR_VISION->value);

        return view('index', compact(
            'ourHistory',
            'ourMission',
            'ourVision'
        ));
    }
}
