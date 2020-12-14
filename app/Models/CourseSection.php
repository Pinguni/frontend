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
}
