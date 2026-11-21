<?php

namespace Tests\Feature;

use App\Mail\TaskCompletedMail;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class TaskNotificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_open_the_task_creation_page(): void
    {
        $this->get(route('tasks.create'))->assertRedirect(route('login'));
    }

    public function test_completion_email_is_sent_only_on_the_first_done_update(): void
    {
        Mail::fake();
        $user = User::create([
            'username' => 'test.user',
            'full_name' => 'Test User',
            'email' => 'test.user@example.test',
            'password' => Hash::make('password'),
        ]);
        $task = Task::create([
            'title' => 'Finish the report',
            'status' => 'pending',
            'task_date' => now()->toDateString(),
        ]);

        $this->actingAs($user)->put(route('tasks.update', $task), [
            'title' => $task->title,
            'status' => 'done',
            'task_date' => now()->toDateString(),
        ])->assertRedirect(route('tasks.index'));

        Mail::assertSent(TaskCompletedMail::class, 1);

        $this->actingAs($user)->put(route('tasks.update', $task), [
            'title' => $task->title,
            'status' => 'done',
            'task_date' => now()->toDateString(),
        ]);

        Mail::assertSent(TaskCompletedMail::class, 1);
    }
}
