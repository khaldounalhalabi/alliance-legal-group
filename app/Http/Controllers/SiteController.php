<?php

namespace App\Http\Controllers;

use App\Enums\AboutUsKeyEnum;
use App\Enums\ContactUsContentKeyEnum;
use App\Http\Requests\v1\Message\StoreMessageRequest;
use App\Models\AboutUsContent;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\ContactPageContent;
use App\Models\FrequentlyAskedQuestion;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Services\v1\Message\MessageService;
use Illuminate\Database\Eloquent\Collection;

class SiteController extends Controller
{
    public function index()
    {
        /** @var Collection<AboutUsContent> $about */
        $about = cache()->remember(AboutUsContent::CACHE_KEY, now()->addYear(), fn () => AboutUsContent::all());
        /** @var AboutUsContent $ourHistory */
        $ourHistory = $about->firstWhere('type', AboutUsKeyEnum::OUR_VISION->value);
        /** @var AboutUsContent $ourMission */
        $ourMission = $about->firstWhere('type', AboutUsKeyEnum::OUR_MISSION->value);
        /** @var AboutUsContent $ourVision */
        $ourVision = $about->firstWhere('type', AboutUsKeyEnum::OUR_VISION->value);

        /** @var Collection<TeamMember> $teamMembers */
        $teamMembers = cache()->remember(TeamMember::CACHE_KEY, now()->addYear(), fn () => TeamMember::all());

        /** @var Collection<Testimonial> $testimonials */
        $testimonials = cache()->remember(Testimonial::CACHE_KEY, now()->addYear(), fn () => Testimonial::all());

        /** @var Collection<Service> $services */
        $services = cache()->remember('services_slider', now()->addMinutes(5),
            fn () => Service::inRandomOrder()->limit(5)->get());

        /**
         * @var Collection<Category>|Category[] $categories
         */
        $categories = cache()->remember(Category::CACHE_KEY, now()->addYear(), fn () => Category::all());

        /** @var Collection<FrequentlyAskedQuestion>|FrequentlyAskedQuestion[] $faqs */
        $faqs = cache()->remember('faqs_slider', now()->addMinutes(5),
            fn () => FrequentlyAskedQuestion::inRandomOrder()->limit(4)->get());

        /** @var Collection<BlogPost>|BlogPost[] $latestPosts */
        $latestPosts = cache()->remember('latest_posts', now()->addMinutes(5),
            fn () => BlogPost::orderBy('created_at', 'desc')->limit(3)->get());

        return view('index', compact(
            'ourHistory',
            'ourMission',
            'ourVision',
            'teamMembers',
            'testimonials',
            'categories',
            'services',
            'faqs',
            'latestPosts',
        ));
    }

    public function about()
    {
        /** @var Collection<TeamMember> $teamMembers */
        $teamMembers = cache()->remember(TeamMember::CACHE_KEY, now()->addYear(), fn () => TeamMember::all());

        /** @var Collection<Testimonial> $testimonials */
        $testimonials = cache()->remember(Testimonial::CACHE_KEY, now()->addYear(), fn () => Testimonial::all());

        /** @var Collection<AboutUsContent> $about */
        $about = cache()->remember(AboutUsContent::CACHE_KEY, now()->addYear(), fn () => AboutUsContent::all());

        $aboutUs = $about->firstWhere('type', AboutUsKeyEnum::ABOUT_US->value);
        $whyUs = $about->firstWhere('type', AboutUsKeyEnum::WHY_CHOSE_US->value);

        return view('about', compact(
            'teamMembers',
            'testimonials',
            'aboutUs',
            'whyUs',
        ));
    }

    public function sendMessage(StoreMessageRequest $request)
    {
        $data = $request->validated();
        MessageService::make()->store($data);

        return redirect()
            ->back()
            ->with('success', trans('site.success'));
    }

    public function contactUs()
    {
        /** @var Collection<ContactPageContent>|ContactPageContent[] $data */
        $data = cache()->remember(
            ContactPageContent::CACHE_KEY,
            now()->addYear(),
            fn () => ContactPageContent::all(),
        );

        $address = $data->firstWhere('key', ContactUsContentKeyEnum::ADDRESS->value);
        $email = $data->firstWhere('key', ContactUsContentKeyEnum::EMAIL->value);
        $phone = $data->firstWhere('key', ContactUsContentKeyEnum::PHONE->value);
        $whatsapp = $data->firstWhere('key', ContactUsContentKeyEnum::WHATSAPP->value);
        $lng = $data->firstWhere('key', ContactUsContentKeyEnum::LOCATION_LNG->value);
        $lat = $data->firstWhere('key', ContactUsContentKeyEnum::LOCATION_LAT->value);

        return view('contact', compact(
            'address',
            'email',
            'phone',
            'lng',
            'lat',
            'whatsapp'
        ));
    }

    public function showCategory($categoryId)
    {
        $category = Category::with('services')->find($categoryId);

        if (! $category) {
            abort(404);
        }

        return view('categories.show', compact('category'));
    }

    public function indexServices()
    {
        $services = Service::paginate(12);

        return view('services.index', compact('services'));
    }

    public function showService($serviceId)
    {
        $service = Service::with([
            'category',
            'category.services' => fn ($query) => $query->where('id', '!=', $serviceId),
        ])->find($serviceId);

        if (! $service) {
            abort(404);
        }

        return view('services.show', compact('service'));
    }

    public function blogPosts()
    {
        $posts = BlogPost::paginate(12);

        return view('blog-posts.index', compact('posts'));
    }

    public function showBlogPost($blogPostId)
    {
        /** @var Collection<BlogPost>|BlogPost[] $latestPosts */
        $latestPosts = cache()->remember('latest_posts', now()->addMinutes(5),
            fn () => BlogPost::orderBy('created_at', 'desc')->limit(3)->get());

        $post = BlogPost::find($blogPostId);

        if (! $post) {
            abort(404);
        }

        return view('blog-posts.show', compact('post', 'latestPosts'));
    }

    public function faqs()
    {
        $faqs = FrequentlyAskedQuestion::all();

        return view('faqs.index', compact('faqs'));
    }

    public function showTeamMember($teamMemberId)
    {
        $teamMember = TeamMember::find($teamMemberId);

        if (! $teamMember) {
            abort(404);
        }

        return view('team-members.show', compact('teamMember'));
    }
}
