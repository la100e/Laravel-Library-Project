<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BOOKS</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('fontawesome/font-awesome.min.css')); ?>">
    
    <style>
    h1 {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-weight: 600;
        text-transform: uppercase;
        color: #BF2330;
    }
    svg {
        display: none; !important
    }
    </style>
</head>
<body>
    <?php if(session('success')): ?>
        <div class="alert alert-success w-100 p-3 text-center">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php
        try {
            print '<h1 class="text-center mb-5 border p-2"><span style="color: black">Books by</span> '.$selectedAuteur->prenom.' '.$selectedAuteur->nom.'</h1>';
        } catch (\Throwable $th) {
            //throw $th;
        }
    ?>
    <main class="d-flex align-items-center justify-content-around flex-wrap w-100">
        <?php $__empty_1 = true; $__currentLoopData = $livres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $livre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class = "card">
            <img src="<?php echo e(asset($livre->image)); ?>" alt="">
            <div class="card-content">
                <h2 class="p-2 text-center">
                    &ldquo; <?php echo e($livre->titre); ?> &rdquo; <br/><span style="color: black; font-weight: normal; font-size: 24px">by</span> <span style="font-weight: normal; font-size: 24px"><?php echo e($livre->auteur->prenom.' '.$livre->auteur->nom); ?></span>
                </h2>
                <p>
                    <?php echo e($livre->description); ?>

                </p>
                <a href="<?php echo e(route('livres.show', $livre->id)); ?>" class="button" style="color: #BF2330">
                    Find out more <i class="fas arrow material-symbols-outlined" aria-hidden="true"></i>
                </a>
            </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center alert alert-danger w-100">No books yet</div>
        <?php endif; ?>
      </main>
      
    
</body>
</html>
<?php /**PATH C:\Users\ysf\Desktop\DBE\biblio\resources\views/index.blade.php ENDPATH**/ ?>