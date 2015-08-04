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
<div class="text-right">
    <ul class="pagination">
        <li class="first">
            <a href="{{ $paginator->url($firstPage) }}">First</a>
        </li>
        <li class="{{ ($currentPage == $firstPage) ? ' disabled' : '' }} prev-button">
            <a href="{{ $previousPageUrl }}">Previous</a>
        </li>
        @for ($i = $firstPageShowed; $i <= $lastPageShowed; $i++)
            <li class="{{ ($currentPage == $i) ? ' active' : '' }}
                       {{ ($currentPage == $i-1) ? ' next': '' }}
                       {{ ($currentPage == $i+1) ? ' prev': '' }} ">
                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="{{ ($currentPage == $lastPage) ? ' disabled' : '' }} next-button">
            <a href="{{ $nextPageUrl }}" >Next</a>
        </li>
        <li class="last">
            <a href="{{ $paginator->url($lastPage) }}">Last</a>
        </li>
    </ul>
    </div>
@endif