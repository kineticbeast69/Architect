@include("subview.header")

{{-- Notification --}}
<div class="position-absolute top-0 end-0">
     @if (session('employee_exists'))
          <x-notification type="success" message="{{ session('employee_exists') }}" />
     @endif
     <!-- user server error -->
     @if (session('tech_error'))
          <x-notification type="success" message="{{ session('tech_error') }}" />
     @endif
     @if (session('Architect_id'))
          <x-notification type="success" message="{{ session('Architect_id') }}" />
     @endif

</div>

{{-- register form --}}
<div class="w-100 vh-100 d-flex justify-content-center align-items-center gradient">
     <div class="card  shadow p-4 rounded-4 " style="max-width: 400px; width: 100%;">
          <h4 class="text-center mb-2 fs-2 fw-bold text-primary-emphasis text-uppercase ">Architect</h4>

          <form method="post" action="/register-form">
               @csrf
               {{-- name section --}}
               <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" class="border border-dark form-control rounded-3" id="name" name="name">
                    {{-- email error zone --}}
                    @error("name")
                         <p class="form-error">{{ $message }}</p>
                    @enderror
               </div>

               {{-- email section --}}
               <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="border border-dark form-control rounded-3" id="name" name="email">
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

               {{-- hide and show password --}}
               <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input border border-dark" id="showPassword">
                    <label class="form-check-label" for="showPassword" id="passwordText">Show Password</label>
               </div>

               {{-- submit button --}}
               <button type="submit" class="btn btn-primary w-100 rounded-3">Register to Architect</button>
          </form>
          <div class="my-2" style="font-size: smaller;">*Enter your details to get your Architect ID otherwise.
          </div>
          <div class="">
               Have an Account?<a href="{{ route('login') }}" class="text-decoration-none"> Login</a>
          </div>
     </div>
</div>

@include("subview.footer")