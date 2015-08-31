<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     * 
     */
    public function getUnassignedList() {
        // Get un-assigned list users
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPublisherGroups() {
        // get publisher group
    }
}
