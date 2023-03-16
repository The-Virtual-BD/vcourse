<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'thumbnail',
        'instructor',
        'category',
        'price',
        'time_duration',
        'media_link',
        'rating_number',
        'rating_quantity',
        'number_of_lessons',
        'student_enrolled',
        'discount',
        'timing',
        'venu',
        'description',
        'requirments',
        'forwho',
        'what_will_learn'
    ];

    protected $with = ['user'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function batches(){
        return $this->hasMany(Batch::class);
    }

    public function nextBatch() {
        return $this->batches()->where('status','=', '1');
    }

    public function runningBatch() {
        return $this->batches()->where('status','=', '2');
    }

    public function completedBatchs() {
        return $this->batches()->where('status','=', '3');
    }

    public function enrollItems() {
        return $this->hasMany(EnrollmentItem::class,'course_id');
    }

}




