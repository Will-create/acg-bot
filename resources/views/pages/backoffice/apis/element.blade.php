<div class="card">
	<div class="card-body">
		<div class="clearfix">
			<!-- <h5 class="card-title" >{{formatDate($sms->created_at)}}</h5> -->
		   </div><br>
		   <div class="">
			   <b>Contenu d'origine :</b><br>
			   <small class="text-dark" >{{$sms->contenu_entree}} </small>
			   
			   
		   </div>
		   <div class="text-right mt-2">
		   		<small class="text-primary  ">Envoyer le:{{$sms->created_at->format('m-d-Y à H:i:s')}}</small>
		   </div>
		   <hr>
		   <div>
					   @livewire('sms',['sms' => $sms])
			</div>
   </div>
</div>

