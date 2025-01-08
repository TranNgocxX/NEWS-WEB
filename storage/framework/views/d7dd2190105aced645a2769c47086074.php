<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Tin Tức</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="my-4">
            <div class="d-flex justify-content-between">
                <h1>Trang Tin Tức</h1>
                <div>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('profile')); ?>" class="btn btn-info">Profile</a>
                        <a href="<?php echo e(route('logout')); ?>" class="btn btn-danger">Logout</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-success">Login</a>
                        <a href="<?php echo e(route('register')); ?>" class="btn btn-primary">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="row">
            <div class="col-md-3">
                <h3>Menu</h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                    </li>
                    <li class="list-group-item">
                        <a href="<?php echo e(route('articles.index')); ?>">Quản lý bài viết</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-4 text-center">
            <p>&copy; 2025 Trang Tin Tức. Tất cả các quyền được bảo vệ.</p>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/web-news/resources/views/layouts/app.blade.php ENDPATH**/ ?>