@extends("layout")
@section("content")
    <!-- Page Banner -->
    <div class="container-fluid no-left-padding no-right-padding page-banner">
        <!-- Container -->
        <div class="container">
            <h3>Contact</h3>
            <ol class="breadcrumb">
                <li><a href="{{ route("index") }}">Home</a></li>
                <li class="active">Contact</li>
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
                    <h3>Contact Us?</h3>
                    <div class="contact-detail-box">
                        <h4>ADDRESS:</h4>
                        <p>{{ $address?->value }}</p>
                    </div>

                    <div class="contact-detail-box">
                        <h4>Office 1</h4>
                        <p>UAE, Dubai</p>
                    </div>

                    <div class="contact-detail-box">
                        <h4>Office 2</h4>
                        <p>Qatar, Doha</p>
                    </div>

                    <div class="contact-detail-box">
                        <h4>Office 3</h4>
                        <p>Ireland, Dublin</p>
                    </div>

                    <div class="contact-detail-box">
                        <h4>Office 4</h4>
                        <p>Lebanon Beirut</p>
                    </div>

                    <div class="contact-detail-box">
                        <h4>Office 5</h4>
                        <p>Kingdom of Saudi Arabia</p>
                    </div>

                    <div class="contact-detail-box">
                        <h4>EMAIL ID:</h4>
                        <p>
                            <a href="mailto:{{ $email->value }}" title="">
                                {{ $email->value }}
                            </a>
                        </p>
                    </div>
                    <div class="contact-detail-box">
                        <h4>PHONE:</h4>
                        <p>
                            <a href="mailto:{{ $phone->value }}">
                                {{ $phone->value }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-6 contact-form">
                <h3>Leave a Comments</h3>
                <form
                    action="{{ route("contact.send.message") }}"
                    method="POST"
                >
                    @csrf
                    <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter Your Name*"
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
                            placeholder="Phone Number*"
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
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter Your Address*"
                            name="address"
                            value="{{ old("address") }}"
                            id="input_address"
                            required
                        />
                        @error("address")
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea
                            class="form-control"
                            placeholder="Message"
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

                    <button title="SEND MESSAGE" type="submit" name="post">
                        SEND MESSAGE
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
