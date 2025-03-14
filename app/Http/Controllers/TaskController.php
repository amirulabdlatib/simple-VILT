<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('user_id',Auth::id())->get();

        return Inertia::render('Tasks/Index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Tasks/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        Task::create([
            'user_id' => Auth::id(),
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        return redirect()->route('tasks.index')->with('message','You have successfully create a task.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return Inertia::render('Tasks/Show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return Inertia::render('Tasks/Edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {    
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
    
        $task->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    
        return redirect()->route('tasks.index')->with('message', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if($task->user_id !== Auth::id()){
            abort(403);
        }

        $task->delete();

        return back()->with('message','Task Deleted successfully.');
    }
}
