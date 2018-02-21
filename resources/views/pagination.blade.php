<section aria-label="Page navigation" class="text-center">
    <ul class="pager">
        @foreach ($items as $date)
            @if ( $date->format($format) == $current->format($format) )
                <li class="active">{{ $date->format($format) }}</li>
            @else
                <li><a href="{{ url($url) }}?date={{ $date->format($urlFormat) }}">{{ $date->format($format) }}</a></li>
            @endif
        @endforeach
    </ul>
</section><!-- /pagination -->