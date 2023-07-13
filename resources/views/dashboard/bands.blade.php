@extends('layouts.dashboard.dashboard')

@section('content')

    <span class="text-white h5 align-baseline">لیست بند ها</span>

    @include('alerts.danger')
    @include('alerts.success')
    <a href="{{route('dashbord.bands.create')}}" class="btn btn-primary text-white float-left mb-3 align-baseline">افزودن بند جدید</a>


    <table class="table table-dark  " >
        {{-- <h3 class="text-white">لیست البوم ها</h3> --}}
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">نام</th>
            <th scope="col">البوم ها</th>
            <th scope="col">عملیات</th>
    
          </tr>
        </thead>
        <tbody>

          @foreach ($bands as $band)
          <tr>
            <th scope="row">{{$band->id}}</th>
            <td>{{$band->name}}</td>
            <td><a href="#">مشاهده</a></td>
            <td>
              <form action="{{route('dashbord.bands.delete',$band->id)}}" method="post" class="d-inline">
               @csrf 
               @method('DELETE')
              <button type="submit" class="fa-solid fa-trash bg-transparent border-0 text-white "  style="cursor: pointer"></button>
            </form> 


             <a href="{{route('dashbord.bands.edit',$band->id)}}" type="submit" class="fa-solid fa-pen-to-square mr-1 bg-transparent border-0 text-white cursor-pointer" style="cursor: pointer"></button>
            
          </tr>
          @endforeach



    
        </tbody>
      </table>
      <div class="d-flex justify-content-center">{{ $bands->links() }}</div>


@endsection