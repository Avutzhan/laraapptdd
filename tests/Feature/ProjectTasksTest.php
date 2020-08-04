<?php

namespace Tests\Feature;

use App\Project;
use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cannot_add_tasks_to_projects()
    {
        $project = factory('App\Project')->create();

        $this->post($project->path() . '/tasks')->assertRedirect('login');
    }

    /** @test */
    public function only_the_owner_of_a_project_may_add_task()
    {
        $this->signIn();

        $project = factory('App\Project')->create();

        $this->post($project->path() . '/tasks', ['body' => 'Test Task'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', ['body' => 'Test Task']);
    }

    /** @test */
    public function only_the_owner_of_a_project_may_update_task()
    {
        $this->signIn();

        $project = ProjectFactory::withTasks(1)->create();

//        $project = factory('App\Project')->create();
//
//        $task = $project->addTask('Test Task');

        $this->patch($project->tasks->first()->path(), ['body' => 'changed'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', ['body' => 'changed']);
    }

    /** @test **/
    public function a_project_can_have_tasks()
    {
//        $this->signIn();
//
//
//        $project = auth()->user()->projects()->create(
//            factory(Project::class)->raw()
//        );
//
        $project = ProjectFactory::create();

        $this->actingAs($project->owner)
            ->post($project->path() . '/tasks', ['body' => 'Test Task']);

        $this->get($project->path())
            ->assertSee('Test Task');
    }

    /** @test **/
    public function a_task_can_be_updated()
    {
//        $project = app(ProjectFactory::class)
////            ->ownedBy($this->signIn())
//            ->withTasks(1)
//            ->create();

        $project = ProjectFactory::withTasks(1)->create();
//тут момент мы не можем юзать withTasks потому что метод не статический
        //но если мы добавим в начали пути фасад то мы сможем юзать его


//        $project = auth()->user()->projects()->create(
//            factory(Project::class)->raw()
//        );
//
//        $task = $project->addTask('Test Task');

        $this->actingAs($project->owner)
//            ->patch($project->path() . '/tasks/' . $project->tasks->first()->id, [
            ->patch($project->tasks->first()->path(), [
            'body' => 'changed',
            'completed' => true
        ]);

        $this->assertDatabaseHas('tasks', [
            'body' => 'changed',
            'completed' => true
        ]);

    }

    /** @test **/
    public function a_task_requires_a_body()
    {
//        $this->signIn();
//
//        $project = auth()->user()->projects()->create(
//            factory(Project::class)->raw()
//        );

        $project = ProjectFactory::create();

        $attributes = factory('App\Task')->raw(['body' => '']);

        $this->actingAs($project->owner)
            ->post($project->path() . '/tasks' , $attributes)
            ->assertSessionHasErrors('body');
    }
}
