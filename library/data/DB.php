<?php


class DB
{

    private $hostname;
    private $username;
    private $password;
    private $database;
    private $db;

    public function __construct()
    {
        $this->hostname = HOSTNAME;
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->database = DB;
    }
	
    
    public function insert_id()
    {
        return $this->db->insert_id;
    }

    public function query_count($sql)
    {
        $result = $this->db->query($sql);
        $row = $result->fetch_row();
        return $row[0];
    }

    public function query($sql)
    {
        $this->db->query("SET NAMES 'utf8'");
        //echo "hola";
        //exit($sql);
        $this->db->query($sql);
    }

    public function query_asoc($sql)
    {

        $this->db->query(" SET NAMES 'utf8' ");
        if(!$result = $this->db->query($sql)){
            die('There was an error running the query [' .
                $this->db->error . ']');
        }

        mysqli_fetch_array($result,MYSQLI_ASSOC);

        $res = array();

        foreach($result as $row)
        {
            array_push($res,$row);
        }

        return $res;
    }
    
    public function open()
    {
        $this->db = new mysqli($this->hostname,
            $this->username, $this->password,$this->database);

        if($this->db->connect_errno > 0){
            die('Unable to connect to database [' . $db->connect_error . ']');
        }
    }

    public function close()
    {
        $this->db->close();
    }

    public function real_escape_string($cadena)
    {
        return $this->db->real_escape_string($cadena);
    }

}