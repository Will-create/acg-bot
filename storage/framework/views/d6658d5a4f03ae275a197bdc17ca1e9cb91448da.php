<div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100 table-sm">
                <thead>
                    <tr>
                        <th class="wd-15p">Nom</th>

                        <th class="wd-30p">Pays</th>

                        
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $localites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <a class="text-dark" href="<?php echo e(route('localites.show', $localite->uuid)); ?>" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > <?php echo e(ucfirst($localite->nom)); ?> </a></td>
                        <td> <a class="text-dark" href="<?php echo e(route('localites.show', $localite->uuid)); ?>" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > <?php echo e($localite->pay->nom); ?></a></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>
    </div>

</div>
<?php /**PATH D:\switch_maker\war_crimes\resources\views/livewire/localites.blade.php ENDPATH**/ ?>