<?php

namespace Tests\Unit;

use App\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * Check tasks list page
     * @return void
     */
    public function testGetCurrentTasksList()
    {
        $response = $this->call('GET', 'current_tasks');
        $response->assertStatus(200);
    }

    /**
     * Check tasks list page
     * @return void
     */
    public function testGetArchivedTasksList()
    {
        $response = $this->call('GET', 'archived_tasks');
        $response->assertStatus(200);
    }
}
