<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <?php echo $__env->yieldContent('estilos'); ?>
</head>
<body>
    <header><?php echo $__env->make('partials/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></header>
    <body><?php echo $__env->yieldContent('contenido'); ?></body>
</body>
</html><?php /**PATH C:\laragon\www\Laravel\BEASTMEX\beastmex\resources\views/layouts/plantilla.blade.php ENDPATH**/ ?>