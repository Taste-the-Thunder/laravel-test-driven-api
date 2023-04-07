<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TodoListController extends Controller
{
    public function index()
    {
        $lists = TodoList::all();
        return response($lists);
    }
    public function show(TodoList $todolist)
    {
        return response($todolist);
    }
    public function store(Request $request)
    {
        $list = TodoList::create($request->all());
        // return response($list,Response::HTTP_CREATED);
        return $list;
    }
}
