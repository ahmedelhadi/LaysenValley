<?php

namespace App\Models;
use App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slide extends Model
{
    use HasFactory , SoftDeletes;

    public $casts = ['title' => 'array', 'desc' => 'array' ,'url_text'=> 'array','sub_title'=> 'array'];
    public $fillable = ['title', 'sub_title' ,'desc', 'slug', 'is_active','url_link','url_text','image','sort','icon','slider_id'];

    public function getTitle()
    {
        if (array_key_exists(App::getLocale(),$this->title)) {
            return $this->title[App::getLocale()];
        }
        return $this->title[config('app.fallback_locale')];
    }


    public function getUrlText()
    {
        if (array_key_exists(App::getLocale(),$this->url_text)) {
            return $this->url_text[App::getLocale()];
        }
        return $this->url_text[config('app.fallback_locale')];
    }



    public function getSubTitle()
    {
        if (array_key_exists(App::getLocale(),$this->sub_title)) {
            return $this->sub_title[App::getLocale()];
        }
        return $this->sub_title[config('app.fallback_locale')];
    }

    public function getDesc()
    {
        if (array_key_exists(App::getLocale(),$this->desc)) {
            return $this->desc[App::getLocale()];
        }
        return $this->desc[config('app.fallback_locale')];
    }
}
