@include("subview.header")

<main class="d-flex">
     <aside>
          @include("subview.sidebar")
     </aside>
     {{-- dashboar with table list --}}
     <div class="flex-grow-1 p-4 bg-white" style="height: 100dvh; overflow-y: auto; scrollbar-width: none;">

          {{-- finished contacts list --}}
          <div class="border border-secondary-subtle rounded shadow-lg px-2 py-4 mb-4">
               <h2 class="fw-bold mb-3">📃 Finished Contact List</h2>
               <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-secondary table-hover align-middle rounded text-center border">
                         <thead class="table-dark">
                              <tr>
                                   <th>Serial No</th>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Phone</th>
                                   <th>Status</th>
                              </tr>
                         </thead>
                         <tbody>
                              @forelse ($Dones as $index => $done)
                                   <tr>
                                        <td>{{ $index += 1 }}</td>
                                        <td class="text-primary">{{ $done->name }}</td>
                                        <td>{{ $done->email }}</td>
                                        <td>{{ $done->phone_number }}</td>
                                        <td><span class="badge text-bg-success">{{ $done->status }}</span></td>
                                   </tr>
                              @empty
                                   <tr>
                                        <td colspan="5" class="text-center">No contacts found</td>
                                   </tr>
                              @endforelse
                         </tbody>

                    </table>
               </div>
          </div>
          {{-- resolved list table --}}
          <div class="border border-secondary-subtle rounded shadow-lg px-2 py-4 mb-4">
               <h2 class="fw-bold mb-3">📋 Newly Contact List</h2>
               <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-secondary table-hover align-middle rounded text-center border">
                         <thead class="table-dark">
                              <tr>
                                   <th>Serial No</th>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Phone</th>
                                   <th>Status</th>
                              </tr>
                         </thead>
                         <tbody>
                              @forelse ($News as $index => $new)
                                   <tr>
                                        <td>{{ $index += 1 }}</td>
                                        <td class="text-primary">{{ $new->name }}</td>
                                        <td>{{ $new->email }}</td>
                                        <td>{{ $new->phone_number }}</td>
                                        <td>{{ $new->status }}</td>
                                   </tr>
                              @empty
                                   <tr>
                                        <td colspan="5" class="text-center">No contacts found</td>
                                   </tr>
                              @endforelse
                         </tbody>

                    </table>
               </div>
          </div>

          {{-- reach out and in-progress contact list --}}
          <div class="border border-secondary-subtle rounded shadow-lg px-2 py-4">
               <h2 class="fw-bold mb-3">📞 Under process Contact List</h2>
               <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-secondary  table-hover align-middle text-center border">
                         <thead class="table-dark">
                              <tr>
                                   <th>Serial No</th>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Phone</th>
                                   <th>Status</th>
                              </tr>
                         </thead>
                         <tbody>
                              @forelse ($Unders as $index => $under)
                                   <tr>
                                        <td>{{ $index += 1 }}</td>
                                        <td class="text-primary">{{ $under->name }}</td>
                                        <td>{{ $under->email }}</td>
                                        <td>{{ $under->phone_number }}</td>
                                        <td>
                                             <span class="badge text-bg-warning">{{ $under->status }}</span>
                                        </td>
                                   </tr>
                              @empty
                                   <tr>
                                        <td colspan="5" class="text-center">No contacts found</td>
                                   </tr>
                              @endforelse
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
</main>




@include("subview.footer")