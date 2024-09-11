<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Book</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>">
    <style>
        h1 {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            color: #BF2330;
        }
        .form-control {
            border: 1px solid #BF2330; !important
        }
        .col-form-label {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 400;
            text-transform: uppercase;
        }
    </style>
</head>
<body class="d-flex align-items-center flex-column justify-content-center">
    
    <h1 class="text-center">New Book</h1>
    <form style="margin-top: 100px;" class="form w-50" method="POST" action="<?php echo e(route('livres.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <label class="col-form-label m-2" for="isbn">ISBN : </label>
        <input class="form-control m-2 p-2" type="text" name="isbn" id="isbn"/>
        <?php $__errorArgs = ['isbn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span style="color: red; font-weight: 400">* ISBN code is required !</span><br/>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <label class="col-form-label m-2" for="titre">Titre : </label>
        <input class="form-control m-2 p-2" type="text" name="titre" id="titre"/>
        <?php $__errorArgs = ['titre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span style="color: red; font-weight: 400">* The title is required !</span><br/>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <label class="col-form-label m-2" for="prix">Prix : </label>
        <input class="form-control m-2 p-2" type="text" name="prix" id="prix"/>
        <?php $__errorArgs = ['prix'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span style="color: red; font-weight: 400">* The price is required and must be a number !</span><br/>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <label class="col-form-label m-2" for="quantite">Quantite : </label>
        <input class="form-control m-2 p-2" type="number" name="quantite" id="quantite"/>
        <?php $__errorArgs = ['quantite'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span style="color: red; font-weight: 400">* The quantity is required and must be an integer !</span><br/>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <label class="col-form-label m-2" for="description">Description : </label>
        
        <textarea class="form-control m-2 p-2" name="description" id="description" cols="30" rows="10"></textarea>
        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span style="color: red; font-weight: 400">* The description is required !</span><br/>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <label class="col-form-label m-2" for="auteur">Auteur : </label>
        <select class="form-control m-2 p-2" name="auteur" id="auteur">
            <option value="">Liste des auteurs</option>
            <?php $__currentLoopData = $auteurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auteur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($auteur->id); ?>"><?php echo e($auteur->prenom.' '. $auteur->nom); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['auteur'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span style="color: red; font-weight: 400">* Choose an author !</span><br/>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <label class="col-form-label m-2" for="categorie">Categorie : </label>
        <select class="form-control m-2 p-2" name="categorie" id="categorie">
            <option value="">Liste des categories</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($categorie->id); ?>"><?php echo e($categorie->nom); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['categorie'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span style="color: red; font-weight: 400">* Choose a category !</span><br/>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <label class="col-form-label m-2" for="image">Image : </label>
        <input class="form-control m-2 p-2" type="file" name="image" id="image"/>
        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span style="color: red; font-weight: 400">* The image is required !</span><br/>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <span class="d-flex align-content-end justify-content-end">
            <input class="btn btn-primary m-2" type="submit" value="Créer le livre"/>
            <input class="btn btn-danger m-2" type="reset" value="Réinitialiser"/>
            <a class="btn btn-dark m-2" href="<?php echo e(route('livres.index')); ?>">Annuler</a>
        </span><br/>
    </form>
</body>
</html>
<?php /**PATH C:\Users\ysf\Desktop\DBE\biblio\resources\views/create.blade.php ENDPATH**/ ?>