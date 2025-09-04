@include("subview.header")

{{-- notification --}}
<div class="position-absolute top-0 end-0">
     @if (session('project_update'))
          <x-notification type="success" message="{{ session('project_update') }}" />
     @endif
     @if (session('projects_add'))
          <x-notification type="success" message="{{ session('success') }}" />
     @endif
     @if (session('tech_error'))
          <x-notification type="warning" message="{{ session('tech_error') }}" />
     @endif
     @if (session('projects_delete'))
          <x-notification type="success" message="{{ session('projects_delete') }}" />
     @endif
</div>


<main class="d-flex">
     <aside>
          @include("subview.sidebar")
     </aside>



     <div class="flex-grow-1 p-4 bg-white" style="height: 100dvh; overflow-y: auto; scrollbar-width: none;">

          {{-- services table list are here --}}
          <div class="border border-secondary-subtle rounded shadow-lg px-2 py-4 mb-4">
               <h2 class="fw-bold mb-3">📃 Projects List</h2>
               <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-secondary table-hover align-middle rounded text-center border">
                         <thead class="table-dark">
                              <tr>
                                   <th>Serial No</th>
                                   <th>Project ID</th>
                                   <th>Project Name</th>
                                   <th>Title</th>
                                   <th>Created At</th>
                                   <th>Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              @forelse ($projects as $index => $project)
                                   <tr>
                                        <td>{{ $index += 1 }}</td>
                                        <td>{{ $project->project_id }}</td>
                                        <td>{{ $project->project_name }}</td>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->created_at }}</td>
                                        <td><span class="d-flex align-items-center justify-content-center gap-3">
                                                  <a
                                                       href="{{ route('projectUpdate', ['projectID' => $project->project_id]) }}"><button
                                                            class="btn btn-light">
                                                            <i class="fs-4 fa-sharp fa-solid fa-pen-nib text-success"></i>
                                                       </button></a>
                                                  <form action="{{ route('projectDelete', ['id' => $project->id]) }}"
                                                       method="post">
                                                       @csrf
                                                       @method('delete')
                                                       <button class="btn btn-light" type="submit"><i
                                                                 class="fs-4 fa-sharp fa-solid fa-trash text-danger"></i></button>
                                                  </form>
                                             </span></td>
                                   </tr>
                              @empty
                                   <tr>
                                        <td colspan="6" class="text-center">No Services found.</td>
                                   </tr>
                              @endforelse
                         </tbody>

                    </table>
               </div>
          </div>

          {{-- adding the services form are here --}}
          <div class="row border border-secondary-subtle rounded shadow-lg p-2">
               <div class="col-12">
                    <div class="card shadow-sm border-0">
                         <div class="card-header bg-dark text-white text-center">
                              <h4 class="mb-0">✍️ Add New Projects</h4>
                         </div>
                         <div class="card-body">
                              <form method="post" action="{{ route("projectForm") }}" enctype="multipart/form-data">
                                   @csrf
                                   <!-- project name -->
                                   <div class="mb-3">
                                        <label for="title" class="form-label fs-3">*Project Name</label>
                                        <input type="text" class="form-control border border-secondary" id="title"
                                             placeholder="Enter a your Project Name" name="name">
                                        {{-- name error zone --}}
                                        @error('name')
                                             <p class="form-error">{{$message}}</p>
                                        @enderror
                                   </div>

                                   {{-- project title --}}
                                   <div class="mb-3">
                                        <label for="title" class="form-label fs-3">Project Title</label>
                                        <input type="text" class="form-control border border-secondary" id="title"
                                             placeholder="Enter a your project title" name="title">
                                        {{-- title error zone --}}
                                        @error('title')
                                             <p class="form-error">{{$message}}</p>
                                        @enderror
                                   </div>

                                   <!-- project Content -->
                                   <div class="mb-3">
                                        <label for="description" class="form-label fs-3">Project Content</label>
                                        <textarea class="form-control border border-secondary" id="description"
                                             rows="10" placeholder="Start writing your project..."
                                             name="description"></textarea>
                                        {{-- description error zone --}}
                                        @error('description')
                                             <p class="form-error">{{$message }}</p>
                                        @enderror
                                   </div>

                                   <!-- Image Upload -->
                                   <div class="mb-3">
                                        <label for="image" class="form-label fs-3">Project Image</label>
                                        <input class="form-control border border-secondary bg-secondary" type="file"
                                             id="image" accept="image/*" name="image">
                                        <small class="text-muted ">Upload a banner or cover image
                                             for your Project.</small>
                                        @error('image')
                                             <p class="form-error">{{ $message }}</p>
                                        @enderror
                                   </div>

                                   <!-- Buttons -->
                                   <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-outline-secondary me-2">Discard</button>
                                        <button type="submit" class="btn btn-success">Add Project</button>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</main>


@include("subview.footer")