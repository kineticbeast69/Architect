@include("subview.header")
<div>
    <h1>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            @method("delete")
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Logout</button>
        </form>
    </h1>
    {{-- admin dashboard --}}
    @can('isAdmin')
        <x-admin-dashboard />
    @endcan
    {{-- author dashboard --}}
    @can('isWriter')
        <x-editor-dashboard />
    @endcan

</div>
@include("subview.footer")