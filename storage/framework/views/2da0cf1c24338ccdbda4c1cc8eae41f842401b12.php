    <?php
    $i = 1;
    ?>
    <div class="table-responsive">
        <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100 table-sm">
            <thead>
                <tr>
                    <th class="wd-15p">Ordre</th>
                    <th class="wd-15p">Libellé</th>
                    <th class="wd-15p">Réference</th>
                    <th>origine</th>
                    <th>Date ajout</th>

                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $armes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td> <a class="text-dark" href="<?php echo e(route('armes.show',  $arme->uuid)); ?>" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" > <?php echo e($i++); ?> </a></td>
                    <td> <a class="text-dark" href="<?php echo e(route('armes.show',  $arme->uuid)); ?>" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" > <?php echo e(ucfirst($arme->libelle)); ?> </a></td>
                    <td> <a class="text-dark" href="<?php echo e(route('armes.show',  $arme->uuid)); ?>" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" > <?php echo e(ucfirst($arme->reference ? $arme->reference : 'Non renseigné')); ?> </a></td>

                    <td> <a class="text-dark" href="<?php echo e(route('armes.show',  $arme->uuid)); ?>" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" > <?php echo e(($arme->origin ? $arme->origine : ' Non renseigné')); ?> </a></td>
                    <td> <a class="text-dark" href="<?php echo e(route('armes.show',  $arme->uuid)); ?>" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" > <?php echo e(formatDate($arme->created_at)); ?> </a></td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<!-- TABLE WRAPPER -->
<?php /**PATH D:/switch_maker/war_crimes/resources/views/pages/backoffice/armes/listearme.blade.php ENDPATH**/ ?>
