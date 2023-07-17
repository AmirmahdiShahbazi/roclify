@extends('layouts.band.archive')
@section('content')


<section>
    <div class="container pt-4 mt-5">

        <div class="row  justify-content-center">
            <div class="col col-11 ">
                <h1 class="text-white text-right mb-5">{{$band->name}}</h2>
                <div class="thumbnaile card card-block mb-5">
                    <img style="object-fit:cover; width: 100%; height: 100%;" class="rounded border border-white"  src="{{asset("storage/".$band->thumbnail)}}">

                </div>

                <div class="mt-4">
                    <p class="description-l  text-right ">

                        {{$band->biography}}


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
            <li class="list-group-item bg-dark text-white">البوم ها</li>
            @foreach ($band->albums as $album)
            <li class="list-group-item bg-secondary text-white "><a href="#">{{$album->name}}</a></li>

            @endforeach

        </ul>
    </div>
</section>


<section class="pt-4 px-sm-5 ">
    <div class="container-fluid ">
        <div class="mb-3">
        <span class="text-white float-right " >سایر بند ها</span>
        <a href="{{route('bands.archive')}}" class=" text-right " style="color: #4287f5"> مشاهده همه &#62;</a>
    </div>
        <div class="scrolling-wrapper row flex-row flex-nowrap pb-4 mb-4">
            @foreach ($bands as $band)
            <div id="item" class="col-4">
                <div class="card card-block card-1"><img style="object-fit:cover; width: 100%; height: 100%;" class="rounded border border-white"  src="{{asset("storage/".$band->thumbnail)}}">
                </div>
            </div>
            @endforeach
        

            

</section>

@endsection