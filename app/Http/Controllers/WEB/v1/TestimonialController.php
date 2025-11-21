<?php

namespace App\Http\Controllers\WEB\v1;

use App\Http\Controllers\WebController;
use App\Http\Requests\v1\Testimonial\StoreUpdateTestimonialRequest;
use App\Http\Resources\v1\TestimonialResource;
use App\Models\Testimonial;
use App\Services\v1\Testimonial\TestimonialService;
use Inertia\Inertia;

class TestimonialController extends WebController
{
    private TestimonialService $testimonialService;

    public function __construct()
    {
        $this->testimonialService = TestimonialService::make();
        // place the relations you want to return them within the response
        $this->relations = [];
    }

    public function data()
    {
        $items = $this->testimonialService->indexWithPagination($this->relations);

        return rest()
            ->ok()
            ->getSuccess()
            ->data($items)
            ->send();
    }

    public function index()
    {
        $exportables = Testimonial::getModel()->exportable();

        return Inertia::render('dashboard/testimonials/index', [
            'exportables' => $exportables,
        ]);
    }

    public function show($testimonialId)
    {
        $testimonial = $this->testimonialService->view($testimonialId, $this->relations);

        return Inertia::render('dashboard/testimonials/show', [
            'testimonial' => TestimonialResource::make($testimonial),
        ]);
    }

    public function create()
    {
        return Inertia::render('dashboard/testimonials/create');
    }

    public function store(StoreUpdateTestimonialRequest $request)
    {
        $testimonial = $this->testimonialService->store($request->validated(), $this->relations);
        if ($testimonial) {
            return redirect()
                ->route('v1.web.protected.testimonials.index')
                ->with('success', trans('site.stored_successfully'));
        }

        return redirect()
            ->back()
            ->with('error', trans('site.something_went_wrong'));
    }

    public function edit($testimonialId)
    {
        $testimonial = $this->testimonialService->view($testimonialId, $this->relations);

        if (!$testimonial) {
            abort(404);
        }

        return Inertia::render('dashboard/testimonials/edit', [
            'testimonial' => TestimonialResource::make($testimonial),
        ]);
    }

    public function update(StoreUpdateTestimonialRequest $request, $testimonialId)
    {
        $testimonial = $this->testimonialService->update($request->validated(), $testimonialId, $this->relations);
        if ($testimonial) {
            return redirect()
                ->route('v1.web.protected.testimonials.index')
                ->with('success', trans('site.update_successfully'));
        }

        return redirect()
            ->back()
            ->with('error', trans('site.there_is_no_data'));
    }

    public function destroy($testimonialId)
    {
        $result = $this->testimonialService->delete($testimonialId);

        return rest()
            ->when(
                $result,
                fn($rest) => $rest->ok()->deleteSuccess(),
                fn($rest) => $rest->noData(),
            )->send();
    }
}
