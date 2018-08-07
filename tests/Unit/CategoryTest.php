<?php

namespace Tests\Unit;

use App\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Builder;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_can_be_filtered_by_modalities()
    {
        $this->assertInstanceOf(Builder::class, $builder = Category::modality());
        $this->assertContains('modality', $builder->getBindings());
    }

    /** @test */
    function it_can_be_filtered_by_course_types()
    {
        $this->assertInstanceOf(Builder::class, $builder = Category::courseType());
        $this->assertContains('course_type', $builder->getBindings());
    }

    /** @test */
    function it_can_be_filtered_by_shifts()
    {
        $this->assertInstanceOf(Builder::class, $builder = Category::shift());
        $this->assertContains('shift', $builder->getBindings());
    }

    /** @test */
    function it_can_be_filtered_by_occupation_areas()
    {
        $this->assertInstanceOf(Builder::class, $builder = Category::occupationArea());
        $this->assertContains('occupation_area', $builder->getBindings());
    }

    /** @test */
    function it_can_be_filtered_by_target_audiences()
    {
        $this->assertInstanceOf(Builder::class, $builder = Category::targetAudience());
        $this->assertContains('target_audience', $builder->getBindings());
    }

    /** @test */
    function it_can_retrieve_the_name_with_the_icon()
    {
        $category = create(Category::class, ['icon' => 'fas fa-dna']);

        $this->assertSame(
            '<i class="fas fa-dna fa-fw"></i> '.$category->name,
            $category->nameWithIcon
        );
    }
}
