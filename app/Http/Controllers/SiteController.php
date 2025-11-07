<?php

namespace App\Http\Controllers;

use App\AboutUsKeyEnum;
use App\Models\AboutUsContent;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Collection;

class SiteController extends Controller
{
    public function index()
    {
        /** @var Collection<AboutUsContent> $about */
        $about = cache()->remember(AboutUsContent::CACHE_KEY, now()->addYear(), fn() => AboutUsContent::all());
        $ourHistory = $about->firstWhere('type', AboutUsKeyEnum::OUR_VISION->value);
        $ourMission = $about->firstWhere('type', AboutUsKeyEnum::OUR_MISSION->value);
        $ourVision = $about->firstWhere('type', AboutUsKeyEnum::OUR_VISION->value);

        /** @var Collection<TeamMember> $teamMembers */
        $teamMembers = cache()->remember(TeamMember::CACHE_KEY, now()->addYear(), fn() => TeamMember::all());

        /** @var Collection<Testimonial> $testimonials */
        $testimonials = cache()->remember(Testimonial::CACHE_KEY, now()->addYear(), fn() => Testimonial::all());

        return view('index', compact(
            'ourHistory',
            'ourMission',
            'ourVision',
            'teamMembers',
            'testimonials',
        ));
    }

    public function about()
    {
        /** @var Collection<TeamMember> $teamMembers */
        $teamMembers = cache()->remember(TeamMember::CACHE_KEY, now()->addYear(), fn() => TeamMember::all());

        /** @var Collection<Testimonial> $testimonials */
        $testimonials = cache()->remember(Testimonial::CACHE_KEY, now()->addYear(), fn() => Testimonial::all());

        /** @var Collection<AboutUsContent> $about */
        $about = cache()->remember(AboutUsContent::CACHE_KEY, now()->addYear(), fn() => AboutUsContent::all());

        $aboutUs = $about->firstWhere('type', AboutUsKeyEnum::ABOUT_US->value);
        $whyUs = $about->firstWhere('type', AboutUsKeyEnum::WHY_CHOSE_US->value);

        return view('about', compact(
            'teamMembers',
            'testimonials',
            'aboutUs',
            'whyUs',
        ));
    }
}
