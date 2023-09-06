<?php
include('./data.php');
if(isset($_GET['delid']))
{
    $id = $_GET['delid'];
    $udata->Delete('user_data',$id);
    header('location: ./table.php');
}


