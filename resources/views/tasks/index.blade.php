@extends('layouts.app', ['title' => 'Tasks for Today | All Tasks'])

@section('content')
<section class="page-heading"><p class="eyebrow">TASK MANAGEMENT</p><h1>Every task,<br><span>in order.</span></h1><p class="lead">Create, update, and archive the work scheduled for today.</p></section>
<section class="task-panel">
    <div class="panel-heading"><h2>Task list</h2><span>{{ $tasks->count() }} active</span></div>
    @forelse ($tasks as $task)
        <div class="task-row"><span class="task-date">{{ $task->task_date->format('M d') }}</span><span class="task-title">{{ $task->title }}</span><span class="task-status">{{ ucfirst($task->status) }}</span><span class="task-actions"><a href="{{ route('tasks.edit', $task) }}">Edit</a><form method="POST" action="{{ route('tasks.destroy', $task) }}">@csrf @method('DELETE')<button type="submit">Archive</button></form></span></div>
    @empty <p class="empty-state">There are no active tasks.</p> @endforelse
</section>
@endsection
