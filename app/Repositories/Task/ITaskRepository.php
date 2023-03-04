<?php

namespace App\Repositories\Task;

use App\Repositories\IRepository;
use Illuminate\Http\Request;

interface ITaskRepository extends IRepository
{
    public function getTaskList();
    public function taskCreate(Request $request);
    public function complite(Request $request);
    public function deleteTask(Request $request);
    public function comlitePrevTask($model);
}
