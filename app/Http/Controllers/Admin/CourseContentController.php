<?php

namespace App\Http\Controllers\Admin;

class CourseContentController extends CourseFeaturesController
{
    protected function feature()
    {
        return 'content';
    }
}
