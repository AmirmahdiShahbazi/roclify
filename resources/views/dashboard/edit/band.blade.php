
@extends('layouts.dashboard.dashboard')
@section('content')
<h4 class="text-white mb-4">ویرایش بند</h3>
@include('alerts.danger')
@include('alerts.success')



{{Form::open(['route' => ['dashbord.bands.update', $band->id],'method' => 'put','enctype' => 'multipart/form-data'])}}
 
  @csrf
  @method('PUT')

      <div class="row">
      <div class="col">
        <input type="hidden" name="band-id" value="{{$band->id}}" >
        <input id="search" type="text" value="{{$band->name}}" class="form-control" name="band-name"placeholder="نام بند">

      </div>


    </div>
    <div class="row mt-3">

      <div class="col">
        <textarea id="markItUp" class="form-control" placeholder="biography" name="band-bio"style="height: 200px;">{{$band->biography}}</textarea>
      </div>
      </div>

      <div class="row mt-3">

        <div class="col text-white">
          <label for="thumbnail-input"> thumbnail</label>
          <input value="" id="thumbnail-input" name="band-thumbnail" type="file" class="form-control">
          
        </div>
        <div class="">
            <img src="{{asset('storage/'.$band->thumbnail)}}" style="background-color:white; width:100px; height:100%;">
        </div>
        <div class="col text-white">
          <label for="image-input"> image</label>
          <input  id="image-input"type="file" name="band-image" class="form-control">
        </div>
        <div class="">
            <img src="{{asset('storage/'.$band->thumbnail)}}" style="background-color:white; width:100px; height:100%;">
        </div>
      </div>


        <div class="row mt-3 mb-5">

            <div class="col text-white">
              <input type="submit" name="submit" class="form-control btn btn-primary">
            </div>
            
            </div>
            {!! Form::close() !!}




@endsection