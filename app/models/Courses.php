<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'courses';
    // protected $sguarded=[];

    protected $fillable = [
        'name_ar',
        'name_en',
        'details_ar',
        'details_en',
        'number_of_lessons',
        'category_id',
        'chief_id',
        'image'
    ];

    public function courseChief()
    {
        return $this->belongsTo('App\Chief','chief_id');
    }

    public function courseCategory()
    {
        return $this->belongsTo('App\models\Categories','category_id');
    }

    public function userCoursesBooking()
    {
        return $this->belongsToMany('App\User','user_courses_booking','user_id','course_id');
    }

    public function coursesBooking()
    {
        return $this->hasMany('App\models\UserCoursesBooking', 'course_id');
    }

    public function userCoursesFavoriteList()
    {
        return $this->belongsToMany('App\User','user_courses_favorite_list','user_id','course_id');
    }

    public function coursesFavoriteList()
    {
        return $this->hasMany('App\models\UserCoursesFavoriteList', 'course_id');
    }

    public function coursesLessons()
    {
        return $this->hasMany('App\models\CoursesLessons', 'course_id');
    }

}
