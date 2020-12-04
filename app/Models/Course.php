<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * The sections that belong to the course.
     */
    public function sections()
    {
        return $this->hasMany('App\Models\CourseSection');
    }
}
