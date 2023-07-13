@include('layouts.dashboard.head')
<div class="wrapper "   >

  @include('layouts.dashboard.sidebar')
  <div class="content-wrapper px-5 mt-5" style="background-color: #1A1A1A; ">
    @yield('content')
  </div>  



</div>

 
@include('layouts.footer.footer')
