@if($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert alert-danger">{{ $error }}</div>
@endforeach
@endif
@if(Session::has('failed'))
<div class="alert alert-danger">
    {{ Session::get('failed') }}
</div>
@endif