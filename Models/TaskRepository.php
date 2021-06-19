<?php

namespace My_MVC\Models;

use My_MVC\Models\TaskResourceModel;

class TaskRepository 
{
    private $taskResoucreModel;

    function __construct(){
        $this->taskResoucreModel = new TaskResourceModel();
    }

    public function add($model)
    {
        $taskResourceModel = new TaskResourceModel();
        return $taskResourceModel ->save($model);
    }

    public function find($id)
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
