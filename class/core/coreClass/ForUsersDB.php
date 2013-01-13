<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dante
 * Date: 04.12.12
 * Time: 14:43
 * To change this template use File | Settings | File Templates.
 */
include_once 'DataBace.php';

class ForUsersDB extends DataBace
{
    public function __construct($host,$user,$pas)
    {
        parent::__construct($host,$user,$pas);
    }

    public function IssetConnect()
    {
        return $this->Connect() > 0 ? true : exit(mysql_error());
    }

    public function CreateDb($name)
    {
        return $this->CreatDataBase($name);
    }

    private  function ArrayDataBase()
    {
        return $this->IssetConnect() == true ? mysql_list_dbs($this->Connect()) : exit(mysql_error());
    }

    public function ListDataBace()
    {
        $array = array();
        $data = $this->ArrayDataBase();
        $c = mysql_num_rows($data);
        $i = 0;
        while($i < $c)
        {
            $array[$i] = mysql_db_name($data, $i);
            $i++;
        }
        return $array;
    }
}

?>