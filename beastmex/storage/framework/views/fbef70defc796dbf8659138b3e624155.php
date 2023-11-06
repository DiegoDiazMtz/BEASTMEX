<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>

    <title>Document</title>
</head>
<body>

<h1 class="display-1 text-center text-dark mt-5" style="font-family:'Times New Roman';"> Registar Usuario </h1>

    <?php if(session()->has('confirmacion')): ?> <!-- si hay una confirmacion que la ponga con un  alert -->
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong><?php echo e(session('confirmacion')); ?></strong> 
            <button type="button" class ="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="mt-3 card mb-5" style="width: 80rem; margin: auto;">

    <form method="POST" action="#">
        <?php echo csrf_field(); ?> 

        <div class="card mt-2 mb-2 " style="margin-left: 30px; margin-right: 30px; border: none !important">
            <div class="mt-2">
                <label for="exampleInputEmail1" class="form-label mt-3 mx-3" style="font-family:'Times New Roman';">ISBN:</label>
                <input type="text" name="txtISBN" class="form-control mb-2" value="<?php echo e(old('txtISBN')); ?>">
                <p class='text-danger fst-italic'> <?php echo e($errors->first('txtISBN')); ?> </p>
  
            </div>
        
            <button type="submit" class="btn btn-dark mb-4 mt-5" style="font-family:'Times New Roman';">Registar</button>

        </div>

    </form>

    </div>
</body>
</html>

    
    <?php /**PATH C:\laragon\www\Laravel\BEASTMEX\beastmex\resources\views/registrarUsuario.blade.php ENDPATH**/ ?>