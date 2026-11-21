<?php $__env->startSection('content'); ?>
<section class="intro">
    <p class="eyebrow">WELCOME BACK, EIRHIZ</p>
    <h1>Tasks for<br><span>today.</span></h1>
    <p class="lead">A focused view of the work scheduled for today. Keep the list short, clear, and ready to check.</p>
</section>

<section class="task-panel">
    <div class="panel-heading"><h2>Today’s list</h2><span><?php echo e($todayTasks->count()); ?> tasks</span></div>
    <?php $__empty_1 = true; $__currentLoopData = $todayTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="task-row">
            <span class="task-dot <?php echo e(str_replace(' ', '-', $task->status)); ?>"></span>
            <span class="task-title"><?php echo e($task->title); ?></span>
            <span class="task-status"><?php echo e(ucfirst($task->status)); ?></span>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="empty-state">There are no tasks scheduled for today.</p>
    <?php endif; ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => 'Tasks for Today | Welcome'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\laiza\Documents\Codex\TSA4_IT0049_MANIEGO\resources\views/tasks/welcome.blade.php ENDPATH**/ ?>