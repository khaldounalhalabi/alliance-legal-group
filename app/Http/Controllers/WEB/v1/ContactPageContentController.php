<?php

namespace App\Http\Controllers\WEB\v1;

use App\Http\Controllers\WebController;
use App\Http\Requests\v1\ContactPageContent\UpdateContactPageContentRequest;
use App\Http\Resources\v1\ContactPageContentResource;
use App\Services\v1\ContactPageContent\ContactPageContentService;
use Inertia\Inertia;

class ContactPageContentController extends WebController
{
    private ContactPageContentService $contactPageContentService;

    public function __construct()
    {
        $this->contactPageContentService = ContactPageContentService::make();
        // place the relations you want to return them within the response
        $this->relations = [];
    }

    public function data()
    {
        $items = $this->contactPageContentService->indexWithPagination($this->relations);

        return rest()
            ->ok()
            ->getSuccess()
            ->data($items)
            ->send();
    }

    public function index()
    {
        return Inertia::render('dashboard/contact-page-contents/index');
    }

    public function show($contactPageContentId)
    {
        $contactPageContent = $this->contactPageContentService->view($contactPageContentId, $this->relations);

        return Inertia::render('dashboard/contact-page-contents/show', [
            'contactPageContent' => ContactPageContentResource::make($contactPageContent),
        ]);
    }

    public function edit($contactPageContentId)
    {
        $contactPageContent = $this->contactPageContentService->view($contactPageContentId, $this->relations);

        if (!$contactPageContent) {
            abort(404);
        }

        return Inertia::render('dashboard/contact-page-contents/edit', [
            'contactPageContent' => ContactPageContentResource::make($contactPageContent),
        ]);
    }

    public function update(UpdateContactPageContentRequest $request, $contactPageContentId)
    {
        $contactPageContent = $this->contactPageContentService->update($request->validated(), $contactPageContentId,
            $this->relations);
        if ($contactPageContent) {
            return redirect()
                ->route('v1.web.protected.contact.page.contents.index')
                ->with('success', trans('site.update_successfully'));
        }

        return redirect()
            ->back()
            ->with('error', trans('site.there_is_no_data'));
    }

    public function destroy($contactPageContentId)
    {
        $result = $this->contactPageContentService->delete($contactPageContentId);

        return rest()
            ->when(
                $result,
                fn($rest) => $rest->ok()->deleteSuccess(),
                fn($rest) => $rest->noData(),
            )->send();
    }
}
