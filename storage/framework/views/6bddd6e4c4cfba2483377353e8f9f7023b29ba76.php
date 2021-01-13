
        <?php
        $i = 1;
    ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap mb-0">
                <thead>
                    <tr>
                        <th>Ordre</th>
                        <th>Nom  et prénom</th>
                        <th>Qualité</th>
                        <th>Date d'ajout</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $crime->auteurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auteur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="<?php echo e(route('crime_auteurs.show', $auteur)); ?>">
                            <?php echo e($auteur->nom . ' '. $auteur->prenom); ?>

                        </a>
                        </td>
                         <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="<?php echo e(route('crime_auteurs.show', $auteur)); ?>">

                            <?php echo e(ucFirst($auteur->type)); ?>

                            </a>
                        </td>
                         <td> <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les détails" href="<?php echo e(route('crime_auteurs.show', $auteur)); ?>">

                            <?php echo e(formatDate($auteur->created_at)); ?>

                        </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

<?php /**PATH D:\Switch Maker\criminalite\resources\views/pages/backoffice/auteurs/crimeAuteu.blade.php ENDPATH**/ ?>