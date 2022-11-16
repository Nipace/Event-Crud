<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;

/**
 * Trait CrudTrait
 */
trait CrudTrait
{
    public function index(Request $request)
    {
        $params = $request->query();
        $filter = $this->model->filter($params);
        $records = $filter->orderBy('start_date','asc')->get();
        $view = $this->view . '.index';
        return view($view,['records' => $records]);
    }

    public function create()
    {
        $view = $this->view . '.create';
        return view($view, ['model' => $this->model]);
    }

    
    public function store(Request $request)
    {
        $data = $this->validate($request,$this->formRequest->storeRules());
        $model = $this->model->store($data);
        return $this->redirect('Record created successfully');

    }

    public function edit($id)
    {
        $view = $this->view . '.edit';
        $model = $this->model->getModel()->find($id);
        return view($view,['model'=>$model]);
    }

    
    public function update(Request $request, $id)
    {
        $model = $this->model->getModel()->find($id);
        $data = $this->validate($request,$this->formRequest->updateRules());
        $model->update($data);
        return $this->redirect('Record updated successfully');
    }

 
    public function destroy($id)
    {
        $model = $this->model->getModel()->find($id);
        $model->delete();
        return "Data deleted sucessfully";
    }

   
  
    public function redirect($message)
    {
        return redirect()->route("{$this->route}.index")
            ->with('message',$message);
    }

    
    

   
}
