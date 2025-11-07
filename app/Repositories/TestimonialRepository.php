<?php

namespace App\Repositories;

use App\Models\Testimonial;
use App\Repositories\Contracts\BaseRepository;

/**
 * @extends  BaseRepository<Testimonial>
 */
class TestimonialRepository extends BaseRepository
{
    protected string $modelClass = Testimonial::class;
}
