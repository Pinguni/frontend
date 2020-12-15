<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePage extends Model
{
    use HasFactory;

    /**
     * The section that the page belongs to.
     */
    public function section()
    {
        return $this->belongsTo('App\Models\CourseSection');
    }
}
