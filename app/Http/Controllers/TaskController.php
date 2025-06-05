<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //
    public function index()
    {
        $tasks = Task::all();
    }

    public function create()
    {
        //return view('tasks.create');
    }

    public function store(Request $request) {}

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

}
