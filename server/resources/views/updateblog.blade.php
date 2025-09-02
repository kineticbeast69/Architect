@include("subview.header")

<main class="d-flex">
     <aside>
          @include("subview.sidebar")
     </aside>

     {{-- update your blog --}}
     <div class="container py-3 border-bottom border-secondary" style="overflow-y: auto; height: 100dvh;">
          <div class="row">
               <div class="col-12">
                    <div class="card shadow-sm border-0">
                         <div class="card-header bg-dark text-white text-center">
                              <h4 class="mb-0">✍️ Upadte the Blog</h4>
                         </div>
                         <div class="card-body">
                              <form method="post"
                                   action="{{ route("update-blog-form", ['blogID' => $blog->blog_id, 'id' => $blog->id]) }}"
                                   enctype="multipart/form-data">
                                   @csrf
                                   @method('put')
                                   <!-- Blog Title -->
                                   <div class="mb-3">
                                        <label for="title" class="form-label fs-3">*Blog Title</label>
                                        <input type="text" class="form-control border border-secondary" id="title"
                                             placeholder="Update your blog title" name="title"
                                             value="{{ $blog->title }}">
                                        <small class="text-muted">Your title will also generate the blog’s slug
                                             automatically.</small>
                                        {{-- title error zone --}}
                                        @error('title')
                                             <p class="form-error">{{$message}}</p>
                                        @enderror
                                   </div>

                                   <!-- Blog Content -->
                                   <div class="mb-3">
                                        <label for="description" class="form-label fs-3">Blog Content</label>
                                        <textarea class="form-control border border-secondary" id="description"
                                             rows="10" placeholder="Start updating your blog..."
                                             name="description">{{ $blog->description }}</textarea>
                                        {{-- description error zone --}}
                                        @error('description')
                                             <p class="form-error">{{$message }}</p>
                                        @enderror
                                   </div>

                                   <!-- Image Upload -->
                                   <div class="mb-3">
                                        @if ($blog->image)
                                             <aside class="w-100">
                                                  <h2 class="fs-3">Previous Blog Image</h2>
                                                  <img src="{{ asset('storage/' . $blog->image) }}" alt="" class="w-25">
                                             </aside>
                                        @endif
                                        <label for="image" class="form-label fs-3">Featured Image</label>
                                        <input class="form-control border border-secondary bg-secondary" type="file"
                                             id="image" accept="image/*" name="image">
                                        <small class="text-muted ">Update a banner or cover image
                                             for your blog.</small>
                                        @error('image')
                                             <p class="form-error">{{ $message }}</p>
                                        @enderror
                                   </div>

                                   <!-- Buttons -->
                                   <div class="d-flex justify-content-end">
                                        <a href="{{ route("writer.dashboard") }}">
                                             <button type="button" class="btn btn-outline-primary me-2">
                                                  <span>
                                                       <i
                                                            class="fa-sharp-duotone fa-solid fa-arrow-left"></i></span>Back</button>
                                        </a>
                                        <button type="reset" class="btn btn-outline-secondary me-2">Discard</button>
                                        <button type="submit" class="btn btn-success">Update Blog</button>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </div>

</main>

@include("subview.footer")