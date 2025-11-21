<?php

namespace App\Services\v1\FrequentlyAskedQuestion;

use App\Models\FrequentlyAskedQuestion;
use App\Repositories\FrequentlyAskedQuestionRepository;
use App\Services\Contracts\BaseService;
use App\Traits\Makable;

/**
 * @extends BaseService<FrequentlyAskedQuestion>
 * @property FrequentlyAskedQuestionRepository $repository
 */
class FrequentlyAskedQuestionService extends BaseService
{
    use Makable;

    protected string $repositoryClass = FrequentlyAskedQuestionRepository::class;
}
