@include("subview.header")

{{-- notification zone --}}
<div class="position-absolute top-25 end-25">
     @if (session('employee_not_found'))
          <x-notification type="success" message="{{ session('employee_not_found') }}" />
     @endif
     <!-- user server error -->
     @if (session('password_update'))
          <x-notification type="success" message="{{ session('password_update') }}" />
     @endif

</div>

{{-- forget password form --}}
<div class="w-100 vh-100 d-flex justify-content-center align-items-center ">
     <div class="card  shadow p-4 rounded-4 " style="max-width: 400px; width: 100%;">
          <h4 class="text-center mb-4 fs-2 fw-bold text-primary-emphasis text-uppercase ">Reset Password</h4>
          <form method="POST" action="/forget-password-form">
               @csrf
               @method('PUT')
               {{-- id section --}}
               <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="border border-dark form-control rounded-3" id="email" name="email">
                    {{-- email error zone --}}
                    @error("email")
                         <p class="form-error">{{ $message }}</p>
                    @enderror
               </div>

               {{-- password section --}}
               <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control rounded-3 border border-dark" id="password"
                         name="password">
                    {{-- password error --}}
                    @error("password")
                         <p class="form-error">{{$message}}</P>
                    @enderror
               </div>

               {{-- confirm password --}}
               <div class="mb-3">
                    <label for="cpassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control rounded-3 border border-dark" id="cpassword"
                         name="password_confirmation">
                    {{-- password error --}}
                    @error("password_confirmation")
                         <p class="form-error">{{$message}}</P>
                    @enderror
               </div>

               {{-- hide and show password --}}
               <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input border border-dark" id="showPassword">
                    <label class="form-check-label" for="showPassword" id="passwordText">Show Password</label>
               </div>

               {{-- submit button --}}
               <button type="submit" class="btn btn-primary w-100 rounded-3">Reset Password</button>
          </form>

          {{-- forgetPassword --}}
          <div class="text-center mt-3">
               <a href="{{ route('login') }}" class="text-decoration-none"><span class="mr-2"><i
                              class="fa-solid fa-arrow-left-long"></i></span>Back</a>
          </div>
     </div>
</div>

@include("subview.footer")