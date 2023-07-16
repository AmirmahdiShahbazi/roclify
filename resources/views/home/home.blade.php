@extends('layouts.home.home')
@section('content')
@include('alerts.danger')
@include('alerts.success')
<section class="pt-3 ">
    <div class="container-fluid ">
        <span class="text-white float-right ">بند ها</span>
        <a href="#" class=" text-right " style="color: #4287f5"> مشاهده همه &#62;</a>

        <div class="scrolling-wrapper row flex-row flex-nowrap  pb-4 pt-2">

            <div class="col-4 ">
                <div class="card card-block card-1"></div>
            </div>
            <div class="col-4 ">
                <div class="card card-block card-2"></div>
            </div>
            <div class="col-4 ">
                <div class="card card-block card-3"></div>
            </div>
            <div class="col-4 ">
                <div class="card card-block card-4"></div>
            </div>
            <div class="col-4 ">
                <div class="card card-block card-5"></div>
            </div>
            <div class="col-4 ">
                <div class="card card-block card-6"></div>
            </div>
            <div class="col-4 ">
                <div class="card card-block card-7"></div>
            </div>
            <div class="col-4 ">
                <div class="card card-block card-8"></div>
            </div>
            <div class="col-4 ">
                <div class="card card-block card-9"></div>
            </div>
            <div class="col-4 ">
                <div class="card card-block card-10"></div>
            </div>
        </div>

    </div>
</section>


<section class="py-5 ">
    <div class="container-fluid ">
        <span class="text-white float-right ">آلبوم ها</span>
        <a href="#" class=" text-right " style="color: #4287f5"> مشاهده همه &#62;</a>


        <div class="scrolling-wrapper row flex-row flex-nowrap pb-4 pt-2">

            <div id="item" class="col-4">
                <div class="card card-block card-1"></div>
            </div>
            <div id="item" class="col-4 ">
                <div class="card card-block card-2"></div>
            </div>
            <div id="item" class="col-4 ">
                <div class="card card-block card-3"></div>
            </div>
            <div id="item" class="col-4 ">
                <div class="card card-block card-4"></div>
            </div>
            <div id="item" class="col-4 ">
                <div class="card card-block card-5"></div>
            </div>
            <div id="item" class="col-4 ">
                <div class="card card-block card-6"></div>
            </div>
            <div id="item" class="col-4 ">
                <div class="card card-block card-7"></div>
            </div>
            <div id="item" class="col-4 ">
                <div class="card card-block card-8"></div>
            </div>
            <div id="item" class="col-4 ">
                <div class="card card-block card-9"></div>
            </div>
            <div id="item" class="col-4 ">
                <div class="card card-block card-10"></div>
            </div>
        </div>
    </div>
</section>
@endsection