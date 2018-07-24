<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Fetch all current tasks
     *
     * @return void
     */
    public function testFetchCurrentTasks() : void
    {
        $task = factory(\App\Task::class)->create([
            'archive' => false
        ]);

        $response = $this->get('/current_tasks');

        $response->assertStatus(200)
                ->assertJson([$task->toArray()]);
    }

    /**
     * Fetch all archived tasks
     *
     * @return void
     */
    public function testFetchArchivedTasks() : void
    {
        $task = factory(\App\Task::class)->create([
            'archive' => true
        ]);

        $response = $this->get('/archived_tasks');

        $response->assertStatus(200)
                ->assertJson([$task->toArray()]);
    }

    /**
     * Store new task
     *
     * @return void
     */
    public function testStoreNewTask() : void
    {
        $task = factory(\App\Task::class)->make([
            'archive' => false
        ])->toArray();

        $response = $this->post('/create_task', $task);
        $response->assertStatus(200);

        $this->assertDatabaseHas('tasks', $task);
    }

    /**
     * Edit existing task
     *
     * @return void
     */
    public function testEditExistingTask() : void
    {
        $task = factory(\App\Task::class)->create([
            'archive' => false
        ])->toArray();

        $updated_task = factory(\App\Task::class)->make([
            'id' => $task['id'],
            'archive' => false
        ])->toArray();

        $response = $this->post('/edit_task', $updated_task);
        $response->assertStatus(200);

        $this->assertDatabaseHas('tasks', $updated_task);
        $this->assertDatabaseMissing('tasks', $task);
    }

    /**
     * Archive a specific task
     *
     * @return void
     */
    public function testArchiveSpecificTask() : void
    {
        $task = factory(\App\Task::class)->create([
            'archive' => false
        ])->toArray();

        $response = $this->post('/archive_task/' . $task['id']);
        $response->assertStatus(200);

        $updated_task = \App\Task::find($task['id']);

        $this->assertEquals((bool)$updated_task->archive, !$task['archive']);
    }

    /**
     * Delete a specific task
     *
     * @return void
     */
    public function testDeleteSpecificTask() : void
    {
        $task = factory(\App\Task::class)->create()->toArray();

        $response = $this->post('/delete_task/' . $task['id']);
        $response->assertStatus(200);

        $this->assertDatabaseMissing('tasks', $task);
    }
}
