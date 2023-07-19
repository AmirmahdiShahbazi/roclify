@extends('layouts.home.home')
@section('content')
@include('alerts.danger')
@include('alerts.success')
<section class="pt-3 ">
    <div class="container-fluid ">
        <span class="text-white float-right ">بند ها</span>
        <a href="{{route('bands.archive')}}" class=" text-right " style="color: #4287f5"> مشاهده همه &#62;</a>

        <div class="scrolling-wrapper row flex-row flex-nowrap  pb-4 pt-2">
@foreach ($bands as $band)
    
            <div class="col-4 ">
                <div class="card card-block card-1"> 
                    <a href="{{route('bands.single',$band->id)}}" style="width:100%;height:100%;">

                        <img style="object-fit: cover; width: 100%; height: 100%;" class="rounded border border-white"  src="{{asset("storage/".$band->thumbnail)}}">



                    </a>
                </div>
            </div>
            @endforeach


        </div>

    </div>
</section>


<section class="py-5 ">
    <div class="container-fluid ">
        <span class="text-white float-right ">آلبوم ها</span>
        <a href="{{route('albums.archive')}}" class=" text-right " style="color: #4287f5"> مشاهده همه &#62;</a>


        <div class="scrolling-wrapper row flex-row flex-nowrap pb-4 pt-2">
            @foreach ($albums as $album)
                <div id="item" class="col-4">
                    <div class="card card-block card-1">

                        <a href="{{route('albums.single',$album->id)}}" style="width:100%;height:100%;">

                            <img style="object-fit: cover; width: 100%; height: 100%;" class="rounded border border-white"  src="{{asset("storage/".$band->thumbnail)}}">
    
    
    
                        </a>
                    </div>
                </div>
            @endforeach

            
        </div>
    </div>
</section>
@endsection