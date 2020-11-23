
@if ( Session::has('status') )
<div class="alert alert-success shadow" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {!! session('status') !!}
</div>
@elseif (Session::has('warning'))
<div class="alert alert-warning" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {!! session('warning') !!}
</div>
@endif
