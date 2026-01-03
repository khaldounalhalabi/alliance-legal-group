<?php

namespace App\Services\v1\ContactPageContent;

use App\Enums\ContactUsContentKeyEnum;
use App\Models\ContactPageContent;
use App\Repositories\ContactPageContentRepository;
use App\Services\Contracts\BaseService;
use App\Traits\Makable;
use Illuminate\Database\Eloquent\Collection;

/**
 * @extends BaseService<ContactPageContent>
 *
 * @property ContactPageContentRepository $repository
 */
class ContactPageContentService extends BaseService
{
    use Makable;

    protected string $repositoryClass = ContactPageContentRepository::class;

    /**
     * @return ContactPageContent[]
     */
    public function getContactInfo(): array
    {
        /** @var Collection<ContactPageContent>|ContactPageContent[] $data */
        $data = cache()->remember(
            ContactPageContent::CACHE_KEY,
            now()->addYear(),
            fn () => ContactPageContent::all(),
        );

        $address = $data->firstWhere('key', ContactUsContentKeyEnum::ADDRESS->value);
        $email = $data->firstWhere('key', ContactUsContentKeyEnum::EMAIL->value);
        $phone = $data->firstWhere('key', ContactUsContentKeyEnum::PHONE->value);
        $whatsapp = $data->firstWhere('key', ContactUsContentKeyEnum::WHATSAPP->value);
        $lng = $data->firstWhere('key', ContactUsContentKeyEnum::LOCATION_LNG->value);
        $lat = $data->firstWhere('key', ContactUsContentKeyEnum::LOCATION_LAT->value);

        return [$address, $email, $phone, $whatsapp, $lng, $lat];
    }
}
