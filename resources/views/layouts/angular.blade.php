@include('layouts.partials.header')

<div class="container">
    <div class="page-header">
        <h1>UUID namespace manager</h1>
    </div>

    {{-- Main content --}}
    <div ui-view>
        Loading...
    </div>
</div>

@include('layouts.partials.footer')
