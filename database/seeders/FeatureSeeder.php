<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feature;
use Illuminate\Support\Str;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feature = Feature::create([
            'title' => ['ar' => 'المباني الذكية ذات الأحجام المختلفة','en' => 'SMART BUILDINGS OF VARIOUS SIZES'],
            'desc' => ['ar' => 'المباني الذكية ذات الأحجام المختلفة','en' => 'SMART BUILDINGS OF VARIOUS SIZES'],
            'icon' => 'assets/images/feature-1.png',
            'slug' => Str::slug('SMART BUILDINGS OF VARIOUS SIZES'),
            'counter' => '+50',
        ]);

        $feature = Feature::create([
            'title' => ['ar' => 'المداخل والمخارج','en' => 'ENTRANCES AND EXITS'],
            'desc' => ['ar' => 'المداخل والمخارج','en' => 'ENTRANCES AND EXITS'],
            'icon' => 'assets/images/feature-2.png',
            'slug' => Str::slug('ENTRANCES AND EXITS'),

            'counter' => '+13',
        ]);


        $feature = Feature::create([
            'title' => ['ar' => 'مبنى مكاتب الأبراج الفندقية','en' => 'HOTEL TOWER OFFICES BUILDING'],
            'desc' => ['ar' => 'مبنى مكاتب الأبراج الفندقية','en' => 'HOTEL TOWER OFFICES BUILDING'],
            'slug' => Str::slug('HOTEL TOWER OFFICES BUILDING'),

            'icon' => 'assets/images/feature-3.png',
        ]);

        $feature = Feature::create([
            'title' => ['ar' => 'مواقف سيارات مغطاة','en' => 'COVERED PARKING LOTS'],
            'desc' => ['ar' => 'مواقف سيارات مغطاة','en' => 'COVERED PARKING LOTS'],
            'slug' => Str::slug('COVERED PARKING LOTS'),

            'icon' => 'assets/images/feature-4.png',
            'counter' => '+7000',
        ]);

        $feature = Feature::create([
            'title' => ['ar' => 'المناطق العامة والمفتوحة','en' => 'PUBLIC AND OPEN AREAS'],
            'desc' => ['ar' => 'المناطق العامة والمفتوحة','en' => 'PUBLIC AND OPEN AREAS'],
            'slug' => Str::slug('PUBLIC AND OPEN AREAS'),

            'icon' => 'assets/images/feature-5.png',
            'counter' => '+75',
        ]);

        $feature = Feature::create([
            'title' => ['ar' => 'ممشى','en' => 'WALKWAY'],
            'desc' => ['ar' => 'ممشى','en' => 'WALKWAY'],
            'slug' => Str::slug('WALKWAY'),

            'icon' => 'assets/images/feature-6.png',
            'counter' => '1,600 M',
        ]);

        $feature = Feature::create([
            'title' => ['ar' => 'تقع على الطريق الرئيسي','en' => 'LOCATED ON THE MAIN ROAD'],
            'desc' => ['ar' => 'تقع على الطريق الرئيسي','en' => 'LOCATED ON THE MAIN ROAD'],
            'slug' => Str::slug('LOCATED ON THE MAIN ROAD'),

            'icon' => 'assets/images/feature-7.png',
        ]);

        $feature = Feature::create([
            'title' => ['ar' => 'بيئة عمل متكاملة','en' => 'INTEGRATED WORK ENVIRONMENT'],
            'desc' => ['ar' => 'بيئة عمل متكاملة','en' => 'INTEGRATED WORK ENVIRONMENT'],
            'slug' => Str::slug('INTEGRATED WORK ENVIRONMENT'),

            'icon' => 'assets/images/feature-8.png',
            'counter' => '+50',
        ]);

        $feature = Feature::create([
            'title' => ['ar' => 'الهيئات المائية والمناظر الطبيعية','en' => 'WATER BODIES & LANDSCAPING'],
            'desc' => ['ar' => 'الهيئات المائية والمناظر الطبيعية','en' => 'WATER BODIES & LANDSCAPING'],
            'slug' => Str::slug('WATER BODIES & LANDSCAPING'),

            'icon' => 'assets/images/feature-9.png',
        ]);
    

        $feature = Feature::create([
            'title' => ['ar' => 'مطاعم ومقاهي ومرافق تجارية','en' => 'RESTAURANTS, CAFES COMMERCIAL FACILITIES'],
            'desc' => ['ar' => 'مطاعم ومقاهي ومرافق تجارية','en' => 'RESTAURANTS, CAFES COMMERCIAL FACILITIES'],
            'slug' => Str::slug('RESTAURANTS, CAFES COMMERCIAL FACILITIES'),

            'icon' => 'assets/images/feature-10.png',
        ]);

        $feature = Feature::create([
            'title' => ['ar' => 'مسجد يتسع لأكثر من 1000 صلاة','en' => 'MOSQUE THAT ACCOMMODATES 1,000+ PRAYERS'],
            'desc' => ['ar' => 'مسجد يتسع لأكثر من 1000 صلاة','en' => 'MOSQUE THAT ACCOMMODATES 1,000+ PRAYERS'],
            'slug' => Str::slug('MOSQUE THAT ACCOMMODATES 1,000+ PRAYERS'),

            'icon' => 'assets/images/feature-11.png',
        ]);


    }
}
