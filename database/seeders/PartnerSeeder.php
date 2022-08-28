<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partner = Partner::create([
            'title' => ['ar' => 'شركة','en' => 'company'],
            'desc' => ['ar' => 'شركة','en' => 'company'],
            'logo' => 'assets/images/logo-1.png',
            'url' => '#',
        ]);

        $partner = Partner::create([
            'title' => ['ar' => 'شركة','en' => 'company'],
            'desc' => ['ar' => 'شركة','en' => 'company'],
            'logo' => 'assets/images/logo-2.png',
            'url' => '#',
        ]);

        $partner = Partner::create([
            'title' => ['ar' => 'شركة','en' => 'company'],
            'desc' => ['ar' => 'شركة','en' => 'company'],
            'logo' => 'assets/images/logo-3.png',
            'url' => '#',
        ]);

        $partner = Partner::create([
            'title' => ['ar' => 'شركة','en' => 'company'],
            'desc' => ['ar' => 'شركة','en' => 'company'],
            'logo' => 'assets/images/logo-4.png',
            'url' => '#',
        ]);

        $partner = Partner::create([
            'title' => ['ar' => 'شركة','en' => 'company'],
            'desc' => ['ar' => 'شركة','en' => 'company'],
            'logo' => 'assets/images/logo-5.png',
            'url' => '#',
        ]);

        $partner = Partner::create([
            'title' => ['ar' => 'شركة','en' => 'company'],
            'desc' => ['ar' => 'شركة','en' => 'company'],
            'logo' => 'assets/images/logo-6.png',
            'url' => '#',
        ]);

        $partner = Partner::create([
            'title' => ['ar' => 'شركة','en' => 'company'],
            'desc' => ['ar' => 'شركة','en' => 'company'],
            'logo' => 'assets/images/logo-7.png',
            'url' => '#',
        ]);

        $partner = Partner::create([
            'title' => ['ar' => 'شركة','en' => 'company'],
            'desc' => ['ar' => 'شركة','en' => 'company'],
            'logo' => 'assets/images/logo-8.png',
            'url' => '#',
        ]);


        $partner = Partner::create([
            'title' => ['ar' => 'شركة','en' => 'company'],
            'desc' => ['ar' => 'شركة','en' => 'company'],
            'logo' => 'assets/images/logo-9.png',
            'url' => '#',
        ]);


        $partner = Partner::create([
            'title' => ['ar' => 'شركة','en' => 'company'],
            'desc' => ['ar' => 'شركة','en' => 'company'],
            'logo' => 'assets/images/logo-10.png',
            'url' => '#',
        ]);


    }
}
