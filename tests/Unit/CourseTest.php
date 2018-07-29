<?php

namespace Tests\Unit;

use App\Course;
use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_has_a_type()
    {
        $course = create(Course::class);

        $this->assertInstanceOf(Category::class, $course->type);
    }

    /** @test */
    function it_has_a_modality()
    {
        $course = create(Course::class);

        $this->assertInstanceOf(Category::class, $course->modality);
    }

    /** @test */
    function it_has_a_shift()
    {
        $course = create(Course::class);

        $this->assertInstanceOf(Category::class, $course->shift);
    }

    /** @test */
    function it_has_an_occupation_area()
    {
        $course = create(Course::class);

        $this->assertInstanceOf(Category::class, $course->occupationArea);
    }
}
