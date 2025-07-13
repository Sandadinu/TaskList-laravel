<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store (Request $request){
        $request -> validate(['title' => 'requested']);
        Task::create($request->only('title'));
        return redirect('/');
    }

    public function update(Task $task){
        $task->update(['completed' => !$task -> completed]);
        return redirect('/');
    }

    public function destroy(Task $task){
        $task->delete();
        return redirect('/')
    }
}
