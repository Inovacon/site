<?php

namespace Tests\Unit;

use App\Course;
use App\Category;
use Tests\TestCase;
use Illuminate\Support\Collection;
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
    function it_can_retrieve_the_publicly_accessible_image_path()
    {
        $course = create(Course::class, ['image_path' => 'courses/image.png']);

        $this->assertSame(asset('storage/courses/image.png'), $course->publicImagePath);
    }

    /** @test */
    function it_has_a_collection_of_content()
    {
        $content = [
            'data structures',
            'algorithms',
            'software engineering',
            'operating systems',
        ];

        $course = make(Course::class, ['content' => json_encode($content)]);

        $this->assertInstanceOf(Collection::class, $course->content);
        $this->assertCount(4, $course->content);

        $course = make(Course::class, ['content' => $content]);

        $this->assertInstanceOf(Collection::class, $course->content);
        $this->assertCount(4, $course->content);
    }

    /** @test */
    function it_has_a_collection_of_advantages()
    {
        $advantages = [
            'good',
            'very good',
        ];

        $course = make(Course::class, ['advantages' => json_encode($advantages)]);

        $this->assertInstanceOf(Collection::class, $course->advantages);
        $this->assertCount(2, $course->advantages);

        $course = make(Course::class, ['advantages' => $advantages]);

        $this->assertInstanceOf(Collection::class, $course->advantages);
        $this->assertCount(2, $course->advantages);
    }
}
