<!-- @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <span type="span" class="close" data-dismiss="alert"><i class="las la-times"></i></span> 
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <span type="span" class="close" data-dismiss="alert"><i class="las la-times"></i></span> 
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <span type="span" class="close" data-dismiss="alert"><i class="las la-times"></i></span> 
    <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <span type="span" class="close" data-dismiss="alert"><i class="las la-times"></i></span> 
    <strong>{{ $message }}</strong>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
    <span type="span" class="close" data-dismiss="alert"><i class="las la-times"></i></span> 
    Please check the form below for errors
</div>
@endif -->