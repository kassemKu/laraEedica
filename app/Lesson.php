<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Lesson extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'title', 'slug', 'description', 'lesson_content',
        'position', 'free_lesson', 'publish', 'course_id', 'type',
    ];

    protected $hidden = [];

    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }

    public function scopePublish($query) {
      return $query->where('publish', '>', 0);
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('lesson_video')
            ->singleFile();
    }
}
