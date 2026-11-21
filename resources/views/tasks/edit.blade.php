@extends('layouts.app', ['title' => 'Tasks for Today | Edit Task'])
@section('content')<section class="page-heading"><p class="eyebrow">TASK MANAGEMENT</p><h1>Update this<br><span>task.</span></h1></section><form method="POST" action="{{ route('tasks.update', $task) }}" class="task-form">@csrf @method('PUT') @include('tasks._form', ['submitLabel' => 'Save changes'])</form>@endsection
