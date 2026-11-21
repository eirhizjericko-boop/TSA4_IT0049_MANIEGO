@if ($errors->any()) <div class="error-list"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div> @endif
<label for="title">Task title</label><input id="title" type="text" name="title" value="{{ old('title', $task->title ?? '') }}" required>
<label for="status">Status</label><select id="status" name="status" required><option value="pending" @selected(old('status', $task->status ?? '') === 'pending')>Pending</option><option value="in progress" @selected(old('status', $task->status ?? '') === 'in progress')>In progress</option><option value="done" @selected(old('status', $task->status ?? '') === 'done')>Done</option></select>
<label for="task_date">Task date</label><input id="task_date" type="date" name="task_date" value="{{ old('task_date', isset($task) ? $task->task_date->format('Y-m-d') : '') }}" required>
<button class="button" type="submit">{{ $submitLabel }}</button>
