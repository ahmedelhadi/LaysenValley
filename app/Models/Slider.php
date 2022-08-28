<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory , SoftDeletes;

    public $casts = ['title' => 'array', 'desc' => 'array','url_text' => 'array','sub_title' => 'array'];
    public $fillable = ['title', 'desc', 'slug', 'is_active','image','sort','url_text'];

    public function getTitle()
    {
        if (array_key_exists(App::getLocale(),$this->title)) {
            return $this->title[App::getLocale()];
        }
        return $this->title[config('app.fallback_locale')];
    }

    public function getDesc()
    {
        if (array_key_exists(App::getLocale(),$this->desc)) {
            return $this->desc[App::getLocale()];
        }
        return $this->desc[config('app.fallback_locale')];
    }



    public function slides()
    {
        return $this->hasMany('App\Models\Slide');
    }

}
