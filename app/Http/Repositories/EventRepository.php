<?php

namespace App\Http\Repositories;

use App\Models\Event;
use App\Http\Repositories\Traits\CrudRepositoryTrait;
use Carbon\Carbon;

class EventRepository
{
    use CrudRepositoryTrait;
    
    protected $model;

    public function __construct( Event $model)
    {
        $this->model = $model;
    }

    public function filter($params)
    {
        $model = $this->model;

        if(isset($params['event_type'])){
            if($params['event_type'] == 1)
            {
                $model = $model->where('end_date','<',Carbon::today());
            }
            if($params['event_type'] == 2)
            {
                $model = $model->where('start_date','>',Carbon::today());
            }
            if($params['event_type'] == 3)
            {
                $model = $model->whereBetween('start_date',[Carbon::today(),Carbon::today()->addDays(7)]);
            }
            if($params['event_type'] == 4)
            {
                $model = $model->whereBetween('end_date',[Carbon::today()->subDays(7),Carbon::today()]);
            }
        }
        return $model;

    }

}
