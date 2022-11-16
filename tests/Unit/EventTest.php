<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Event;
use Illuminate\Foundation\Testing\DatabaseMigrations;
// use PHPUnit\Framework\TestCase;

class EventTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_list_events()
    {
        $event = Event::factory()->create();
        $response = $this->get('/events');
        $response->assertSee($event->title);
    }

    public function test_single_events()
    {
        $event = Event::factory()->create();
        $response = $this->get('/events/'.$event->id);
        $response->assertSee($event->title)
            ->assertSee($event->description);
    }

}
