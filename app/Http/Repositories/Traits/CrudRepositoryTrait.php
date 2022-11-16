<?php

namespace App\Http\Repositories\Traits;

/**
 * Trait CrudRepositoryTrait
 * @package Core\Repositories\Common\Traits
 */
trait CrudRepositoryTrait
{

    public function index($view)
    {
        $view = $view . '.index';
        return view($view,['model' => $this->model]);
    }

    public function create($view)
    {
        $view = $view . '.create';
        return view($view, ['model' => $this->model]);
    }

    /**
     * Create a new row
     *
     * @param  array $data
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function store($data)
    {
        $model = $this->model->create($data);
        return $model;
    }

    /**
     * if exits update or create a new row
     * @param $prev
     * @param $data
     * @return mixed
     */
    public function updateOrCreate($prev, $data)
    {
        return $this->model->updateOrCreate($prev, $data);
    }

    /**
     * Update a row
     *
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        $model = $this->model->find($id);
        $model->update($data);
        if ($model->pivots) {
            foreach ($model->pivots as $pivot) {
                if (isset($data[$pivot])) {
                    $model->$pivot()->sync($data[$pivot]);
                }
            }
        }
        return $model;
    }

    /**
     * Delete a particular row
     *
     * @param  integer $id
     * @return boolean
     */
    public function delete($id)
    {
        $model = $this->model->find($id);
        if ($this->model->pivots) {
            foreach ($this->model->pivots as $pivot) {
                $model->$pivot()->sync([]);
            }
        }
        return $model->delete();
    }

   public function getModel()
   {
    return $this->model;
   }
   public function searchable($params)
    {
        // dd($params);
        if(isset($params['types'])){
            $types = $params['types'];
            $values = $params['values'];
            foreach ($types as $key => $type) {
                if (isset($values[$key]) && $values[$key] !== "") {
                    $this->model =  $this->model->where($type, 'like', "%" . $values[$key]  . "%");
                }
            }
        }
        return $this;
    }

    public function scope()
    {
        return $this;
    }

    public function filter()
    {
        return $this->model;
    }

    

   
}
