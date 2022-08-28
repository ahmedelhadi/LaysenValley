<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Setting::create([
            'name' => 'email',
            'value' => 'info@laysenvalley.sa',
        ]);

        Setting::create([
            'name' => 'phone',
            'value' => '+966540430000',
        ]);


        Setting::create([
            'name' => 'instagram',
            'value' => 'http://instagram.com',
        ]);


        Setting::create([
            'name' => 'facebook',
            'value' => '#',
        ]);

        Setting::create([
            'name' => 'linkedin',
            'value' => '#',
        ]);

        Setting::create([
            'name' => 'pinterest',
            'value' => '#',
        ]);


        Setting::create([
            'name' => 'twitter',
            'value' => '#',
        ]);

        Setting::create([
            'name' => 'youtube',
            'value' => '#',
        ]);

     


    }
}
