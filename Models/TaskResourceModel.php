<?php

namespace My_MVC\Models;

use My_MVC\Core\Model;
use My_MVC\Core\ResourceModel;
use My_MVC\Models\TaskModel;

class TaskResourceModel extends ResourceModel
{
    public function __construct()
    {
        $task =new TaskModel();
        parent::_init('tasks', 'taskID', new TaskModel );
    }
}
