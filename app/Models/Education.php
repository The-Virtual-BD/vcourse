<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'degree_name',
        'institution_name',
        'passing_year',
        'passing_year',
        'user_id',
    ];
}
