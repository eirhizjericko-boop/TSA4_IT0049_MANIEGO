# Tasks for Today TSA4

Student: Eirhiz Jericko Maniego

This Laravel project extends the TSA3 Tasks for Today system with full task CRUD, authentication, archive-based deletion, and a log-mail notification when a task changes to done.

## Main pages

- `/` - public welcome page with today's active tasks
- `/tasks` - public active task list
- `/profile` - public profile page
- `/about` - public project information
- `/login` and `/register` - authentication pages
- `/tasks/create` - authenticated task creation
- `/tasks/{id}/edit` - authenticated task editing

Creating, editing, and archiving tasks require a logged-in user. Archiving sets `is_archived` to true, so the record remains in the database but no longer appears in active lists.

## Email notification

The application uses Laravel's `log` mail driver. When a task changes from any other status to `done`, `TaskCompletedMail` is sent to `TASK_NOTIFICATION_EMAIL`. Updating a task that is already done does not send another email.

The generated email can be viewed in `storage/logs/laravel.log`.

## Run in Visual Studio Code

Open this folder in VS Code, then run:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
if (!(Test-Path database/database.sqlite)) { New-Item database/database.sqlite -ItemType File }
php artisan migrate --seed
php artisan serve --port=8001
```

Open `http://127.0.0.1:8001`.

Seeded login:

```text
Email: eirhiz.maniego@example.test
Password: password
```

The project declares Laravel Breeze in `composer.json`. If starting from a fresh Laravel copy, the usual scaffold commands are:

```powershell
composer require laravel/breeze --dev
php artisan breeze:install blade
```

## Project map

```text
app/Http/Controllers/TaskController.php       task CRUD and archive workflow
app/Http/Controllers/Auth/                    login and registration controllers
app/Mail/TaskCompletedMail.php                completed-task notification
app/Models/Task.php                           task fields and casts
database/migrations/                          users and tasks schema
database/seeders/                             sample user and task records
resources/views/tasks/                        public list and task forms
resources/views/auth/                         login and registration forms
resources/views/emails/                       notification email view
routes/web.php                                public and protected task routes
routes/auth.php                               authentication routes
```

## Verification

```powershell
php artisan route:list
php artisan migrate:status
php artisan test
```

Test the email flow by editing a pending task to `done`, then check `storage/logs/laravel.log`. Edit the same done task again and confirm that no second completion message is added.

No hosting setup is included.
