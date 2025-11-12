<?php

namespace App\Http\Controllers\WEB\v1;

use App\Http\Controllers\WebController;
use App\Http\Requests\v1\Service\StoreUpdateServiceRequest;
use App\Http\Resources\v1\ServiceResource;
use App\Services\v1\Service\ServiceService;
use Inertia\Inertia;

class ServiceController extends WebController
{
    private ServiceService $serviceService;

    public function __construct()
    {
        $this->serviceService = ServiceService::make();
        // place the relations you want to return them within the response
        $this->relations = ['category'];
    }

    public function data()
    {
        $items = $this->serviceService->indexWithPagination($this->relations);

        return rest()
            ->ok()
            ->getSuccess()
            ->data($items)
            ->send();
    }

    public function index()
    {
        return Inertia::render('dashboard/services/index');
    }

    public function show($serviceId)
    {
        $service = $this->serviceService->view($serviceId, $this->relations);

        return Inertia::render('dashboard/services/show', [
            'service' => ServiceResource::make($service),
        ]);
    }

    public function create()
    {
        return Inertia::render('dashboard/services/create');
    }

    public function store(StoreUpdateServiceRequest $request)
    {
        $service = $this->serviceService->store($request->validated(), $this->relations);
        if ($service) {
            return redirect()
                ->route('v1.web.protected.services.index')
                ->with('success', trans('site.stored_successfully'));
        }

        return redirect()
            ->back()
            ->with('error', trans('site.something_went_wrong'));
    }

    public function edit($serviceId)
    {
        $service = $this->serviceService->view($serviceId, $this->relations);

        if (!$service) {
            abort(404);
        }

        return Inertia::render('dashboard/services/edit', [
            'service' => ServiceResource::make($service),
        ]);
    }

    public function update(StoreUpdateServiceRequest $request, $serviceId)
    {
        $service = $this->serviceService->update($request->validated(), $serviceId, $this->relations);
        if ($service) {
            return redirect()
                ->route('v1.web.protected.services.index')
                ->with('success', trans('site.update_successfully'));
        }

        return redirect()
            ->back()
            ->with('error', trans('site.there_is_no_data'));
    }

    public function destroy($serviceId)
    {
        $result = $this->serviceService->delete($serviceId);

        return rest()
            ->when(
                $result,
                fn($rest) => $rest->ok()->deleteSuccess(),
                fn($rest) => $rest->noData(),
            )->send();
    }
}
