<?php

namespace Database\Seeders;

use App\AboutUsKeyEnum;
use App\Models\AboutUsContent;
use App\Serializers\Translatable;
use Illuminate\Database\Seeder;

class AboutUsContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUsContent::create([
            'type' => AboutUsKeyEnum::OUR_HISTORY->value,
            'content' => Translatable::create([
                'en' => 'Founded in Manchester, Alliance Legal Group Ltd was established to bridge the gap between traditional legal practice and the modern demands of international business. Built on integrity, precision, and cross-border expertise, the firm has grown into a trusted legal partner for clients across the UK, Europe, and the Middle East.',
                'ar' => 'تأسست Alliance Legal Group Ltd في مانشستر بهدف سد الفجوة بين الممارسات القانونية التقليدية والمتطلبات الحديثة للأعمال التجارية الدولية. وبفضل نزاهتها ودقتها وخبرتها عبر الحدود، نمت الشركة لتصبح شريكًا قانونيًا موثوقًا به للعملاء في جميع أنحاء المملكة المتحدة وأوروبا والشرق الأوسط.'
            ]),
        ]);

        AboutUsContent::create([
            'type' => AboutUsKeyEnum::OUR_MISSION->value,
            'content' => Translatable::create([
                'en' => 'To redefine legal excellence through innovation, global reach, and unwavering ethical standards — delivering legal services that empower clients to grow, adapt, and succeed in an interconnected world.',
                'ar' => 'إعادة تعريف التميز القانوني من خلال الابتكار والانتشار العالمي والمعايير الأخلاقية الثابتة — تقديم خدمات قانونية تمكّن العملاء من النمو والتكيف والنجاح في عالم مترابط.'
            ]),
        ]);

        AboutUsContent::create([
            'type' => AboutUsKeyEnum::OUR_VISION->value,
            'content' => Translatable::create([
                'en' => 'To provide tailored, practical, and forward-thinking legal solutions that combine deep commercial insight with international perspective. We aim to protect our clients’ interests, promote transparency, and build lasting relationships founded on trust, professionalism, and results.',
                'ar' => 'تقديم حلول قانونية مخصصة وعملية وتطلعية تجمع بين الرؤية التجارية العميقة والمنظور الدولي. نهدف إلى حماية مصالح عملائنا وتعزيز الشفافية وبناء علاقات دائمة قائمة على الثقة والاحترافية والنتائج.'
            ]),
        ]);
    }
}
