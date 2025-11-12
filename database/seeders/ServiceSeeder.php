<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Serializers\Translatable;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::factory()->create([
            'name' => Translatable::create([
                'en' => 'Corporate & Commercial Law',
            ]),
            'image' => new UploadedFile(storage_path('app/private/required/services/corporate.jpg'), 'corporate.jpg'),
            'description' => Translatable::create([
                'en' => <<<'TEXT'
                            At Alliance Legal Group Ltd, we provide comprehensive corporate and commercial advisory services to clients ranging from startups and family-owned enterprises to multinational corporations and institutional investors. Our work spans the full business lifecycle — from company incorporation and structuring to mergers, acquisitions, and complex cross-border joint ventures.
                            We assist clients in drafting and negotiating commercial contracts, shareholder agreements, and joint venture arrangements tailored to their commercial objectives. Our lawyers also advise on corporate governance frameworks, directors’ duties, and regulatory compliance to ensure that businesses operate with integrity and in accordance with statutory obligations.
                            TEXT,
            ]),
        ]);

        Service::factory()->create([
            'name' => Translatable::create([
                'en' => 'Dispute Resolution & Litigation',
            ]),
            'image' => new UploadedFile(storage_path('app/private/required/services/dispute.jpg'), 'dispute.jpg'),
            'description' => Translatable::create([
                'en' => <<<'TEXT'
                            Our Dispute Resolution & Litigation practice offers strategic representation before courts, tribunals, and arbitral bodies across the UK, Europe, and the Middle East. We handle high-value civil, commercial, and corporate disputes, combining legal rigour with commercial pragmatism.

                            We manage every stage of litigation — from risk assessment and pre-action negotiation to trial advocacy and enforcement. Our team is experienced in shareholder and partnership disputes, contract breaches, property claims, and enforcement of arbitral awards.

                            In addition to traditional court litigation, we represent clients in white-collar and financial crime cases, including fraud, bribery, money laundering, and cybercrime. We also advise on internal investigations, compliance breaches, and regulatory enforcement actions. Our goal is to deliver practical solutions that protect our clients’ commercial interests and reputation while resolving disputes efficiently and cost-effectively.
                            TEXT,
            ]),
        ]);

        Service::factory()->create([
            'name' => Translatable::create([
                'en' => 'Corporate & Commercial Law',
            ]),
            'image' => new UploadedFile(storage_path('app/private/required/services/corporate.jpg'), 'corporate.jpg'),
            'description' => Translatable::create([
                'en' => <<<'TEXT'
                            In a rapidly evolving regulatory environment, Alliance Legal Group Ltd helps organisations navigate complex compliance frameworks with confidence. We provide proactive, risk-based solutions that align with business objectives while ensuring full adherence to national and international legal standards.

                            Our lawyers design and implement compliance systems that address Anti-Money Laundering (AML), Counter-Terrorist Financing (CTF), ESG obligations, and data protection under the GDPR. We also guide clients through interactions with regulatory authorities such as the FCA, SFO, and HMRC, and assist in preparing for audits, disclosures, and investigations.

                            We believe that effective compliance should go beyond box-ticking. Our goal is to build sustainable governance structures that promote transparency, ethics, and accountability across the organization.
                            TEXT,
            ]),
        ]);

        Service::factory()->create([
            'name' => Translatable::create([
                'en' => 'International & Projects',
            ]),
            'image' => new UploadedFile(storage_path('app/private/required/services/international.jpg'),
                'international.jpg'),
            'description' => Translatable::create([
                'en' => <<<'TEXT'
                            Our International & Projects division advises on global commercial activity, foreign investment, and large-scale infrastructure projects. We work closely with corporate clients, investors, and developers to structure, finance, and execute projects across the UK, Europe, the GCC, and emerging markets.

                            We assist clients in negotiating joint ventures, concession agreements, and project finance arrangements; managing construction risks; and ensuring compliance with trade and investment regulations. Our lawyers understand the economic, political, and environmental factors that influence cross-border projects, enabling us to provide commercially viable and legally sound solutions.

                            Whether supporting renewable energy ventures, advising on real estate development, or navigating customs and trade controls, we bring together global reach and local insight to deliver success in complex international markets.
                            TEXT,
            ]),
        ]);

        Service::factory()->create([
            'name' => Translatable::create([
                'en' => 'Technology & Cyber Law',
            ]),
            'image' => new UploadedFile(storage_path('app/private/required/services/technology.jpg'),
                'technology.jpg'),
            'description' => Translatable::create([
                'en' => <<<'TEXT'
                            The digital age presents both opportunity and risk. Our Technology & Cyber Law practice empowers businesses to innovate safely, protect intellectual property, and manage digital threats in compliance with global standards.

                            We provide end-to-end support on technology transactions, IP licensing, software agreements, and IT outsourcing. Our lawyers assist clients in implementing data protection frameworks under the UK GDPR and advise on AI governance, blockchain compliance, and emerging technology regulation.

                            In the cybersecurity space, we help organisations prepare for and respond to incidents, including ransomware attacks and data breaches. Our team supports clients with crisis management, regulatory notifications, and insurance recovery strategies. By combining technical understanding with legal expertise, we ensure that innovation and compliance advance together — safeguarding your brand, data, and digital assets worldwide.
                            TEXT,
            ]),
        ]);

        Service::factory()->create([
            'name' => Translatable::create([
                'en' => 'Private Client & Immigration',
            ]),
            'image' => new UploadedFile(storage_path('app/private/required/services/immigrations.jpg'),
                'immigrations.jpg'),
            'description' => Translatable::create([
                'en' => <<<'TEXT'
                            Our Private Client & Immigration practice offers discreet, personalised legal advice to individuals, entrepreneurs, and family offices managing assets and mobility across jurisdictions. We understand that private wealth matters require sensitivity, precision, and long-term planning.

                            We advise on wills, trusts, succession planning, and estate administration to ensure smooth intergenerational wealth transfer and tax efficiency. Our lawyers also assist with asset protection structures, property acquisitions, and business formation for high-net-worth individuals.

                            Our immigration team provides full assistance with UK and international visa applications, investor routes, skilled worker sponsorships, family reunification, and settlement (ILR) processes. For global clients, we offer tailored relocation and residency solutions to support both personal and professional goals.

                            At Alliance Legal Group Ltd, we integrate personal, corporate, and cross-border strategies to protect what matters most — your assets, legacy, and freedom of movement.
                            TEXT,
            ]),
        ]);

        Service::factory(10)->create();
    }
}
