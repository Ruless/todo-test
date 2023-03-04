<?php

namespace App\Providers;

use App\Repositories\Task\{ITaskRepository, TaskRepository};


use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ITaskRepository::class, TaskRepository::class);
        
    }
}
