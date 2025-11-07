<?php

namespace App\Services\v1\Testimonial;

use App\Models\Testimonial;
use App\Repositories\TestimonialRepository;
use App\Services\Contracts\BaseService;
use App\Traits\Makable;

/**
 * @extends BaseService<Testimonial>
 * @property TestimonialRepository $repository
 */
class TestimonialService extends BaseService
{
    use Makable;

    protected string $repositoryClass = TestimonialRepository::class;
}
