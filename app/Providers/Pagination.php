<?php

namespace App\Providers;

use Illuminate\Pagination\LengthAwarePaginator;

class Pagination {
    
    public static function makeLengthAwarePaginator($items, $total, $perPage) {
        return new LengthAwarePaginator($items, $total, $perPage);
    }
}
