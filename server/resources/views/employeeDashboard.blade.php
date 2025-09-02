@include("subview.header")
<main class="d-flex  flex-wrap  bg-light" style="min-height:100vh;">
     <aside>
          @include('subview.sidebar')
     </aside>


     {{-- dashboar with table list --}}
     <div class="flex-grow-1 p-4 bg-white" style="height: 100dvh; overflow-y: auto; scrollbar-width: none;">

          {{-- new contact list --}}
          <div class="border border-secondary-subtle rounded shadow-lg px-2 py-4 mb-4">
               <h2 class="fw-bold mb-3">📋 New Contact List</h2>
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
                              @forelse ($NewContact as $index => $new)
                                   <tr>
                                        <td>{{ $index += 1 }}</td>
                                        <td class="text-primary">{{ $new->name }}</td>
                                        <td>{{ $new->email }}</td>
                                        <td>{{ $new->phone_number }}</td>
                                        <td>
                                             <form action="{{ route('employee.dashboard.update', ['id' => $new->id]) }}"
                                                  method="post">
                                                  @csrf
                                                  @method("put")
                                                  <select class="form-select form-select-sm" name="status"
                                                       onchange="this.form.submit()">
                                                       <option>New</option>
                                                       <option value="in-progress">In Progress</option>
                                                       <option value="reach-out">Reach Out</option>
                                                  </select>
                                             </form>
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

          {{-- reach out contact list --}}
          <div class="border border-secondary-subtle rounded shadow-lg px-2 py-4">
               <h2 class="fw-bold mb-3">📞 Reach Out Contact List</h2>
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
                              @forelse ($ReachContact as $index => $reach)
                                   <tr>
                                        <td>{{ $index += 1 }}</td>
                                        <td class="text-primary">{{ $reach->name }}</td>
                                        <td>{{ $reach->email }}</td>
                                        <td>{{ $reach->phone_number }}</td>
                                        <td>
                                             <span class="badge text-bg-warning">{{ $reach->status }}</span>
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