@props([
    "addresses",
])

@php
    use App\Models\Address;
    use Illuminate\Database\Eloquent\Collection;
    /** @var Collection<Address> $addresses */
@endphp

<div class="w-100">
    <h1 class="text-center">{{ trans("site.our_offices") }}</h1>
    <p class="text-center">{{ trans("site.visit_us") }}</p>
</div>
<div
    class="container-fluid no-left-padding no-right-padding address-section w-full"
    style="padding: 60px 0; background: #fdfdfd"
>
    <div class="container">
        <div class="row">
            @foreach ($addresses as $address)
                <div class="col-md-4 col-sm-6 address-grid-item">
                    <div class="office-card">
                        <div class="office-img-wrapper">
                            <img
                                src="{{ $address->image->url }}"
                                alt="{{ $address->city }}"
                                class="office-img"
                            />
                            <div class="country-badge">
                                {{ $address->country }}
                            </div>

                            <div class="map-overlay">
                                <a
                                    href="{{ $address->map_link }}"
                                    target="_blank"
                                    class="map-btn"
                                >
                                    <i class="fa fa-map-marker"></i>
                                    {{ trans("site.view_on_map") ?? "View on Map" }}
                                </a>
                            </div>
                        </div>

                        <div class="office-details">
                            <h3 class="city-name">{{ $address->city }}</h3>
                            <div class="address-text">
                                <i class="fa fa-location-arrow"></i>
                                <span>{{ $address->address }}</span>
                            </div>
                        </div>

                        <div class="card-accent"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .address-grid-item {
        margin-bottom: 40px;
    }

    .office-card {
        background: #fff;
        border: 1px solid #eee;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .office-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 33, 71, 0.15);
        border-color: #c5a059;
    }

    /* Image Styling */
    .office-img-wrapper {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .office-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .office-card:hover .office-img {
        transform: scale(1.1);
    }

    /* Country Badge */
    .country-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #c5a059;
        color: #fff;
        padding: 5px 15px;
        font-size: 11px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        z-index: 2;
    }

    /* Map Overlay */
    .map-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 33, 71, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: 0.3s ease;
        z-index: 3;
    }

    .office-card:hover .map-overlay {
        opacity: 1;
    }

    .map-btn {
        color: #fff !important;
        border: 1px solid #c5a059;
        padding: 10px 20px;
        text-decoration: none !important;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 12px;
        transition: 0.3s;
    }

    .map-btn:hover {
        background: #c5a059;
        color: #002147 !important;
    }

    /* Text Details */
    .office-details {
        padding: 25px;
        text-align: center;
        flex-grow: 1;
    }

    .city-name {
        color: #002147;
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 15px;
        text-transform: uppercase;
    }

    .address-text {
        color: #666;
        font-size: 14px;
        line-height: 1.6;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        gap: 8px;
        text-wrap: nowrap;
        max-width: 100%;
        overflow-x: clip;
    }

    .address-text i {
        color: #c5a059;
        margin-top: 4px;
    }

    /* Bottom Gold Accent */
    .card-accent {
        height: 4px;
        width: 0;
        background: #c5a059;
        transition: width 0.4s ease;
    }

    .office-card:hover .card-accent {
        width: 100%;
    }

    /* RTL Support */
    html[dir='rtl'] .office-card {
        text-align: right;
    }

    html[dir='rtl'] .country-badge {
        left: auto;
        right: 15px;
    }

    html[dir='rtl'] .address-text {
        flex-direction: row-reverse;
    }

    html[dir='rtl'] .address-grid-item {
        float: right !important;
    }
</style>
