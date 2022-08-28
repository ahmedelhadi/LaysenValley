<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Setting;

class Setting extends Model
{
    use HasFactory,SoftDeletes;

    public function getValue($name)
    {
        $setting = Setting::where('name',$name)->first();

        if ($setting) {
            return $setting->value;
        }
        return false;
    }

}
