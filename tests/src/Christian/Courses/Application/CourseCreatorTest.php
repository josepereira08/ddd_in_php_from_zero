<?php


declare(strict_types=1);


namespace MN\Tests\Christian\Courses\Application;


use MN\Christian\Courses\Application\CourseCreator;
use MN\Christian\Courses\Application\CreateCourseRequest;
use MN\Tests\Christian\Courses\CoursesModuleUnitTestCase;
use MN\Tests\Christian\Courses\Domain\CourseMother;

final class CourseCreatorTest extends CoursesModuleUnitTestCase
{
    private $creator;

    protected function setUp()
    {
        parent::setUp();
        $this->creator = new CourseCreator($this->repository());
    }

    /**
     * @test
     */
    public function it_should_create_a_valid_course(): void
    {
        $course = CourseMother::random();
        $this->shouldSave($course);

        $this->creator->__invoke(new CreateCourseRequest(
            $course->id()->value(),
            $course->name()->value(),
            $course->duration()->value()
        ));
    }
}