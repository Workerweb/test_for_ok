<?php

namespace App\Http\Controllers;


use App\Task;
use App\TaskFilter;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
    	$tasks = Task::all();

        $tasks = (new TaskFilter($tasks, $request))->apply()->get();

        return view();
    }
}
