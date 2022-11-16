<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Controllers\Traits\CrudTrait;
use App\Http\Repositories\EventRepository;

class EventController extends Controller
{
    use CrudTrait;

    protected $model;

    protected $formRequest;

    public function __construct(EventRepository $model, EventRequest $formRequest)
    {
        $this->model = $model;
        $this->view = 'event';
        $this->formRequest = $formRequest;
        $this->route = 'events';
    }
}
