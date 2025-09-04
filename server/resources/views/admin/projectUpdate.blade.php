@include("subview.header")

<main class="d-flex">
     <aside>
          @include("subview.sidebar")
     </aside>

     {{-- service update form --}}
     <div class="border border-secondary-subtle rounded shadow-lg"
          style="height: 100dvh; overflow-y: auto; scrollbar-width: none;">
          <div class="col-12">
               <div class="card shadow-sm border-0">
                    <div class="card-header bg-dark text-white text-center">
                         <h4 class="mb-0">✍️ Update a Project</h4>
                    </div>
                    <div class="card-body">
                         <form method="post" action="{{ route('projectUpdateForm', ['id' => $project->id]) }}"
                              enctype="multipart/form-data">
                              @csrf
                              @method('put')
                              <!-- construction type -->
                              <div class="mb-3">
                                   <label for="title" class="form-label fs-3">*Project Name</label>
                                   <input type="text" class="form-control border border-secondary" id="title"
                                        placeholder="Enter a your Project Name" name="name"
                                        value="{{ $project->project_name }}">
                                   {{-- title error zone --}}
                                   @error('name')
                                        <p class="form-error">{{$message}}</p>
                                   @enderror
                              </div>

                              {{-- services title --}}
                              <div class="mb-3">
                                   <label for="title" class="form-label fs-3">*Project Title</label>
                                   <input type="text" class="form-control border border-secondary" id="title"
                                        placeholder="Enter a your project title" name="title"
                                        value="{{ $project->title }}}}">
                                   {{-- title error zone --}}
                                   @error('title')
                                        <p class="form-error">{{$message}}</p>
                                   @enderror
                              </div>

                              <!-- Blog Content -->
                              <div class="mb-3">
                                   <label for="description" class="form-label fs-3">Project Content</label>
                                   <textarea class="form-control border border-secondary" id="description" rows="10"
                                        placeholder="Start writing your project..."
                                        name="description">{{ $project->description }}</textarea>
                                   {{-- description error zone --}}
                                   @error('description')
                                        <p class="form-error">{{$message }}</p>
                                   @enderror
                              </div>

                              <!-- Image Upload -->
                              <div class="mb-3">
                                   @if ($project->image)
                                        <aside class="w-100">
                                             <h2 class="fs-3">Previous Service Image</h2>
                                             <img src="{{ asset('storage/' . $project->image) }}" alt="" class="w-25">
                                        </aside>
                                   @endif
                                   <label for="image" class="form-label fs-3">Featured Image</label>
                                   <input class="form-control border border-secondary bg-secondary" type="file"
                                        id="image" accept="image/*" name="image">
                                   <small class="text-muted ">Update a banner or cover image
                                        for your project.</small>
                                   @error('image')
                                        <p class="form-error">{{ $message }}</p>
                                   @enderror
                              </div>

                              <!-- Buttons -->
                              <div class="d-flex justify-content-end">
                                   <button type="reset" class="btn btn-outline-secondary me-2">Discard</button>
                                   <button type="submit" class="btn btn-success">Update Project</button>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>

</main>




@include("subview.footer")