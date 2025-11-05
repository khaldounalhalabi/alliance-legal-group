<?php

namespace App\Repositories;

use App\Models\TeamMember;
use App\Repositories\Contracts\BaseRepository;

/**
 * @extends BaseRepository<TeamMember>
 */
class TeamMemberRepository extends BaseRepository
{
    protected string $modelClass = TeamMember::class;
}
