@extends('layouts.band.archive')
@section('content')

<style>

    
</style>

<section class="pt-3 px-2">

    <div class="container mr-0 pr-0 ">

        @foreach ($albums as $album)

    

        <div class="row">
            <div class="col col-lg-4 mr-0 ">
                <div class="card card-block ">
                    <img style="object-fit: cover; width: 100%; height: 100%;" class="rounded border border-white"  src="{{asset("storage/".$album->thumbnail)}}">
                </div>


            </div>
            <div class="col col-lg-8 ">
                <div class=" py-3  ">
                    <span class="text-white h4 float-lg-right ">{{$album->name}}</span>
                    <p class=" description float-lg-right mt-0  text-right  " style="    ">
                        {{$album->biography}}
                    </p>

                    <a>{{$album->band->name}}>{{$band->name}}</a>

                    <p class="date float-lg-right">
                        تاریخ انتشار : {{explode(" ",$album->created_at)[0]}}
                    </p>
                    <a href="{{route('bands.single',$album->id)}}" class="float-left" href="#">ادامه مطالب</a>




                </div>
            </div>


        </div>

        <hr class="my-4 bg-white">
        @endforeach

        <div class="d-flex justify-content-center">{{ $albums->links() }}</div>



        




    </div>


</section>





@endsection