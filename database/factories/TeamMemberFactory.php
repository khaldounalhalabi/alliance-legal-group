<?php

namespace Database\Factories;

use App\Models\TeamMember;
use App\Serializers\Translatable;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends Factory<TeamMember>
 */
class TeamMemberFactory extends Factory
{
    public function definition(): array
    {
        $skills = [
            'Contract Law', 'Corporate Law', 'Criminal Defense', 'Family Law',
            'Intellectual Property', 'Real Estate Law', 'Tax Law', 'Employment Law',
            'Immigration Law', 'Personal Injury', 'Estate Planning', 'Litigation',
            'Negotiation', 'Legal Research', 'Client Relations', 'Mediation',
        ];

        $practiceAreas = [
            'Dispute Resolution', 'Criminal Law', 'Capital Markets', 'Banking & Finance',
            'Mergers & Acquisitions', 'Cross-border Investment', 'Construction & Real Estate',
            'Antitrust & Competition', 'Intellectual Property', 'International Trade',
            'Employment & Social Security', 'Bankruptcy & Restructuring', 'Tax Law',
            'Corporate Governance', 'Compliance & Regulation', 'Maritime Law',
        ];

        $barAdmissions = [
            'New York State Bar',
            'California State Bar',
            'Texas State Bar',
            'Florida State Bar',
            'Illinois State Bar',
            'Supreme Court of the United States',
            'U.S. District Court',
        ];

        $languages = [
            'English', 'Arabic', 'Spanish', 'French', 'Mandarin', 'German',
        ];

        $achievements = [
            'Super Lawyers Rising Star',
            'Best Lawyers in America',
            'Top 40 Under 40',
            'Published in Harvard Law Review',
            'Speaker at International Legal Conference',
            'Pro Bono Service Award',
        ];

        $universities = [
            'Harvard Law School',
            'Yale Law School',
            'Stanford Law School',
            'Columbia Law School',
            'University of Chicago Law School',
            'New York University School of Law',
            'University of Pennsylvania Law School',
            'University of Michigan Law School',
        ];

        return [
            'name' => Translatable::fake('name')->toJson(),
            'position' => Translatable::create([
                'en' => fake()->randomElement([
                    'Partner', 'Senior Associate', 'Associate', 'Of Counsel', 'Managing Partner',
                ]),
                'ar' => fake()->randomElement(['شريك', 'شريك أول', 'محامي', 'مستشار قانوني', 'الشريك الإداري']),
            ])->toJson(),
            'summary' => Translatable::create([
                'en' => fake()->paragraph(3),
                'ar' => 'محامي متمرس مع سنوات من الخبرة في تقديم الاستشارات القانونية والتمثيل القانوني للعملاء في مختلف المجالات القانونية.',
            ])->toJson(),
            'education' => Translatable::create([
                'en' => 'J.D., '.fake()->randomElement($universities).', '.fake()->year()."\n".
                    'B.A., '.fake()->randomElement([
                        'Political Science', 'Economics', 'Business Administration', 'International Relations',
                    ]).', '.
                    fake()->randomElement([
                        'University of California', 'Boston University', 'Georgetown University', 'Cornell University',
                    ]).', '.fake()->year(),
                'ar' => 'دكتوراه في القانون، '.fake()->randomElement($universities)."\n".
                    'بكالوريوس في '.fake()->randomElement(['العلوم السياسية', 'الاقتصاد', 'إدارة الأعمال']),
            ])->toJson(),
            'professional_background' => Translatable::create([
                'en' => fake()->paragraph(5)."\n\n".fake()->paragraph(4)."\n\n".
                    'Prior to joining the firm, '.fake()->sentence(10),
                'ar' => 'يتمتع بخبرة واسعة في مجال القانون، حيث عمل مع كبرى الشركات والمؤسسات القانونية. قدم استشارات قانونية متخصصة في مختلف المجالات وحقق نجاحات ملموسة لعملائه.',
            ])->toJson(),
            'skills' => fake()->randomElements($skills, fake()->numberBetween(4, 8)),
            'practice_areas' => fake()->randomElements($practiceAreas, fake()->numberBetween(3, 6)),
            'bar_admissions' => fake()->randomElements($barAdmissions, fake()->numberBetween(2, 4)),
            'languages' => fake()->randomElements($languages, fake()->numberBetween(2, 3)),
            'achievements' => fake()->randomElements($achievements, fake()->numberBetween(2, 5)),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'years_of_experience' => fake()->numberBetween(3, 25),
            'image' => new UploadedFile(public_path("assets/images/team-".fake()->numberBetween(1, 3).".jpg"),
                "profile-image.jpg"),
        ];
    }
}
