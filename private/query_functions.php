<?php require_once('initialize.php'); ?>

<?php

function find_all_art()
{
    global $db;
    $sql = "SELECT * FROM art ";
    $sql .= "ORDER BY id ASC";
    $result=mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function insert_art($type, $description)
{
    global $db;
    $sql="INSERT INTO art ";
    $sql.="(type,description)";
    $sql.="VALUES(";
    $sql.="'".$type."',";
    $sql.="'".$description."'";
    $sql.=")";
    echo $sql;//works only when error occurs

    $result=mysqli_query($db,$sql);// for insert statement $result is true/false

    if($result)
    {
       return true;
    }
    
    else
    {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
?>