
@extends('layouts.dashboard.dashboard')
@section('content')
<h4 class="text-white mb-4">ساخت بند جدید</h3>
@include('alerts.danger')
@include('alerts.success')
<form action="{{route('dashbord.bands.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col">
        <input id="search" type="text" class="form-control" name="band-name"placeholder="نام بند">

      </div>


    </div>
    <div class="row mt-3">

      <div class="col">
        <textarea id="markItUp" class="form-control" placeholder="biography" name="band-bio"style="height: 200px;"></textarea>
      </div>
      </div>

      <div class="row mt-3">

        <div class="col text-white">
          <label for="thumbnail-input"> thumbnail</label>
          <input id="thumbnail-input" name="band-thumbnail" type="file" class="form-control">
        </div>
        <div class="col text-white">
          <label for="image-input"> image</label>
          <input id="image-input"type="file" name="band-image" class="form-control">
        </div>
      </div>


        <div class="row mt-3 mb-5">

            <div class="col text-white">
              <input type="submit" name="submit" class="form-control btn btn-primary">
            </div>
            
            </div>
  </form>




@endsection