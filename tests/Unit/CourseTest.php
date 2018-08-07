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

    /** @test */
    function it_has_a_target_audience()
    {
        $course = create(Course::class);

        $this->assertInstanceOf(Category::class, $course->targetAudience);
    }

    /** @test */
    function it_has_a_default_icon_if_none_was_specified()
    {
        $course = create(Course::class);
        $this->assertSame('fas fa-graduation-cap', $course->icon);

        $course = create(Course::class, ['icon' => 'fas fa-dna']);
        $this->assertSame('fas fa-dna', $course->icon);
    }
}
