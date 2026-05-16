<section class="page-title" style="max-height:150px; overflow:hidden;">
</section>

<section class="breadcrumb-bar">
    <div class="container">
        <div class="breadcrumb-nav">
            <a href="{{ url('/') }}" class="breadcrumb-link">
                <i class="fa fa-home"></i> Home
            </a>
            @foreach($breadcrumb as $crumb)
                <i class="fa fa-chevron-right breadcrumb-separator"></i>
                @if(!$loop->last)
                    <a href="{{ $crumb['url'] }}" class="breadcrumb-link">{{ $crumb['label'] }}</a>
                @else
                    <span class="breadcrumb-active">{{ $crumb['label'] }}</span>
                @endif
            @endforeach
        </div>
    </div>
</section>