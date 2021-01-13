
<?php $__env->startSection('css'); ?>
        <!-- FORN WIZARD CSS -->
		<link href="<?php echo e(URL::asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />

		<link href="<?php echo e(URL::asset('assets/plugins/formwizard/smart_wizard.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(URL::asset('assets/plugins/formwizard/smart_wizard_theme_arrows.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(URL::asset('assets/plugins/formwizard/smart_wizard_theme_circles.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(URL::asset('assets/plugins/formwizard/smart_wizard_theme_dots.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(URL::asset('assets/plugins/forn-wizard/css/demo.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
			<!-- PAGE-HEADER -->
			<div class="page-header">
                <div>
                    <h1 class="page-title">Enregistrement de crime</h1>
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
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Default Form Wizard</h3>
						</div>
						<div class="card-body">
                            <div id="loader" class="d-none">
                                <div class="loader"></div>
                              </div>
							<div id="smartwizard">
								<ul>
									<li><a href="#step-1">Informations générales</a></li>
									<li><a href="#step-2">Information sur le produit</a></li>
									<li><a href="#step-3">Autres informations</a></li>
								</ul>
								<div>
									<div id="step-1" class="">
                                    <form  method="POST" id="form_setp_1">

                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="step" value="1">
                                        <input type="hidden" name="uuid">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>   Pays d'appréhension  <span class="text-danger">*</span></label>
                                                        <select name="pays_apprehension"  class="form-control custom-select select2">
                                                            <option value="" selected disabled> Séléctionnez un pays</option>
                                                            <?php $__empty_1 = true; $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pays_apprehension): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <option value="<?php echo e($pays_apprehension->id); ?>"> <?php echo e($pays_apprehension->nom); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            Aucun pays disponible
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>   Date d'apprehension  <span class="text-danger">*</span></label>
                                                        <input type="date" name="date_apprehension"  class="form-control">
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row">

                                                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Localité d'aprrehension <span class="text-danger">*</span></label>
                                                        <input type="text" name="localite_apprehension"  class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Longitude  <span class="text-danger"></span></label>
                                                        <input type="text" name="longitude" id="longitude" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Latitude <span class="text-danger"></span></label>
                                                        <input type="text" name="latitude" id="latitude" class="form-control" autocomplete="og">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>  Espèce trafiquée  <span class="text-danger">*</span></label>
                                                        <select class="js-example-disabled-results">
                                                            <option value="one">First</option>
                                                            <option value="two" disabled="disabled">Second (disabled)</option>
                                                            <option value="three">Third</option>
                                                          </select>
                                                        

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="text-right">
                                            <a href="<?php echo URL::previous(); ?>" class="btn btn-info sw-btn-prev disabled"> Précedent</a>
                                                <button type="submit" id="submit1" class="btn btn-primary"> Suivant</button>

                                            </div>
										</form>
									</div>

									<div id="step-2" class="">
                                        <form  method="POST" id="form_setp_2">
                                            <?php echo csrf_field(); ?>
                                        <input type="hidden" name="step" value="2">
                                        <input id="uuid2" type="hidden" name="uuid">

                                             <div class="row">
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="pays_origine_produit"> Pays d'origine du produit <span class="text-danger">*</span> </label>
                                                    <select name="pays_origine_produit"  class="form-control select2">
                                                        <option value="" disabled selected> Sélectionnez</option>
                                                        <?php $__empty_1 = true; $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pays_origine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <option value="<?php echo e($pays_origine->id); ?>"><?php echo e($pays_origine->nom); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        Aucun pays
                                                        <?php endif; ?>
                                                    </select>
                                                    </div>
                                             </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="pays_destination"> Pays de destination du produit <span class="text-danger">*</span> </label>
                                                    <select name="pays_destination"  class="form-control select2">
                                                        <option value="" disabled selected> Sélectionnez</option>
                                                        <?php $__empty_1 = true; $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pays_destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <option value="<?php echo e($pays_destination->id); ?>"><?php echo e($pays_destination->nom); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        Aucun pays
                                                        <?php endif; ?>
                                                    </select>
                                                    </div>
                                             </div>
                                             </div>

                                             <div class="row">
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="quantite"> Aires protégées d'origine du produits <span class="text-danger">*</span> </label>
                                                    <select name="aire_protegee_id"  class="form-control select2">
                                                        <option value="" disabled selected> Sélectionnez</option>
                                                        <?php $__empty_1 = true; $__currentLoopData = $aires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <option value="<?php echo e($aire->id); ?>"><?php echo e($aire->libelle); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        Aucun pays
                                                        <?php endif; ?>
                                                    </select>
                                                    </div>
                                             </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="date_abattage">Date d’abattage/capture <span class="text-danger">*</span> </label>
                                                    <input type="date" name="date_abattage"  class="form-control">
                                             </div>
                                             </div>
                                             </div>

                                             <div class="row">
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="gestion_des_saisies"> Gestion des saisis <span class="text-danger">*</span> </label>
                                                    <select name="gestion_des_saisies"  class="form-control select2">

                                                        <option value="crime_type_reglement" disabled selected> Sélectionnez</option>
                                                        <option value="Détruit">Détruit</option>
                                                        <option value="Stocké">Stocké</option>
                                                     </select>
                                                    </div>
                                                 </div>

                                             </div>


                                           <div class="text-right">
                                            <a href="<?php echo URL::previous(); ?>" class="btn btn-info sw-btn-prev disabled"> Précedent</a>
                                            <button type="submit" id="submit2" class="btn btn-primary"> Suivant</button>
                                           </div>
                                            </form>
                                            </div>
                                    <div id="step-3" class="">
                                        <form  method="POST" id="form_setp_3">
                                            <?php echo csrf_field(); ?>
                                        <input type="hidden" name="step" value="3">
                                        <input type="hidden" name="uuid" id="uuid3" value="3">


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="lien_terrorisme"> Lien térrorisme <span class="text-danger">*</span> </label>
                                                    <select name="lien_terrorisme"  class="form-control select2">

                                                        <option value="" disabled selected> Sélectionnez</option>
                                                        <option value="1">Oui</option>
                                                        <option value="0">Non</option>
                                                     </select>
                                                    </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="veto"> Veto <span class="text-danger">*</span> </label>
                                                    <select name="veto"  class="form-control select2">

                                                        <option value="" disabled selected> Sélectionnez</option>
                                                        <option value="1">Oui</option>
                                                        <option value="0">Non</option>
                                                     </select>
                                                    </div>
                                                 </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Revenue <span class="text-danger">*</span> </label>
                                                        <input type="text" class="form-control" name="victime"   placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <a href="<?php echo URL::previous(); ?>" class="btn btn-info sw-btn-prev disabled"> Précedent</a>
                                                <button type="submit" id="submit3" class="btn btn-primary"> Suivant</button>
                                               </div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
		<!-- INTERNAL FORN WIZARD JS-->
		<script src="<?php echo e(URL::asset('assets/plugins/formwizard/jquery.smartWizard.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/plugins/formwizard/fromwizard.js')); ?>"></script>

		<!-- INTERNAL ACCORDION-WIZARD FORM JS -->
		<script src="<?php echo e(URL::asset('assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js')); ?>"></script>

        <!--INTERNAL  ADVANCED FORM JS -->
        	<!--INTERNAL  FORMELEMENTS JS -->
		<script src="<?php echo e(URL::asset('assets/js/form-elements.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/js/select2.js')); ?>"></script>
		<script src="<?php echo e(URL::asset('assets/js/advancedform.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('ajax_crud'); ?>

<script src="<?php echo e(asset('js/sweetalert.js')); ?>"></script>
<link href="<?php echo e(URL::asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />

<script src="<?php echo e(asset('js/ajax.js')); ?>"></script>
<script>
    var $disabledResults = $(".js-example-disabled-results");
$disabledResults.select2();
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Switch Maker\criminalite\resources\views\pages\backoffice\crimes\create.blade.php ENDPATH**/ ?>