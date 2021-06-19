<?php
namespace My_MVC\Controllers;

use My_MVC\Core\Controller;
use My_MVC\Models\TaskModel;
use My_MVC\Models\TaskRepository;

class TasksController extends Controller
{

    function index()
    {
       $task =new TaskRepository();
        $d['tasks'] = $task->getAll();
        $this->set($d);
        $this->render("index");
    }


    function create()
    {
        if (isset($_POST["title"]))
        {
            
            $taskM= new TaskModel();
            $taskM->setTitle($_POST['title']);
            $taskM->setDescription($_POST['description']);
            $taskM->setCreate(date("Y-m-d H:i:s"));

            $taskR=new TaskRepository();
            if ($taskR->add($taskM)){
                header("Location: " . WEBROOT . "Tasks/index");
            }

        }

        $this->render("create");
    }

    function edit($id)
    {
        $taskR= new TaskRepository();
        $d["tasks"] = $taskR->find($id);
        if (isset($_POST["title"]))
        {
            $taskM=new TaskModel();
            $taskM->setId($id);
            $taskM->setTitle($_POST['title']);
            $taskM->setDescription($_POST['description']);
            $taskM->setUpdate(date("Y-m-d H:i:s"));

            $taskR= new TaskRepository();

            if ($taskR->edit($taskM)){

                header("Location: " . WEBROOT . "Tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");

    }

    function delete($id)
    {
        $task = new TaskRepository();
        if($task->delete($id)){
            header("Location: " . WEBROOT . "Tasks/index");
        }

    }
}
