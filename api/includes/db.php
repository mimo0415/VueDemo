<?php
require 'config.php';
require_once 'Medoo.php';
use Medoo\Medoo;
class DBFacade{
    protected $database;
    function __construct(){
        $this->database=new Medoo([
            'database_type' => DB_TYPE,
            'server' => DB_SERVER,
            'database_name' => DB_DATABASE,
            'username' => DB_USER,
            'password' => DB_PWD,
            'port'=>DB_PORT,
            'charset'=>DB_CHARSET
        ]);
    }
    public function Login($UserName,$Password){
        $datas = $this->database->select(TABLE_USERS, "*", ['UserName' => $UserName,'Password'=>$Password]);
        return $datas;
    }
    public function Register
}

?>