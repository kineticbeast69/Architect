<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; height:100dvh;"> <a
          href="{{ route('home') }}"
          class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> <img
               src="/img/logo.svg" alt="" class="w-25" loading="lazy"> <span class="fs-4">Architect</span> </a>
     <hr>
     {{-- admin sidebar list --}}
     @can("isAdmin")
          <x-admin-sidebar-list />
     @endcan

     {{-- writer side bar --}}
     @can("isWriter")
          <x-writer-sidebar-list />
     @endcan

     {{-- employee side bar --}}
     @can("isEmployee")
          <x-employee-sidebar-list />
     @endcan

     <hr>
     <div class="dropdown"> <a href="#"
               class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
               data-bs-toggle="dropdown" aria-expanded="false"> <strong>Test User</strong> </a>
          <ul class="dropdown-menu dropdown-menu-light text-small shadow">

               <li class="d-flex align-items-center justify-content-center">
                    <form action="{{ route("logout") }}" method="post">
                         @csrf
                         @method("delete")
                         <button class="btn btn-sm  text-blue fs-5" type="submit">Logout</button>
                    </form>
               </li>
          </ul>
     </div>
</div>