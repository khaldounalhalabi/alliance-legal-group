<?php

namespace App\Http\Controllers\WEB\v1;

use App\Http\Controllers\WebController;
use App\Http\Requests\v1\FrequentlyAskedQuestion\StoreUpdateFrequentlyAskedQuestionRequest;
use App\Http\Resources\v1\FrequentlyAskedQuestionResource;
use App\Services\v1\FrequentlyAskedQuestion\FrequentlyAskedQuestionService;
use Inertia\Inertia;

class FrequentlyAskedQuestionController extends WebController
{
    private FrequentlyAskedQuestionService $frequentlyAskedQuestionService;

    public function __construct()
    {
        $this->frequentlyAskedQuestionService = FrequentlyAskedQuestionService::make();
        // place the relations you want to return them within the response
        $this->relations = [];
    }

    public function data()
    {
        $items = $this->frequentlyAskedQuestionService->indexWithPagination($this->relations);

        return rest()
            ->ok()
            ->getSuccess()
            ->data($items)
            ->send();
    }

    public function index()
    {
        return Inertia::render('dashboard/frequently-asked-questions/index');
    }

    public function show($frequentlyAskedQuestionId)
    {
        $frequentlyAskedQuestion = $this->frequentlyAskedQuestionService->view($frequentlyAskedQuestionId,
            $this->relations);

        return Inertia::render('dashboard/frequently-asked-questions/show', [
            'frequentlyAskedQuestion' => FrequentlyAskedQuestionResource::make($frequentlyAskedQuestion),
        ]);
    }

    public function create()
    {
        return Inertia::render('dashboard/frequently-asked-questions/create');
    }

    public function store(StoreUpdateFrequentlyAskedQuestionRequest $request)
    {
        $frequentlyAskedQuestion = $this->frequentlyAskedQuestionService->store($request->validated(),
            $this->relations);
        if ($frequentlyAskedQuestion) {
            return redirect()
                ->route('v1.web.protected.frequently.asked.questions.index')
                ->with('success', trans('site.stored_successfully'));
        }

        return redirect()
            ->back()
            ->with('error', trans('site.something_went_wrong'));
    }

    public function edit($frequentlyAskedQuestionId)
    {
        $frequentlyAskedQuestion = $this->frequentlyAskedQuestionService->view($frequentlyAskedQuestionId,
            $this->relations);

        if (!$frequentlyAskedQuestion) {
            abort(404);
        }

        return Inertia::render('dashboard/frequently-asked-questions/edit', [
            'frequentlyAskedQuestion' => FrequentlyAskedQuestionResource::make($frequentlyAskedQuestion),
        ]);
    }

    public function update(StoreUpdateFrequentlyAskedQuestionRequest $request, $frequentlyAskedQuestionId)
    {
        $frequentlyAskedQuestion = $this->frequentlyAskedQuestionService->update($request->validated(),
            $frequentlyAskedQuestionId, $this->relations);
        if ($frequentlyAskedQuestion) {
            return redirect()
                ->route('v1.web.protected.frequently.asked.questions.index')
                ->with('success', trans('site.update_successfully'));
        }

        return redirect()
            ->back()
            ->with('error', trans('site.there_is_no_data'));
    }

    public function destroy($frequentlyAskedQuestionId)
    {
        $result = $this->frequentlyAskedQuestionService->delete($frequentlyAskedQuestionId);

        return rest()
            ->when(
                $result,
                fn($rest) => $rest->ok()->deleteSuccess(),
                fn($rest) => $rest->noData(),
            )->send();
    }
}
