<?php $__env->startSection('css'); ?>
        <!-- FORN WIZARD CSS -->
		<link href="<?php echo e(URL::asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />
		<link href="<?php echo e(URL::asset('assets/plugins/formwizard/smart_wizard.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(URL::asset('assets/plugins/formwizard/smart_wizard_theme_arrows.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(URL::asset('assets/plugins/formwizard/smart_wizard_theme_circles.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(URL::asset('assets/plugins/formwizard/smart_wizard_theme_dots.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(URL::asset('assets/plugins/forn-wizard/css/demo.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(URL::asset('assets/plugins/multipleselect/multiple-select.css')); ?>">
		<link href="<?php echo e(URL::asset('assets/plugins/accordion/accordion.css')); ?>" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startPush('livewire'); ?>
<?php echo \Livewire\Livewire::styles(); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-header'); ?>
			<!-- PAGE-HEADER -->
			<div class="page-header">
                <div>
                    <h1 class="page-title"></h1>
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('accueil')); ?>">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nouveau</li>
                    </ol>
                </div>
                <div class="ml-auto pageheader-btn">
                <a class="btn btn-primary" href="<?php echo e(route('especes.create')); ?>">  <span>
                        <i class="fe fe-plus"></i>
                    </span>
                   Enregistrer un crime</a>
                </button>

                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">

    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Informations générales</h3>
            </div>
            <div class="card-body">
                <dl class="dl-crime">
                    <strong class="text-center"><?php echo e($crime->type->nom); ?></strong> <br>
                    <dt>Date d'appréhension :</dt>
                    <dd> <?php echo e(formatDate($crime->date_apprehension)); ?>

                    </dd>
                    <dt>Localité d'appréhension :</dt>
                    <dd> <?php echo e(ucFirst($crime->service_investigateur->designation)); ?></dd>
                    <dt>Service investigateur :</dt>
                    <dd>
                        <?php echo e(ucFirst($crime->localite_aprrehension)); ?>

                    </dd>
                    <dt>Espèce impliquées :</dt>
                    <dd>
                        <?php echo e(ucFirst($crime->localite_aprrehension)); ?>

                    </dd>
                </dl>
            </div>
        </div>
        <div class:="tab-content">
            <div class="tab-pane" id="tab-51">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('commentaires.store')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                        
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="pour">Destinataire <strong class="text-danger">*</strong></label>
                                        <select name="pour" id="pour" class="form-control custom-select select2">
                                            <option  value="<?php echo e(Route::currentRouteName() == 'commentaires.edit' ? $commentaire->pour : ''); ?>" <?php echo e(Route::currentRouteName() == 'commentaires.edit' ? '' : 'disabled'); ?> selected ><?php echo e(Route::currentRouteName() == 'commentaires.edit' ? $commentaire->destinataire->nom.'  '.$commentaire->destinataire->prenom.' ('.$commentaire->destinataire->role->designation.') ' : 'Sélectionner'); ?></option>
                                            <?php $__currentLoopData = $destinataires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destinataire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <option  value="<?php echo e($destinataire->id); ?>"> <span class="red-text"><?php echo e($destinataire->nom); ?> <?php echo e($destinataire->prenom); ?> (<?php echo e($destinataire->role->designation); ?>)
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['pour'];
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
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        
                                        <textarea rows="2" type="text" class="form-control" name="commentaire"
                                            placeholder="Commentaire" id="commentaire"
                                            required></textarea>
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
                                </div>
    
                            </div>
                            <input type="hidden" name="crime_id" value="<?php echo e($crime->id); ?>">
                            <div class="text-right">
                                <button class="btn btn-primary" type="submit"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</button> 
                            </div>
                            <br>
                        </form>
                        <br>
                        <?php if($commentaires->count() < 1): ?>
                        <h3 class="page-title">Commentaires (0) </h3>
                        <span class="">Aucun commentaire n'est disponible pour le moment</span>
                        <?php else: ?>
                              <h3 class="page-title">Commentaires (<?php echo e($commentaires->count()); ?>) </h3>
                              <div id="accordion">
                               <?php $__currentLoopData = $commentaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <div class="card">
                                <div class="card-header" id="heading<?php echo e($commentaire->id); ?>">
                                  <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo e($commentaire->id); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($commentaire->id); ?>">
                                      <span class="m-b-15 d-block text-dark"><?php echo e(ucfirst(substr($commentaire->commentaire, 0,28))); ?>... </span>
                                    </button>
                                  </h5>
                                </div>
                                <div id="collapse<?php echo e($commentaire->id); ?>" class="collapse" aria-labelledby="heading<?php echo e($commentaire->id); ?>" data-parent="#accordion">
                                  <div class="card-body">
                                      <div class="d-flex flex-row comment-row m-t-0">
                                          <a class="text-dark" href="<?php echo e(route('utilisateurs.show', $commentaire->auteur->uuid)); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e($commentaire->auteur->nom); ?> <?php echo e($commentaire->auteur->prenom); ?>(<?php echo e($commentaire->auteur->role->designation); ?>)">
                                              <div class="p-2"><img   src="<?php echo e(asset( $commentaire->auteur->profile_photo_path)); ?>" alt="user" height="40" width="50" class="rounded-circle"></div>
                                          </a> <br>
                                          <div class="comment-text w-100">
                                              <div class="comment-footer">
                                                    <span class="m-b-15 d-block" style="background-color: rgb(241, 255, 251); border-radius:.5em; padding:1.5em; text-align:center;"><?php echo e(ucfirst($commentaire->commentaire)); ?> 
                                                    </span> 
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <br><br> <span class="text-muted float-right"><?php echo e($commentaire->created_at->format(' d M Y h:i:s')); ?></span> 
                                    </a><a class="text-dark" href="<?php echo e(route('utilisateurs.show', $commentaire->destinataire->uuid)); ?>">Pour: <?php echo e($commentaire->destinataire->nom); ?> <?php echo e($commentaire->destinataire->prenom); ?>(<?php echo e($commentaire->destinataire->role->designation); ?>)
                                  </div>
                                </div>
                              </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Détails</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                            <div class="card-body">
                                <ul class="demo-accordion accordionjs m-0">
                                    <li>
                                        <div>
                                            <h3>Especes</h3>
                                        </div>
                                        <div>
                                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('regne-espece', ['crime'  => $crime])->html();
} elseif ($_instance->childHasBeenRendered('OUZeMIE')) {
    $componentId = $_instance->getRenderedChildComponentId('OUZeMIE');
    $componentTag = $_instance->getRenderedChildComponentTagName('OUZeMIE');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OUZeMIE');
} else {
    $response = \Livewire\Livewire::mount('regne-espece', ['crime'  => $crime]);
    $html = $response->html();
    $_instance->logRenderedChild('OUZeMIE', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                             <br>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h3>Auteurs du crimes</h3>
                                        </div>

                                        <div>
                                            <div class="text-right">
                                                <a href="<?php echo e(route('crime_auteurs.create', ['crime' => $crime->uuid])); ?>" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</a>
                                            </div>
                                            <br>
                                            <?php echo $__env->make('pages.backoffice.auteurs.crimeAuteu', ['crime'  => $crime], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h3>Specimens confisqués</h3>
                                        </div>
                                        <div>
                                            <div class="text-right">
                                                <a href="<?php echo e(route('confiscations.create', ['crime' => $crime->uuid])); ?>" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</a>
                                            </div>
                                          <?php echo $__env->make('pages.backoffice.confiscations.crimeConfiscation',['crime' => $crime], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h3>Armes matérielles</h3>
                                        </div>
                                        <div>

                                            <div>
                                        

                                                <div class="text-right">
                                                    <a href="<?php echo e(route('crime.armes.create', ['crime' => $crime])); ?>" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</a>
                                                </div>
                                                <br>
                                                <?php echo $__env->make('pages.backoffice.armes.listearme', ['armes' => $armes], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h3>Réglements</h3>
                                        </div>
                                        <div>
                                            <!-- Your text here. For this demo, the content is generated automatically. -->
                                        </div>
                                    </li>
                                </ul>
                            </div>
                    </div><!-- COL-END -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
        <!-- INTERNAL FORN WIZARD JS-->
        <script src="<?php echo e(URL::asset('assets/plugins/accordion/accordion.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('assets/plugins/accordion/accordion.js')); ?>"></script>

		<script src="<?php echo e(URL::asset('assets/plugins/formwizard/jquery.smartWizard.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/formwizard/fromwizard.js')); ?>"></script>

		<!-- INTERNAL ACCORDION-WIZARD FORM JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js')); ?>"></script>


        <script src="<?php echo e(URL::asset('assets/js/advancedform.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('assets/plugins/multipleselect/multiple-select.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('assets/plugins/multipleselect/multi-select.js')); ?>"></script>


<?php $__env->stopSection(); ?>


<?php $__env->startPush('ajax_crud'); ?>

<script src="<?php echo e(asset('js/sweetalert.js')); ?>"></script>
<link href="<?php echo e(URL::asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="<?php echo e(asset('js/ajax.js')); ?>"></script>

<script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
    $('#mySelect2').select2('data');
    $('#mySelect2').find(':selected');

    $('.js-example-basic-confiscation').select2();
    // $('#mySelect2confiscation').select2('data');
    // $('#mySelect2confiscation').find(':selected');

});
        window.addEventListener('contentChanged', event => {
            $('.js-example-basic-single').select2();
        });
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('livewirescript'); ?>
<?php echo \Livewire\Livewire::scripts(); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/louisbertson/Desktop/criminalite/resources/views/pages/backoffice/crimes/show.blade.php ENDPATH**/ ?>