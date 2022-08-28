<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Page;
use App\Models\Block;
use App\Models\Slider;
use App\Models\Slide;
use App\Models\Attribute;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $page = Page::create([
            'title' => ['ar' => 'عن','en' => 'about'],
            'slug' => Str::slug('about'),
            'desc' => [
                'en' => 'From Saudi Arabia, the leading investment force, Laysen Valley will shape the future of Riyadh to be an advanced model of an integrated environment with several activities, which will fulfill the Kingdom’s Vision2030of improving the quality of life, enhancing trade and pushing the economy forward.',
                'ar' => 'من المملكة العربية السعودية ، القوة الاستثمارية الرائدة ، سيشكل وادي ليسن مستقبل الرياض ليكون نموذجًا متقدمًا لبيئة متكاملة مع العديد من الأنشطة ، والتي ستحقق رؤية المملكة 2030 لتحسين نوعية الحياة وتعزيز التجارة ودفع الاقتصاد إلى الأمام.'
            ],
            'image' => 'assets/images/about.png',
        ]);


        $business_slider = Slider::create([
            'title' => ['ar' => 'سلايدر صفحة اعمال','en' => 'business page slider '],
            'slug' => Str::slug('business page slider'),
        ]);

        $slide1 = Slide::create([
            'slider_id' => $business_slider->id,
            'title' => ['ar' => 'سلايد 1  ','en' => 'slide 1 '],
            'slug' => Str::slug('slide 1'),
            'image' => 'assets/images/business-s-1.png',
            'url_text' => ['ar' => 'عش تجربة النجاح الخاصة بك','en' => 'LIVE YOUR SUCCESS EXPERIENCE'],
            'url_link' => url('/order-request'),

        ]);

        $slide2 = Slide::create([
            'slider_id' => $business_slider->id,
            'title' => ['ar' => 'سلايد 1  ','en' => 'slide 1 '],
            'slug' => Str::slug('slide 1'),
            'image' => 'assets/images/business-s-1.png',
            'url_text' => ['ar' => 'عش تجربة النجاح الخاصة بك','en' => 'LIVE YOUR SUCCESS EXPERIENCE'],
            'url_link' => url('/order-request'),

        ]);

        $slide3 = Slide::create([
            'slider_id' => $business_slider->id,
            'title' => ['ar' => 'سلايد 1  ','en' => 'slide 1 '],
            'slug' => Str::slug('slide 1'),
            'image' => 'assets/images/business-s-1.png',
            'url_text' => ['ar' => 'عش تجربة النجاح الخاصة بك','en' => 'LIVE YOUR SUCCESS EXPERIENCE'],
            'url_link' => url('/order-request'),

        ]);


        $business = Page::create([
            'title' => ['ar' => 'اعمال','en' => 'business'],
            'sub_title' => ['ar' => 'طوّر أعمالك مع وادي لايزن','en' => 'GROW YOUR BUSINESS WITH LAYSEN VALLEY'],
            'slug' => Str::slug('business'),
            'desc' => [
                'ar' => 'From Saudi Arabia, the leading investment force, Laysen Valley will shape the future of Riyadh to be an advanced model of an integrated environment with several activities, which will fulfill the Kingdom’s Vision2030of improving the quality of life, enhancing trade and pushing the economy forward.',
                'en' => 'من المملكة العربية السعودية ، القوة الاستثمارية الرائدة ، سيشكل وادي ليسن مستقبل الرياض ليكون نموذجًا متقدمًا لبيئة متكاملة مع العديد من الأنشطة ، والتي ستحقق رؤية المملكة 2030 لتحسين نوعية الحياة وتعزيز التجارة ودفع الاقتصاد إلى الأمام.'
            ],
            'image' => '',
            'slider_id' => $business_slider->id,
        ]);

        $block = Block::create([
            'title' => ['ar' => ' احصائيات اعمال','en' => 'business analytics'],
            'slug' => Str::slug('business analytics'),
        ]);

        $business->blocks()->syncWithoutDetaching($block->id);


        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block->id,
            'title' => ['ar' => ' المباني الذكية ذات الأحجام المختلفة','en' => 'SMART BUILDINGS OF VARIOUS SIZES'],
            'sub_title' => ['ar' => 'اكثر من','en' => 'MORE THAN'],
            'slug' => Str::slug('SMART BUILDINGS OF VARIOUS SIZES'),
            'counter' => 50,
            'image' => 'assets/images/business-1.png',
        ]);

        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block->id,
            'title' => ['ar' => ' موظفين','en' => 'EMPLOYEES'],
            'sub_title' => ['ar' => 'اكثر من','en' => 'MORE THAN'],
            'slug' => Str::slug('EMPLOYEES'),
            'counter' => '12K',
            'image' => 'assets/images/business-2.png',
        ]);

        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block->id,
            'title' => ['ar' => ' بيئة عمل متكاملة','en' => 'INTEGRATED WORK ENVIRONMENT'],
            'sub_title' => ['ar' => 'موظفي','en' => 'EMPLOYEES'],
            'slug' => Str::slug('SMART BUILDINGS OF VARIOUS SIZES'),
            'counter' => 'FULL',
            'image' => 'assets/images/business-3.png',
        ]);




        /* Taste */

        $tasty_slider = Slider::create([
            'title' => ['ar' => 'سلايدر صفحة تذوق','en' => 'taste page slider '],
            'slug' => Str::slug('taste page slider'),
        ]);

        $slide1 = Slide::create([
            'slider_id' => $tasty_slider->id,
            'title' => ['ar' => 'سلايد 1  ','en' => 'slide 1 '],
            'slug' => Str::slug('slide 1'),
            'image' => 'assets/images/taste-s-1.png',
            'url_text' => ['ar' => 'أبهج شهيتك','en' => 'DELIGHT YOUR APPETITE'],
            'url_link' => '#',

        ]);

        $slide2 = Slide::create([
            'slider_id' => $tasty_slider->id,
            'title' => ['ar' => 'سلايد 1  ','en' => 'slide 1 '],
            'slug' => Str::slug('slide 1'),
            'image' => 'assets/images/taste-s-1.png',
            'url_text' => ['ar' => 'أبهج شهيتك','en' => 'DELIGHT YOUR APPETITE'],
            'url_link' => '#',

        ]);

        $slide3 = Slide::create([
            'slider_id' => $tasty_slider->id,
            'title' => ['ar' => 'سلايد 1  ','en' => 'slide 1 '],
            'slug' => Str::slug('slide 1'),
            'image' => 'assets/images/taste-s-1.png',
            'url_text' => ['ar' => 'أبهج شهيتك','en' => 'DELIGHT YOUR APPETITE'],
            'url_link' => '#',

        ]);


        $tasty = Page::create([
            'title' => ['ar' => 'تذوق','en' => 'taste'],
            'sub_title' => ['ar' => '"الأشخاص الذين يحبون تناول الطعام هم دائمًا أفضل الأشخاص"','en' => '“PEOPLE WHO LOVES TO EAT ARE ALWAYS THE BEST PEOPLE”'],
            'slug' => Str::slug('taste'),
            'desc' => [
                'ar' => 'From Saudi Arabia, the leading investment force, Laysen Valley will shape the future of Riyadh to be an advanced model of an integrated environment with several activities, which will fulfill the Kingdom’s Vision2030of improving the quality of life, enhancing trade and pushing the economy forward.',
                'en' => 'من المملكة العربية السعودية ، القوة الاستثمارية الرائدة ، سيشكل وادي ليسن مستقبل الرياض ليكون نموذجًا متقدمًا لبيئة متكاملة مع العديد من الأنشطة ، والتي ستحقق رؤية المملكة 2030 لتحسين نوعية الحياة وتعزيز التجارة ودفع الاقتصاد إلى الأمام.'
            ],
            'image' => '',
            'slider_id' => $tasty_slider->id,
        ]);

        $block = Block::create([
            'title' => ['ar' => ' احصائيات تذوق','en' => 'tasty analytics'],
            'slug' => Str::slug('taste analytics'),
        ]);

        $tasty->blocks()->syncWithoutDetaching($block->id);


        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block->id,
            'title' => ['ar' => ' المباني الذكية ذات الأحجام المختلفة','en' => 'SMART BUILDINGS OF VARIOUS SIZES'],
            'sub_title' => ['ar' => 'اكثر من','en' => 'MORE THAN'],
            'slug' => Str::slug('SMART BUILDINGS OF VARIOUS SIZES'),
            'counter' => 50,
        ]);

        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block->id,
            'title' => ['ar' => ' موظفين','en' => 'EMPLOYEES'],
            'sub_title' => ['ar' => 'اكثر من','en' => 'MORE THAN'],
            'slug' => Str::slug('EMPLOYEES'),
            'counter' => '12K',
        ]);

        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block->id,
            'title' => ['ar' => ' بيئة عمل متكاملة','en' => 'INTEGRATED WORK ENVIRONMENT'],
            'sub_title' => ['ar' => 'موظفي','en' => 'EMPLOYEES'],
            'slug' => Str::slug('SMART BUILDINGS OF VARIOUS SIZES'),
            'counter' => 'FULL',
        ]);

        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block->id,
            'title' => ['ar' => ' بيئة عمل متكاملة','en' => 'INTEGRATED WORK ENVIRONMENT'],
            'sub_title' => ['ar' => 'موظفي','en' => 'EMPLOYEES'],
            'slug' => Str::slug('SMART BUILDINGS OF VARIOUS SIZES'),
            'counter' => 'FULL',
        ]);

        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block->id,
            'title' => ['ar' => ' بيئة عمل متكاملة','en' => 'INTEGRATED WORK ENVIRONMENT'],
            'sub_title' => ['ar' => 'موظفي','en' => 'EMPLOYEES'],
            'slug' => Str::slug('SMART BUILDINGS OF VARIOUS SIZES'),
            'counter' => 'FULL',
        ]);

        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block->id,
            'title' => ['ar' => ' بيئة عمل متكاملة','en' => 'INTEGRATED WORK ENVIRONMENT'],
            'sub_title' => ['ar' => 'موظفي','en' => 'EMPLOYEES'],
            'slug' => Str::slug('SMART BUILDINGS OF VARIOUS SIZES'),
            'counter' => 'FULL',
        ]);

        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block->id,
            'title' => ['ar' => ' بيئة عمل متكاملة','en' => 'INTEGRATED WORK ENVIRONMENT'],
            'sub_title' => ['ar' => 'موظفي','en' => 'EMPLOYEES'],
            'slug' => Str::slug('SMART BUILDINGS OF VARIOUS SIZES'),
            'counter' => 'FULL',
        ]);

        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block->id,
            'title' => ['ar' => ' بيئة عمل متكاملة','en' => 'INTEGRATED WORK ENVIRONMENT'],
            'sub_title' => ['ar' => 'موظفي','en' => 'EMPLOYEES'],
            'slug' => Str::slug('SMART BUILDINGS OF VARIOUS SIZES'),
            'counter' => 'FULL',
        ]);



        /* Live */

        $live_slider = Slider::create([
            'title' => ['ar' => 'سلايدر صفحة لايف','en' => 'live page slider '],
            'slug' => Str::slug('live page slider'),
        ]);

        $slide1 = Slide::create([
            'slider_id' => $live_slider->id,
            'title' => ['ar' => 'سلايد 1  ','en' => 'slide 1 '],
            'slug' => Str::slug('slide 1'),
            'image' => 'assets/images/live-s-1.png',
            'url_text' => ['ar' => 'احجز وحدتك السكنية','en' => 'BOOK YOUR RESIDENTIAL UNIT'],
            'url_link' => '#',

        ]);

        $slide2 = Slide::create([
            'slider_id' => $live_slider->id,
            'title' => ['ar' => 'سلايد 1  ','en' => 'slide 1 '],
            'slug' => Str::slug('slide 1'),
            'image' => 'assets/images/live-s-1.png',
            'url_text' => ['ar' => 'احجز وحدتك السكنية','en' => 'BOOK YOUR RESIDENTIAL UNIT'],
            'url_link' => '#',

        ]);

        $slide3 = Slide::create([
            'slider_id' => $live_slider->id,
            'title' => ['ar' => 'سلايد 1  ','en' => 'slide 1 '],
            'slug' => Str::slug('slide 1'),
            'image' => 'assets/images/live-s-1.png',
            'url_text' => ['ar' => 'احجز وحدتك السكنية','en' => 'BOOK YOUR RESIDENTIAL UNIT'],
            'url_link' => '#',

        ]);


        $live = Page::create([
            'title' => ['ar' => 'لايف','en' => 'Live'],
            'sub_title' => ['ar' => '"تحقق من شقتك المستقبلية"','en' => 'CHECK YOUR FUTURE APARTMENT'],
            'slug' => Str::slug('live'),
            'desc' => [
                'ar' => 'From Saudi Arabia, the leading investment force, Laysen Valley will shape the future of Riyadh to be an advanced model of an integrated environment with several activities, which will fulfill the Kingdom’s Vision2030of improving the quality of life, enhancing trade and pushing the economy forward.',
                'en' => 'من المملكة العربية السعودية ، القوة الاستثمارية الرائدة ، سيشكل وادي ليسن مستقبل الرياض ليكون نموذجًا متقدمًا لبيئة متكاملة مع العديد من الأنشطة ، والتي ستحقق رؤية المملكة 2030 لتحسين نوعية الحياة وتعزيز التجارة ودفع الاقتصاد إلى الأمام.'
            ],
            'image' => '',
            'slider_id' => $live_slider->id,
        ]);

        $block = Block::create([
            'title' => ['ar' => ' احصائيات لايف','en' => 'live analytics'],
            'slug' => Str::slug('live analytics'),
        ]);

        $live->blocks()->syncWithoutDetaching($block->id);


        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block->id,
            'title' => ['ar' => ' 3 غرف نوم','en' => '3 BEDROOMS'],
            'sub_title' => ['ar' => '','en' => ''],
            'slug' => Str::slug('3 BEDROOMS'),
            'counter' => '',
            'image' => 'assets/images/live-1.png',
            'icon' => 'assets/images/live-icon-1.png',
        ]);


        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block->id,
            'title' => ['ar' => 'غرف واسعة','en' => 'WIDE ROOMS'],
            'sub_title' => ['ar' => '','en' => ''],
            'slug' => Str::slug('WIDE ROOMS'),
            'counter' => '',
            'image' => 'assets/images/live-2.png',
            'icon' => 'assets/images/live-icon-2.png',
        ]);


        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block->id,
            'title' => ['ar' => ' 5 عمائر','en' => '5 BUILDINGS'],
            'sub_title' => ['ar' => '','en' => ''],
            'slug' => Str::slug('5 BUILDINGS'),
            'counter' => '',
            'image' => 'assets/images/live-3.png',
            'icon' => 'assets/images/live-icon-3.png',
        ]);

 
        $contact_us = Page::create([
            'title' => ['ar' => 'اتصل بنا','en' => 'Contact Us'],
            'sub_title' => ['ar' => 'تحتاج للتواصل معنا؟','en' => 'NEED TO GET IN TOUCH WITH US?'],
            'slug' => Str::slug('Contact Us'),
            'desc' => [
                'ar' => 'From Saudi Arabia, the leading investment force, Laysen Valley will shape the future of Riyadh to be an advanced model of an integrated environment with several activities, which will fulfill the Kingdom’s Vision2030of improving the quality of life, enhancing trade and pushing the economy forward.',
                'en' => 'من المملكة العربية السعودية ، القوة الاستثمارية الرائدة ، سيشكل وادي ليسن مستقبل الرياض ليكون نموذجًا متقدمًا لبيئة متكاملة مع العديد من الأنشطة ، والتي ستحقق رؤية المملكة 2030 لتحسين نوعية الحياة وتعزيز التجارة ودفع الاقتصاد إلى الأمام.'
            ],
            'image' => 'assets/images/contact-bg',
            'slider_id' => null,
        ]);


        $page = Page::create([
            'title' => ['ar' => 'سياسية الخصوصية','en' => 'privacy policy'],
            'slug' => Str::slug('privacy policy'),
            'desc' => [
                'en' => 'privacy policy privacy policy privacy policy privacy policy privacy policy privacy policy privacy policy privacy policy privacy policy privacy policy privacy policy privacy policy .',
                'ar' => 'سياسية الخصوصية سياسية الخصوصية سياسية الخصوصية سياسية الخصوصية سياسية الخصوصية سياسية الخصوصية سياسية الخصوصية سياسية الخصوصية سياسية الخصوصية سياسية الخصوصية سياسية الخصوصية سياسية الخصوصية '
            ],
            'image' => 'assets/images/about.png',
        ]);

        $page = Page::create([
            'title' => ['ar' => 'شروط الاستخدام','en' => 'trems of use'],
            'slug' => Str::slug('trems of use'),
            'desc' => [
                'en' => 'trems of use trems of use trems of use trems of use trems of use trems of use trems of use trems of use trems of use trems of use trems of use trems of use trems of use trems of use trems of use trems of use trems of use trems of use .',
                'ar' => 'شروط الاستخدام شروط الاستخدام شروط الاستخدام شروط الاستخدام شروط الاستخدام شروط الاستخدام شروط الاستخدام شروط الاستخدام شروط الاستخدام شروط الاستخدام شروط الاستخدام شروط الاستخدام شروط الاستخدام شروط الاستخدام شروط الاستخدام   .'
            ],
            'image' => 'assets/images/about.png',
        ]);



        $block = Block::create([
            'title' => ['ar' => ' روح نجد مع الحداثة','en' => 'THE SPIRIT OF NAJD, COMBINED WITH MODERNITY'],
            'slug' => Str::slug('THE SPIRIT OF NAJD, COMBINED WITH MODERNITY'),
            'desc' => [
                'en' => 'The distinctive, vibrant design of Laysen Valley is inspired from the Salmani architecture, which highlights the characteristics of the ancient spirit of Najd and the spirit of modernity.',
                'ar' => 'التصميم المميز والحيوي لوادي ليسن مستوحى من العمارة السلماني التي تسلط الضوء على خصائص الروح القديمة لنجد وروح الحداثة.'
            ],

        ]);




        $block7 = Block::create([
            'title' => ['ar' => ' بلوك ٧ دقائق','en' => '7 minutes block'],
            'slug' => Str::slug('7 minutes block'),

        ]);



        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block7->id,
            'title' => ['ar' => 'arrow','en' => 'arrow'],
            'sub_title' => ['ar' => 'دقائق','en' => 'Minutes'],
            'slug' => Str::slug('arrow'),
            'counter' => 7,
            'image' => 'assets/images/minute-1.png',
        ]);

        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block7->id,
            'title' => ['ar' => 'DQ','en' => 'DQ'],
            'sub_title' => ['ar' => 'دقائق','en' => 'Minutes'],
            'slug' => Str::slug('dq'),
            'counter' => 7,
        ]);

        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block7->id,
            'title' => ['ar' => 'gruad','en' => 'gruad'],
            'sub_title' => ['ar' => 'دقائق','en' => 'Minutes'],
            'slug' => Str::slug('gruad'),
            'counter' => 7,
            'image' => 'assets/images/minute-3.png',
        ]);


        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block7->id,
            'title' => ['ar' => 'KING KHALID EYE SPECIALIST HOSPITAL','en' => 'KING KHALID EYE SPECIALIST HOSPITAL'],
            'sub_title' => ['en' => 'KING KHALID EYE SPECIALIST HOSPITAL','ar' => 'مستشفى الملك خالد للعيون'],
            'slug' => Str::slug('kkh'),
            'image' => 'assets/images/96IuiCCe_400x4002.png',
        ]);

        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $block7->id,
            'title' => ['ar' => 'plane','en' => 'plane'],
            'sub_title' => ['ar' => 'دقائق','en' => 'Minutes'],
            'slug' => Str::slug('plane'),
            'counter' => 7,
            'image' => 'assets/images/minute-4.png',
        ]);



        $counters = Block::create([
            'title' => ['ar' => ' counters','en' => 'counters'],
            'slug' => Str::slug('counters'),

        ]);


        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $counters->id,
            'title' => ['ar' => 'من الربع الدبلوماسي','en' => 'FROM DIPLOMATIC QUARTER'],
            'sub_title' => ['ar' => 'دقيقتين','en' => '2 MINUTES'],
            'slug' => Str::slug('FROM DIPLOMATIC QUARTER'),
        ]);

        
        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $counters->id,
            'title' => ['ar' => ' من جامعة الملك سعود','en' => 'FROM KING SAUD UNIVERSITY'],
            'sub_title' => ['ar' => ' 3 دقائق','en' => '3 Minutes'],
            'slug' => Str::slug('3 MINUTES FROM KING SAUD UNIVERSITY'),
            'image' => 'assets/images/green-1.png',
        ]);


        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $counters->id,
            'title' => ['ar' => ' من بوابة الدرعية','en' => 'FROM THE DIRIYAH GATE'],
            'sub_title' => ['ar' => 'دقائق 7','en' => '7 Minutes'],
            'slug' => Str::slug('FROM THE DIRIYAH GATE'),
            'image' => 'assets/images/green-2.png',
        ]);



        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $counters->id,
            'title' => ['ar' => 'من المطار','en' => 'FROM THE AIRPORT'],
            'sub_title' => ['ar' => 'دقائق 29','en' => '29 Minutes'],
            'slug' => Str::slug('FROM THE AIRPORT'),
            'image' => 'assets/images/green-3.png',
        ]);



        $info_block = Block::create([
            'title' => ['ar' => 'بلوك المعلومات','en' => 'Info Block'],
            'slug' => Str::slug('info_block'),

        ]);


        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $info_block->id,
            'title' => ['ar' => 'موظفين','en' => 'EMPLOYEES'],
            'sub_title' => ['ar' => 'موظفين','en' => 'EMPLOYEES'],
            'slug' => Str::slug('EMPLOYEES'),
            'counter' => "+12,000",
            'image' => 'assets/images/counter-1.png',

        ]);


        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $info_block->id,
            'title' => ['ar' => 'المقيمين في الفندق والمنطقة السكنية','en' => 'RESIDENTS IN THE HOTEL & THE RESIDENTIAL AREA'],
            'sub_title' => ['ar' => 'موظفين','en' => 'EMPLOYEES'],
            'slug' => Str::slug('RESIDENTS IN THE HOTEL & THE RESIDENTIAL AREA'),
            'counter' => "+7000",
            'image' => 'assets/images/counter-1.png',

        ]);


        $attribute = Attribute::create([
            'attributable_type' => 'App\Models\Block',
            'attributable_id' => $info_block->id,
            'title' => ['ar' => 'زوار في اليوم','en' => 'VISITORS PER DAY'],
            'sub_title' => ['ar' => 'موظفين','en' => 'EMPLOYEES'],
            'slug' => Str::slug('VISITORS PER DAY'),
            'counter' => "+4,500",
            'image' => 'assets/images/counter-1.png',

        ]);

 
    }
}
