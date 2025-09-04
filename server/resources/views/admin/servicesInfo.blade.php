@include("subview.header")

<main class="d-flex">
     <aside>
          @include("subview.sidebar")
     </aside>

     {{-- service info section --}}
     <div class="container py-2" style="height: 100dvh; overflow-y: auto; scrollbar-width: none;">
          <div class="card border-0 rounded-4">
               <div class="card-body p-3">

                    <!-- service ID -->
                    <div class="mb-3 d-flex align-items-center">
                         <span class="ms-3 text-muted small">#{{ $service->Service_id }}</span>
                    </div>

                    <!-- Blog Title -->
                    <h1 class="fw-bold display-5 mb-4">{{ $service->title }}</h1>

                    {{-- blog image --}}
                    @if ($service->image)
                         <aside class="w-100 h-100">
                              <img src="{{ asset('storage/' . $service->image) }}" alt="" class="w-100 img-fluid img"
                                   style="height: 50dvh;object-position:center;" loading="lazy">
                         </aside>

                    @endif

                    <!-- Meta Info -->
                    <div class="d-flex flex-wrap mb-4 text-muted small">
                         <div class="me-4">📝 Created: {{ $service->created_at }}</div>
                    </div>

                    <!-- Blog Description -->
                    <p class="fs-5 lh-lg text-secondary">{{ $service->description }}</p>

                    <!-- Footer -->
                    <div class="mt-5 pt-3 border-top d-flex justify-content-between text-muted small">
                         {{-- <span>✍️ Written by <strong>{{ $blog->name }}</strong></span> --}}
                         <a href="{{ route('services') }}" class="text-decoration-none fw-semibold">← Back to
                              service</a>
                    </div>
               </div>
          </div>
     </div>
</main>




@include("subview.footer")