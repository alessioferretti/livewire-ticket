<?php


// use Illuminate\Foundation\Testing\RefreshDatabase;
namespace AlessioFerretti\LivewireTicket\Tests;


use Tests\CreatesApplication;

class ExampleTest extends \Orchestra\Testbench\TestCase
{
    use CreatesApplication;
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get(route('hello',[]));

        $response->assertStatus(200);
    }
}
