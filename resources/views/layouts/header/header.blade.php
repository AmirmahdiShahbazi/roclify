
@include('layouts.header.head')

<header>
        <nav class="navbar navbar-expand-lg   h3">
            <a class=" h2 text-white" href="{{route('home')}}">Rocklify</a>
            <ul class="navbar-nav ml-auto  ">
                <li class="nav-item ">
                    {{-- <a class="bookmark nav-link text-white text-decoration-none mx-3 " href="#"><i class=" bookmark fa-regular fa-bookmark h2  "></i></a> --}}
                </li>

            </ul>


            <button class="navbar-toggler   bg-transparent navbar-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="menu navbar-toggler fa-solid fa-solid fa-bars text-white " style="color: white;"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ">


                    <li class="nav-item  " style="position:relative;">
                        <form id="search" method="GET" action="{{route('search')}}" class="form-inline my-2 my-lg-0 mr-sm-4 ">
                            <input id="search-input" name="name" class="search   mr-sm-2 h5 pr-2 text-white" type="search" placeholder="جستجو کنید" aria-label="Search">
                            <button class="search-button text-white  h5" type="submit"><i class="m-2 fa-solid fa-magnifying-glass"></i></button>
         

                        </form>
                    </li>


                </ul>

            </div>
            @guest
                
            <div class="collapse navbar-collapse  justify-content-end " id="navbarSupportedContent">
                <a href="{{route('auth.login.index')}}" id="login-link" class=" float-left text-white h5 text-decoration-none" style="width: 100%;">
                    <i class="  fa-regular fa-user ml-1"></i>
                    <span class="login-link ">ورود / ثبت نام</span>
                </a>
            </div>  
            @endguest
            
            
            <div class="navbarSupportedContent collapse navbar-collapse d-flex justify-content-end " id="navbarSupportedContent">
                
                @auth

                <div class="">
                    <!-- Add your dashboard link here -->
                    <a href="{{route('dashbord')}}" id="dashboard-link" class=" text-white h5 text-decoration-none">
                        <span class=""><span class="material-symbols-outlined">
                            Dashboard
                        </span></span>
                    </a>
            
                    <a href="{{route('auth.logout')}}" id="login-link" class="login-link text-white h5 text-decoration-none mr-2 ms-auto">
                        <span class=""><span class="material-symbols-outlined">
                            logout
                        </span></span>
                    </a>
                </div>
                @endauth

            </div>



            


        </nav>
    </header>

