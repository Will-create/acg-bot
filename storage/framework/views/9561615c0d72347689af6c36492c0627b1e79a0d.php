<?php $__env->startSection('css'); ?>
<!-- INTERNAL SELECT2 CSS -->
<link href="<?php echo e(URL::asset('assets/plugins/fileuploads/css/fileupload.css')); ?>" rel="stylesheet" type="text/css" />

<link href="<?php echo e(URL::asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />

<!-- INTERNAL  DATA TABLE CSS-->
<link href="<?php echo e(URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(URL::asset('assets/plugins/datatable/responsivebootstrap4.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')); ?>" rel="stylesheet" />

<!-- INTERNAL PRISM CSS -->
<link href="<?php echo e(URL::asset('assets/plugins/prism/prism.css')); ?>" rel="stylesheet">
<!-- INTERNAL TELEPHONE CSS-->
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/plugins/telephoneinput/telephoneinput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- PAGE-HEADER -->

<?php echo $__env->make('partials._notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="page-header">
    <div>
        <h1 class="page-title">Liste des types de crime</h1>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('accueil')); ?>">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Type de crime</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<!-- ROW-1 OPEN -->
<div id="loader" class="d-none">
    <div class="loader"></div>
  </div>
<div id="crimenature">
<div class="row">
    <div class="col-md-8 col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Liste des types de crime</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100 table-sm">
                        <thead>
                            <tr>
                                <th class="wd-15p">Désignation</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $naturesCrimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $naturesCrime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(ucfirst($naturesCrime->nom)); ?></td>
                                
                                
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-4">
        <form method="GET" id="post_crime">
            <?php echo csrf_field(); ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="designation">Désignation</label>
                                <input type="text" class="form-control" name="nom" placeholder="Nature"
                                    id="nature" value="<?php echo e(old('nature')); ?>" required>
                                <?php $__errorArgs = ['nom'];
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
                                <label class="form-label" for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="4"
                                    placeholder=" Decrivez brièvement cet type  "></textarea>
                                <?php $__errorArgs = ['description'];
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
                            <button type="submit" id="submit4" class="btn btn-primary"> <span>
                                    <i class="fe fe-save"></i>
                                </span> Enregistrer</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</div>
<!-- ROW-1 CLOSED -->




<!-- LARGE MODAL -->
<div id="largeModalAddUser" class="modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header pd-x-20">
                <h6 class="modal-title text-center">Ajouter un naturesCrime </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-20">
                <div class="row">
                    <div class="col-md-12">



                    </div>
                </div>
            </div><!-- modal-body -->
            
        </div>
    </div><!-- MODAL DIALOG -->
</div>
<!-- LARGE MODAL CLOSED -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<!-- INTERNAL  DATA TABLE JS-->
<script src="<?php echo e(URL::asset('assets/plugins/fileuploads/js/fileupload.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/fileuploads/js/file-upload.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/datatable.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/jszip.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/fileexport/buttons.colVis.min.js')); ?>"></script>

<script src="<?php echo e(URL::asset('assets/plugins/clipboard/clipboard.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/clipboard/clipboard.js')); ?>"></script>

<!-- INTERNALPRISM JS -->
<script src="<?php echo e(URL::asset('assets/plugins/prism/prism.js')); ?>"></script>
<!-- INTERNAL TELEPHONE JS -->


<?php $__env->stopSection(); ?>

<?php $__env->startPush('ajax_crud'); ?>

<script src="<?php echo e(asset('js/sweetalert.js')); ?>"></script>

<script src="<?php echo e(asset('js/ajax.js')); ?>"></script>
<script>
    $('.deletebuton').click( function () {
        var item = $(this);
        swal({
    title: "Confimer",
    text: " Voullez-vous supprimer cet enregistrement ? ",
    icon: "warning",
    buttons: ["Annuler", "Supprimer"],
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
        $('#loader').show();
      $.ajax({
          url: item.attr('data-url'),
          method: 'DELETE',
          data: { "_token": "<?php echo e(csrf_token()); ?>" },
          success: function (response) {
            item.parent().parent().hide();
            var url = '/nature_crimes';
          location.href = url;
            swal({
            position: 'center',
            icon: 'success',
            title: 'La donnée  a supprimée avec succès',
            button: false,
            timer: 2500
          })
           $('#loader').hide();
          },
          error: function(err){
              console.log('----------------------------error-------------------------');
              console.log(err);
              item.parent().parent().hide();
              var url = '/nature_crimes';
          location.href = url;
              swal({
            position: 'center',
            icon: 'success',
            title: 'La donnéé  a supprimée avec succès',
            button: false,
            timer: 2500
          })
          $('#loader').hide();
          }
        });
    }

    else {
    swal({
        position: 'center',
        icon: 'info',
        title: 'Suppression annulée',
        button:false,
        timer: 1500

    });
  }
  });
    })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Switch Maker\criminalite\resources\views/pages/backoffice/natureCrime/index.blade.php ENDPATH**/ ?>