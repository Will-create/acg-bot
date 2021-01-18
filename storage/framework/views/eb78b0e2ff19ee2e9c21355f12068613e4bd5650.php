
  
                            <div class="row m-5">
                                <form wire:submit.prevent="submit" class="row justify-content-center" >
                                        <div class="form-group">
                                            <textarea wire:model.lazy="commentaire" rows="2" type="text" class="form-control" name="commentaire"
                                                placeholder="Commentaire" id="commentaire"
                                            ></textarea>
                                                    <?php $__errorArgs = ['commentaire'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="helper-text red-text">
                                                    <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    <input type="hidden" wire:model="crime_id" name="crime_id" value="<?php echo e($crime->id); ?>">
                                    <button class="btn btn-primary" type="submit"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</button> 
                                </form>
                        </div>
                            
                        

    <?php /**PATH D:\switch_maker\war_crimes\resources\views/livewire/commentaire.blade.php ENDPATH**/ ?>