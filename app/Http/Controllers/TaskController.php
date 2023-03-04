<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Task\{
    ITaskRepository
};
use App\Http\Resources\Task\ {
    ListResource, StatusResource
};
use App\Http\Requests\Task\{
    CreateRequest, CompliteRequest
};

class TaskController extends Controller
{
    public function getTaskList(ITaskRepository $repository):ListResource
    {
        $result = $repository->getTaskList();

        return new ListResource($result);
    }

    public function create(ITaskRepository $repository, CreateRequest $request):StatusResource
    {
        $result = $repository->taskCreate($request->validated());

        return new StatusResource($result);
    }

    public function complite(ITaskRepository $repository, CompliteRequest $request):StatusResource
    {
        $result = $repository->complite($request->validated());

        return new StatusResource($result);
    }

    public function deleteTask(ITaskRepository $repository, CompliteRequest $request):StatusResource
    {
        $result = $repository->deleteTask($request->validated());

        return new StatusResource($result);
    }
}
