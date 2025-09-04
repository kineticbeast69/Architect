@include("subview.header")

<main class="d-flex">
     <aside>
          @include("subview.sidebar")
     </aside>

     {{-- blog info section --}}
     <div class="container py-2" style="height: 100dvh; overflow-y: auto; scrollbar-width: none;">
          <div class="card border-0 rounded-4">
               <div class="card-body p-3">

                    <!-- Blog Status + ID -->
                    <div class="mb-3 d-flex align-items-center">
                         <span class="badge {{ $blog->status === 'public' ? 'bg-success' : 'bg-danger' }} px-3 py-2">
                              {{ ucfirst($blog->status) }}
                         </span>
                         <span class="ms-3 text-muted small">#{{ $blog->blog_id }}</span>
                    </div>

                    <!-- Blog Title -->
                    <h1 class="fw-bold display-5 mb-4">{{ $blog->title }}</h1>

                    {{-- blog image --}}
                    @if ($blog->image)
                         <aside class="w-100 h-100">
                              <img src="{{ asset('storage/' . $blog->image) }}" alt="" class="w-100 img-fluid img"
                                   style="height: 50dvh;object-position:center;" loading="lazy">
                         </aside>

                    @endif

                    <!-- Meta Info -->
                    <div class="d-flex flex-wrap mb-4 text-muted small">
                         <div class="me-4">📝 Created: {{ $blog->created_at }}</div>
                         <div>📅 Published: {{ $blog->published_at ? $blog->published_at : '—' }}</div>
                    </div>

                    <!-- Blog Description -->
                    <p class="fs-5 lh-lg text-secondary">{{ $blog->description }}</p>

                    <!-- Footer -->
                    <div class="mt-5 pt-3 border-top d-flex justify-content-between text-muted small">
                         {{-- <span>✍️ Written by <strong>{{ $blog->name }}</strong></span> --}}
                         <a href="{{ route('blogs') }}" class="text-decoration-none fw-semibold">← Back to Blogs</a>
                    </div>
               </div>
          </div>
     </div>
</main>




@include("subview.footer")