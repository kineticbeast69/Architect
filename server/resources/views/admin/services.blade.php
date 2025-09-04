@include("subview.header")

{{-- Notification --}}
<div class="position-absolute top-0 end-0">
     @if (session('tech_error'))
          <x-notification type="info" message="{{ session('tech_error') }}" />
     @endif
     @if (session('services'))
          <x-notification type="success" message="{{ session('services') }}" />
     @endif
</div>


<main class="d-flex">
     <aside>
          @include("subview.sidebar")
     </aside>
     <div class="flex-grow-1 p-4 bg-white" style="height: 100dvh; overflow-y: auto; scrollbar-width: none;">

          {{-- services table list are here --}}
          <div class="border border-secondary-subtle rounded shadow-lg px-2 py-4 mb-4">
               <h2 class="fw-bold mb-3">📃 Finished Contact List</h2>
               <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-secondary table-hover align-middle rounded text-center border">
                         <thead class="table-dark">
                              <tr>
                                   <th>Serial No</th>
                                   <th>Services ID</th>
                                   <th>Contruction Type</th>
                                   <th>Title</th>
                                   <th>Created At</th>
                                   <th>Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              @forelse ($services as $index => $service)
                                   <tr>
                                        <td>{{ $index += 1 }}</td>
                                        <td>{{ $service->Service_id }}</td>
                                        <td>{{ $service->construction_type }}</td>
                                        <td><a href="{{ route('serviceInfo', ['id' => $service->id]) }}"
                                                  class="text-decoration-none">{{ $service->title }}</a></td>
                                        <td>{{ $service->created_at }}</td>
                                        <td><span class="d-flex align-items-center justify-content-center gap-3">
                                                  <a href="{{ route('serviceUpdate', ['serviceID' => $service->Service_id]) }}"><button
                                                            class="btn btn-light">
                                                            <i class="fs-4 fa-sharp fa-solid fa-pen-nib text-success"></i>
                                                       </button></a>
                                                  <form action="{{ route('serviceDelete', ['id' => $service->id]) }}"
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
                                        <td colspan="5" class="text-center">No Services found.</td>
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
                              <h4 class="mb-0">✍️ Write a New Services</h4>
                         </div>
                         <div class="card-body">
                              <form method="post" action="{{ route("servicesForm") }}" enctype="multipart/form-data">
                                   @csrf
                                   <!-- construction type -->
                                   <div class="mb-3">
                                        <label for="title" class="form-label fs-3">*Construction Type</label>
                                        <input type="text" class="form-control border border-secondary" id="title"
                                             placeholder="Enter a your Contruction type" name="type">
                                        {{-- title error zone --}}
                                        @error('type')
                                             <p class="form-error">{{$message}}</p>
                                        @enderror
                                   </div>

                                   {{-- services title --}}
                                   <div class="mb-3">
                                        <label for="title" class="form-label fs-3">*Services Title</label>
                                        <input type="text" class="form-control border border-secondary" id="title"
                                             placeholder="Enter a your services title" name="title">
                                        {{-- title error zone --}}
                                        @error('title')
                                             <p class="form-error">{{$message}}</p>
                                        @enderror
                                   </div>

                                   <!-- Blog Content -->
                                   <div class="mb-3">
                                        <label for="description" class="form-label fs-3">Services Content</label>
                                        <textarea class="form-control border border-secondary" id="description"
                                             rows="10" placeholder="Start writing your services..."
                                             name="description"></textarea>
                                        {{-- description error zone --}}
                                        @error('description')
                                             <p class="form-error">{{$message }}</p>
                                        @enderror
                                   </div>

                                   <!-- Image Upload -->
                                   <div class="mb-3">
                                        <label for="image" class="form-label fs-3">Service Image</label>
                                        <input class="form-control border border-secondary bg-secondary" type="file"
                                             id="image" accept="image/*" name="image">
                                        <small class="text-muted ">Upload a banner or cover image
                                             for your Services.</small>
                                        @error('image')
                                             <p class="form-error">{{ $message }}</p>
                                        @enderror
                                   </div>

                                   <!-- Buttons -->
                                   <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-outline-secondary me-2">Discard</button>
                                        <button type="submit" class="btn btn-success">Add Services</button>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</main>




@include("subview.footer")