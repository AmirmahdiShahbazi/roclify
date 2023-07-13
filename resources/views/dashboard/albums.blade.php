@extends('layouts.dashboard.dashboard')

@section('content')

    <span class="text-white h5 align-baseline">لیست البوم ها</span>
    <a href="{{route('dashbord.albums.create')}}" class="btn btn-primary text-white float-left mb-3 align-baseline">افزودن البوم جدید</a>
    

<table class="table table-dark  " >
    <thead>

      <tr>
        <th scope="col">#</th>
        <th scope="col">نام</th>
        <th scope="col">بند</th>
        <th scope="col">عملیات</th>

      </tr>
    </thead>
    <tbody>
      
      @foreach ($albums as $album )
      <tr>
        <th scope="row">{{$album->id}}</th>
        <td>{{$album->name}}</td>
        <td>{{$album->band->name}}</td>
        <td>         
          <form action="" method="post" class="d-inline">
          @csrf 
          @method('DELETE')
         <button type="submit" class="fa-solid fa-trash bg-transparent border-0 text-white "  style="cursor: pointer"></button>
       </form> 


       <form action="" method="post" class="d-inline">
         @csrf 
         @method('DELETE')
        <button type="submit" class="fa-solid fa-pen-to-square mr-1 bg-transparent border-0 text-white cursor-pointer" style="cursor: pointer"></button>
      </form> </td>
      </tr>
      @endforeach


    </tbody>
  </table>

  <div class="d-flex justify-content-center">{{ $albums->links() }}</div>


@endsection