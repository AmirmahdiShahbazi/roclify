
@extends('layouts.dashboard.dashboard')
@section('content')
<h4 class="text-white mb-4">ویرایش آلبوم</h3>
@include('alerts.danger')
@include('alerts.success')



{{Form::open(['route' => ['dashbord.albums.update', $album->id],'method' => 'put','enctype' => 'multipart/form-data'])}}
 
  @csrf
  @method('PUT')

      <div class="row">
      <div class="col">
        <input type="hidden" name="album-id" value="{{$album->id}}" >
        <input id="search" type="text" value="{{$album->name}}" class="form-control" name="album-name"placeholder="نام بند">

      </div>
      <div class="col">
        <input id="search" type="text" value="{{$album->band->name}}"  class="form-control" name="album-band" placeholder="نام بند">

      </div>


    </div>
    <div class="row mt-3">

      <div class="col">
        <textarea id="markItUp" class="form-control" placeholder="biography" name="album-bio"style="height: 200px;">{{$album->biography}}</textarea>
      </div>
      </div>

      <div class="row mt-3">

        <div class="col">
          <input  class="form-control" placeholder="download link" name="album-link"style="" value="{{$album->download_link}}">
        </div>
        </div>

      <div class="row mt-3">

        <div class="col text-white">
          <label for="thumbnail-input"> thumbnail</label>
          <input value="" id="thumbnail-input" name="album-thumbnail" type="file" class="form-control">
          
        </div>
        <div class="">
            <img src="{{asset('storage/'.$album->thumbnail)}}" style="background-color:white; width:100px; height:100%;">
        </div>
        <div class="col text-white">
          <label for="image-input"> image</label>
          <input  id="image-input"type="file" name="album-image" class="form-control">
        </div>
        <div class="">
            <img src="{{asset('storage/'.$album->thumbnail)}}" style="background-color:white; width:100px; height:100%;">
        </div>
      </div>


        <div class="row mt-3 mb-5">

            <div class="col text-white">
              <input type="submit" name="submit" class="form-control btn btn-primary">
            </div>
            
            </div>
            {!! Form::close() !!}




@endsection