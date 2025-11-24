@php
    use App\Models\TeamMember;
    /** @var TeamMember $teamMember */
@endphp

@extends("layout")

@section("content")
    <!-- Page Banner -->
    <div
        class="container-fluid no-left-padding no-right-padding page-banner"
        style="
            background-image: url('{{ asset("assets/images/team-member-banner.png") }}');
        "
    >
        <!-- Container -->
        <div class="container">
            <h3>{{ $teamMember->name }}</h3>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route("index") }}">
                        {{ trans("site.home") }}
                    </a>
                </li>
                <li class="active">{{ $teamMember->name }}</li>
            </ol>
        </div>
        <!-- Container /- -->
    </div>
    <!-- Page Banner /- -->

    <!-- Team Member Profile Section -->
    <div
        class="container-fluid no-left-padding no-right-padding team-profile-section"
    >
        <div class="container">
            <div class="row">
                <!-- Team Member Sidebar -->
                <div class="col-md-4">
                    <div class="team-profile-sidebar">
                        <div class="team-profile-image">
                            <img
                                src="{{ $teamMember->image?->url ?? asset("/assets/images/profile.jpg") }}"
                                alt="{{ $teamMember->name }}"
                                class="img-responsive"
                            />
                        </div>
                        <div class="team-profile-info">
                            <h3>{{ $teamMember->name }}</h3>
                            <p class="position">{{ $teamMember->position }}</p>
                            @if ($teamMember->years_of_experience)
                                <p class="experience">
                                    <i class="fa fa-briefcase"></i>
                                    {{ $teamMember->years_of_experience }}
                                    {{ trans("site.years_of_experience") }}
                                </p>
                            @endif
                        </div>

                        @if ($teamMember->email || $teamMember->phone)
                            <div class="contact-info">
                                <h5>Contact Information</h5>
                                @if ($teamMember->email)
                                    <p>
                                        <i class="fa fa-envelope"></i>
                                        <a
                                            href="mailto:{{ $teamMember->email }}"
                                        >
                                            {{ $teamMember->email }}
                                        </a>
                                    </p>
                                @endif

                                @if ($teamMember->phone)
                                    <p>
                                        <i class="fa fa-phone"></i>
                                        <a href="tel:{{ $teamMember->phone }}">
                                            {{ $teamMember->phone }}
                                        </a>
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if ($teamMember->languages && count($teamMember->languages) > 0)
                            <div class="sidebar-section">
                                <h5>{{ trans("site.languages") }}</h5>
                                <ul class="simple-list">
                                    @foreach ($teamMember->languages as $language)
                                        <li>{{ $language }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if ($teamMember->bar_admissions && count($teamMember->bar_admissions) > 0)
                            <div class="sidebar-section">
                                <h5>{{ trans("site.bar_admissions") }}</h5>
                                <ul class="simple-list">
                                    @foreach ($teamMember->bar_admissions as $bar)
                                        <li>{{ $bar }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Team Member Sidebar /- -->

                <!-- Team Member Main Content -->
                <div class="col-md-8">
                    <div class="team-profile-details">
                        @if ($teamMember->summary)
                            <div class="profile-section">
                                <h4>{{ trans("site.about") }}</h4>
                                <div class="summary-text">
                                    {!! nl2br(e($teamMember->summary)) !!}
                                </div>
                            </div>
                        @endif

                        @if ($teamMember->practice_areas && count($teamMember->practice_areas) > 0)
                            <div class="profile-section">
                                <h4>{{ trans("site.practice_areas") }}</h4>
                                <div class="practice-areas-grid">
                                    @foreach ($teamMember->practice_areas as $area)
                                        <div class="practice-area-item">
                                            <i class="fa fa-check-circle"></i>
                                            {{ $area }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($teamMember->education)
                            <div class="profile-section">
                                <h4>{{ trans("site.education") }}</h4>
                                <div class="education-content">
                                    {!! nl2br(e($teamMember->education)) !!}
                                </div>
                            </div>
                        @endif

                        @if ($teamMember->professional_background)
                            <div class="profile-section">
                                <h4>
                                    {{ trans("site.professional_background") }}
                                </h4>
                                <div class="background-text">
                                    {!! nl2br(e($teamMember->professional_background)) !!}
                                </div>
                            </div>
                        @endif

                        @if ($teamMember->skills && count($teamMember->skills) > 0)
                            <div class="profile-section">
                                <h4>{{ trans("site.skills") }}</h4>
                                <div class="skills-container">
                                    @foreach ($teamMember->skills as $skill)
                                        <span class="skill-badge">
                                            {{ $skill }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($teamMember->achievements && count($teamMember->achievements) > 0)
                            <div class="profile-section">
                                <h4>{{ trans("site.achievements") }}</h4>
                                <ul class="achievements-list">
                                    @foreach ($teamMember->achievements as $achievement)
                                        <li>
                                            <i class="fa fa-trophy"></i>
                                            {{ $achievement }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Team Member Main Content /- -->
            </div>
        </div>
    </div>
    <!-- Team Member Profile Section /- -->

    <style>
        .team-profile-section {
            padding: 80px 0;
            background-color: #f9f9f9;
        }

        /* Sidebar Styles */
        .team-profile-sidebar {
            position: sticky;
            top: 20px;
        }

        .team-profile-image {
            margin-bottom: 30px;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .team-profile-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        .team-profile-info {
            text-align: center;
            padding: 25px 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .team-profile-info h3 {
            font-size: 26px;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
            text-transform: capitalize;
        }

        .team-profile-info .position {
            font-size: 16px;
            color: #b8964f;
            font-weight: 600;
            margin: 0 0 10px 0;
        }

        .team-profile-info .experience {
            font-size: 14px;
            color: #666;
            margin: 0;
        }

        .team-profile-info .experience i {
            margin-right: 5px;
            color: #b8964f;
        }

        .contact-info,
        .sidebar-section {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .contact-info h5,
        .sidebar-section h5 {
            font-size: 16px;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
            text-transform: uppercase;
            border-bottom: 2px solid #b8964f;
            padding-bottom: 8px;
        }

        .contact-info p {
            margin-bottom: 10px;
            font-size: 14px;
        }

        .contact-info i {
            margin-right: 8px;
            color: #b8964f;
            width: 20px;
        }

        .contact-info a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s;
        }

        .contact-info a:hover {
            color: #b8964f;
        }

        .simple-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .simple-list li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
            font-size: 14px;
            color: #666;
        }

        .simple-list li:last-child {
            border-bottom: none;
        }

        /* Main Content Styles */
        .team-profile-details {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .profile-section {
            margin-bottom: 40px;
        }

        .profile-section:last-child {
            margin-bottom: 0;
        }

        .profile-section h4 {
            font-size: 22px;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #b8964f;
            text-transform: uppercase;
        }

        .summary-text,
        .education-content,
        .background-text {
            font-size: 16px;
            line-height: 1.8;
            color: #666;
            text-align: justify;
        }

        .practice-areas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
        }

        .practice-area-item {
            padding: 15px;
            background: #f8f9fa;
            border-left: 3px solid #b8964f;
            border-radius: 4px;
            font-size: 15px;
            color: #333;
            transition: all 0.3s ease;
        }

        .practice-area-item i {
            color: #b8964f;
            margin-right: 10px;
        }

        .practice-area-item:hover {
            background: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transform: translateX(5px);
        }

        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .skill-badge {
            display: inline-block;
            padding: 10px 20px;
            background: linear-gradient(135deg, #b8964f 0%, #d4af6a 100%);
            color: white;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(184, 150, 79, 0.3);
        }

        .skill-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(184, 150, 79, 0.4);
        }

        .achievements-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .achievements-list li {
            padding: 12px 0;
            border-bottom: 1px solid #eee;
            font-size: 15px;
            color: #666;
            line-height: 1.6;
        }

        .achievements-list li:last-child {
            border-bottom: none;
        }

        .achievements-list i {
            color: #b8964f;
            margin-right: 10px;
        }

        @media (max-width: 768px) {
            .team-profile-section {
                padding: 40px 0;
            }

            .team-profile-sidebar {
                position: relative;
                top: 0;
                margin-bottom: 30px;
            }

            .team-profile-details {
                padding: 20px;
            }

            .profile-section h4 {
                font-size: 18px;
            }

            .summary-text,
            .education-content,
            .background-text {
                font-size: 14px;
            }

            .practice-areas-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection
