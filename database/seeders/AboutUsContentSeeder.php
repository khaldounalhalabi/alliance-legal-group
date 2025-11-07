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

        AboutUsContent::create([
            'type' => AboutUsKeyEnum::ABOUT_US->value,
            'content' => Translatable::create([
                'en' => 'Alliance Legal Group Ltd is an international corporate
                        and commercial law firm headquartered in Manchester,
                        United Kingdom. We advise corporations, investors, and
                        entrepreneurs on complex cross-border transactions,
                        regulatory compliance, and commercial strategy. Our
                        mission is simple: to provide precise, ethical, and
                        forward-thinking legal advice that empowers businesses
                        to thrive in a global marketplace. Our Vision: To
                        redefine international legal practice by blending deep
                        local knowledge with global commercial awareness. Our
                        Values: Integrity, Excellence, Innovation, Global
                        Mindset, Client Focus. Global Presence: With a strong
                        base in the UK and partnerships across Europe and the
                        Middle East, we offer multilingual and business-minded
                        legal support.',
                'ar' => 'مجموعة أليانس القانونية المحدودة (Alliance Legal Group Ltd) هي شركة محاماة دولية متخصصة في قانون الشركات والقانون التجاري، ويقع مقرها الرئيسي في مانشستر، المملكة المتحدة. نحن نقدم المشورة للشركات والمستثمرين ورواد الأعمال بشأن المعاملات المعقدة عبر الحدود، والامتثال التنظيمي، والاستراتيجية التجارية.
مهمتنا بسيطة: تقديم استشارات قانونية دقيقة وأخلاقية وتطلعية تُمكّن الشركات من الازدهار في السوق العالمية.
رؤيتنا: إعادة تعريف الممارسة القانونية الدولية من خلال مزج المعرفة المحلية العميقة بالوعي التجاري العالمي.
قيمنا: النزاهة، التميز، الابتكار، العقلية العالمية، التركيز على العميل.
حضورنا العالمي: بفضل قاعدتنا القوية في المملكة المتحدة وشراكاتنا في جميع أنحاء أوروبا والشرق الأوسط، نقدم دعمًا قانونيًا متعدد اللغات وذا توجه تجاري.'
            ])
        ]);

        AboutUsContent::create([
            'type' => AboutUsKeyEnum::WHY_CHOSE_US->value,
            'content' => Translatable::create([
                'en' => 'We understand that modern business doesn’t stop at
                        borders. Our lawyers advise on international structures,
                        multi-jurisdictional deals, and regulatory frameworks
                        that shape cross-border commerce. Every client is
                        unique. We build solutions around your business model,
                        risk profile, and long-term goals — not templates. From
                        startups to multinational corporations, our clients rely
                        on us for clear, strategic, and actionable legal advice
                        grounded in real-world business needs.',
                'ar' => 'نحن ندرك أن الأعمال الحديثة لا تتوقف عند الحدود. يقدم محامونا المشورة بشأن الهياكل الدولية، والصفقات متعددة الاختصاصات، والأطر التنظيمية التي تشكل التجارة العابرة للحدود.

كل عميل فريد من نوعه. نحن نبني حلولًا قانونية تتمحور حول نموذج عملك، وملف تعريف المخاطر الخاص بك، وأهدافك طويلة الأجل - وليس القوالب الجاهزة.

من الشركات الناشئة إلى الشركات متعددة الجنسيات، يعتمد عملاؤنا علينا للحصول على استشارات قانونية واضحة واستراتيجية وقابلة للتنفيذ، مستندة إلى احتياجات العمل في العالم الحقيقي.'
            ])
        ]);
    }
}
