<?php
    include_once 'namespace/namepace.php';
    $namespace = new namepace();
    $namespace->includeListClass('../developing/class/IndexTemplate');
    $Render = new RenderPades();
    include_once 'HomePage.php';
   //$namespace->includeClass('HomePage.php');
?>