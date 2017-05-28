<section aria-label="Page navigation" class="text-center">
    <ul class="pager">
        @foreach ($items as $date)
            @if ( $date->eq($current) )
                <li class="active">{{ $date->format($format) }}</li>
            @else
                <li><a href="#">{{ $date->format($format) }}</a></li>
            @endif
        @endforeach
    </ul>
</section><!-- /pagination -->