<?php
/**
 * pagination.php
 * Created by: trainheartnet
 * Created at: 7/14/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@if ($paginator->lastPage() > 1)
    <ul class="pagination pagination-rounded justify-content-end mb-3 mt-3">

        {{--Previous page url--}}

        <li class="{{ ($paginator->currentPage() == 1) ? 'page-item disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url(1) }}">
                <i class="fas fa-angle-double-left"></i>
            </a>
        </li>

        <li class="{{ ($paginator->currentPage() == 1) ? 'page-item disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                <i class="fas fa-angle-left"></i>
            </a>
        </li>

        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="{{ ($paginator->currentPage() == $i) ? 'page-item active' : '' }}">
                <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor


        {{--Next page url--}}

        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'page-item disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" >
                <i class="fas fa-angle-right"></i>
            </a>
        </li>

        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'page-item disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url($paginator->url($paginator->lastPage())) }}" >
                <i class="fas fa-angle-double-right"></i>
            </a>
        </li>
    </ul>
@endif
