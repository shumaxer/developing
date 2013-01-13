<?php

    if (!isset($_REQUEST[session_name()]))
    {
        session_start();
        $include = 'views/aut.html';
    }
    include_once '../../namespace/namepace.php';
    $namepace = new namepace();
    $namepace->includeClass('coreClass/ForUsersDB.php');

    if(isset($_POST['host']) && isset($_POST['user']) && isset($_POST['pas']))
    {

            $_SESSION['host'] = $_POST['host'];
            $_SESSION['user'] = $_POST['user'];
            $_SESSION['pas']  = $_POST['pas'];

    }
    if(!empty($_SESSION['host']) && !empty($_SESSION['user']) && !empty($_SESSION['pas']))
    {
        $foruserdb = new ForUsersDB($_SESSION['host'],$_SESSION['user'], $_SESSION['pas']);
        if($foruserdb->IssetConnect())
        {
            if(!isset($_POST['nameDb'])) $include = 'views/createDb.html';
            else
            {
                $include =  $foruserdb->CreateDb($_POST['nameDb']) == true ? 'views/viewDb.php' : 'views/aut.html';
            }


        }

    }


    //print_r($_SESSION);

include_once 'page.php';
?>