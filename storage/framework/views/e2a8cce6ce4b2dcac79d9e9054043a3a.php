<?php $__env->startSection('content'); ?>
<section class="page-heading">
    <p class="eyebrow">PROFILE</p>
    <h1>The person<br><span>behind the list.</span></h1>
</section>

<section class="profile-card">
    <p class="profile-label">ACCOUNT DETAILS</p>
    <h2><?php echo e($profile->full_name); ?></h2>
    <p class="profile-username"><?php echo e('@' . $profile->username); ?></p>
    <p><?php echo e($profile->email); ?></p>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => 'Tasks for Today | Profile'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\laiza\Documents\Codex\TSA4_IT0049_MANIEGO\resources\views/profile.blade.php ENDPATH**/ ?>