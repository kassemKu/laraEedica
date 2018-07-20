<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Course extends Model implements HasMedia
{

    use HasMediaTrait;

    protected $table = 'courses';
    protected $fillable = [
        'title', 'slug', 'description', 'price',
        'course_start', 'publish', 'user_id'
    ];

    
    protected $hidden = [];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }

    public function scopePublish($query) {
        return $query->where('publish', '>', 0);
    }
    
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('course_img')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('card')
                    ->width(368)
                    ->height(232);
                $this->addMediaConversion('banner')
                    ->width(1260)
                    ->height(450);
            });
            
    }
}
