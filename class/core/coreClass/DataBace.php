<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dante
 * Date: 04.12.12
 * Time: 14:27
 * To change this template use File | Settings | File Templates.
 */
class DataBace
{
    private $_host;
    private $_root;
    private $_pas;
    //private $_dbName;

    public function __construct($host, $user, $pas)
    {
        $this->_host = $host;
        $this->_root = $user;
        $this->_pas =  $pas;
    }

    protected  function Connect()
    {
        return $result = mysql_connect("$this->_host", "$this->_root", "$this->_pas");
    }

    // создает новую базу
    protected function CreatDataBase($dbName)
    {
            $this->Connect();
            $result = mysql_query("CREATE DATABASE $dbName") == TRUE ? TRUE : exit(mysql_error());
            mysql_query('SET NAMES utf8;');
            return $result;
    }

    // создает новую таблицу
    public  function  CreateNewTable($tableName)
    {

    }

    // изменяет имя базы
    public function RenameDataBase()
    {

    }

    // удвляет базу
    public function DeleteDataBase()
    {

            return mysql_query("DROP DATABASE $this->_dbName") == TRUE ? TRUE : exit(mysql_error());

    }
}
?>