<?php

namespace App\Http\Requests;


class EventRequest
{
    
    
    public function storeRules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'start_date' =>'required',
            'end_date' =>'required'
        ];
    }
    public function updateRules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'start_date' =>'required',
            'end_date' =>'required'
        ];
    }
}
