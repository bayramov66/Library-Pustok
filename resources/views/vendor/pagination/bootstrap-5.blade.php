@if ($paginator->hasPages())
<div class="row pt--30">
    <div class="col-md-12">
        <div class="d-flex justify-content-center flex-fill d-sm-none">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">@lang('pagination.previous')</span>
                </li>
                @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                </li>
                @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">@lang('pagination.next')</span>
                </li>
                @endif
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-center">
            <div class="pagination-block">
                <ul class="pagination-btns flex-center">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <a href="" class="single-btn prev-btn" aria-hidden="true"><i class="zmdi zmdi-chevron-left m-0"></i>
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" class="single-btn prev-btn" rel="prev" aria-label="@lang('pagination.previous')"><i class="zmdi zmdi-chevron-left m-0"></i>
                        </a>
                    </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                    <li class="disabled" aria-disabled="true">
                        <a href="#" class="single-btn">{{ $element }}</a>
                    </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                    @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="active" aria-current="page">
                        <span class="single-btn">{{ $page }}</span>
                    </li>
                    @else
                    <li><a href="{{ $url }}" class="single-btn">{{ $page }}</a></li>
                    @endif
                    @endforeach
                    @endif
                    @endforeach


                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" class="single-btn next-btn" rel="next" aria-label="@lang('pagination.next')"><i class="zmdi zmdi-chevron-right m-0"></i>
                        </a>
                    </li>
                    @else
                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <a href="" class="single-btn next-btn" aria-hidden="true"><i class="zmdi zmdi-chevron-right m-0"></i>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endif