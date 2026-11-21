@extends('layouts.app', ['title' => 'Tasks for Today | Welcome'])

@section('content')
<section class="intro">
    <p class="eyebrow">WELCOME BACK, EIRHIZ</p>
    <h1>Tasks for<br><span>today.</span></h1>
    <p class="lead">A focused view of the work scheduled for today. Keep the list short, clear, and ready to check.</p>
</section>

<section class="task-panel">
    <div class="panel-heading"><h2>Today’s list</h2><span>{{ $todayTasks->count() }} tasks</span></div>
    @forelse ($todayTasks as $task)
        <div class="task-row">
            <span class="task-dot {{ str_replace(' ', '-', $task->status) }}"></span>
            <span class="task-title">{{ $task->title }}</span>
            <span class="task-status">{{ ucfirst($task->status) }}</span>
        </div>
    @empty
        <p class="empty-state">There are no tasks scheduled for today.</p>
    @endforelse
</section>
@endsection
