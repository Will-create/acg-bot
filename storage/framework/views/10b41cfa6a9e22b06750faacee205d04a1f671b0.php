
        <?php
        $i = 1;
    ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap mb-0">
                <thead>
                    <tr>
                        <th>Ordre</th>
                        <th>Désignation</th>
                        <th>Quantité/Nombre</th>
                        <th>Conditions</th>
                        <th>Date d'ajout</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $crime->confiscations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $confiscation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="<?php echo e(route('confiscations.show', $confiscation)); ?>">
                            <?php echo e($confiscation->designation); ?>

                        </a>
                        </td>
                         <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="<?php echo e(route('confiscations.show', $confiscation)); ?>">
                            <?php echo e($confiscation->nombre ? $confiscation->nombre : $confiscation->quanite); ?>

                            </a>
                        </td>
                        <td>
                            <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="<?php echo e(route('confiscations.show', $confiscation)); ?>">
                                <?php echo e(($confiscation->condition)); ?>

                        </td>
                         <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="<?php echo e(route('confiscations.show', $confiscation)); ?>">
                            <?php echo e(formatDate($confiscation->created_at)); ?>

                        </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>

<?php /**PATH /home/louisbertson/Desktop/criminalite/resources/views/pages/backoffice/confiscations/crimeConfiscation.blade.php ENDPATH**/ ?>