<?php

namespace App\Models;
use App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory,SoftDeletes;
    public $casts = ['title' => 'array', 'desc' => 'array','url_text' => 'array','sub_title' => 'array'];

    protected $fillable = [
        'id',
        'attributable_type',
        'attributable_id',
        'title',
        'slug',
        'desc',
        'icon',
        'image',
        'video_id',
        'button_text',
        'button_link',
        'is_active',
        'sub_title',
        'counter'
    ];


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
}
