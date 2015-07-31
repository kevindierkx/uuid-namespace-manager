@if ($breadcrumbs)
    <ul class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && ! $breadcrumb->last)
                <li>
                    <a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a>
                </li>
            @else
                <li class="active">
                    <span>{{{ $breadcrumb->title }}}</span>
                </li>
            @endif
        @endforeach
    </ul>
@endif
