<?php

namespace App\Services\v1\TeamMember;

use App\Models\TeamMember;
use App\Repositories\TeamMemberRepository;
use App\Services\Contracts\BaseService;
use App\Traits\Makable;

/**
 * @extends BaseService<TeamMember>
 * @property TeamMemberRepository $repository
 */
class TeamMemberService extends BaseService
{
    use Makable;

    protected string $repositoryClass = TeamMemberRepository::class;
}
