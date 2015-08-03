@include('layouts.partials.header')

<div class="container">
    @include('layouts.partials.nav-bar')

    {{-- Main content --}}
    <div ui-view>
        Loading...
    </div>
</div>

@include('layouts.partials.footer')
