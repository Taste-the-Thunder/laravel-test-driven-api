<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    use RefreshDatabase;

    public function test_fetch_all_todo_list(): void
    {
       // preperation / prepare
       TodoList::factory()->create();

       // action / perform
       $response = $this->getJson(route('todo-list.store'));

       // assertion / predict
       $this->assertEquals(1,count($response->json()));
    }

    public function test_fetch_single_todo_list()
    {
        // prepration
        $list = TodoList::factory()->create();

        // action
        $response = $this->getJson(route('todo-list.show',$list->id))->assertOk()->json();

        // assertion
        // $response->assertOk();
        $this->assertEquals($response['name'], $list->name);
    }
}
