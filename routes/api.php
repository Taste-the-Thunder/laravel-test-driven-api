<?php

use App\Http\Controllers\API\TodoListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('todo-list',[TodoListController::class, 'index'])->name('todo-list.store');
