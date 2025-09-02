@include("subview.header")

{{-- Notification --}}
<div class="position-absolute top-0 end-0">
     @if (session('id_not_found'))
          <x-notification type="danger" message="{{ session('id_not_found') }}" />
     @endif
     @if (session('password_failed'))
          <x-notification type="danger" message="{{ session('password_failed') }}" />
     @endif
     @if (session('password_update'))
          <x-notification type="success" message="{{ session('password_update') }}" />
     @endif
     @if (session('architect_id'))
          <x-notification type="info" message="{{ session('architect_id') }}" />
     @endif
     @if (session('logout'))
          <x-notification type="success" message="{{ session('logout') }}" />
     @endif
     @if (session('Auth_err'))
          <x-notification type="danger" message="{{ session('Auth_err') }}" />
     @endif
</div>

{{-- login form page --}}
<div class="w-100 vh-100 d-flex justify-content-center align-items-center gradient">
     <div class="card  shadow p-4 rounded-4 " style="max-width: 400px; width: 100%;">
          <h4 class="text-center mb-4 fs-2 fw-bold text-primary-emphasis text-uppercase ">Architect</h4>
          <form method="post" action="/login-form">
               @csrf
               {{-- id section --}}
               <div class="mb-3">
                    <label for="architect_id" class="form-label">Architect ID</label>
                    <input type="text" class="border border-dark form-control rounded-3" id="architect_id"
                         name="architect_id">
                    {{-- email error zone --}}
                    @error("architect_id")
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

               {{-- hide and show password --}}
               <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input border border-dark" id="showPassword">
                    <label class="form-check-label" for="showPassword" id="passwordText">Show Password</label>
               </div>

               {{-- submit button --}}
               <button type="submit" class="btn btn-primary w-100 rounded-3">Login to Architect</button>
          </form>

          {{-- forgetPassword and register route --}}
          <div class="d-flex align-items-center justify-content-between mt-3">
               <a href="{{ route('register') }}" class="text-decoration-none">Register</a>
               <a href="{{ route('forget_password') }}" class="text-decoration-none">Forgot Password?</a>
          </div>
     </div>
</div>



@include("subview.footer")