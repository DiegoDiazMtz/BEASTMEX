

<?php $__env->startSection('estilos'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/usuarios.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

    <h1 class="titulo">Usuarios</h1>

    <div class="buscar-imprimir">
            <div class="col-sm-11 ms-5">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                    <a href="/editarAlmacen" class="btn btn-primary ms-5"><i class="bi bi-person-plus-fill"></i></i></a>
                </form>
            </div>
        </div>
    </div>
    
    <div class="tarjetas">
        <?php for($i = 0; $i < 10; $i++): ?>
        <div class="card">  
            <div class="card-header">
                <h2>Usuario</h2>
            </div>
            <div class="card-body">
                <p class="card-text">
                    Nombre Completo del Usuario
                </p>
                <p class="card-text">
                    Correo del Usuario
                </p>
                <p class="card-text">
                    Puesto del Usuario
                </p>
                <p class="card-text">
                    Contraseña del Usuario
                </p>
                <a href="/editarAlmacen" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Editar</a>
                <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar</a>
            </div>
        </div>
        <?php endfor; ?>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts/plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel\BEASTMEX\beastmex\resources\views/usuarios/usuarios.blade.php ENDPATH**/ ?>