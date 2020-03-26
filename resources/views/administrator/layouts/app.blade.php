@include('administrator.layouts.header')
<div id="app-dashboard">
    @include('administrator.layouts.navbar')

    <main>
        @yield('content')
    </main>
</div>
@include('administrator.layouts.footer')
