<?php

namespace App\Http\Controllers\WEB\v1;

use App\Http\Controllers\WebController;
use App\Http\Requests\v1\AboutUsContent\StoreUpdateAboutUsContentRequest;
use App\Http\Resources\v1\AboutUsContentResource;
use App\Models\AboutUsContent;
use App\Services\v1\AboutUsContent\AboutUsContentService;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutUsContentController extends WebController
{
    private AboutUsContentService $aboutUsContentService;

    public function __construct()
    {
        $this->aboutUsContentService = AboutUsContentService::make();
        // place the relations you want to return them within the response
        $this->relations = [];
    }

    public function data()
    {
        $items = $this->aboutUsContentService->indexWithPagination($this->relations);

        return rest()
            ->ok()
            ->getSuccess()
            ->data($items)
            ->send();
    }

    public function index()
    {
        $exportables = AboutUsContent::getModel()->exportable();

        return Inertia::render('dashboard/about-us-contents/index', [
            'exportables' => $exportables,
        ]);
    }

    public function edit($aboutUsContentId)
    {
        $aboutUsContent = $this->aboutUsContentService->view($aboutUsContentId, $this->relations);

        if (!$aboutUsContent) {
            abort(404);
        }

        return Inertia::render('dashboard/about-us-contents/edit', [
            'aboutUsContent' => AboutUsContentResource::make($aboutUsContent),
        ]);
    }

    public function update(StoreUpdateAboutUsContentRequest $request, $aboutUsContentId)
    {
        $aboutUsContent = $this->aboutUsContentService->update($request->validated(), $aboutUsContentId,
            $this->relations);
        if ($aboutUsContent) {
            return redirect()
                ->route('v1.web.protected.about.us.contents.index')
                ->with('success', trans('site.update_successfully'));
        }

        return redirect()
            ->back()
            ->with('error', trans('site.there_is_no_data'));
    }

    public function destroy($aboutUsContentId)
    {
        $result = $this->aboutUsContentService->delete($aboutUsContentId);

        return rest()
            ->when(
                $result,
                fn($rest) => $rest->ok()->deleteSuccess(),
                fn($rest) => $rest->noData(),
            )->send();
    }

    public function export(Request $request)
    {
        $ids = $request->ids ?? [];

        try {
            $result = $this->aboutUsContentService->export($ids);
            session()->flash('success', trans('site.success'));

            return $result;
        } catch (Exception) {
            return redirect()
                ->back()
                ->with('error', trans('site.something_went_wrong'));
        }
    }

    public function getImportExample()
    {
        try {
            $result = $this->aboutUsContentService->getImportExample();
            session()->flash('success', trans('site.success'));

            return $result;
        } catch (Exception) {
            return redirect()
                ->back()
                ->with('error', trans('site.something_went_wrong'));
        }
    }

    public function import(Request $request)
    {
        try {
            $request->validate(['excel_file' => 'required|mimes:xls,xlsx']);
            $this->aboutUsContentService->import();

            return redirect()
                ->back()
                ->with('message', trans('site.success'));
        } catch (Exception) {
            return redirect()
                ->back()
                ->with('message', trans('site.something_went_wrong'));
        }
    }
}
