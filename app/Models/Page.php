<?php

namespace App\Models;
use App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    public $casts = ['title' => 'array','desc'=> 'array','sub_title'=> 'array'];
    public $fillable = ['title','desc' ,'image','slug','is_active','sort','url_text','url_link','sub_title'];

    public function getTitle()
    {
        if (array_key_exists(App::getLocale(),$this->title)) {
            return $this->title[App::getLocale()];
        }
        return $this->title[config('app.fallback_locale')];
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

    public function blocks()
    {
        return $this->belongsToMany('App\Models\Block')->withTimestamps();
    }

    public function slider()
    {
        return $this->belongsTo('App\Models\Slider');
    }


    

}
