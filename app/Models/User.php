<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Course;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'google_id',
        'fb_id',
        'profile_picture',
        'phone_number',
        'slug',
        'affiliate_link',
        'facebook',
        'linkedin',
        'applied',
        'designation',
        'experties',
        'about_me',
        'note',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Always encrypt password when it is updated.
     *
     * @param $value
     * @return string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    public function instructedCourses()
    {
        return $this->hasMany(Course::class,'user_id','id');
    }


    public function enrollmentItems()
    {
        return $this->hasMany(EnrollmentItem::class,'student_id','id');
    }

    // public function enrolledCourses()
    // {
    //     return $this->hasMany(EnrollmentItem::class,'student_id','id')
    //     ->join('courses','enrollment_items.course_id','courses.id');
    // }


}
