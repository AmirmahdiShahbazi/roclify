@include('layouts.header.header')
<div style="width: 100%;" class="d-flex justify-content-center mt-5 text-white text-right" dir="rtl">

<form  style="min-width: 25%;">
    <!-- Email input -->
    <div class="form-outline mb-4 ">
        <label class="form-label" for="form2Example1">ایمیل</label>

      <input type="email" id="form2Example1" class="form-control" />
    </div>
  
    <!-- Password input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form2Example2">پسورد</label>

      <input type="password" id="form2Example2" class="form-control" />
    </div>
  
    <!-- 2 column grid layout for inline styling -->
    <div class="row mb-4">
      <div class="col d-flex justify-content-center">
        <!-- Checkbox -->
        <div class="form-check">
            <label class="form-check-label ml-4 " for="form2Example31" style="font-size: 13px;"> Remember me </label>

           <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
        </div>
      </div>
  
      <div class="col">
        <!-- Simple link -->
        <a href="#!" style="font-size: 12px;">پسورد خود را فراموش کرده اید؟</a>
      </div>
    </div>
  
    <!-- Submit button -->
    <button type="button" class="btn btn-primary btn-block mb-4">ورود</button>
  


    <a href="#!" class="text-center">ثبت نام</a>


  </form>

</div>
@include('layouts.footer.footer')
