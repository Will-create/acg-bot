@if ( Session::has($nom) )
<div class="alert alert-success shadow" role="alert" style="width: 90%">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {!! session($nom) !!}
</div>
@endif