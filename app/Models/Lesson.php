<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'user_id',
        'name',
        'number',
        'media_link',
        'thumbnail',
        'description',
        'note',
    ];

    public function parentCourse()
    {
        return $this->belongsTo(Course::class);
    }
}
