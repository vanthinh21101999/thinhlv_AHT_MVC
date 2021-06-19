<?php

namespace My_MVC\Core;
use My_MVC\Core\Model;
use My_MVC\Core\ResourceModelInterface;
use My_MVC\Config\Database;
use My_MVC\Models\TaskModel;
use PDO;

class ResourceModel implements ResourceModelInterface
{
    private $id;
    private $model;
    private $table;

    public function _init($table, $id, $model)
    {
        $this->id = $id;
        $this->model = $model;
        $this->table = $table;
    }

    public function save($model)
    {

        $arrModel= $model->getProperties();

        $placeholder=[];
        $insert_key=[];
        $placeUpdate=[];
        if ($model->getId()===null){
            
            foreach ($arrModel as $key=>$value){
                $insert_key[] =$key;
                array_push($placeholder, ':'.$key);

            }
            $strKeyIns= implode(', ',$insert_key);
            $strPlaceholder=implode(', ',$placeholder);
            $sql_insert="INSERT INTO $this->table ({$strKeyIns}) VALUES ({$strPlaceholder})";
            $obj_insert =Database::getBdd()->prepare($sql_insert);
            return $obj_insert->execute($arrModel);

        }else{

            foreach ($arrModel as $k=>$item){
                array_push($placeUpdate, $k.' = :'.$k);
            }

            
            $strPlaceUpdate=implode(', ',$placeUpdate);
            $sql_update="UPDATE {$this->table} SET $strPlaceUpdate WHERE id=:id";
            $obj_update=Database::getBdd()->prepare($sql_update);
            return $obj_update->execute($arrModel);
        }
        

    }

    public function getAll()
    {
        $class = get_class($this->model);
        $sql = "SELECT * FROM $this->table";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS,$class);
    }

    public function find($id)
    {
        $class = get_class($this->model);
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $req = Database::getBdd()->prepare($sql);
        $req->execute([$id]);
        $result=$req->fetchObject($class);
        return $result;

    }

    public function delete($id)
    {
        $sql_delete = "DELETE FROM $this->table WHERE id = $id";
        $obj_delete = Database::getBdd()->prepare($sql_delete);

        return $obj_delete->execute();
        
    }
}
