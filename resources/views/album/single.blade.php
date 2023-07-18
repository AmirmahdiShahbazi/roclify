@extends('layouts.album.archive')
@section('content')


<section>
    <div class="container pt-4 mt-5">

        <div class="row  justify-content-center">
            <div class="col col-11 ">
                <h1 class="text-white text-right mb-2">{{$album->name}}</h2>
                
                <div class="text-right mb-5">
                <a  href="{{route('bands.single',$album->band->id)}}" class="text-secondary  ">{{$album->band->name}}</a><span class="text-secondary"> > </span>    <a href="{{route('albums.single',$album->id)}}" class="text-secondary">{{$album->name}}</a>
                </div>
                <div class="thumbnaile card card-block mb-5">
                    <img style="object-fit:cover; width: 100%; height: 100%;" class="rounded border border-white"  src="{{asset("storage/".$album->thumbnail)}}">

                </div>

                <div class="mt-4">
                    <p class="description-l  text-right ">

                        {{$album->biography}}


                    </p>
                </div>


            </div>

            <div class="col-sm-11"></div>
        </div>

    </div>

</section>

<section class="px-5">
    <div class="mt-5  ">
        <ul class="list-group text-right pr-0 pb-5">
            <li class="list-group-item bg-dark"  ><a href="{{route("home")}}" data-target="#exampleModalCenter" data-toggle="modal">دانلود آلبوم بصورت یکجا</a></li>
            

        </ul>
    </div>
</section>


<section class="pt-4 px-sm-5 ">
    <div class="container-fluid ">
        <div class="mb-3">
        <span class="text-white float-right " >سایر آلبوم ها</span>
        <a href="{{route('albums.archive')}}" class=" text-right " style="color: #4287f5"> مشاهده همه &#62;</a>
    </div>
        <div class="scrolling-wrapper row flex-row flex-nowrap pb-4 mb-4">
            @foreach ($albums as $album)
            <div id="item" class="col-4">
                <div class="card card-block card-1">
                    <a href="{{route('albums.single',$album->id)}}" style="width:100%; height:100%;">
                        <img style="object-fit:cover; width:100%; height:100%;" class="rounded border border-white"  src="{{asset("storage/".$album->image)}}">
                    </a>
                </div>

            </div>
            @endforeach
        

            

</section>

@guest
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          برای دانود آلبوم ابتدا باید وارد سایت شوید
        </div>
        <div class="modal-footer">
          <a href="{{route('auth.login')}}" class="btn btn-secondary" >ورود</a>
        </div>
      </div>
    </div>
  </div>
  
@endguest
  
  
@endsection