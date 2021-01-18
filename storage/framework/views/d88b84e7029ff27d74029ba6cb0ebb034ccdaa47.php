        <?php
    ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap mb-0">
                <thead>
                    <tr>
                        <th>Mode</th>
                        <th>Decision de justice</th>
                        <th>Amende</th>
                        <th>Date d'ajout</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $crime->reglement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reglement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="<?php echo e(route('crime_reglements.edit', $reglement)); ?>">
                            <?php echo e($reglement->mode->mode); ?>

                        </a>
                        </td>
                        <td>
                            <?php if($reglement->mode->mode == "Poursuite judiciaire"): ?>
                             <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="<?php echo e(route('crime_reglements.edit', $reglement)); ?>">
                            <?php echo e($reglement->suite->decision); ?>

                            </a>
                            <?php else: ?>
                            Non applicable
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if( $reglement->suite &&  $reglement->suite->decision == "Condamnation du prévenu à une amende" || $reglement->mode->mode == "Transaction forestière"): ?>
                            <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="<?php echo e(route('crime_reglements.edit', $reglement)); ?>">
                                <?php echo e(($reglement->amende)); ?>

                                <?php else: ?>
                                Non applicable
                                <?php endif; ?>
                        </td>
                         <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="<?php echo e(route('crime_reglements.edit', $reglement)); ?>">
                            <?php echo e(formatDate($reglement->created_at)); ?>

                        </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

<?php /**PATH D:/switch_maker/war_crimes/resources/views/pages/backoffice/regelements/list.blade.php ENDPATH**/ ?>
