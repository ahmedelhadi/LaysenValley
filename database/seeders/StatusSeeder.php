<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         $statuses = [

                        [
                         'title' =>[
                            'ar' => 'جديد',
                            'en' => 'new',
                        ],

                           'type' => 'request',
                           'color'=>'#e2e3e5',
                        ],

                        [
                         'title' =>[
                            'ar' => 'قيد الدراسة',
                            'en' => 'under consideration',
                        ],

                           'type' => 'request',
                           'color'=>'#cce5ff',
                        ],

                        [
                         'title' =>[
                            'ar' => 'قيد توقيع العقد',
                            'en' => 'under contract sign',
                        ],

                           'type' => 'request',
                           'color'=>'#d1ecf1',
                        ],
                        [
                         'title' =>[
                            'ar' => 'مكتمل',
                            'en' => 'Complete',
                        ],

                           'type' => 'request',
                           'color'=>'#198754',
                        ]

         ];


         foreach ($statuses as $status) {
             Status::create(['slug' => Str::slug($status['title']['en']) ,'title' => $status['title'] ,'desc' => $status['title'],'type' => $status['type'],'color' => $status['color']]);
         }
    }
}
