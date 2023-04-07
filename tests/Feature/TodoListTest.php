<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    use RefreshDatabase;

    private $list;
    public function setUp(): void
    {
        parent::setUp();
        $this->list = TodoList::factory()->create();
    }

    public function test_fetch_all_todo_list(): void
    {
       // preperation / prepare


       // action / perform
       $response = $this->getJson(route('todo-list.store'));

       // assertion / predict
       $this->assertEquals(1,count($response->json()));
    }

    public function test_fetch_single_todo_list()
    {
        // prepration


        // action
        $response = $this->getJson(route('todo-list.show',$this->list->id))->assertOk()->json();

        // assertion
        $this->assertEquals($response['name'], $this->list->name);
    }
}
