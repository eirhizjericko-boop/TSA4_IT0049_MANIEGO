@extends('layouts.app', ['title' => 'Tasks for Today | New Task'])
@section('content')<section class="page-heading"><p class="eyebrow">TASK MANAGEMENT</p><h1>Add a<br><span>new task.</span></h1></section><form method="POST" action="{{ route('tasks.store') }}" class="task-form">@csrf @include('tasks._form', ['submitLabel' => 'Create task'])</form>@endsection
