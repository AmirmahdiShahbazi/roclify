@include('layouts.header.header')
<div style="width: 100%;" class="d-flex justify-content-center mt-5 text-white text-right" dir="rtl">

<form action="" method="post"  style="min-width: 25%;">
    @include('alerts.danger')
    @include('alerts.success')    @csrf
    <div class="form-outline mb-4 ">
        <label class="form-label" for="form2Example1">رمز عبور جدید</label>

      <input type="password" name="password" id="form2Example1" class="form-control" />
    </div>

    <div class="form-outline mb-4 ">
        <label class="form-label" for="form2Example1">تکرار رمز عبور</label>

      <input type="password" name="password_confirmation" id="form2Example1" class="form-control" />
    </div>
  

  
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">ارسال ایمیل</button>
  



  </form>

</div>
@include('layouts.footer.footer')
