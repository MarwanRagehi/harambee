<?php

namespace Database\Seeders;

use App\Models\ContentBlock;
use Illuminate\Database\Seeder;

class ContentBlockSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            [
                'section' => 'hero',
                'key' => 'hero-main',
                'title_en' => 'Yemen Diabetes Association',
                'title_ar' => 'جمعية السكري اليمنية',
                'subtitle_en' => 'Comprehensive care, education, and advocacy for people living with diabetes in Yemen.',
                'subtitle_ar' => 'رعاية شاملة وتثقيف ودعم للمصابين بداء السكري في اليمن.',
                'summary_en' => 'Empowering families with the knowledge, treatment, and support they need to lead healthy lives.',
                'summary_ar' => 'نمكن الأسر من الحصول على المعرفة والعلاج والدعم اللازم لحياة صحية.',
                'button_text_en' => 'Explore Our Programs',
                'button_text_ar' => 'تعرّف على برامجنا',
                'button_url' => '#programs',
                'image_path' => null,
                'metadata' => [
                    'background_overlay' => 'rgba(8,39,76,0.55)',
                ],
                'display_order' => 1,
            ],
            [
                'section' => 'about',
                'key' => 'about-organization',
                'title_en' => 'About the Association',
                'title_ar' => 'عن الجمعية',
                'summary_en' => 'Founded by Yemeni healthcare professionals and advocates, the Yemen Diabetes Association is dedicated to improving the quality of life for people living with diabetes. We coordinate nationwide programs, provide clinical services, and partner with communities to deliver culturally grounded care.',
                'summary_ar' => 'تأسست جمعية السكري اليمنية على يد مهنيين صحيين وناشطين يمنيين بهدف تحسين جودة حياة المصابين بداء السكري. نقود برامج وطنية ونوفر خدمات سريرية ونتعاون مع المجتمعات لتقديم رعاية متجذّرة في الثقافة المحلية.',
                'body_en' => '<p>Our teams work across Yemen to establish diabetes clinics, supply essential medications, and train caregivers. We combine evidence-based medicine with community outreach so that every person can access continuous care, regardless of their location or ability to pay.</p>',
                'body_ar' => '<p>تعمل فرقنا في جميع أنحاء اليمن لإنشاء عيادات متخصصة وتوفير الأدوية الأساسية وتدريب مقدمي الرعاية. نجمع بين الطب المبني على الأدلة والتواصل المجتمعي ليحصل كل شخص على رعاية مستمرة بغض النظر عن مكانه أو قدرته المالية.</p>',
                'image_path' => 'images/about-team.svg',
                'display_order' => 2,
            ],
            [
                'section' => 'mission',
                'key' => 'mission-values',
                'title_en' => 'Our Mission',
                'title_ar' => 'رسالتنا',
                'summary_en' => 'To prevent diabetes complications through early diagnosis, integrated treatment, and continuous education.',
                'summary_ar' => 'الوقاية من مضاعفات السكري عبر التشخيص المبكر والعلاج المتكامل والتثقيف المستمر.',
                'body_en' => '<ul><li>Operate multidisciplinary clinics that provide screening, nutrition counseling, and insulin therapy.</li><li>Equip patients and their families with practical skills to self-manage diabetes safely.</li><li>Advocate for equitable policies and essential medicine access across Yemen.</li></ul>',
                'body_ar' => '<ul><li>تشغيل عيادات متعددة التخصصات تقدم الفحوصات والإرشاد الغذائي وعلاج الإنسولين.</li><li>تزويد المرضى وأسرهم بمهارات عملية لإدارة السكري بأمان.</li><li>الدفاع عن سياسات عادلة وضمان توفر الأدوية الأساسية في جميع أنحاء اليمن.</li></ul>',
                'display_order' => 3,
            ],
            [
                'section' => 'statistics',
                'key' => 'stat-people-supported',
                'title_en' => 'People supported each year',
                'title_ar' => 'مستفيدون سنوياً',
                'metadata' => [
                    'value' => '12K+',
                ],
                'display_order' => 4,
            ],
            [
                'section' => 'statistics',
                'key' => 'stat-trained-caregivers',
                'title_en' => 'Caregivers trained',
                'title_ar' => 'مقدّمو رعاية مدرّبون',
                'metadata' => [
                    'value' => '480',
                ],
                'display_order' => 5,
            ],
            [
                'section' => 'statistics',
                'key' => 'stat-mobile-clinics',
                'title_en' => 'Mobile clinics deployed',
                'title_ar' => 'عيادات متنقلة',
                'metadata' => [
                    'value' => '26',
                ],
                'display_order' => 6,
            ],
            [
                'section' => 'programs',
                'key' => 'program-clinics',
                'title_en' => 'Integrated Diabetes Clinics',
                'title_ar' => 'عيادات السكري المتكاملة',
                'summary_en' => 'Primary and specialist care delivered through fixed and mobile clinics to reach underserved communities.',
                'summary_ar' => 'رعاية أولية ومتخصصة في عيادات ثابتة ومتنقلة للوصول إلى المجتمعات المحرومة.',
                'metadata' => [
                    'icon' => 'fa-hospital-o',
                ],
                'display_order' => 7,
            ],
            [
                'section' => 'programs',
                'key' => 'program-education',
                'title_en' => 'Education & Prevention',
                'title_ar' => 'التثقيف والوقاية',
                'summary_en' => 'School-based screenings, awareness campaigns, and support groups promoting healthy lifestyles.',
                'summary_ar' => 'فحوصات مدرسية وحملات توعوية ومجموعات دعم لتعزيز أساليب حياة صحية.',
                'metadata' => [
                    'icon' => 'fa-graduation-cap',
                ],
                'display_order' => 8,
            ],
            [
                'section' => 'programs',
                'key' => 'program-research',
                'title_en' => 'Research & Data',
                'title_ar' => 'البحث والبيانات',
                'summary_en' => 'Collecting national diabetes indicators and collaborating on clinical research to shape policy.',
                'summary_ar' => 'جمع مؤشرات السكري الوطنية والتعاون في البحوث السريرية لصياغة السياسات.',
                'metadata' => [
                    'icon' => 'fa-line-chart',
                ],
                'display_order' => 9,
            ],
            [
                'section' => 'programs',
                'key' => 'program-support',
                'title_en' => 'Family Support Services',
                'title_ar' => 'خدمات دعم الأسر',
                'summary_en' => 'Counseling, psychosocial care, and economic assistance tailored to each household.',
                'summary_ar' => 'إرشاد ودعم نفسي واجتماعي ومساعدات اقتصادية مصممة لاحتياجات كل أسرة.',
                'metadata' => [
                    'icon' => 'fa-heart',
                ],
                'display_order' => 10,
            ],
            [
                'section' => 'news',
                'key' => 'news-mobile-clinics',
                'title_en' => 'Mobile clinics expand to coastal governorates',
                'title_ar' => 'توسّع العيادات المتنقلة إلى المحافظات الساحلية',
                'summary_en' => 'Four additional diabetes outreach teams now provide screenings and insulin titration in Al Hudaydah and Aden.',
                'summary_ar' => 'أربع فرق متنقلة جديدة تقدم الفحوصات وضبط جرعات الإنسولين في الحديدة وعدن.',
                'button_text_en' => 'Read update',
                'button_text_ar' => 'قراءة التفاصيل',
                'button_url' => 'https://example.org/mobile-clinics',
                'display_order' => 11,
            ],
            [
                'section' => 'news',
                'key' => 'news-education',
                'title_en' => 'Teachers receive diabetes first responder training',
                'title_ar' => 'تدريب المعلمين على الإسعافات الأولية للسكري',
                'summary_en' => '120 educators completed refresher courses on early detection and emergency care for students with diabetes.',
                'summary_ar' => 'أكمل 120 معلماً دورات تحديثية للكشف المبكر ورعاية الطوارئ للطلاب المصابين بالسكري.',
                'button_text_en' => 'View story',
                'button_text_ar' => 'عرض القصة',
                'button_url' => 'https://example.org/teacher-training',
                'display_order' => 12,
            ],
            [
                'section' => 'news',
                'key' => 'news-policy',
                'title_en' => 'Policy forum advances insulin access roadmap',
                'title_ar' => 'منتدى السياسات يضع خارطة طريق لوصول الإنسولين',
                'summary_en' => 'Government, NGOs, and private pharmacies committed to coordinated procurement and storage standards.',
                'summary_ar' => 'التزم ممثلو الحكومة والمنظمات غير الحكومية والصيدليات الخاصة بالتوريد المنسق ومعايير التخزين.',
                'button_text_en' => 'Learn more',
                'button_text_ar' => 'المزيد',
                'button_url' => 'https://example.org/policy-forum',
                'display_order' => 13,
            ],
            [
                'section' => 'cta',
                'key' => 'cta-donate',
                'title_en' => 'Partner with us to deliver life-saving care',
                'title_ar' => 'شاركنا لتقديم رعاية تنقذ الأرواح',
                'summary_en' => 'Your contribution sustains clinics, supplies insulin, and keeps educators on the road.',
                'summary_ar' => 'مساهمتك تضمن استمرار العيادات وتوفير الإنسولين واستمرار عمل فرق التثقيف.',
                'button_text_en' => 'Contact our team',
                'button_text_ar' => 'تواصل معنا',
                'button_url' => '#contact',
                'display_order' => 14,
            ],
            [
                'section' => 'contact',
                'key' => 'contact-details',
                'title_en' => 'Contact',
                'title_ar' => 'تواصل معنا',
                'summary_en' => 'Reach our central coordination office in Sana’a or connect with regional focal points.',
                'summary_ar' => 'تواصل مع مكتبنا المركزي في صنعاء أو مع ممثلينا الإقليميين.',
                'metadata' => [
                    'address' => 'Al-Zubairi Street, Sana’a, Yemen',
                    'phone' => '+967 1 234 567',
                    'email' => 'info@yda-ye.org',
                    'map_url' => 'https://maps.google.com/?q=15.3556,44.2081',
                    'office_hours_en' => 'Sunday – Thursday: 8:00 – 16:00',
                    'office_hours_ar' => 'الأحد – الخميس: 8:00 صباحاً – 4:00 عصراً',
                ],
                'display_order' => 15,
            ],
        ];

        foreach ($blocks as $attributes) {
            ContentBlock::updateOrCreate([
                'key' => $attributes['key'],
            ], $attributes);
        }
    }
}
