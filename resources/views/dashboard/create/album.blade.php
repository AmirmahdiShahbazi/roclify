
@extends('layouts.dashboard.dashboard')
@section('content')
{{-- <script src="//s3-us-west-1.amazonaws.com/xinha/xinha-latest/XinhaEasy.js"></script> --}}

<style>
  .progress-bar {
  width: 100%;
  height: 20px;
  background-color: #ddd;
}
#progress {
  width: 0%;
  height: 100%;
  background-color: #4CAF50;
}
</style>

<h4 class="text-white mb-4">ساخت آلبوم جدید</h3>
  @include('alerts.danger')
@include('alerts.success')

""
<div  id="progress-bar-container">
  <div id="progress-bar"></div>
  <div id="progress-status"></div>
</div>
  <form id="myForm" action="{{route('dashbord.albums.store')}}" enctype="multipart/form-data" method="post">
    @csrf


    
    <div class="row">
      <div class="col">
        <input type="text" class="form-control" name="album-name" placeholder="نام آلبوم">
      </div>
      <div class="col">
        <input type="text" class="form-control" name="album-band" placeholder="نام بند">

      </div>

    </div>
    <div class="row mt-3">

      <div class="col">
        <textarea id="markItUp"class="form-control position-relative" name="album-bio" placeholder="biography" style="height: 200px;"></textarea>
      </div>
      </div>

      <div class="row mt-3">

        <input id="thumbnail-input" placeholder="لینک دانلود" name="album-link" type="text" class="form-control">

      
      </div>
      <div class="row mt-3">

        <div class="col text-white">
          <label for="thumbnail-input"> thumbnail</label>
          <input id="thumbnail-input" name="album-thumbnail" type="file" class="form-control">
        </div>
        <div class="col text-white">
          <label for="image-input"> image</label>
          <input id="image-input"type="file" name="album-image" class="form-control">
        </div>
      </div>

        <div class="row mt-3 mb-5">

          <div class="col text-white">
            <button onclick="submitOuterForm()" name="submit" class="form-control btn btn-primary">Submit</button>
          </div>
          
          </div>
  </form>








      



  
  
  @endsection
@include('layouts.footer.footer')