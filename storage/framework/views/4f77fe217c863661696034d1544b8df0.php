<?php $__env->startSection('content'); ?>
<section class="page-heading"><p class="eyebrow">TASK MANAGEMENT</p><h1>Every task,<br><span>in order.</span></h1><p class="lead">Create, update, and archive the work scheduled for today.</p></section>
<section class="task-panel">
    <div class="panel-heading"><h2>Task list</h2><span><?php echo e($tasks->count()); ?> active</span></div>
    <?php $__empty_1 = true; $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="task-row"><span class="task-date"><?php echo e($task->task_date->format('M d')); ?></span><span class="task-title"><?php echo e($task->title); ?></span><span class="task-status"><?php echo e(ucfirst($task->status)); ?></span><span class="task-actions"><a href="<?php echo e(route('tasks.edit', $task)); ?>">Edit</a><form method="POST" action="<?php echo e(route('tasks.destroy', $task)); ?>"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button type="submit">Archive</button></form></span></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <p class="empty-state">There are no active tasks.</p> <?php endif; ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => 'Tasks for Today | All Tasks'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\laiza\Documents\Codex\TSA4_IT0049_MANIEGO\resources\views/tasks/index.blade.php ENDPATH**/ ?>