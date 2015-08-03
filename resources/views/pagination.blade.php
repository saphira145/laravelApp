<?php
    $firstPage = 1;
    $lastPage = $paginator->lastpage();
    $currentPage = $paginator->currentPage();
    
    //get next and previous page URL
    $nextPageUrl = $paginator->nextPageUrl();
    $previousPageUrl = $paginator->previousPageUrl();
    
    //Number of first and last page that showed in pagination
    $firstPageShowed = max($currentPage - 4, 1);
    $lastPageShowed = min($currentPage + 5, $lastPage);    
?>

@if ($lastPage > 1)
<ul class="pagination">
    <li>
        <a href="{{ $paginator->url($firstPage) }}">First</a>
    </li>
    <li class="{{ ($currentPage == $firstPage) ? ' disabled' : '' }}">
        <a href="{{ $previousPageUrl }}">Previous</a>
    </li>
    @for ($i = $firstPageShowed; $i <= $lastPageShowed; $i++)
        <li class="{{ ($currentPage == $i) ? ' active' : '' }}">
            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
    @endfor
    <li class="{{ ($currentPage == $lastPage) ? ' disabled' : '' }}">
        <a href="{{ $nextPageUrl }}" >Next</a>
    </li>
    <li>
        <a href="{{ $paginator->url($lastPage) }}">Last</a>
    </li>
</ul>
@endif