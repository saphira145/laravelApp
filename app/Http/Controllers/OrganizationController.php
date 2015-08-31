<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrganizationController extends Controller
{
    
    public function index() {
        return view('organization.index');
    }
    
    /**
     * AJAX get request
     * @return type
     */
    public function getOrganization()
    {
        
        $unassignedList = $this->organization->getUnassignedList();
        $publisherGroups = $this->organization->getPublisherGroups();
        
        return response()->json([
            'unassignedList' => $unassignedList,
            'publisherGroups' => $publisherGroups
        ]);
    }
    
    /**
     * AJAX Post request
     * @return json string
     */
    public function updateJson() {
        $groupId; // Get publisher group ID
        $json; // New json
        $this->organization->find($groupId)->update(['json' => $json]); // update json for group
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}
