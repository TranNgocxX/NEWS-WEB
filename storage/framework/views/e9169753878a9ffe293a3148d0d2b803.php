<?php $__env->startSection('content'); ?>
    <h2><?php echo e($article->TieuDe); ?></h2>
    <p><?php echo e($article->NoiDung); ?></p>
    <a href="<?php echo e(route('articles.index')); ?>" class="btn btn-secondary">Trở lại danh sách</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/web-news/resources/views/articles/show.blade.php ENDPATH**/ ?>