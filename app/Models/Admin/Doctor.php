<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Doctor extends Model implements HasMedia
{
    protected $guarded = ['id'];

    use InteractsWithMedia;

    public function registerMediaCollections() : void
    {
        $this->addMediaCollection('avatar')
            ->singleFile();
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class,'speciality_id','id');
    }

}
