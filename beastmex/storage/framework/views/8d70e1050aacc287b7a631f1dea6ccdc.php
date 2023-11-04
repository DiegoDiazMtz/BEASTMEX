

<?php $__env->startSection('estilos'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/almacen.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

    <h1 class="titulo">Almacen</h1>

    <div class="buscar-imprimir">
        <div class="col-sm-8 me-3">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
        <div class="col-sm-4 d-grid gap-2 me-5">
            <a href="#" class="btn btn-primary"><i class="bi bi-printer-fill"></i> Imprimir lista de productos almacenados</a>
        </div>
    </div>
    
    <div class="tarjetas">
        <?php for($i = 0; $i < 10; $i++): ?>
        <div class="card">
            <div class="card-header">
                <h2>Producto</h2>
            </div>
            <div class="card-body">
                <p class="card-text">
                    Descripcion del producto
                </p>
                <a href="/editarAlmacen" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Editar</a>
                <a href="#" class="btn btn-primary"><i class="bi bi-trash"></i> Eliminar</a>
            </div>
        </div>
        <?php endfor; ?>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts/plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel\BEASTMEX\beastmex\resources\views/almacen/almacen.blade.php ENDPATH**/ ?>