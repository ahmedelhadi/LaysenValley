<?php

namespace App\Models;
use App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use HasFactory , SoftDeletes;

    public $casts = ['id' => 'string','title' => 'array','desc'=>'array'];
    public $fillable = ['id','title','desc' , 'url', 'mobile', 'email','proof_file','user_id' ,'kind_id' ,'logo','portfolio' ,'type','social_security','wathq', 'slug','is_active','cod'];


    public function getTitle()
    {
        if (array_key_exists(App::getLocale(),$this->title)) {
            return $this->title[App::getLocale()];
        }
        return $this->title[config('app.fallback_locale')];
    }

    public function getDesc()
    {
        if (array_key_exists(App::getLocale(),$this->title)) {
            return $this->desc[App::getLocale()];
        }
        return $this->desc[config('app.fallback_locale')];
    }

    public function kind()
    {
        return $this->belongsTo('App\Models\Kind');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withPivot('type','is_active','is_approved')->withTimestamps();
    }

    public function dnas()
    {
        return $this->hasManyThrough(DNA::class, Project::class);
    }
    public function countPlayslist()
    {
        $dnas= $this->dnas;
        $count = 0;
        foreach($dnas as $dna){
            $count+=count($dna->playlists) ?? 0;
        }
        return $count;
    }
   
}
