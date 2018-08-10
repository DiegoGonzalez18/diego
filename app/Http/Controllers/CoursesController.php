<?php

namespace App\Http\Controllers;

use App\Course;
use function foo\func;
use Illuminate\Http\Request;

class CoursesController extends Controller
{

public function show(Course $course){
$model=$course->load([
    'category'=>function($q){
    $q->select('id','name');
    },

    'goals'=>function($q){
    $q->select('id','course_id','goal');
    },
    'level'=>function($q){
    $q->select('id','name');
    },
    'requirements'=>function($q){
    $q->select('id','course_id','requirement');
    },
    'reviews.user',
    'teacher'
])->get();
$related=$course->relatedCourses();
    return view('courses.detail', compact('course', 'related'));
}
}
