@extends('SidebarNavbar')

@section('Section')
 @include('Vendors.vendorsidebar')

@endsection

<main>
    @yield('vendor')
</main>
