<?php

class DataAccess
{
    private $table;

    public function __construct()
    {

    }

    //ToDO
    /*public function save(EntityBase $entity)
    {

    }*/



    //Check if the Entity exist
    public function existEntity(Entity $entity,$table)
    {
        $id = $entity->getId();
        $exist = false;
        if($id>0)
        {

            $db = new DB();
            $db->open();

            $id = $db->real_escape_string($id);
            $query = 'SELECT Count(*) AS T FROM '.$table.' WHERE id ='.$id;

            $tot = $db->query_count($query);
            if($tot>0)
                $exist = true;

            $db->close();
        }

        return $exist;
    }

    //Delete the Entity
    public function deleteEntity(Entity $entity,$table)
    {
        $id = $entity->getId();

        if($id>0) {

            $db = new DB();

            $db->open();

            $id = $db->real_escape_string($id);

            $query = ' DELETE FROM '.$table.' WHERE id = '.$id;
            $db->query($query);
            $db->close();
        }

    }
}