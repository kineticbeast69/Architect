@include("subview.header")

{{-- notification --}}
<div class="position-absolute top-0 end-0 z-3">
     @if (session('blog_success'))
          <x-notification type="success" message="{{ session('blog_success') }}" />
     @endif
</div>


<main class="d-flex">
     <aside>
          @include("subview.sidebar")
     </aside>

     {{-- writer dahboard with the data table --}}
     <div class="flex-grow-1 p-4 bg-white" style="height: 100dvh; overflow-y: auto; scrollbar-width: none;">

          {{-- new contact list --}}
          <div class="border border-secondary-subtle rounded shadow-lg px-2 py-4 mb-4">
               <h2 class="fw-bold mb-3">📖 Public Blogs</h2>
               <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-secondary table-hover align-middle rounded text-center border">
                         <thead class="table-dark">
                              <tr>
                                   <th>Serial No</th>
                                   <th>Blog ID</th>
                                   <th>Title</th>
                                   <th>Status</th>
                                   <th>Created At</th>
                                   <th>Published At</th>
                              </tr>
                         </thead>
                         <tbody>

                              {{-- public blog data --}}
                              @forelse ($publics as $index => $public)
                                   <tr>
                                        <td>{{ $index += 1 }}</td>
                                        <td>{{ $public->blog_id }}</td>
                                        <td><a href="{{ route('update-blog', ['blogID' => $public->blog_id]) }}"
                                                  class="text-decoration-none">{{ $public->title }}</a>
                                        </td>
                                        <td>
                                             <span class="badge text-bg-success">{{ $public->status }}</span>
                                        </td>
                                        <td>{{ $public->created_at }}</td>
                                        <td>{{ $public->published_at }}</td>
                                   </tr>
                              @empty
                                   <tr>
                                        <td colspan="6" class="text-center">No blogs found</td>
                                   </tr>
                              @endforelse
                         </tbody>

                    </table>
               </div>
          </div>

          {{-- reach out contact list --}}
          <div class="border border-secondary-subtle rounded shadow-lg px-2 py-4">
               <h2 class="fw-bold mb-3">🔏 Private Blog</h2>
               <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-secondary  table-hover align-middle text-center border">
                         <thead class="table-dark">
                              <tr>
                                   <th>Serial No</th>
                                   <th>Blog ID</th>
                                   <th>Title</th>
                                   <th>Status</th>
                                   <th>Created At</th>
                              </tr>
                         </thead>
                         <tbody>

                              {{-- private blog data --}}
                              @forelse ($privates as $index => $private)
                                   <tr>
                                        <td>{{ $index += 1 }}</td>
                                        <td>{{ $private->blog_id }}</td>
                                        <td class="text-wrap"><a
                                                  href="{{ route('update-blog', ['blogID' => $private->blog_id]) }}"
                                                  class="text-decoration-none text-wrap">{{ $private->title }}</a></td>
                                        <td>
                                             <span class="badge text-bg-warning">{{ $private->status }}</span>
                                        </td>
                                        <td>{{ $private->created_at }}</td>
                                   </tr>
                              @empty
                                   <tr>
                                        <td colspan="6" class="text-center">No contacts found</td>
                                   </tr>
                              @endforelse
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
</main>
@include("subview.footer")