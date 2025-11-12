<?php

namespace App\Services\v1\Service;

use App\Models\Service;
use App\Repositories\ServiceRepository;
use App\Services\Contracts\BaseService;
use App\Traits\Makable;

/**
 * @extends BaseService<Service>
 * @property ServiceRepository $repository
 */
class ServiceService extends BaseService
{
    use Makable;

    protected string $repositoryClass = ServiceRepository::class;
}
