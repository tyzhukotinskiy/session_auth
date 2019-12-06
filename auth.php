<?php

    require_once 'session.php';
    $user = new Session();
    try{
        $user->setName("Name");
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
$user->start();
    //echo session_id();
?>