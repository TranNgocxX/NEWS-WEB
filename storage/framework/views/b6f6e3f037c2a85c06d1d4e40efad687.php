<?php $__env->startSection('content'); ?>
    <h2>Chào mừng đến với trang Dashboard</h2>
    <p>Xin chào, <?php echo e(Auth::user()->TenDangNhap); ?>! Đây là trang quản lý của bạn.</p>
    <p>Bạn có thể quản lý các bài viết của mình từ menu bên trái.</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/web-news/resources/views/dashboard.blade.php ENDPATH**/ ?>