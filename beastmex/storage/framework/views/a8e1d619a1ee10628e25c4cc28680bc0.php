<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1 class="display-1 text-center text-danger ">Formulario</h1>

<div class="container mt-5" style="margin: 100">

    <div class="card ">

        <form method="POST" action="/guardarRecuerdo">
            <?php echo csrf_field(); ?> <!-- token de seguridad-->

            <div class="card-header text-primary fs-5 fw-semibold text-center">
                Introduce tus recuerdos aqui
            </div>
            
            <div class="card-body">

                <form>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Titulo: </label>
                        <input type="text" name="txtTitulo" class="form-control" value="<?php echo e(old('txtTitulo')); ?>"> <!-- Es para mantener los caracteres -->
                        <div id="emailHelp" class="form-text">No compartiremos tu recuerdo con nadie.</div>
                        <p class='text-danger fst-italic'> <?php echo e($errors->first('txtTitulo')); ?> </p>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Recuerdo: </label>
                        <input type="text" name="txtRecuerdo"class="form-control" value="<?php echo e(old('txtRecuerdo')); ?>">
                        <p class='text-danger fst-italic'> <?php echo e($errors->first('txtRecuerdo')); ?> </p>
                    </div>
                    
            </div>

            <div class="card-footer text-body-secondary">
                <button type="submit" class="btn btn-primary">Guardar Recuerdo</button>

                </form>
            </div>
        </form>

    </div><!--- div del card-->

</div> <!--- div del container-->
    
</body>
</html>

    
    <?php /**PATH C:\laragon\www\Laravel\BEASTMEX\beastmex\resources\views/usuario.blade.php ENDPATH**/ ?>