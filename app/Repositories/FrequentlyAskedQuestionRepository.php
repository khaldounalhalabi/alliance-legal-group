<?php

namespace App\Repositories;

use App\Models\FrequentlyAskedQuestion;
use App\Repositories\Contracts\BaseRepository;

/**
 * @extends BaseRepository<FrequentlyAskedQuestion>
 */
class FrequentlyAskedQuestionRepository extends BaseRepository
{
    protected string $modelClass = FrequentlyAskedQuestion::class;
}
