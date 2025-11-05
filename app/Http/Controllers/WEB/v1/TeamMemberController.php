<?php

namespace App\Http\Controllers\WEB\v1;

use App\Http\Controllers\WebController;
use App\Http\Requests\v1\TeamMember\StoreUpdateTeamMemberRequest;
use App\Http\Resources\v1\TeamMemberResource;
use App\Models\TeamMember;
use App\Services\v1\TeamMember\TeamMemberService;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeamMemberController extends WebController
{
    private TeamMemberService $teamMemberService;

    public function __construct()
    {
        $this->teamMemberService = TeamMemberService::make();
        // place the relations you want to return them within the response
        $this->relations = [];
    }

    public function data()
    {
        $items = $this->teamMemberService->indexWithPagination($this->relations);

        return rest()
            ->ok()
            ->getSuccess()
            ->data($items)
            ->send();
    }

    public function index()
    {
        $exportables = TeamMember::getModel()->exportable();

        return Inertia::render('dashboard/team-members/index', [
            'exportables' => $exportables,
        ]);
    }

    public function show($teamMemberId)
    {
        $teamMember = $this->teamMemberService->view($teamMemberId, $this->relations);

        return Inertia::render('dashboard/team-members/show', [
            'teamMember' => TeamMemberResource::make($teamMember),
        ]);
    }

    public function create()
    {
        return Inertia::render('dashboard/team-members/create');
    }

    public function store(StoreUpdateTeamMemberRequest $request)
    {
        $teamMember = $this->teamMemberService->store($request->validated(), $this->relations);
        if ($teamMember) {
            return redirect()
                ->route('v1.web.protected.team.members.index')
                ->with('success', trans('site.stored_successfully'));
        }

        return redirect()
            ->back()
            ->with('error', trans('site.something_went_wrong'));
    }

    public function edit($teamMemberId)
    {
        $teamMember = $this->teamMemberService->view($teamMemberId, $this->relations);

        if (! $teamMember) {
            abort(404);
        }

        return Inertia::render('dashboard/team-members/edit', [
            'teamMember' => TeamMemberResource::make($teamMember),
        ]);
    }

    public function update(StoreUpdateTeamMemberRequest $request, $teamMemberId)
    {
        $teamMember = $this->teamMemberService->update($request->validated(), $teamMemberId, $this->relations);
        if ($teamMember) {
            return redirect()
                ->route('v1.web.protected.team.members.index')
                ->with('success', trans('site.update_successfully'));
        }

        return redirect()
            ->back()
            ->with('error', trans('site.there_is_no_data'));
    }

    public function destroy($teamMemberId)
    {
        $result = $this->teamMemberService->delete($teamMemberId);

        return rest()
            ->when(
                $result,
                fn ($rest) => $rest->ok()->deleteSuccess(),
                fn ($rest) => $rest->noData(),
            )->send();
    }
}
