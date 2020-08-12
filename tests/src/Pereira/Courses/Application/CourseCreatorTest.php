<?php


declare(strict_types=1);


namespace MN\Tests\Pereira\Courses\Application;


use MN\Pereira\Courses\Application\CourseCreator;
use MN\Pereira\Courses\Domain\Course;
use MN\Pereira\Courses\Domain\CourseRepository;
use PHPUnit\Framework\TestCase;

final class CourseCreatorTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_create_a_valid_course(): void
    {
        $repository = $this->createMock(CourseRepository::class);
        $creator = new CourseCreator($repository);

        $id = 'some-id';
        $name = 'some-name';
        $duration = 'some-duration';

        $course = new Course($id, $name, $duration);
        $repository->method('save')->with($course);

        $creator->__invoke($id, $name, $duration);
    }
}