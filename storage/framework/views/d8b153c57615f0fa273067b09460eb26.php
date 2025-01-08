<?php $__env->startSection('content'); ?>
    <h2>Chỉnh sửa bài viết</h2>
    <form method="POST" action="<?php echo e(route('articles.update', $article->MaBaiViet)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="TieuDe" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" id="TieuDe" name="TieuDe" value="<?php echo e($article->TieuDe); ?>" required>
        </div>

        <div class="mb-3">
            <label for="NoiDung" class="form-label">Nội dung</label>
            <textarea class="form-control" id="NoiDung" name="NoiDung" rows="5" required><?php echo e($article->NoiDung); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="MaDanhMuc" class="form-label">Danh mục</label>
            <select class="form-select" id="MaDanhMuc" name="MaDanhMuc" required>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->MaDanhMuc); ?>" <?php echo e($category->MaDanhMuc == $article->MaDanhMuc ? 'selected' : ''); ?>>
                        <?php echo e($category->TenDanhMuc); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật bài viết</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/web-news/resources/views/articles/edit.blade.php ENDPATH**/ ?>