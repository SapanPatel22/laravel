<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index 
    {
    	$task = Task::all();
    	
    	return view('tasks.index',compact('task'));
    }

    public function show($id)
    {
    	$tasks = Task::find($id);
    	return view('tasks.show',compact('tasks'));
    }
}
