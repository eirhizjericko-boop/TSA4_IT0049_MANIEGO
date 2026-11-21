<?php

namespace App\Http\Controllers;

use App\Mail\TaskCompletedMail;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function welcome()
    {
        $todayTasks = Task::where('is_archived', false)->whereDate('task_date', Carbon::today())->orderBy('title')->get();
        return view('tasks.welcome', compact('todayTasks'));
    }

    public function index()
    {
        $tasks = Task::where('is_archived', false)->orderBy('task_date')->orderBy('title')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create() { return view('tasks.create'); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:pending,in progress,done'],
            'task_date' => ['required', 'date'],
        ]);
        Task::create($validated);
        return redirect()->route('tasks.index')->with('success', 'Task created.');
    }

    public function edit(Task $task)
    {
        abort_if($task->is_archived, 404);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        abort_if($task->is_archived, 404);
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:pending,in progress,done'],
            'task_date' => ['required', 'date'],
        ]);
        $wasAlreadyDone = $task->status === 'done';
        $task->update($validated);
        if (! $wasAlreadyDone && $task->status === 'done') {
            Mail::to(config('tasks.notification_recipient'))->send(new TaskCompletedMail($task));
        }
        return redirect()->route('tasks.index')->with('success', 'Task updated.');
    }

    public function destroy(Task $task)
    {
        $task->update(['is_archived' => true]);
        return redirect()->route('tasks.index')->with('success', 'Task archived.');
    }
}
