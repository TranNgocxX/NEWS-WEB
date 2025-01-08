<?php $__env->startSection('content'); ?>
    <h2>Danh sách bài viết</h2>
    <a href="<?php echo e(route('articles.create')); ?>" class="btn btn-success mb-3">Tạo bài viết mới</a>

    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($article->TieuDe); ?></h5>
                <p class="card-text"><?php echo e(Str::limit($article->NoiDung, 100)); ?></p>
                <a href="<?php echo e(route('articles.show', $article->MaBaiViet)); ?>" class="btn btn-primary">Xem chi tiết</a>
                <a href="<?php echo e(route('articles.edit', $article->MaBaiViet)); ?>" class="btn btn-warning">Chỉnh sửa</a>
                <form action="<?php echo e(route('articles.destroy', $article->MaBaiViet)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/web-news/resources/views/articles/index.blade.php ENDPATH**/ ?>