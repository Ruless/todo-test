<?php
namespace App\Repositories\Task;

use App\Models\Task as Model;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class TaskRepository extends Repository implements ITaskRepository
{
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

    public function getTaskList()
    {
        $model = collect([
            'process' => Model::inProcess(),
            'complite' => Model::isComplite(),
        ]);

        return $model;
    }

    public function taskCreate($request)
    {
        $model = Model::create($request);
        $this->comlitePrevTask($model);
        return true;
    }

    public function complite($request)
    {
        $model = Model::find($request['id']);
        $model->complite = true;
        $model->save();
        
        return true;
    }

    public function deleteTask($request)
    {
        Model::find($request['id'])->delete();
        return true;
    }

    public function comlitePrevTask($model) {
        if ( Model::inProcess()->count() >= 2 ) {
            $id = $model->id - 1;
            $test = Model::where('id', '<', $id)->latest('id')->first();
            $test->complite = true;
            $test->save();
        }
    }
}
