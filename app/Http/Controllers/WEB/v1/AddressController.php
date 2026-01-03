<?php

namespace App\Http\Controllers\WEB\v1;

use App\Http\Controllers\WebController;
use App\Http\Requests\v1\Address\StoreUpdateAddressRequest;
use App\Http\Resources\v1\AddressResource;
use App\Models\Address;
use App\Services\v1\Address\AddressService;
use Inertia\Inertia;

class AddressController extends WebController
{
    private AddressService $addressService;

    public function __construct()
    {
        $this->addressService = AddressService::make();
        // place the relations you want to return them within the response
        $this->relations = [];
    }

    public function data()
    {
        $items = $this->addressService->indexWithPagination($this->relations);

        return rest()
            ->ok()
            ->getSuccess()
            ->data($items)
            ->send();
    }

    public function index()
    {
        $exportables = Address::getModel()->exportable();

        return Inertia::render('dashboard/addresses/index', [
            'exportables' => $exportables,
        ]);
    }

    public function show($addressId)
    {
        $address = $this->addressService->view($addressId, $this->relations);

        return Inertia::render('dashboard/addresses/show', [
            'address' => AddressResource::make($address),
        ]);
    }

    public function create()
    {
        return Inertia::render('dashboard/addresses/create');
    }

    public function store(StoreUpdateAddressRequest $request)
    {
        $address = $this->addressService->store($request->validated(), $this->relations);
        if ($address) {
            return redirect()
                ->route('v1.web.protected.addresses.index')
                ->with('success', trans('site.stored_successfully'));
        }

        return redirect()
            ->back()
            ->with('error', trans('site.something_went_wrong'));
    }

    public function edit($addressId)
    {
        $address = $this->addressService->view($addressId, $this->relations);

        if (! $address) {
            abort(404);
        }

        return Inertia::render('dashboard/addresses/edit', [
            'address' => AddressResource::make($address),
        ]);
    }

    public function update(StoreUpdateAddressRequest $request, $addressId)
    {
        $address = $this->addressService->update($request->validated(), $addressId, $this->relations);
        if ($address) {
            return redirect()
                ->route('v1.web.protected.addresses.index')
                ->with('success', trans('site.update_successfully'));
        }

        return redirect()
            ->back()
            ->with('error', trans('site.there_is_no_data'));
    }

    public function destroy($addressId)
    {
        $result = $this->addressService->delete($addressId);

        return rest()
            ->when(
                $result,
                fn ($rest) => $rest->ok()->deleteSuccess(),
                fn ($rest) => $rest->noData(),
            )->send();
    }
}
