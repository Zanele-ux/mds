<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HolidayTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */


    public function test_api_success()
    {
        $response = $this->get('/holidays')->assertStatus(200);
    }
}
