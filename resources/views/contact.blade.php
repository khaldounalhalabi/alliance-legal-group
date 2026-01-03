@extends("layout")
@section("content")
    <!-- Page Banner -->
    <div class="container-fluid no-left-padding no-right-padding page-banner">
        <!-- Container -->
        <div class="container">
            <h3>{{ trans("site.contact_us") }}</h3>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route("index") }}">
                        {{ trans("site.home") }}
                    </a>
                </li>
                <li class="active">{{ trans("site.contact_us") }}</li>
            </ol>
        </div>
        <!-- Container /- -->
    </div>
    <!-- Page Banner /- -->

    <main class="site-main">
        <!-- Container -->
        <div class="container">
            <!-- Map Section -->
            <div class="container-fluid map-block">
                <div
                    class="map-canvas"
                    id="contact-map-canvas"
                    data-lat="{{ $lat?->value }}"
                    data-lng="{{ $lng?->value }}"
                    data-pin="assets/images/marker-2.png"
                    data-string="5 Union Street, Ardwick, Manchester, M12 4JD"
                    data-zoom="10"
                ></div>
            </div>
            <!--  Map Section /- -->
            <div class="clearfix"></div>
            <div class="col-md-4 col-xs-6 contact-content">
                <div class="contact-details">
                    <h3>{{ trans("site.contact_us") }}</h3>
                    <div class="contact-detail-box">
                        <h4>{{ trans("site.address") }}:</h4>
                        <p>{{ $address?->value }}</p>
                    </div>

                    <div class="contact-detail-box">
                        <h4>
                            {{ trans("site.office", ["office_number" => 1]) }}
                        </h4>
                        <p>{{ trans("site.branch_address.dubai") }}</p>
                    </div>

                    <div class="contact-detail-box">
                        <h4>
                            {{ trans("site.office", ["office_number" => 2]) }}
                        </h4>
                        <p>{{ trans("site.branch_address.qatar") }}</p>
                    </div>

                    <div class="contact-detail-box">
                        <h4>
                            {{ trans("site.office", ["office_number" => 3]) }}
                        </h4>
                        <p>{{ trans("site.branch_address.ireland") }}</p>
                    </div>

                    <div class="contact-detail-box">
                        <h4>
                            {{ trans("site.office", ["office_number" => 4]) }}
                        </h4>
                        <p>{{ trans("site.branch_address.lebanon") }}</p>
                    </div>

                    <div class="contact-detail-box">
                        <h4>
                            {{ trans("site.office", ["office_number" => 5]) }}
                        </h4>
                        <p>{{ trans("site.branch_address.saudi_arabia") }}</p>
                    </div>

                    <div class="contact-detail-box">
                        <h4>{{ trans("site.email") }}</h4>
                        <p>
                            <a href="mailto:{{ $email->value }}" title="">
                                {{ $email->value }}
                            </a>
                        </p>
                    </div>
                    <div class="contact-detail-box">
                        <h4>{{ trans("site.phone") }}:</h4>
                        <p>
                            <a href="mailto:{{ $phone->value }}">
                                {{ $phone->value }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-6 contact-form">
                <h3>{{ trans("site.leave_a_comment") }}</h3>
                <form
                    action="{{ route("contact.send.message") }}"
                    method="POST"
                >
                    @csrf
                    <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="{{ trans("site.enter_your_name") }}"
                            name="name"
                            id="input_name"
                            required
                            value="{{ old("name") }}"
                        />
                        @error("name")
                        <div class="invalid-feedback text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="{{ trans("site.enter_your_email") }}"
                            name="email"
                            value="{{ old("email") }}"
                            id="input_email"
                            required
                        />
                        @error("email")
                        <div class="invalid-feedback text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="{{ trans("site.phone_number") }}"
                            name="phone"
                            value="{{ old("phone") }}"
                            id="input_phone"
                            required
                        />
                        @error("phone")
                        <div class="invalid-feedback text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea
                            class="form-control"
                            placeholder="{{ trans("site.message") }}"
                            name="message"
                            id="textarea_message"
                        >
                            {{ trim(old("message")) }}
                        </textarea>
                        @error("message")
                        <div class="invalid-feedback text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @if (session()->has("success"))
                        <div class="alert alert-success" role="alert">
                            {{ session("success") }}
                        </div>
                    @endif

                    <button
                        title="{{ trans("site.send_message") }}"
                        type="submit"
                        name="post"
                    >
                        {{ trans("site.send_message") }}
                    </button>
                    <div id="alert-msg" class="alert-msg"></div>
                </form>
            </div>
        </div>
        <!-- Container -->
    </main>
@endsection

@push("scripts")
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW40y4kdsjsz714OVTvrw7woVCpD8EbLE"></script>
@endpush
