@php
    use App\Models\TeamMember;
    use Illuminate\Database\Eloquent\Collection;
    /** @var Collection<TeamMember>|TeamMember[] $teamMembers */
@endphp

@props([
    "teamMembers",
])
<!-- Team Section -->
<div class="container-fluid no-left-padding no-right-padding team-section">
    <!-- Container -->
    <div class="container">
        <!-- Section Header -->
        <div class="section-header text-center">
            <h3>team members</h3>
        </div>
        <!-- Section Header /- -->
        <!-- Row -->
        <div class="team-carousel">
            @foreach ($teamMembers as $member)
                <div class="col-md-12">
                    <div class="team-box">
                        <i>
                            <img
                                src="{{ $member->image?->url ?? asset("/assets/images/profile.jpg") }}"
                                alt="Team"
                            />
                        </i>
                        <h4>{{ $member->name }}</h4>
                        <span>{{ $member->position }}</span>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Row /- -->
    </div>
    <!-- Container /- -->
</div>
<!-- Team Section /- -->
