<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Course;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','icon'];
    /**
     * Get all of the courses for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function courseQuentity()
    {
        return $this->courses()->count();
    }

}
