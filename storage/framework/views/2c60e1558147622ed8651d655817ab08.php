<?php $__env->startSection('content'); ?>
    <h2>Thông tin cá nhân</h2>
    <p><strong>Tên đăng nhập:</strong> <?php echo e(Auth::user()->TenDangNhap); ?></p>
    <p><strong>Email:</strong> <?php echo e(Auth::user()->Email); ?></p>
    <p><strong>Vai trò:</strong> <?php echo e(Auth::user()->VaiTro); ?></p>
    <p><strong>Điểm tích lũy:</strong> <?php echo e(Auth::user()->Diemtichluy); ?></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/web-news/resources/views/profile.blade.php ENDPATH**/ ?>