@include("subview.header")

{{-- Notification --}}
<div class="position-absolute top-0 end-0">
     @if (session('blog_delete'))
          <x-notification type="success" message="{{ session('blog_delete') }}" />
     @endif
     @if (session('success'))
          <x-notification type="success" message="{{ session('success') }}" />
     @endif
     @if (session('error'))
          <x-notification type="warning" message="{{ session('error') }}" />
     @endif
</div>


<main class="d-flex">
     <aside>
          @include("subview.sidebar")
     </aside>

     {{-- blogs data --}}
     <div class="flex-grow-1 p-4 bg-white" style="height: 100dvh; overflow-y: auto; scrollbar-width: none;">

          {{-- public blog list --}}
          <div class="border border-secondary-subtle rounded shadow-lg px-2 py-4 mb-4">
               <h2 class="fw-bold mb-3">📃 Public Blog List</h2>
               <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-secondary table-hover align-middle rounded text-center border">
                         <thead class="table-dark">
                              <tr>
                                   <th>Serial No</th>
                                   <th>Writer Name</th>
                                   <th>Blog Id</th>
                                   <th>Title</th>
                                   <th>Status</th>
                                   <th>Published At</th>
                                   <th>Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              @forelse ($publics as $index => $public)
                                   <tr>
                                        <td>{{ $index += 1 }}</td>
                                        <td class="text-primary">{{ $public->users->name }}</td>
                                        <td>{{ $public->blog_id }}</td>
                                        <td><a href="{{ route('blogInfo', ['blogID' => $public->blog_id]) }}"
                                                  class="text-decoration-none">{{ $public->title }}</a></td>
                                        <td>
                                             <form action="{{ route('blogStatus', ['id' => $public->id]) }}" method="post">
                                                  @csrf
                                                  @method("put")
                                                  <select class="form-select form-select-sm" name="status"
                                                       onchange="this.form.submit()">
                                                       <option value="private">private</option>
                                                       <option value="public" selected>{{ $public->status }}</option>
                                                  </select>
                                             </form>
                                        </td>
                                        <td>{{ $public->published_at }}</td>
                                        <td>
                                             <form action="{{ route('blogDelete', ['id' => $public->id]) }}" method="post">
                                                  @csrf
                                                  @method('delete')
                                                  <button class="btn btn-danger"><i
                                                            class="fa-sharp fa-solid fa-trash"></i></button>
                                             </form>
                                        </td>
                                   </tr>
                              @empty
                                   <tr>
                                        <td colspan="6" class="text-center">No Public Blogs found.</td>
                                   </tr>
                              @endforelse
                         </tbody>

                    </table>
               </div>
          </div>


          {{-- private blog table --}}
          <div class="border border-secondary-subtle rounded shadow-lg px-2 py-4 mb-4">
               <h2 class="fw-bold mb-3">🛡️ Private Blog List</h2>
               <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-secondary table-hover align-middle rounded text-center border">
                         <thead class="table-dark">
                              <tr>
                                   <th>Serial No</th>
                                   <th>Writer Name</th>
                                   <th>Blog Id</th>
                                   <th>Title</th>
                                   <th>Status</th>
                                   <th>Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              @forelse ($privates as $index => $private)
                                   <tr>
                                        <td>{{ $index += 1 }}</td>
                                        <td class="text-primary">{{ $private->users->name }}</td>
                                        <td>{{ $private->blog_id }}</td>
                                        <td><a href="{{ route('blogInfo', ['blogID' => $private->blog_id]) }}"
                                                  class="text-decoration-none">{{ $private->title }}</a></td>
                                        <td>
                                             <form action="{{ route('blogStatus', ['id' => $private->id]) }}" method="post">
                                                  @csrf @method("put") <select class="form-select form-select-sm"
                                                       name="status" onchange="this.form.submit()">
                                                       <option value="public">public</option>
                                                       <option value="private" selected>{{ $private->status }}</option>
                                                  </select>
                                             </form>
                                        </td>
                                        <td>
                                             <form action="{{ route('blogDelete', ['id' => $private->id]) }}" method="post">
                                                  @csrf
                                                  @method('delete')
                                                  <button class="btn btn-danger"><i
                                                            class="fa-sharp fa-solid fa-trash"></i></button>
                                             </form>
                                        </td>
                                   </tr>
                              @empty
                                   <tr>
                                        <td colspan="6" class="text-center">No Private Blog found.</td>
                                   </tr>
                              @endforelse
                         </tbody>

                    </table>
               </div>
          </div>

          {{-- updated blog section --}}
          <div class="border border-secondary-subtle rounded shadow-lg px-2 py-4">
               <h2 class="fw-bold mb-3">📖 Updated Blog List</h2>
               <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-secondary  table-hover align-middle text-center border">
                         <thead class="table-dark">
                              <tr>
                                   <th>Serial No</th>
                                   <th>Writer Name</th>
                                   <th>Blog Id</th>
                                   <th>Title</th>
                                   <th>Status</th>
                                   <th>Updated Blog</th>
                                   <th>Published At</th>
                                   <th>Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              @forelse ($updates as $index => $update)
                                   <tr>
                                        <td>{{ $index += 1 }}</td>
                                        <td class="text-primary">{{ $update->users->name }}</td>
                                        <td>{{ $update->blog_id }}</td>
                                        <td><a href="{{ route('blogInfo', ['blogID' => $update->blog_id]) }}"
                                                  class="text-decoration-none">{{ $update->title }}</a></td>
                                        <td>
                                             <form action="{{ route('blogStatus', ['id' => $update->id]) }}" method="post">
                                                  @csrf
                                                  @method("put")
                                                  <select class="form-select form-select-sm" name="status"
                                                       onchange="this.form.submit()">
                                                       <option value="public">public</option>
                                                       <option value="private" selected>{{ $update->status }}</option>
                                                  </select>
                                             </form>
                                        </td>
                                        <td>{{ $update->updated_blog ? "True" : "False" }}</td>
                                        <td>{{ $update->published_at ? $update->published_at : "none" }}</td>
                                        <td>
                                             <form action="{{ route('blogDelete', ['id' => $update->id]) }}" method="post">
                                                  @csrf
                                                  @method('delete')
                                                  <button class="btn btn-danger"><i
                                                            class="fa-sharp fa-solid fa-trash"></i></button>
                                             </form>
                                        </td>
                                   </tr>
                              @empty
                                   <tr>
                                        <td colspan="7" class="text-center">No Updated BLog found</td>
                                   </tr>
                              @endforelse
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
</main>




@include("subview.footer")