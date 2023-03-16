<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Enrollment;
class EnrollmentItem extends Model
{
    use HasFactory;


    protected $fillable = [
        'order_id', 'course_id', 'quantity', 'price'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }


    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class, 'enrollment_id');
    }
}
