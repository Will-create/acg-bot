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
                <a class="btn btn-primary" href="<?php echo e(route('crimes.index')); ?>">  <span>
                        <i class="fe fe-list"></i>
                    </span>
                   Liste des crimes</a>
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
                    <strong class="text-center"><?php echo e($crime->type ? $crime->type->nom: ''); ?></strong> <br>
                    <dt>Date d'appréhension :</dt>
                    <dd> <?php echo e(formatDate($crime->date_apprehension)); ?>

                    </dd>
                    <dt>Localité d'appréhension :</dt>
                    <dd>
                        <?php echo e(ucFirst($crime->paysApprehension->nom)); ?><?php echo e(ucFirst($crime->localite_aprrehension->nom ?? '/'.$crime->localite->nom)); ?>

                    </dd>
                    <dt>Service investigateur :</dt>
                    <dd> 
                        <?php echo e(ucFirst($crime->service_investigateur->designation ?? $crime->service_investigateur->designation)); ?>

                    </dd>
                    
                </dl>
            </div>
        </div>
        <div class:="tab-content">
            <div class="tab-pane" id="tab-51">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Commentaires</h3>
                    </div>
                    <div class="card-body">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('comment',['crime'  => $crime,'commentaires' => $commentaires])->html();
} elseif ($_instance->childHasBeenRendered('wpmkEaf')) {
    $componentId = $_instance->getRenderedChildComponentId('wpmkEaf');
    $componentTag = $_instance->getRenderedChildComponentTagName('wpmkEaf');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('wpmkEaf');
} else {
    $response = \Livewire\Livewire::mount('comment',['crime'  => $crime,'commentaires' => $commentaires]);
    $html = $response->html();
    $_instance->logRenderedChild('wpmkEaf', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('commentaire',['crime'  => $crime,'commentaires' => $commentaires])->html();
} elseif ($_instance->childHasBeenRendered('EpKLXr0')) {
    $componentId = $_instance->getRenderedChildComponentId('EpKLXr0');
    $componentTag = $_instance->getRenderedChildComponentTagName('EpKLXr0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('EpKLXr0');
} else {
    $response = \Livewire\Livewire::mount('commentaire',['crime'  => $crime,'commentaires' => $commentaires]);
    $html = $response->html();
    $_instance->logRenderedChild('EpKLXr0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>
                
            </div>
         </div>
        </div>
    </div>


    <?php
             $crimeEspeces =  \App\Models\CrimeEspece::latest()->where('crime_id', $crime->id)->get()
    ?>

    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Détails</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                            <div class="card-body">
                                <ul class="demo-accordion accordionjs m-0" data-active-index="false">
                                    <li class="<?php if(Session::has('section')  &&  (session('section') == "espece")): ?> acc_active <?php endif; ?>">
                                        <div>
                                            <h3>Especes </h3>
                                            <span class="nom_item_par_collapse badge badge-danger"> <?php echo e(count($crimeEspeces)); ?> </span>
                                        </div>
                                        <div>
                                            <?php echo $__env->make('partials._notify',['nom'  => 'espece'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('regne-espece', ['crime'  => $crime])->html();
} elseif ($_instance->childHasBeenRendered('H4pPcES')) {
    $componentId = $_instance->getRenderedChildComponentId('H4pPcES');
    $componentTag = $_instance->getRenderedChildComponentTagName('H4pPcES');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('H4pPcES');
} else {
    $response = \Livewire\Livewire::mount('regne-espece', ['crime'  => $crime]);
    $html = $response->html();
    $_instance->logRenderedChild('H4pPcES', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                             <br>
                                        </div>
                                    </li>
                                    <li class="<?php if(Session::has('section')  &&  (session('section') == "auteur")): ?> acc_active <?php endif; ?>">
                                        <div>
                                            <h3>Auteurs du crimes</h3>
                                            <span class="nom_item_par_collapse badge badge-danger"> <?php echo e(count($crime->auteurs)); ?> </span>

                                        </div>

                                        <div>
                                            <?php echo $__env->make('partials._notify',['nom'  => 'auteur'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <div class="text-right">
                                                <a href="<?php echo e(route('crime_auteurs.create', ['crime' => $crime->uuid])); ?>" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</a>
                                            </div>
                                            <br>
                                            <?php if(count($crime->auteurs) > 0): ?>
                                            <?php echo $__env->make('pages.backoffice.auteurs.crimeAuteu', ['crime'  => $crime], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php else: ?>
                                            <small class="text-danger">Aucun auteur Ajouter</small>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                    <li class="<?php if(Session::has('section')  &&  (session('section') == "confiscation")): ?> acc_active <?php endif; ?>">
                                        <div>
                                            <h3>Specimens confisqués</h3>
                                            <span class="nom_item_par_collapse badge badge-danger"> <?php echo e(count($crime->confiscations)); ?> </span>

                                        </div>
                                        <div>
                                            <?php echo $__env->make('partials._notify',['nom'  => 'confiscation'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                            <div class="text-right">
                                                <a href="<?php echo e(route('confiscations.create', ['crime' => $crime->uuid])); ?>" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</a>
                                            </div>
                                            <br>
                                            <?php if(count($crime->confiscations) > 0): ?>
                                            <?php echo $__env->make('pages.backoffice.confiscations.crimeConfiscation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php else: ?>
                                            <small class="text-danger"> Aucun speciemen confisqué</small>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                    <li class="<?php if(Session::has('section')  &&  (session('section') == "arme")): ?> acc_active <?php endif; ?>">
                                        <div>
                                            <h3>Armes matérielles</h3>
                                            <span class="nom_item_par_collapse badge badge-danger"> <?php echo e(count($crime->armes)); ?> </span>

                                        </div>
                                        <div>

                                            <div>
                                        <?php echo $__env->make('partials._notify',['nom'  => 'arme'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                <div class="text-right">
                                                    <a href="<?php echo e(route('crime.armes.create', ['crime' => $crime])); ?>" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</a>
                                                </div>
                                                <br>
                                                <?php echo $__env->make('pages.backoffice.armes.listearme', ['armes' => $armes], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="<?php if(Session::has('section')  &&  (session('section') == "reglement")): ?> acc_active <?php endif; ?>">
                                        <div>
                                            
                                            <h3>Réglements</h3>
                                            <span class="nom_item_par_collapse badge badge-danger"> <?php echo e(count($crime->reglement)); ?> </span>

                                        </div>
                                        <div>
                                            
                                            <?php echo $__env->make('partials._notify',['nom'  => 'reglement'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                            <div class="text-right">
                                                <?php if(count($crime->auteurs) > 0): ?>
                                                <a href="<?php echo e(route('crime_reglements.create', ['crime'   => $crime->uuid])); ?>" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</a>
                                               <?php else: ?>
                                               <small class="text-danger">
                                                   Veuillez d'abord ajouter les auteurs du crimes
                                               </small>
                                                <?php endif; ?>
                                            </div>
                                            <?php if(count($crime->reglement) > 0): ?>
                                            <?php echo $__env->make('pages.backoffice.regelements.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                    <li >
                                        <div>
                                            <h3>Localisation</h3>

                                        </div>
                                        <div>
                                        
                                            <div class="text-right">
                                                <?php if($crime->longitude != ''): ?>
                                                
                                                <div id="map"></div>
                                               <?php else: ?>
                                               <small class="text-danger">
                                                   Aucune  localisation disponible
                                               </small>
                                                <?php endif; ?>
                                            </div>
                                            
                                        </div>
                                    </li>
                                </ul>
                            </div>
                    </div><!-- COL-END -->
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" >Options</h3>
                
           </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('veto',['crime'  => $crime])->html();
} elseif ($_instance->childHasBeenRendered('qAUvrKO')) {
    $componentId = $_instance->getRenderedChildComponentId('qAUvrKO');
    $componentTag = $_instance->getRenderedChildComponentTagName('qAUvrKO');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qAUvrKO');
} else {
    $response = \Livewire\Livewire::mount('veto',['crime'  => $crime]);
    $html = $response->html();
    $_instance->logRenderedChild('qAUvrKO', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                  </div>
                  <div class="col-md-6">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('validate',['crime'  => $crime])->html();
} elseif ($_instance->childHasBeenRendered('1nZf7Vo')) {
    $componentId = $_instance->getRenderedChildComponentId('1nZf7Vo');
    $componentTag = $_instance->getRenderedChildComponentTagName('1nZf7Vo');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('1nZf7Vo');
} else {
    $response = \Livewire\Livewire::mount('validate',['crime'  => $crime]);
    $html = $response->html();
    $_instance->logRenderedChild('1nZf7Vo', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                  </div>
                  

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
<input id="long" type="hidden" value="<?php echo e($crime->longitude); ?>">
<input id="lat" type="hidden" value="<?php echo e($crime->latitude); ?>">
<?php $__env->startPush('ajax_crud'); ?>
<script type="text/javascript">
    // On initialise la latitude et la longitude de Paris (centre de la carte)
    var lat =parseFloat(document.getElementById('lat').value) ;
    var lon =parseFloat(document.getElementById('long').value);
    var macarte = null;
    // Fonction d'initialisation de la carte
    function initMap() {
        // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
        macarte = L.map('map').setView([lon, lat], 6);
        // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            // Il est toujours bien de laisser le lien vers la source des données
            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">UICN</a>',
            minZoom: 1,
            maxZoom: 20
        }).addTo(macarte);
        var marker = L.marker([lon,lat]).addTo(macarte);
    }
    window.onload = function(){
// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
initMap();
    };
</script>

<script src="<?php echo e(asset('js/sweetalert.js')); ?>"></script>
<link href="<?php echo e(URL::asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="<?php echo e(asset('js/ajax.js')); ?>"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    // $('.js-example-basic-single').select2();
    // $('#mySelect2').select2('data');
    // $('#mySelect2').find(':selected');
    // $('.js-example-basic-confiscation').select2();;
    // $('#mySelect2confiscation').select2('data');
    // $('#mySelect2confiscation').find(':selected');accordionjsrefresh-accordeon
        window.addEventListener('refresh-accordeon', event => {
            // $('.js-example-basic-single').select2();
            // $('.demo-accordion').accordion();
        });
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('livewirescript'); ?>
<?php echo \Livewire\Livewire::scripts(); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/louisbertson/Desktop/criminalite/resources/views/pages/backoffice/crimes/show.blade.php ENDPATH**/ ?>