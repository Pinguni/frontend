<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    use HasFactory;

    protected $fillable = ['sort'];

    /**
     * The course that the section belongs to.
     */
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    /**
     * The pages that belong to the section.
     */
    public function pages()
    {
        return $this->hasMany('App\Models\CoursePage');
    }
}
