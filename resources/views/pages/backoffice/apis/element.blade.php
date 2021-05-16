<div class="card">
	<div class="card-body">
		<div class="clearfix">
			<h5 class="card-title" >{{formatDate($sms->created_at)}}</h5>
		   </div><br>
		   <div class="">
			   <b>Contenu d'origine :</b><br>
			   <small class="text-dark" >{{$sms->contenu_entree}} </small>
			   
		   </div><hr>
		   <ul class="demo-accordion accordionjs m-0" data-active-index="false">
			  <li class="">
				  <div>
					  <h3>Options</h3>
				  </div>
				  <div>
					   @livewire('sms',['sms' => $sms])
					   <hr>
					   <div style="display:flex;justify-content: space-between; flex-wrap:wrap;" class="row pr-5 ml-5">
						   @livewire('veto',['sms' => $sms])
						   @if ($sms->destination == 'moov')
						   @livewire('onatel',['sms' => $sms])
							   
						   @endif
						   @if ($sms->destination == 'telecel')
						   @livewire('telecel',['sms' => $sms])
							   
						   @endif
						   @if ($sms->destination == 'malitel')
						   @livewire('malitel',['sms' => $sms])
						   @endif
					   </div>
				  </div>
			  </li>
		   </ul>
		   <ul class="demo-accordion accordionjs m-0" data-active-index="false">
			   <li class="">
				   <div>
					   <h3>Commenter</h3>
				   </div>
				   <div>
					   @livewire('commentaire',['message' => $sms,'commentaires' => $sms->commentaires])
				   </div>
			   </li>
		   </ul>
			@livewire('comment',['message' => $sms,'commentaires' => $sms->commentaires])
   </div>
</div>

