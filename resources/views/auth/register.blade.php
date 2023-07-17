@include('layouts.header.header')

<div style="width: 100%;" class="d-flex justify-content-center mt-5 text-white text-right" dir="rtl">

<form class="" action="{{route('auth.register')}}" method="post" style="min-width: 25%;" >
  @include('alerts.danger')
@include('alerts.success')
  @csrf
  <!-- Email input -->

    <div class="form-outline mb-4 ">
        <label class="form-label" for="form2Example1">ایمیل</label>

      <input type="email" name="email" id="form2Example1" class="form-control" />
    </div>
  
    <!-- Password input -->
    <div class="form-outline mb-4">
        <label class="form-label"  for="form2Example2">پسورد</label>

      <input type="password" name="password" id="form2Example2" class="form-control" />
    </div>


    <div class="form-outline mb-4">
        <label class="form-label" for="form2Example2">تکرار پسورد
        </label>

      <input name="password_confirmation" type="password" id="form2Example2" class="form-control" />
    </div>
  

    <!-- 2 column grid layout for inline styling -->
    
  
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">ثبت نام</button>
  


    <a href="{{route('auth.login.index')}}" class="text-center">ورود</a>


  </form>

</div>
@include('layouts.footer.footer')
