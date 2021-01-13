<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Systeme de paiement en masse">
        <meta name="author" content="Switch Maker">
        <meta name="keywords" content="">
        <title> <?php echo e(isset($titrePage) ? $titrePage : 'Administration'); ?> || Criminalité environnementale - UICN PACO </title> </title>
        <?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>

    </head>

<body class="app sidebar-mini">
    <style type="text/css">
        #map{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
            height:400px;
        }
    </style>
    <!-- GLOABAL LOADER -->
    <div id="global-loader">
        <img src="<?php echo e(URL::asset('assets/images/loader.svg')); ?>" class="loader-img" alt="Loader">
    </div>
    <!-- End GLOABAL LOADER -->
    <!-- PAGE -->
    <div class="page">
        <div class="page-main">
            <?php if(Auth::user()->role->designation == 'Administrateur Général'): ?>
            <?php echo $__env->make('layouts.aside-menu-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <?php elseif(Auth::user()->role->designation == 'Coordonnateur Régional'): ?>
            <?php echo $__env->make('layouts.aside-menu-coodonnateur-regional', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <?php elseif(Auth::user()->role->designation == 'Coordonnateur National'): ?>
            <?php echo $__env->make('layouts.aside-menu-coodonnateur-national', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <?php elseif(Auth::user()->role->designation == 'Chef d’Unité'): ?>
            <?php echo $__env->make('layouts.aside-menu-chef-unite', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <?php elseif(Auth::user()->role->designation == 'Agent d’une Unité'): ?>
            <?php echo $__env->make('layouts.aside-menu-agent-unite', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <br>
            <div class="app-content">
                <div class="side-app">
                    <?php echo $__env->yieldContent('page-header'); ?>
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
        <?php echo $__env->make('layouts.aside-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <!--END PAGE -->
    <!-- BACKGROUND-IMAGE CLOSED -->
    <?php echo $__env->make('layouts.footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH D:\Switch Maker\criminalite\resources\views/layouts/masterCarte.blade.php ENDPATH**/ ?>