<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title ?? 'Tasks for Today'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/tsa3.css')); ?>">
</head>
<body>
    <header class="topbar">
        <a class="brand" href="<?php echo e(route('welcome')); ?>">TASKS <span>FOR TODAY</span></a>
        <nav aria-label="Main navigation">
            <a class="<?php echo e(request()->routeIs('welcome') ? 'active' : ''); ?>" href="<?php echo e(route('welcome')); ?>">Today</a>
            <a class="<?php echo e(request()->routeIs('tasks.*') ? 'active' : ''); ?>" href="<?php echo e(route('tasks.index')); ?>">All tasks</a>
            <a class="<?php echo e(request()->routeIs('profile') ? 'active' : ''); ?>" href="<?php echo e(route('profile')); ?>">Profile</a>
            <a class="<?php echo e(request()->routeIs('about') ? 'active' : ''); ?>" href="<?php echo e(route('about')); ?>">About</a>
            <?php if(auth()->guard()->check()): ?>
                <a class="<?php echo e(request()->routeIs('tasks.create') ? 'active' : ''); ?>" href="<?php echo e(route('tasks.create')); ?>">New task</a>
                <form method="POST" action="<?php echo e(route('logout')); ?>" class="logout-form"><?php echo csrf_field(); ?><button type="submit">Log out</button></form>
            <?php else: ?>
                <a class="<?php echo e(request()->routeIs('login') ? 'active' : ''); ?>" href="<?php echo e(route('login')); ?>">Log in</a>
                <a class="<?php echo e(request()->routeIs('register') ? 'active' : ''); ?>" href="<?php echo e(route('register')); ?>">Register</a>
            <?php endif; ?>
        </nav>
    </header>

    <main class="page-shell">
        <?php if(session('success')): ?> <p class="success-message"><?php echo e(session('success')); ?></p> <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</body>
</html>
<?php /**PATH C:\Users\laiza\Documents\Codex\TSA4_IT0049_MANIEGO\resources\views/layouts/app.blade.php ENDPATH**/ ?>