<div>

<?php
    $i = 1;
?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-nowrap mb-0">
            <thead>
                <tr>
                    <th>Ordre</th>
                    <th>Désignation</th>
                    <th>Date d'ajout</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $crimeEspeces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crimeEspece): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($i++); ?></td>
                    <td>

                        <?php if($crimeEspece->espece->photo): ?>
                        <img src="<?php echo e(asset('storage/' . $crimeEspece->espece->photo)); ?>" alt="<?php echo e($crimeEspece->espece->nom); ?>" class="brround  avatar-sm w-32 mr-2">
                        <?php echo e($crimeEspece->espece->nom); ?>

                        <?php else: ?>
                        <img src="<?php echo e(asset('espece_animal/4.jpeg')); ?>" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
                        <?php echo e($crimeEspece->espece->nom); ?>

                        <?php endif; ?>
                    </td>
                    <td><?php echo e(formatDate($crimeEspece->created_at)); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>

    </div>
<?php /**PATH /home/louisbertson/Desktop/criminalite/resources/views/livewire/crime-espece.blade.php ENDPATH**/ ?>