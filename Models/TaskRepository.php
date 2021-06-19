<?php

namespace My_MVC\Models;

use My_MVC\Models\TaskResourceModel;

class TaskRepository 
{
    private $taskResoucreModel;

    function __construct(){
        $task =new TaskModel();
        $this->taskResoucreModel = new TaskResourceModel('tasks', 'taskID', new TaskModel );
    }

    public function add($model)
    {
        $taskResourceModel = new TaskResourceModel();
        return $taskResourceModel ->save($model);
    }

    public function get($id)
    {
        $taskResourceModel =  new TaskResourceModel();
        return $taskResourceModel ->find($id);
    }

    public function delete($id)
    {
        $taskResourceModel = new TaskResourceModel();
        return $taskResourceModel ->delete($id);
        
    }

    public function getAll()
    {
        $taskResourceModel = new TaskResourceModel();
        return $taskResourceModel ->getAll();
    }

    public function edit($model){
        $taskResourceModel = new TaskResourceModel();
        return $taskResourceModel ->save($model);
    }
}
