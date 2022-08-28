<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory , SoftDeletes;

    public $casts = ['title' => 'array', 'desc' => 'array'];
    public $fillable = ['title', 'desc', 'slug', 'is_active','type','color','image','sort'];

    public function getTitle()
    {
        if (array_key_exists(App::getLocale(),$this->title)) {
            return $this->title[App::getLocale()];
        }
        return $this->title[config('app.fallback_locale')];
    }

    public function getDesc()
    {
        if (!empty($this->desc)) {
            if (array_key_exists(App::getLocale(),$this->desc)) {
                return $this->desc[App::getLocale()];
            }
            return $this->desc[config('app.fallback_locale')];
        }
    }

}
